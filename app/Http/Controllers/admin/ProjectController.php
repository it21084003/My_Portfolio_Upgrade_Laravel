<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

//for update image
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('admin_panel.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'image' => 'required|image',
            'url' => 'required',
        ]);
        //image upload method
        $image = $request->image;
        $imageName = uniqid().'_'.$image->getClientOriginalName();

        $image->storeAs('public/project-images',$imageName);

        Project::create([
            'name'=> $request->name,
            'image'=> $imageName,
            'url'=> $request->url,
        ]);
        return redirect()->route('projects.index')->with('successMsg','You have Successfuly Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin_panel.project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'url' => 'required',
        ]);
        $project = Project::find($id);

        if($request->hasFile('image')){
            // dd('yes');
            //image update
            //delete old image

            $projectImage = $project->image;
            File::delete('storage/project-images/'.$projectImage);

            //image upload method
            $image = $request->image;
            $imageName = uniqid().'_'. $image->getClientOriginalName();

            $image->storeAs('public/project-images',$imageName);

            $project->update([
                'name' => $request->name,
                'image' => $imageName,
                'url' => $request->url
            ]);
        }else{
            $project->update([
                'name' => $request->name,
                'url' => $request->url
            ]);
            // dd('no');
        }
        return redirect()->route('projects.index')->with('successMsg','You have Successfuly Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        //delete old image
        $projectImage = $project->image;
        File::delete('storage/project-images/'.$projectImage);

        Project::find($id)->delete();
        return redirect()->route('projects.index')->with('successMsg','You have Successfuly Deleted');
    }
}
