<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MicroJob;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:user'])->only('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = config('app.name');
        $categories = Category::all();
        $jobs = MicroJob::all();
        return view('welcome', compact('title', 'categories', 'jobs'));
    }

    public function job($category = null){
        $jobs = MicroJob::all();
        if($category != null){
            $jobs = MicroJob::all()->where('category', 'LIKE' ,$category);
            $category = Category::where('category_id', $category)->first();
        }
        $title = config('app.name') ."- All Job";
        return view('allJobs', compact('title', 'jobs', 'category'));
    }

    public function singleJob($id){
        $job = MicroJob::find($id);
        if($job == null){
            return redirect()->back();
        }
        $title = $job->job_title;
        return view('jobDetails', compact('title', 'job'));
    }


    public function profile($id){

        $user = User::find($id);
        if($user == null){
            return redirect()->back();
        }
        $title = $user->first_name . ' ' . $user->last_name;
        return view('userProfile', compact('title', 'user'));
    }


}
