<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Status;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $pageTitle = "Categories";
        $breadCrumb = [
            array('title' => 'Home',
                'route' => 'admin.dashboard')
        ];
        $categories = Category::all();
        $title = "Admin - Category";
        return view('admin.category', compact('categories', 'title', 'pageTitle', 'breadCrumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add Categories";

        $breadCrumb = [
            array('title' => 'Home',
                'route' => 'admin.dashboard'),
            array('title' => 'Categories',
                'route' => 'admin.category.index'),
        ];
        $statuses = Status::all();
        $title = "Admin - Add Category";
        return view('admin.addcategory', compact('statuses', 'title', 'pageTitle', 'breadCrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validated();
        $image = '';
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = time() . '-category.' . $request->image->extension();
                $request->image->move(public_path('images'), $image);
            }
        }
        $category_name = $request->category_name;
        $category_status = $request->category_status;
        $description = $request->description;
        $slug = Str::slug($category_name, '-');
        $category = Category::create([
            'category_name' => $category_name,
            'category_slug' => $slug,
            'category_status' => $category_status,
            'image' => $image,
            'description' => $description,
        ]);

        return redirect('/admin/category/');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }
    public function updateStatus($id)
    {
        $category = Category::where('category_id', $id)->first();
        if($category->category_status == '1'){
            $category_status = 2;
        }else{
            $category_status = 1;
        }
        Category::where('category_id', $id)->update(['category_status' => $category_status]);
        return redirect()->back()->with('alert-success', 'Status updated successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $pageTitle = "Edit Category";
        $breadCrumb = [
            array('title' => 'Home',
                'route' => 'admin.dashboard'),
            array('title' => 'Categories',
                'route' => 'admin.category.index'),
        ];
        $statuses = Status::all();
        $title = $category->category_name;
        if($category == null){
            return redirect()->route('admin.category.index');
        }
        return view('admin.edit_category', compact('category', 'statuses', 'pageTitle', 'breadCrumb', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCategoryRequest $request, $category)
    {
        $image = $request->oldImage;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                if(File::exists(public_path('images/'.$image))){
                    File::delete(public_path('images/'.$image));
                }
                $image = time() . '-category.' . $request->image->extension();
                $request->image->move(public_path('images'), $image);
            }
        }
        $request->validated();
        $category_name = $request->category_name;
        $category_status = $request->category_status;
        $description = $request->description;
        $slug = Str::slug($category_name, '-');
        $category = Category::where('category_id', $category)->update([
            'category_name' => $category_name,
            'category_slug' => $slug,
            'image' => $image,
            'category_status' => $category_status,
            'description' => $description,
        ]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(File::exists(public_path('images/'.$category->image))){
            File::delete(public_path('images/'.$category->image));
        }
        $category->delete();
        return redirect()->back()->with('alert-danger', 'Category Deleted');
    }
}
