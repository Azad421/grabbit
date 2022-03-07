<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:user', 'rule.employee']);
    }

    public function index()
    {
        $pageTitle = "Dashboard";
        $breadCrumb = [
            array('title' => 'Home',
                'route' => 'admin.dashboard')
        ];
        $title = "Employee Dashboard";
        return view('employee.dashboard', compact('title', 'breadCrumb', 'pageTitle'));
    }

    public function profile()
    {
        $pageTitle = "Profile";
        $breadCrumb = [
            array('title' => 'Dashboard',
                'route' => 'admin.dashboard')
        ];
        $user = Auth::user();
        return view('employee.porfile', compact('user', 'pageTitle', 'breadCrumb'));
    }

    public function profileUpdate(UpdateEmployeeRequest $request, $id)
    {
        $user = User::find($id, 'id');
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->about_me = $request->about_me;
        $user->nid_num = $request->nid_num;
        $user->qualification = $request->qualification;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->country = $request->country;
        $user->district = $request->district;
        $user->village = $request->village;

        $user->save();
        return redirect()->back()->with('alert-success', 'User Saved Successfully');
    }
}
