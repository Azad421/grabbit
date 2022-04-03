<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobStatus;
use App\Models\MicroJob;
use App\Http\Requests\StoreMicroJobRequest;
use App\Http\Requests\UpdateMicroJobRequest;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Str;

class MicroJobController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAuth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "All Job";
        $breadCrumb = [
            array('title' => 'Dashboard',
                'route' => 'admin.dashboard')
        ];
        $title = 'Admin - All JOb';
        $jobs = MicroJob::all();
        return view('admin.jobs', compact('jobs', 'title', 'pageTitle', 'breadCrumb'));
    }

    public function reject($id){
        $job = MicroJob::find($id);
        $job->status_id = JobStatus::where( 'nickname', 'rejected')->first()->status_id;
        $job->save();
        return redirect()->back()->with('alert-warning', "Job Rejected Successfully");
    }
    public function approve($id){
        $job = MicroJob::find($id);
        $job->status_id = JobStatus::where( 'nickname', 'approved')->first()->status_id;
        $job->save();
        return redirect()->back()->with('alert-success', "Job Approved Successfully");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreMicroJobRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(StoreMicroJobRequest $request)
    {
        $title = $request->job_title;
        $slug = Str::slug($title);

        $image = '';
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = time() . '-' . $slug . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $image);
            }
        }

        $microjob = new MicroJob();


        $microjob->employer_id = 1;
        $microjob->job_title = $title;
        $microjob->slug = $slug;
        $microjob->category = $request->category;
        $microjob->image = $image;
        $microjob->budget = $request->budget;
        $microjob->job_duration = $request->job_duration;
        $microjob->status_id = 1;


        $microjob->save();

        return redirect()->route('admin.microjob.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MicroJob $microJob
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($microJob)
    {
        $pageTitle = "All Job";
        $breadCrumb = [
            array('title' => 'Dashboard',
                'route' => 'admin.dashboard')
        ];
        $title = 'Admin - All JOb';
        $microJob = MicroJob::find($microJob);
        return view('admin.job', compact('microJob', 'title', 'pageTitle', 'breadCrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MicroJob $microJob
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(MicroJob $microJob)
    {
        $title = 'Admin - Create New Job';
        $categories = Category::all();

        return view('employee.editJob', compact('title', 'categories', $microJob));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateMicroJobRequest $request
     * @param \App\Models\MicroJob $microJob
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMicroJobRequest $request, MicroJob $microJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MicroJob $microJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(MicroJob $microJob)
    {
        //
    }
}
