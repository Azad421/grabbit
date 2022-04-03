<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AccountStatus;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

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

    protected $redirectTo = RouteServiceProvider::USER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        $title = "Login";
        return view('auth.login', compact('title'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        $user = User::where('email', $request->email)->first();
        if ($user != null) {
            if ($user->is_verified != 1) {
                return redirect(RouteServiceProvider::LOGIN)->with('alert-danger', "Your Account is not verified!");
            }elseif ($user->acc_status == AccountStatus::where('nickname', 'pending')->first()->id){
                return redirect(RouteServiceProvider::LOGIN)->with('alert-danger', "Your Account is not Approved!");
            }elseif ($user->acc_status == AccountStatus::where('nickname', 'rejected')->first()->id){
                return redirect(RouteServiceProvider::LOGIN)->with('alert-danger', "Your Account is blocked Contact with administrator!");
            }elseif ($user->acc_status == AccountStatus::where('nickname', 'deactivated')->first()->id){
                return redirect(RouteServiceProvider::LOGIN)->with('alert-danger', "Your Account is Deactivated Contact with administrator!");
            }
        }
        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['is_verified' => 1, 'acc_status' => AccountStatus::where('nickname', 'approved')->first()->id]);
    }
}
