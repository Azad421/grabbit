<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MicroJob;
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
        }
        $title = config('app.name') ."- All Job";
        return view('allJobs', compact('title', 'jobs'));
    }

    public function singleJob($id){
        $job = MicroJob::find($id);
        if($job == null){
            return redirect()->back();
        }
        $title = $job->job_title;
        return view('jobDetails', compact('title', 'job'));
    }

    public function payment(Request $request){

        $job = MicroJob::find($request->job_id);
        if($job == null){
            return redirect()->back();
        }
        $title = "Make Payment";
        return view('payment', compact('title', 'job'));
    }
}
