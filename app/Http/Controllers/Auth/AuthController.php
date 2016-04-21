<?php

namespace College\Http\Controllers\Auth;

use Mail;
use Auth;
use Validator;
use College\User;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


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

    protected $redirectTo = '/';


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'status' => 'active'])) {

            return redirect()->intended($request->path());
        }

        return redirect($this->loginPath())->withErrors([
            $request->input('email') => $this->getFailedLoginMessage(),
        ]);
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
            'first_name' => 'required|max:255|min:3',
            'last_name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:4',
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
         $user = User::create([
             'first_name' => $data['first_name'],
             'last_name' => $data['last_name'],
             'email' => $data['email'],
             'password' => bcrypt($data['password']),
             'confirmation_code' => str_random(30),
         ]);

        $data['code']  = $user->confirmation_code;

        Mail::send('emails.registration', $data, function($message) use ($data) {
            $message->from('no-reply@site.com', "Site name");
            $message->subject("Welcome to site name");
            $message->to($data['email']);
        });

        return $user;
    }
    
    public function confirm($email, $code)
    {
        $user = User::where('email', $email)->where('confirmation_code', $code)->first();
        $user->confirmation_code = null;
        $user->status = 'active';

        return \Redirect::route('login');
    }
}
