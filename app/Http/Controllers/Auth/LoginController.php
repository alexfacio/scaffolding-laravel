<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return redirect()->intended(config('rules_route.base_sindi').'login');
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if( $request->ajax() ){
            $validate = $this->validateLogin($request);
            if( $validate ) return $validate;
        }
        else{
            $this->validateLogin($request);
        }


        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $email    = $request->input($this->username());
        $password = $request->input('password');

        //reglas de validación
        $rules = [
            $this->username() => 'required|email',
        ];

        $validator = \Validator::make($request->only($this->username()), $rules);
        if( $validator->fails() ){
            $request->replace([
                'email'    => $email.config('rules_users.sufixEmail'),
                'password' => $password,
            ]);
        }
        else{
            $request->replace([
                'email'    => $email,
                'password' => $password,
            ]);
        }

        return $this->guard()->attempt(
            $request->only('email', 'password'), $request->has('remember')
        );
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $rules = [
            $this->username() => 'required', 'password' => 'required',
        ];

        if( $request->ajax() ){
            $validation = \Validator::make($request->all(), $rules);
            if( $validation->fails() ){
                //Enviar errores encontrados
                return response()->json([
                    'success' => false,
                    'msg'     => $validation->getMessageBag()->toArray(),
                ]);
            }
        }

        $this->validate($request, $rules);
    }

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'msg'     => Lang::get('auth.failed')
            ]);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => Lang::get('auth.failed'),
            ]);
    }

    /**
     * Bloqueda si se hacen mas de 6 intentos fallidos
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        $message = Lang::get('auth.throttle', ['seconds' => $seconds]);

        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'msg'     => $message
            ]);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([$this->username() => $message]);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if( $request->ajax() ){
            if( $this->authenticated($request, $this->guard()->user()) ){
                return response()->json([
                    'success' => false,
                    'msg'     => Lang::get('auth.failed')
                ]);
            }
            else{
                //Activity
                activity()
                    ->inLog('authenticated')
                    ->causedBy($this->guard()->user())
                    ->log(Lang::get('auth.logged'));

                return response()->json([
                    'success'    => true,
                    'msg'        => Lang::get('auth.logged'),
                    'redirectTo' => $this->redirectPath()
                ]);
            }
        }

        //Activity
        activity()
            ->inLog('authenticated')
            ->causedBy($this->guard()->user())
            ->log(Lang::get('auth.logged'));

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Lógica de Redireccion cuando se loguea
     * @return [type] [description]
     */
    protected function redirectPath()
    {
        return url('/');
    }

    /**
     * Lógica de Redireccion cuando se loguea
     * @return [type] [description]
     */
    protected function redirectTo()
    {
        return $this->redirectPath();
    }
}
