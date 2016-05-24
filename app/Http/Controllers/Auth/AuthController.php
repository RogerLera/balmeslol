<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Intervention\Image\Facades\Image;
use Response;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $username = 'usuAlias';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'usuAlias' => 'required|min:2|max:25|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'usuFdn' => 'date|date_format:Y-n-j',
            'usuAvatar' => 'dimensions:max_width=350,max_height=350',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $avatar = null;
        if (isset($data['usuAvatar'])) {
            $file = $data['usuAvatar'];
            $avatar = Image::make($file);
            Response::make($avatar->encode('jpeg'));
        }
        return User::create([
            'usuAlias' => $data['usuAlias'],
            'email' => $data['email'],
            'usuFdn' => $data['usuFdn'],
            'usuAvatar' => $avatar,
            'password' => bcrypt($data['password']),
        ]);
    }
}
