<?php

namespace App\Http\Controllers;

use App\Models\AccountStatus;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\MicroJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pageTitle = "Dashboard";
        $breadCrumb = [
            array('title' => 'Home',
                'route' => 'admin.dashboard')
        ];
        $title = "Admin Dashboard";
        $jobs = MicroJob::all();
        $user = User::all();
        return view('admin.dashboard', compact('title', 'pageTitle', 'breadCrumb', 'jobs', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAdminRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAdminRequest $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function setting()
    {
        $pageTitle = "Setting";
        $breadCrumb = [
            array('title' => 'Home',
                'route' => 'admin.dashboard')
        ];
        $title = "Profile Setting";
        $user = Auth::user();
        return view('admin.settings', compact('pageTitle', 'breadCrumb', 'title', 'user'));
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins'
        ]);
        $user = Auth('admin')->user();
        $user->verification_code = sha1(time());
        $user->save();
        try {
            MailController::sendEmail($user->user_name, $request->email, $user->verification_code);
            return redirect()->back()->with('alert-success', 'please check inbox for verify your email');
        } catch (\Exception $exception) {
            return redirect()->back()->with('alert-danger', $exception->getMessage());
        }
    }

    public function emailVerify($token, $email)
    {
        $user = Auth('admin')->user();
        if ($user->verification_code == $token) {
            $user->verification_code = '';
            $user->email = $email;
            $user->save();
            return redirect()->route('admin.setting')->with('alert-success', 'Email changed successfully');
        }
        return redirect()->route('admin.setting')->with('alert-warning', 'Wrong URL');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'cPassword' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = Auth('admin')->user();
        if (Hash::check($request->cPassword, $user->getAuthPassword())) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.setting')->with('alert-success', 'Password changed successfully');
        }
        return redirect()->route('admin.setting')->with('alert-warning', 'Current Password is incorrect');

    }

    public function users()
    {
        $users = User::all();
        $pageTitle = "Setting";
        $breadCrumb = [
            array('title' => 'Home',
                'route' => 'admin.dashboard')
        ];
        $title = "Profile Setting";
        return view('admin.users', compact('pageTitle', 'breadCrumb', 'title', 'users'));

    }

    public function userApprove($user)
    {
        $user = User::find($user);
        $user->acc_status = AccountStatus::where('nickname', 'approved')->first()->id;
        if ($user->save()) {
            return redirect()->route('admin.users')->with('alert-success', 'User approved successfully');
        }
        return redirect()->route('admin.users')->with('alert-danger', 'Some thing is wrong');
    }

    public function userReject($user)
    {
        $user = User::find($user);
        $user->acc_status = AccountStatus::where('nickname', 'rejected')->first()->id;
        if ($user->save()) {
            return redirect()->route('admin.users')->with('alert-success', 'User rejected successfully');
        }
        return redirect()->route('admin.users')->with('alert-danger', 'Some thing is wrong');
    }
}
