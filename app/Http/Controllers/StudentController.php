<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\token;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.student.index');
    }

    public function listPdf(){
        date_default_timezone_set('America/Bogota');
        $students = User::role('Estudiante')->orderBy('id', 'desc')->get();
        $date = Carbon::now();
        $fechaHoy = $date->toDateTimeString();
        $pdf = Pdf::loadView('pages.pdf.studentlist', compact('students','fechaHoy'));
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.student.create');
    }

    public function enroll($id)
    {
        $student = User::where('id', $id)->first();
        return view('pages.student.enroll', compact('student'));
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


    public function page_student(){

        return view('role_student.index');

    }

    public function campus(){

        return view('role_student.campus');

    }

    public function campus_formacion($cedula){
      
        $student = User::where('nit', $cedula)->first();
        $tok = token::where('user_id',$student->id)->first();
        $token        = $tok->token;
        $domainname   = 'https://aula.institutointesa.edu.co';
        $functionname = 'auth_userkey_request_login_url';

        $param = Array(
            'user' => Array(
                'username'     => $cedula,
            )
        );

        $ch = curl_init($domainname.'/webservice/rest/server.php?wstoken='.$token.'&wsfunction='.$functionname.'&moodlewsrestformat=json');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
            $result = json_decode(curl_exec($ch));
            //dd($result);
            $loginurl = $result->loginurl;  
            $url = $domainname . "/course/view.php?id=2";
            //header("Location:".$loginurl);

            Auth::logout();

            //$request->session()->invalidate();
            //$request->session()->regenerateToken();

            return redirect($loginurl);

    }
}
