<?php

namespace App\Http\Controllers;
use App\Models\group;
use App\Models\GroupStudent;
use App\Models\Program;
use App\Models\schedule;
use App\Models\Module;
use App\Models\User;
use App\Models\qualification;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = group::All();
        $programs = Program::All();
        $schedules = schedule::All();
        $users = User::role('Profesor')->get();
        return view('pages.group.list', compact('groups', 'programs','schedules', 'users'));
    }

    public function pdf($id){
        date_default_timezone_set('America/Bogota');
        $group = group::find($id);
        $date = Carbon::now();
        $fechaHoy = $date->toDateTimeString();
        $students = GroupStudent::where("group_id", $id)->get();
        $pdf = Pdf::loadView('pages.pdf.studentgroup', compact('group','fechaHoy','students'));
        //return $pdf->download('calificaciones.pdf');
        return $pdf->stream();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'code' => ['required','min:2'],
        ]);

        $ModuleXPogram = group::where('program_id',$request->program_id)->where('schedule_id', $request->schedule_id)->where('user_id', $request->user_id)->where('code', $request->code)->get();
        if($ModuleXPogram->count() == 0){  

            group::create([
                'code' => $request->code,
                'program_id' => $request->program_id,
                'schedule_id' => $request->schedule_id,
                'user_id' => $request->user_id,
            ]);

            return back()->with('success', 'Creado Correctamente!');
        }else{
            return back()->with('danger', 'Ya existe el registro!');
        }


    }

    public function add($id){
        $group = group::find($id);
        return view('pages.group.addGroup', compact('group'));
    }

    public function deleteUser($id, Request $request){
        qualification::where("user_id", $request->id)->where("group_id", $id)->delete();
        GroupStudent::where("user_id", $request->id)->where("group_id", $id)->delete();
        return redirect()->route('group.add',$id);
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
        $group = group::find($id);
        $schedules = schedule::All();
        $users = User::role('Profesor')->get();
        return view('pages.group.edit', compact('group','schedules','users'));
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
        $request->validate([
            'code' => ['required','min:2'],
        ]);

        $groups = group::where('code', $request->code)
        ->where('program_id', $request->program_id)
        ->where('schedule_id', $request->schedule_id)->get();

        if(count($groups) == 0){
            $group = group::find($id);
            $group->code = $request->code;
            $group->schedule_id = $request->schedule_id;
            $group->user_id = $request->user_id;
            $group->description = $request->description;
            $group->save();
        }

        return redirect()->route('group.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $qualifications = qualification::where('group_id',$request->id)->delete();
        $group = group::where('id',$request->id)->delete();
        return redirect()->route('program.groups', $request->program_id);
    }
}
