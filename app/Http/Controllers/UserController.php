<?php

namespace App\Http\Controllers;

use App\Campus;
use App\User;
use App\UserCampus;
use App\LogUser;
use App\Rules\AlphaSpace;
use App\Rules\ValidCampus;
use App\Rules\ValidPHNumber;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::all();
        return view('users.index')->with('index', $records); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'firstname' => ['required', new AlphaSpace],
            'middlename' => ['required', new AlphaSpace],
            'lastname' => ['required', new AlphaSpace],
            'role' => ['required', 'in:Admin,Concessionaire'],
            'email' => ['required', 'unique:users'],
            'contactno' => ['required', new ValidPHNumber],
            'username' => ['required', 'unique:users'],
        ],
        [
            'firstname.required' => 'User must have a first name.',
            'midddlename.required' => 'User must have a middle name',
            'lastname.required' => 'User must have a last name',
            'role.required' => 'User must have a valid role',
            'role.in' => 'You have entered an invalid role',
            'email.required' => 'User must have a valid email address',
            'email.unique' => 'User must have a unique email address',
            'catering.required' => 'User must have a catering company',
            'conactno.required' => 'User must have a valid PH number',
            'username.required' => 'User must have a valid username',
            'username.unique' => 'Username must be unique',
            'campuses.required' => 'User is required to have a campus'
        ]);

        $validator->sometimes('catering', 'required', function($input) {
            return $input->role == "Concessionaire";
        });

        $validator->sometimes('campuses', ['required', new ValidCampus()], function($input) {
            return $input->role == "Concessionaire";
        });

        if(!$validator->fails())
        {
            if($request->role == 'Admin') $catering = null;
            else $catering = $request->catering;
            $randomPW = Str::random(10);

            $user = User::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'role' => $request->role,
                'email' => $request->email,
                'contactno' => $request->contactno,
                'username' => $request->username,
                'catering' => $catering,
                'password' => Hash::make($randomPW),
                'status' => 'Active'
            ]);
     
            LogUser::create([
                'user_id' => auth()->user()->id,
                'action' => 'Created User',
                'target_id' => $user->id
            ]);

            if($request->role == "Concessionaire")
            {
                $tmp = explode(',', $request->campuses);
                foreach($tmp as $i) 
                {
                    if(Campus::find($i)) 
                    {
                        UserCampus::create([
                            'campus_id' => $i,
                            'user_id' => $user->id
                        ]);
                    } else continue;
                }   

                LogUser::create([
                    'user_id' => auth()->user()->id,
                    'action' => 'Added Campuses',
                    'target_id' => $user->id
                ]);
            }
            return redirect()->route('users.index')->with('success', 'You have successfullly added a new user! Password: ' . $randomPW);
        } else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.single')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->id == $id) abort(403, "You can't edit your own account. Use edit profile!");
        if($id == 1) abort(403, "You can't edit super account");

        $user = User::find($id);
        $userCampuses = UserCampus::where('user_id', $id)->get();
        $campuses = array();

        foreach($userCampuses as $campus)
        {
            array_push($campuses, $campus->campus_id); 
        }
        $user->campuses = implode(',', $campuses);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->id == $id) abort(403, "You can't edit your own account. Use edit profile!");
        if($id == 1) abort(403, "You can't update super account");

        $validator = Validator::make($request->all(), 
        [
            'firstname' => ['required', new AlphaSpace],
            'middlename' => ['required', new AlphaSpace],
            'lastname' => ['required', new AlphaSpace],
            'role' => ['required', 'in:Admin,Concessionaire'],
            'email' => ['required', Rule::unique('users')->ignore($id)],
            'contactno' => ['required', new ValidPHNumber],
            'username' => ['required', Rule::unique('users')->ignore($id)],
        ],
        [
            'firstname.required' => 'User must have a first name.',
            'midddlename.required' => 'User must have a middle name',
            'lastname.required' => 'User must have a last name',
            'role.required' => 'User must have a valid role',
            'role.in' => 'You have entered an invalid role',
            'email.required' => 'User must have a valid email address',
            'email.unique' => 'User must have a unique email address',
            'catering.required' => 'User must have a catering company',
            'conactno.required' => 'User must have a valid PH number',
            'username.required' => 'User must have a valid username',
            'username.unique' => 'Username must be unique',
            'campuses.required' => 'User is required to have a campus'
        ]);

        $validator->sometimes('catering', 'required', function($input) {
            return $input->role == "Concessionaire";
        });

        $validator->sometimes('campuses', ['required', new ValidCampus()], function($input) {
            return $input->role == "Concessionaire";
        });

        if(!$validator->fails())
        {
            if($request->role == 'Admin') $catering = null;
            else $catering = $request->catering;

            $user = User::find($id);
            $user->firstname = $request->firstname;
            $user->middlename = $request->middlename;
            $user->lastname = $request->lastname;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->contactno = $request->contactno;
            $user->username = $request->username;
            $user->catering = $catering;
            $user->save();

            LogUser::create([
                'user_id' => auth()->user()->id,
                'action' => 'Edited User',
                'target_id' => $user->id
            ]);

            if($request->role == "Concessionaire")
            {
                $userCampuses = UserCampus::where('user_id', $user->id)->get();
                $campuses = explode(',', $request->campuses);

                foreach($userCampuses as $campus)
                {
                    if(array_search($campus->id, $campuses)) continue;
                    else UserCampus::where('user_id', $user->id)->where('campus_id', $campus->id)->Delete();
                }

                foreach($campuses as $campus)
                {
                    if(UserCampus::find($campus)) continue;
                    else UserCampus::create(['campus_id' => $campus, 'user_id' => $user->id]);
                }

                LogUser::create([
                    'user_id' => auth()->user()->id,
                    'action' => 'Updated Campuses',
                    'target_id' => $user->id
                ]);
            }

            return redirect()->route('users.index')->with('success', 'You have successfullly updated the user!');
        } else return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->id == $id) abort(403, "You can't deactivate your own account");
        if($id == 1) abort(403, "You can't deactivate super account");
    
        $user = User::find($id);
        $action = null;
        $message = null;

        if($user->status == 'Active')
        {
            $user->status = 'Deactivated';
            $action = 'Deactivated User';
            $message = 'deactivated';
        }
        else 
        {
            $user->status = 'Active';
            $action = 'Restored User';
            $message = 'restored';
        }
        $user->save();

        LogUser::create([
            'user_id' => auth()->user()->id,
            'action' => $action,
            'target_id' => $user->id
        ]);

        return redirect()->route('users.index')->with('success', 'You have successfullly ' . $message . ' the user!');
    }
}