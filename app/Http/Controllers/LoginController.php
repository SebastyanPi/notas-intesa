<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        /*$credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            $roles = array();
            $rolesXuser = auth()->user()->getRoleNames();
            foreach ($rolesXuser as $key => $value) {
                array_push($roles,$value);
            }

            switch ($request->role) {
                case 'Estudiante':
                    if(in_array('Estudiante', $roles)){
                        
                        return redirect()->route('page_student.index');
                    }else{
                        Auth::logout();
                        return back()->withErrors([
                            'warning' => 'El Usuario NO cumple con el Rol de Estudiante.',
                        ]);
                    }

                    break;
                case 'Profesor':
                    if(in_array('Profesor', $roles)){

                    }else{
                        Auth::logout();
                        return back()->withErrors([
                            'warning' => 'El Usuario NO cumple con el Rol de Profesor.',
                        ]);
                    }

                    break;
                case 'Administrador':
                  
                    if(in_array('Administrador', $roles)){
                        notify()->success('Bienvenido a la Plataforma Institucional', 'Hola!');
                        return redirect()->route('program.index');
                    }else{
                        Auth::logout();
                        return back()->withErrors([
                            'warning' => 'El Usuario NO cumple con el Rol de Administrador.',
                        ]);
                    }

                    break;
            }            
            
        }

        return back()->withErrors([
            'email' => 'No es posible acceder al Sistema.',
        ]);*/


        $credentials = $request->validate([
            'cedula' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['nit' => $request->cedula, 'password' => $request->password, 'state' => 'activo'])) {

            $request->session()->regenerate();
            $roles = array();
            $rolesXuser = auth()->user()->getRoleNames();
            foreach ($rolesXuser as $key => $value) {
                array_push($roles,$value);
            }

            switch ($request->role) {
                case 'Estudiante':
                    if(in_array('Estudiante', $roles)){
                        
                        return redirect()->route('page_student.index');
                    }else{
                        Auth::logout();
                        return back()->withErrors([
                            'warning' => 'El Usuario NO cumple con el Rol de Estudiante.',
                        ]);
                    }

                    break;
                case 'Profesor':
                    if(in_array('Profesor', $roles)){

                    }else{
                        Auth::logout();
                        return back()->withErrors([
                            'warning' => 'El Usuario NO cumple con el Rol de Profesor.',
                        ]);
                    }

                    break;
                case 'Administrador':
                  
                    if(in_array('Administrador', $roles)){
                        notify()->success('Bienvenido a la Plataforma Institucional', 'Hola!');
                        return redirect()->route('program.index');
                    }else{
                        Auth::logout();
                        return back()->withErrors([
                            'warning' => 'El Usuario NO cumple con el Rol de Administrador.',
                        ]);
                    }

                    break;
            }            
            
        }

        return back()->withErrors([
            'nit' => 'No es posible acceder al Sistema.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
