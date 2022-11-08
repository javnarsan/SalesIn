<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
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
    public function verify($id)
    {
        $user = User::find($id);
        $user->email_verified_at=now();
        $user->update();
        return redirect('home');
    }
    public function login(\Illuminate\Http\Request $request) {
        $this->validateLogin($request);    
        // This section is the only change
        
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();
            if($user->type=='A'){
                return view('adminViews/adminMenu');
            }else{
                if($user->deleted==1){
                    if ($user && \Hash::check($request->password, $user->password) && $user->active != 1) {
                        $errors = [$this->username() => trans('auth.deleted')];
                    }
                    return redirect()->back()
                        ->withInput($request->only($this->username(), 'remember'))
                        ->withErrors($errors);
                }else{
                    if($user->email_verified_at==null){
                        if ($user && \Hash::check($request->password, $user->password) && $user->active != 1) {
                            $errors = [$this->username() => trans('auth.not_verified')];
                        }
                        return redirect()->back()
                            ->withInput($request->only($this->username(), 'remember'))
                            ->withErrors($errors);
                    }else{
                        // Make sure the user is actived
                        if ($user->actived==1 && $this->attemptLogin($request)) {
                            // Send the normal successful login response
                            return $this->sendLoginResponse($request);
                        } else {
                            //*Warning: Deactivated account
                            // Increment the failed login attempts and redirect back to the
                            // login form with an error message.
                            if ($user && \Hash::check($request->password, $user->password) && $user->active != 1) {
                                $errors = [$this->username() => trans('auth.not_actived')];
                            }
                            return redirect()->back()
                                ->withInput($request->only($this->username(), 'remember'))
                                ->withErrors($errors);
                        }
                    }
                    
                }
            }
            
        }
    
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
    
        return $this->sendFailedLoginResponse($request);
    }
} 
