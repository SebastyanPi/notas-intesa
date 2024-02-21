<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\token;
use App\Models\qualification;
use App\Models\GroupStudent;
use Illuminate\Support\Facades\Cache;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile');
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required','max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255']
        ]);

        auth()->user()->update([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email') ,
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postal' => $request->get('postal'),
            'about' => $request->get('about')
        ]);
        return back()->with('succes', 'Perfil Actualizado Correctamente!');
    }

    public function view($before){
        return view('pages.users', compact('before'));
    } 

    public function register(Request $request){
        
        $request->validate([
            'firstname' => ['required','max:255', 'min:2'],
            'lastname' => ['required','max:255', 'min:2'],
            'email' => ['required', 'email', 'max:255','unique:users',],
            'nit' => ['required','max:15','unique:users',],
            'password' => ['max:15', 'min:5']
        ]);

        $parts1 = explode(' ', $request->firstname);
        $parts2 = explode(' ', $request->lastname);
        $subcadena = substr ($parts2[0], 0, 2);
        $username = $parts1[0].$subcadena;

       $user1 = User::create([
            'nit' => $request->nit,
            'username' => $username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
            'password_verified_at' => $request->password,
        ]);
        if(isset($request->role) && $request->role  == "estudiante"){
            $user1->assignRole('Estudiante');
        }
        if(isset($request->role) && $request->role == "profesor"){
            $user1->assignRole('Profesor');
        }
    
        Cache::forget('users');
        if($request->role == "estudiante"){
            return redirect()->route('student.enroll', $user1->id);
        }else{
            return redirect()->route('teacher.index');
        }
        
    }
    
    public function list(Request $request){
        
        if(!$request->has('buscador')){
            $users = User::all();
        }else{
            $users = User::where('username', 'LIKE', '%'.$request->buscador.'%')->orWhere('email', 'LIKE', '%'.$request->buscador.'%')->get();
        }
       return view('pages.user-list', compact('users'));
    }

    public function edit(Request $request){
        $user = User::where('id', $request->id)->first();
        $tokens = token::where('user_id', $request->id)->get();
        $numToken = $tokens->count();
        $before = $request->before;
        if($numToken > 0){
            $tok = token::where('user_id', $request->id)->first();
            return view('pages.user-edit', compact('user','before', 'numToken', 'tok'));
        }else{
            return view('pages.user-edit', compact('user','before', 'numToken'));
        }
        
    }

    public function campus_admin_formacion($nit){
        $item = token::where('user_id', 1)->first();
        $token = $item->token;
        $domainname   = 'https://aula.institutointesa.edu.co';
        $functionname = 'auth_userkey_request_login_url';

        $param = Array(
            'user' => Array(
                'username'     => $nit,
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

            //Auth::logout();

            //$request->session()->invalidate();
            //$request->session()->regenerateToken();

            return redirect($loginurl);

    }
    

    public function token(Request $request){
        if($request->token != ""){
            $numToken = token::where('user_id', $request->id)->count();
            if($numToken == 1){
                $token = token::where('user_id', $request->id)->first();
                $token->token = $request->token;
                $token->save();
            }else{
                token::create([
                    'user_id' => $request->id,
                    'token' => $request->token
                ]);
            }
        }
        
        return redirect()->route('users.edit',["id" => $request->id, "before" => $request->before ]);
    }

    public function save(Request $request){
        $user = User::where('id', $request->id)->first();

        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required'
        ]);

        if($request->firstname == ""){
            $user->firstname = $user->firstname;
        }else{
            $user->firstname = $request->firstname;
        }

        if($request->lastname == ""){
            $user->lastname = $user->lastname;
        }else{
            $user->lastname = $request->lastname;
        }

        if($request->password == ""){
            $user->password = $user->password;
            $user->password_verified_at = $user->password;
        }else{
            $user->password = $request->password;
            $user->password_verified_at = $request->password;
        }

        $roles = array();
        $rolesXuser = $user->getRoleNames();
        foreach ($rolesXuser as $key => $value) {
            array_push($roles,$value);
        }

        if($request->role == "Si"){
            if(!in_array('Estudiante', $roles)){
                $user->assignRole('Estudiante');
            }
        }

        if($request->profesor == "Si"){
            if(!in_array('Profesor', $roles)){
                $user->assignRole('Profesor');
            }
        }

        $user->state = $request->state; 
        $user->save();
        return redirect()->route('users.edit',["id" => $user->id, "before" => $request->before ]);
    }

    public function delete(Request $request){
        qualification::where("user_id", $request->id)->delete();
        GroupStudent::where("user_id", $request->id)->delete();
        User::where('id', $request->id)->delete();
        if($request->before == "student"){
            return redirect()->route('student.index');
        }
        return redirect()->route('teacher.index');
    }
}
