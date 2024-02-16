<?php

namespace App\Http\Controllers;
use App\Models\group;
use App\Models\Module;
use App\Models\assign_module;
use App\Models\qualification;
use App\Models\GroupStudent;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $module_id)
    {
        $group = group::find($id);
        $module = Module::where('id', $module_id)->first();
        $assig = assign_module::where('module_id', $module_id)->where('group_id', $id)->count();
        if($assig > 0){
            $assign = assign_module::where('module_id', $module_id)->where('group_id', $id)->first();
        }else{
            $assign = false;
        }
        $ExistQualification = qualification::where('module_id', $module_id)->where('group_id', $id)->get();
        $EstudiantesXGrupo = GroupStudent::where('group_id',$id)->get();
        foreach ($EstudiantesXGrupo as $student) {
            $arrays = qualification::where('module_id', $module_id)
                ->where('group_id', $id)->where('user_id', $student->user_id)->get();

            if(count($arrays) == 0){
                qualification::create([
                    "user_id" => $student->user_id,
                    "module_id" => $module_id,
                    "group_id" => $id,
                    "note1" => 00,
                    "note2" => 00,
                    "note3" => 00,
                    "fails" => 00,
                ]);
            }
            
        }
        $qualifications = qualification::where('module_id', $module_id)->where('group_id', $id)->get();
        
        return view('pages.group.qualification', compact('group','qualifications' ,'module' ,'module_id','assign'));
    }

    public function pdf($id, $module_id){
        date_default_timezone_set('America/Bogota');
        $group = group::find($id);
        $date = Carbon::now();
        $fechaHoy = $date->toDateTimeString();
        $qualifications = qualification::where('module_id', $module_id)->where('group_id', $id)->get();
        $pdf = Pdf::loadView('pages.pdf.qualification', compact('qualifications','group','fechaHoy'));
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
        //CREAR

        $qualifications = qualification::where('module_id', $request->module_id)->where('group_id', $request->id)->get();

        //$group = group::find($request->id);
        //$students = $group->students;
        $i = 0;
        foreach ($qualifications as $item) {
            $i++;

            $user = "user_".$i;
            $note1 = "camp1_".$i;
            $note2 = "camp2_".$i;
            $note3 = "camp3_".$i;
            $fails = "fails_".$i;
            $visible = "visible".$i;

            /*$Qualification = qualification::where('group_student_id',$request->$group_student_id)
            ->where('module_id',$request->module_id)->get();*/

            if($request->$note1 == ""){
                $request->$note1 = 0;
            }
            if($request->$note2 == ""){
                $request->$note2 = 0;
            }
            if($request->$note3 == ""){
                $request->$note3 = 0;
            }
            if($request->$fails == ""){
                $request->$fails= 0;
            }

            if($item->user_id == $request->$user){
                $item->note1 = str_replace(".","",$request->$note1);
                $item->note2 = str_replace(".","",$request->$note2);
                $item->note3 = str_replace(".","",$request->$note3);
                $item->fails = $request->$fails;
                $item->visible = ($request->$visible == "acepto" ) ? 1 : 0;
                $item->save();
            }

   
        }

        return redirect()->route('group.qualification', ["id" => $request->id, "module_id" => $request->module_id]);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
