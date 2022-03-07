<?php

namespace App\Http\Controllers\Auth\Jobseeker;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Http\Requests\JobSeekerRegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user');
    }


    public function register(JobSeekerRegisterRequest $request)
    {
        $request->validated();

        $user = new User();
        $user->first_name = $request->j_firstName;
        $user->last_name = $request->j_lastName;
        $user->nid_num = $request->j_nid;
        $user->date_of_birth = $request->j_dob;
        $user->gender = $request->j_gender;
        $user->email = $request->j_email;
        $user->password = Hash::make($request->j_password);
        $user->verification_code = sha1(time());
        $user->acc_status = 1;
        $user->user_role = 1;
        $user->save();

        if ($user != null) {
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            return redirect()->back()->with('alert-success', 'your account has been created please check email for verification link');
        }
        return redirect()->back()->with('alert-danger', 'Something went wrong');
    }

    public function verify($verification_code){
        $user = User::where('verification_code', $verification_code)->first();
        if($user != null){
            $user->is_verified = 1;
            $user->save();
            return redirect($this->redirectTo)->with('alert-success', 'your account has been verified please login');
        }
        return redirect($this->redirectTo)->with('alert-danger', 'Invalid Verification code');
    }
}
