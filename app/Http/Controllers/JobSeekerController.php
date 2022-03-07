<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:user', 'rule.jobSeeker']);
    }
    public function index()
    {
        $pageTitle = "Dashboard";
        $breadCrumb = [
            array('title' => 'Home',
                'route' => 'admin.dashboard')
        ];
        $title = "Job Seeker - Dashboard";
        return view('jobseeker.dashboard', compact('title', 'pageTitle', 'breadCrumb'));
    }


}
