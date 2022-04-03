<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MicroJob;
use App\Http\Requests\StoreMicroJobRequest;
use App\Http\Requests\UpdateMicroJobRequest;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Type;

class MicroJobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:user', 'rule.jobSeeker']);
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
                'route' => 'dashboard')
        ];
        $title = 'All JOb';
        $jobs = MicroJob::all();
        return view('user.jobs', compact('jobs', 'title', 'pageTitle', 'breadCrumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Profile";
        $breadCrumb = [
            array('title' => 'Dashboard',
                'route' => 'dashboard')
        ];
        $title = 'Create New Job';
        $categories = Category::all();
        $statuses = Status::all();
        return view('user.createjob', compact('title', 'categories', 'statuses', 'pageTitle', 'breadCrumb'));
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
        $slug = Str::slug($title, '-');

        $image = '';
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = time() . '-' . $slug . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $image);
            }
        }

        $microjob = new MicroJob();


        $microjob->user_id = Auth('user')->user()->id;
        $microjob->job_title = $title;
        $microjob->slug = $slug;
        $microjob->category = $request->category;
        $microjob->image = $image;
        $microjob->budget = $request->budget;
        $microjob->job_duration = $request->job_duration;
        $microjob->description = $request->description;
        $microjob->status_id = 1;


        $microjob->save();

        return redirect()->route('microjob.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MicroJob $microJob
     * @return \Illuminate\Http\Response
     */
    public function show(MicroJob $microJob)
    {
//        return view('user.job-details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MicroJob $microJob
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($microJob)
    {
        $microJob = MicroJob::find($microJob);
        $title = 'Employee - Edit Job';
        $pageTitle = 'Edit Job';
        $breadCrumb = [
            array('title' => 'Home',
                'route' => 'admin.dashboard')
        ];
        $categories = Category::all();
        return view('user.editJob', compact('title', 'categories', 'microJob', 'pageTitle', 'breadCrumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateMicroJobRequest $request
     * @param \App\Models\MicroJob $microJob
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(UpdateMicroJobRequest $request, $microJob)
    {
        $microjob = MicroJob::where('job_id', $microJob)->first();

        $title = $request->job_title;
        $slug = Str::slug($title, '-');
        $image = $request->oldImage;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                if(File::exists(public_path('images/'.$image))){
                    File::delete(public_path('images/'.$image));
                }
                $image = time() . '-' . $slug . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $image);
            }
        }


        $microjob->user_id = Auth('user')->user()->id;
        $microjob->job_title = $title;
        $microjob->category = $request->category;
        $microjob->image = $image;
        $microjob->budget = $request->budget;
        $microjob->job_duration = $request->job_duration;
        $microjob->description = $request->description;
        $microjob->status_id = 1;

        try {
            $microjob->save();
            return redirect()->back()->with('alert-success', 'Saved Successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('alert-danger' , $exception->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MicroJob $microJob
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($microJob)
    {
        $job = MicroJob::where('job_id', $microJob);

        if(File::exists(public_path('images/'.$job->image))){
            File::delete(public_path('images/'.$job->image));
        }
        try {
            MicroJob::destroy('job_id', $microJob);
            return redirect()->back()->with('alert-danger', 'Deleted Successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('alert-danger', $exception->getMessage());
        }
    }
}
