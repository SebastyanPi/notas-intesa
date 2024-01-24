<?php

namespace App\Http\Controllers;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $ModuleXPogram = Module::where('name',$request->name)->where('program_id', $request->program_id)->where('user_id', $request->user_id)->get();
        if($ModuleXPogram->count() == 0){
            $request->validate([
                'name' => ['required','min:5']
            ]);
    
            Module::create([
                'name' => $request->name,
                'program_id' => $request->program_id,
                'user_id' => $request->user_id
            ]);
            return back()->with('success', 'Creado Correctamente!');
        }else{
            return back()->with('danger', 'Ya existe un registro igual.');
        }
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
        $modules = Module::where('name', $request->name)->where('user_id', $request->user_id)->get();
        if(count($modules) == 0){
            $request->validate([
                'name' => ['required','min:5']
            ]);
            $module = Module::where('id', $id)->first();
            $module->name = $request->name;
            $module->user_id = $request->user_id;
            $module->save();
        }
        return back()->with('success', 'Actualizado Correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $item = Module::where('id', $request->module_id)->delete();
        return redirect()->route('program.show', $request->program_id);
    }
}
