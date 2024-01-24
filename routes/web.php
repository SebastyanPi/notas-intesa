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

		Route::get('/virtual-reality', [PageController::class, 'vr'])->middleware('can:virtual-reality')->name('virtual-reality');
		Route::get('/rtl', [PageController::class, 'rtl'])->middleware('can:rtl')->name('rtl');
		Route::get('/profile', [UserProfileController::class, 'show'])->middleware('can:profile')->name('profile');
		Route::post('/profile', [UserProfileController::class, 'update'])->middleware('can:profile.update')->name('profile.update');
		Route::get('/profile-static', [PageController::class, 'profile'])->middleware('can:profile-static')->name('profile-static'); 
		Route::get('/sign-in-static', [PageController::class, 'signin'])->middleware('can:sign-in-static')->name('sign-in-static');
		Route::get('/sign-up-static', [PageController::class, 'signup'])->middleware('can:sign-up-static')->name('sign-up-static'); 
	
		Route::post('logout', [LoginController::class, 'logout'])->name('logout');
		Route::get('/module', [ModuleController::class, 'index'])->middleware('can:module.index')->name('module.index');
		Route::post('/module/store', [ModuleController::class, 'store'])->middleware('can:module.store')->name('module.store');
		Route::post('/module/update/{id}', [ModuleController::class, 'update'])->middleware('can:module.update')->name('module.update');
		Route::post('/module/{id}/destroy', [ModuleController::class, 'destroy'])->middleware('can:module.destroy')->name('module.destroy');

		Route::get('/program', [ProgramController::class, 'index'])->middleware('can:program.index')->name('program.index');
		Route::post('/program/store', [ProgramController::class, 'store'])->middleware('can:program.store')->name('program.store');
		Route::post('/program/update/{id}', [ProgramController::class, 'update'])->middleware('can:program.update')->name('program.update');
		Route::get('/program/{id}', [ProgramController::class, 'show'])->middleware('can:program.show')->name('program.show');
		Route::get('/program/{id}/modules/pdf', [ProgramController::class, 'pdfModules'])->middleware('can:program.modules.pdf')->name('program.modules.pdf');
		Route::get('/program/{id}/groups', [ProgramController::class, 'groups'])->middleware('can:program.groups')->name('program.groups');
		Route::get('/program/{id}/groups/pdf', [ProgramController::class, 'pdf'])->middleware('can:program.pdf')->name('program.pdf');
		Route::post('/program/{id}/destroy', [ProgramController::class, 'destroy'])->middleware('can:program.destroy')->name('program.destroy');
		
		Route::get('/schedule', [ScheduleController::class, 'index'])->middleware('can:schedule.index')->name('schedule.index');
		Route::post('/schedule/store', [ScheduleController::class, 'store'])->middleware('can:schedule.store')->name('schedule.store');
		Route::post('/schedule/update/{id}', [ScheduleController::class, 'update'])->middleware('can:schedule.update')->name('schedule.update');
		
		Route::get('/groups', [GroupController::class, 'index'])->middleware('can:group.index')->name('group.index');
		Route::get('/group/{id}/edit', [GroupController::class, 'edit'])->middleware('can:group.edit')->name('group.edit');
		Route::post('/group/{id}/update', [GroupController::class, 'update'])->middleware('can:group.update')->name('group.update');
		Route::post('/group/store', [GroupController::class, 'store'])->middleware('can:group.store')->name('group.store');
		Route::post('/group/{id}/{program_id}/destroy', [GroupController::class, 'destroy'])->middleware('can:group.destroy')->name('group.destroy');
		Route::get('/group/{id}/{module_id}/qualification', [QualificationController::class, 'index'])->middleware('can:group.qualification')->name('group.qualification');
		Route::post('/group/{id}/{module_id}/qualification/store', [QualificationController::class, 'store'])->middleware('can:group.qualification.store')->name('group.qualification.store');
		Route::get('/group/{id}/{module_id}/qualification/pdf', [QualificationController::class, 'pdf'])->middleware('can:group.qualification.pdf')->name('group.qualification.pdf');

		Route::get('/users-register/{before}', [UserProfileController::class, 'view'])->middleware('can:user.register')->name('user.register');
		Route::get('/users-list', [UserProfileController::class, 'list'])->middleware('can:user.list')->name('user.list');
		Route::get('/users-edit/{id}/{before}', [UserProfileController::class, 'edit'])->middleware('can:users.edit')->name('users.edit');
		Route::post('/users-update/{id}/', [UserProfileController::class, 'save'])->middleware('can:users.update')->name('users.update');
		Route::get('/users-delete/{id}/', [UserProfileController::class, 'delete'])->middleware('can:users.delete')->name('users.delete');
		Route::post('/users-register/store', [UserProfileController::class, 'register'])->middleware('can:users.new')->name('users.new');
	
		Route::get('/add-group/{id}', [GroupController::class, 'add'])->middleware('can:group.add')->name('group.add');
		Route::get('/add-group/{id}/pdf', [GroupController::class, 'pdf'])->middleware('can:group.pdf')->name('group.pdf');
		Route::post('/add-group/{id}/store', [GroupController::class, 'storeAdd'])->middleware('can:group.add.store')->name('group.add.store');
		Route::post('/add-group/{id}/user/delete',[GroupController::class, 'deleteUser'])->middleware('can:group.delete.user')->name('group.delete.user');
		
		Route::get('teacher/list', [TeacherController::class, 'index'])->middleware('can:teacher.index')->name('teacher.index');
		Route::get('teacher/list/pdf', [TeacherController::class, 'listPdf'])->middleware('can:teacher.index.pdf')->name('teacher.index.pdf');
		Route::get('teacher/create', [TeacherController::class, 'create'])->middleware('can:teacher.create')->name('teacher.create');

		Route::get('admin/list', [AdminController::class, 'index'])->middleware('can:admin.index')->name('admin.index');

		Route::get('student/list', [StudentController::class, 'index'])->middleware('can:student.index')->name('student.index');
		Route::get('student/list/pdf', [StudentController::class, 'listPdf'])->middleware('can:student.index.pdf')->name('student.index.pdf');
		Route::get('student/create', [StudentController::class, 'create'])->middleware('can:student.create')->name('student.create');
		
		
		//Route::get('/users-list', TableComponent::Class);
	
		Route::get('student/list/program', [StudentController::class, 'page_student'])->middleware('can:page_student.index')->name('page_student.index');
		

	
	
	});

