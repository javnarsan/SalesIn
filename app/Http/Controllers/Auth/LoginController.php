<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(\Illuminate\Http\Request $request) {
        $this->validateLogin($request);    
        // This section is the only change
        
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();
            if($user->deleted){
                //Aqui no hace falta poner aviso porque Laravel lo tiene en cuenta como si el correo no existiese
            }else{
                // Make sure the user is active
                if ($user->actived && $this->attemptLogin($request)) {
                    // Send the normal successful login response
                    return $this->sendLoginResponse($request);
                } else {
                    //*Warning: Deactivated account
                    // Increment the failed login attempts and redirect back to the
                    // login form with an error message.
                    return redirect()
                        ->back()
                        ->withInput($request->only($this->username(), 'remember'))
                        ->withErrors(['actived' => 'You must be active to login.']);
                }
            }
        }
    
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
    
        return $this->sendFailedLoginResponse($request);
    }
} 
