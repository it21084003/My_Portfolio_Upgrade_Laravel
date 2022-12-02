<?php


// namespace App\Models\Skill\links;
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

//
//use App\Http\Controllers\admin\SkillController;
// use App\Models;

// use App\Http\Middleware\AdminMiddleware;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pegination
        $skill = Skill::paginate(20);
        //return($skills->links());
        //dd($skills->links());
        return view('admin_panel.skill.index',compact('skill')) ;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.skill.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'percent' => 'required'
        ]);
        Skill::create([
            'name' => $request->name,
            'percent' => $request->percent
        ]);
        return redirect('admin/skills')->with('successMsg','You have successfully create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return'I am show'.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
        return view('admin_panel.skill.edit',compact('skill'));
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
        $skill = Skill::find($id);
        // dd($skill);
        $request->validate([
            'name' => 'required',
            'percent' => 'required'
        ]);
        $skill->update([
            'name' => $request->name,
            'percent' => $request->percent,
        ]);
        return redirect('admin/skills')->with('successMsg','You have successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $skill = Skill::find($id);
        $skill->delete();

        return redirect('admin/skills')->with('successMsg','You have successfully Deleted');
    }
}
