<?php

namespace App\Http\Controllers\Auth;

use App\LogUser;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\AlphaSpace;
use App\Rules\ValidPHNumber;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('hasAdmin');
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname'     => ['required', 'string', 'max:50', new AlphaSpace],
            'middlename'    => ['required', 'string', 'max:50', new AlphaSpace],
            'lastname'      => ['required', 'string', 'max:50', new AlphaSpace],
            'username'      => ['required', 'string', 'max:20', 'unique:users'],
            'email'         => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'contactno'     => ['required', 'string', new ValidPHNumber],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $User = User::create([
            'firstname'     => $data['firstname'],
            'middlename'    => $data['middlename'],
            'lastname'      => $data['lastname'],
            'username'      => $data['username'],
            'email'         => $data['email'],
            'contactno'     => $data['contactno'],
            'role'          => 'Admin',
            'password'      => Hash::make($data['password']),
            'status'        => 'Active',
        ]);

        LogUser::create([
            'user_id'       => $User->id,
            'action'        => 'Created User',
            'target_id'     => $User->id
        ]);
        return $User;
    }
}
