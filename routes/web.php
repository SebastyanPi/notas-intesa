<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword; 
use App\Http\Controllers\ModuleController; 
use App\Http\Controllers\ProgramController;         
use App\Http\Controllers\ScheduleController;       
use App\Http\Controllers\GroupController;  
use App\Http\Controllers\QualificationController; 

use App\Http\Controllers\StudentController;       
use App\Http\Controllers\TeacherController;  
use App\Http\Controllers\AdminController;  

use App\Http\Livewire\TableComponent;  
            

	Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');


	Route::group(['middleware' => 'auth'], function () {
		Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
		Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
		Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
		Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
		Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
		Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
		Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
		//Route::get('/{page}', [PageController::class, 'index'])->name('page');
		Route::post('logout', [LoginController::class, 'logout'])->name('logout');
		Route::get('/module', [ModuleController::class, 'index'])->name('module.index');
		Route::post('/module/store', [ModuleController::class, 'store'])->name('module.store');
		Route::post('/module/update/{id}', [ModuleController::class, 'update'])->name('module.update');
		Route::post('/module/{id}/destroy', [ModuleController::class, 'destroy'])->name('module.destroy');

		Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
		Route::post('/program/store', [ProgramController::class, 'store'])->name('program.store');
		Route::post('/program/update/{id}', [ProgramController::class, 'update'])->name('program.update');
		Route::get('/program/{id}', [ProgramController::class, 'show'])->name('program.show');
		Route::get('/program/{id}/modules/pdf', [ProgramController::class, 'pdfModules'])->name('program.modules.pdf');
		Route::get('/program/{id}/groups', [ProgramController::class, 'groups'])->name('program.groups');
		Route::get('/program/{id}/groups/pdf', [ProgramController::class, 'pdf'])->name('program.pdf');
		Route::post('/program/{id}/destroy', [ProgramController::class, 'destroy'])->name('program.destroy');
		
		Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
		Route::post('/schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
		Route::post('/schedule/update/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
		
		Route::get('/groups', [GroupController::class, 'index'])->name('group.index');
		Route::get('/group/{id}/edit', [GroupController::class, 'edit'])->name('group.edit');
		Route::post('/group/{id}/update', [GroupController::class, 'update'])->name('group.update');
		Route::post('/group/store', [GroupController::class, 'store'])->name('group.store');
		Route::post('/group/{id}/{program_id}/destroy', [GroupController::class, 'destroy'])->name('group.destroy');
		Route::get('/group/{id}/{module_id}/qualification', [QualificationController::class, 'index'])->name('group.qualification');
		Route::post('/group/{id}/{module_id}/qualification/store', [QualificationController::class, 'store'])->name('group.qualification.store');
		Route::get('/group/{id}/{module_id}/qualification/pdf', [QualificationController::class, 'pdf'])->name('group.qualification.pdf');

		Route::get('/users-register/{before}', [UserProfileController::class, 'view'])->name('user.register');
		Route::get('/users-list', [UserProfileController::class, 'list'])->name('user.list');
		Route::get('/users-edit/{id}/{before}', [UserProfileController::class, 'edit'])->name('users.edit');
		Route::post('/users-update/{id}/', [UserProfileController::class, 'save'])->name('users.update');
		Route::get('/users-delete/{id}/', [UserProfileController::class, 'delete'])->name('users.delete');
		Route::post('/users-register/store', [UserProfileController::class, 'register'])->name('users.new');
	
		Route::get('/add-group/{id}', [GroupController::class, 'add'])->name('group.add');
		Route::get('/add-group/{id}/pdf', [GroupController::class, 'pdf'])->name('group.pdf');
		Route::post('/add-group/{id}/store', [GroupController::class, 'storeAdd'])->name('group.add.store');
		Route::post('/add-group/{id}/user/delete',[GroupController::class, 'deleteUser'])->name('group.delete.user');
		
		Route::get('teacher/list', [TeacherController::class, 'index'])->name('teacher.index');
		Route::get('teacher/list/pdf', [TeacherController::class, 'listPdf'])->name('teacher.index.pdf');
		Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');

		Route::get('admin/list', [AdminController::class, 'index'])->name('admin.index');

		Route::get('student/list', [StudentController::class, 'index'])->name('student.index');
		Route::get('student/list/pdf', [StudentController::class, 'listPdf'])->name('student.index.pdf');
		Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
		
		
		//Route::get('/users-list', TableComponent::Class);
	
		Route::get('student/list/program', [StudentController::class, 'page_student'])->name('page_student.index');
		

	
	
	});

