<?php

namespace App\Http\Controllers;

use App\Food; 
use App\Categories; 
use App\LogUser;
use App\Menu; 
use App\Campus; 
use App\User; 
use App\UserCampus; 
use App\Rules\AlphaSpace;
use App\Rules\IsOldPassword;
use App\Rules\MatchOldPassword;
use App\Rules\ValidPHNumber;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */ 
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for updating profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function editprofile()
    {
        $User = Auth::User();
        return view('auth.profile.edit')->with('user', $User);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(Request $request) 
    {
        $User = Auth::User();

        $validator = Validator::make($request->all(), 
        [
            'firstname' => ['required', 'max:50', new AlphaSpace],
            'middlename' => ['required', 'max:50', new AlphaSpace],
            'lastname' => ['required', 'max:50', new AlphaSpace],
            'email' => ['required', 'email', 'max:100', Rule::unique('users')->ignore($User->id)],
            'contactno' => ['required', 'max:20', new ValidPHNumber],
            'coverphoto' => ['image', 'nullable', 'max:10240']
        ],
        [
            'firstname.required' => 'You need to have a first name',
            'firstname.max' => 'Your first name can only have a max of :max characters',
            'middlename.required' => 'You need to have a middle name',
            'middlename.max' => 'Your middle name can only have a max of :max characters',
            'lastname.required' => 'You need to have a last name',
            'lastname.max' => 'Your last name can only have a max of :max characters',
            'email.required' => 'You need to have a valid email address',
            'email.email' => 'You need to put a valid email',
            'email.max' => 'Your email can only have a max of :max characters',
            'catering.required' => 'You need to have a catering company',
            'catering.max' => 'Your company name can only have a max of :max characters',
            'contactno.required' => 'You need to have a contact number',
            'contactno.max' => 'Your contact number can only have a max of :max digits',
            'coverphoto.image' => 'Your coverphoto must be an image',
            'coverphoto.max' => 'Your coverphoto exceeds the maximum file size'
        ]);

        $validator->sometimes('catering', ['required', 'max:50', new AlphaSpace()], function($input) {
            return $input->role == "Concessionaire";
        });

        if(!$validator->fails())
        {
            $User->firstname = $request->firstname;
            $User->middlename = $request->middlename;
            $User->lastname = $request->lastname;
            $User->catering = $request->catering;
            if($User->email != $request->email) 
            {
                $User->email = $request->email;
                $User->email_verified_at = null;
            }

            if($request->hasFile('coverphoto'))
            {
                if ($User->coverphoto != "" || $User->coverphoto != null){
                    Storage::delete('public/coverphotos/' . $User->coverphoto);
                }
            
                $file = $request->file('coverphoto')->getClientOriginalName();
                $name = pathinfo($file, PATHINFO_FILENAME);
                $ext = $request->file('coverphoto')->getClientOriginalExtension();
                $filename = $file . '_' . time() . '.' . $ext;
                $path = $request->file('coverphoto')->storeAs('public/coverphotos', $filename);

                $User->coverphoto = $filename;
            } 
            
            $User->save();
            
            return redirect()->route('dashboard.profile.edit')->with('success', 'You have successfullly updated your profile!');
        }  else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Show the form for updating password.
     *
     * @return \Illuminate\Http\Response
     */
    public function editpassword() 
    {
        return view('auth.passwords.change');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'oldpassword' => ['required', new MatchOldPassword],
            'password' => ['required', new IsOldPassword, 'confirmed']
        ],
        [
            'oldpassword.required' => 'Current password is required',
            'password.required' => 'New password is required',
            'password.confirmed' => 'New password needs to be confirmed'
        ]);

        if(!$validator->fails())
        {
            $user = Auth::User();
            $user->password = Hash::make($request->password);
            $user->save();

            LogUser::create([
                'user_id' => $user->id,
                'action' => 'Changed Password',
                'target_id' => $user->id
            ]);

            return redirect()->route('dashboard.index')->with('success', 'You have successfullly changed your password!');
        }  else return redirect()->back()->withErrors($validator)->withInput();       
    }

    public function myCampuses(){
        $user = Auth::User();  
        $campuses = collect();
        
        $mycampuses = User::find($user->id)->userUserCampus;  
            foreach($mycampuses as $campus){
                $x = $campus->campus_id; 
                $campuses->push(Campus::find($x)); 
            }  

        return view('auth.mycampuses.index')->with('index', $campuses); 

    }

    public function adminHome(){
        $stats = array(
           array("name" => "Menu", "count" => Menu::all()->count()), 
           array("name" => "Food", "count" => Food::all()->count()), 
           array("name" => "Categories", "count" => Categories::all()->count()), 
           array("name" => "Campuses", "count" => Campus::all()->count()), 
           array("name" => "Users", "count" => User::all()->count())
        ); 
        return view('dashboard.admin')->with('stats', $stats); 
    }
}
