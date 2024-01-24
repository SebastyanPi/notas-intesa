<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\group;
use App\Models\schedule;
use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$module = Module::find(1);
        if (Cache::has('programas')) {
            $programas = Cache::get('programas');
        }else{
            $programas = Program::where('type','Tecnico')->get();
            Cache::put('programas', $programas);
        }

        if (Cache::has('diplomados')) {
            $diplomados = Cache::get('diplomados');
        }else{
            $diplomados = Program::where('type','Diplomado')->get();
            Cache::put('diplomados', $diplomados);
        }

        if (Cache::has('cursos')) {
            $cursos = Cache::get('cursos');
        }else{
            $cursos = Program::where('type','Curso')->get();
            Cache::put('cursos', $cursos);
        }

        if (Cache::has('seminarios')) {
            $seminarios = Cache::get('seminarios');
        }else{
            $seminarios = Program::where('type','Seminario')->get();
            Cache::put('seminarios', $seminarios);
        }

        if (Cache::has('otros')) {
            $otros = Cache::get('otros');
        }else{
            $otros = Program::where('type','Otro')->get();
            Cache::put('otros', $seminarios);
        }
         
         return view('pages.program.list', compact('programas','diplomados','cursos','seminarios','otros'));
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

    public function pdf($id)
    {
        date_default_timezone_set('America/Bogota');
        $program = Program::find($id);
        $groups = group::where('program_id', $id)->get();
        $date = Carbon::now();
        $fechaHoy = $date->toDateTimeString();
        $pdf = Pdf::loadView('pages.pdf.groupsprogram', compact('program','fechaHoy','groups'));
        return $pdf->stream();
    }

    public function pdfModules($id){
        date_default_timezone_set('America/Bogota');
        $program = Program::find($id);
        $date = Carbon::now();
        $fechaHoy = $date->toDateTimeString();
        $modules = Module::where("program_id", $id)->get();
        $pdf = Pdf::loadView('pages.pdf.modulesprogram', compact('program','fechaHoy','modules'));
        //return $pdf->download('calificaciones.pdf');
        return $pdf->stream();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','min:5','unique:programs,name']
        ]);

        Program::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        switch ($request->type) {
            case 'Tecnico':
                Cache::forget('programas');
                break;
            case 'Diplomado':
                Cache::forget('diplomados');
                break;
            case 'Curso':
                Cache::forget('cursos');
                break;
            case 'Seminario':
                Cache::forget('seminarios');
                break;
            case 'Otro':
                Cache::forget('otros');
                break;
        }
        notify()->success('Programa creado correctamente', 'Bien Hecho!');
        return back()->with('success', 'Creado Correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);
        $teacher = User::role('Profesor')->get();
        return view('pages.program.view', compact('program','teacher'));
    }

    public function groups($id){

        $program = Program::find($id);
        $groups = group::All();
        $schedules = schedule::All();
        $users = User::role('Profesor')->get();
        return view('pages.program.groups', compact('program','groups','schedules', 'users'));
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
        $request->validate([
            'name' => ['required','min:5','unique:programs,name']
        ]);
        $program = Program::where('id', $id)->first();
        $program->name = $request->name;
        $program->save();

        switch ($program->type) {
            case 'Tecnico':
                Cache::forget('programas');
                break;
            case 'Diplomado':
                Cache::forget('diplomados');
                break;
            case 'Curso':
                Cache::forget('cursos');
                break;
            case 'Seminario':
                Cache::forget('seminarios');
                break;
            case 'Otro':
                Cache::forget('otros');
                break;
        }

        return back()->with('success', 'Actualizado Correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $program = Program::where('id', $request->program_id)->delete();
        return redirect()->route('program.index');
    }
}
