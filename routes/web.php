<?php
# @Date:   2020-11-02T15:35:08+00:00
# @Last modified time: 2020-11-13T11:56:16+00:00




use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\Doctor\DoctorController as DoctorDoctorController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;

use App\Http\Controllers\Doctor\HomeController as DoctorHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;

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
//displaying the welcome method in page controller which returns welcome view
Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//home page for each user when they login
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
Route::get('/doctor/home', [DoctorHomeController::class, 'index'])->name('doctor.home');
Route::get('/patient/home', [PatientHomeController::class, 'index'])->name('patient.home');
Route::get('/visit/home', [VisitHomeController::class, 'index'])->name('visit.home');

//admin routes
Route::get('/admin/doctors', [AdminDoctorController::class, 'index'])->name('admin.doctors.index');
Route::get('/admin/doctors/create', [AdminDoctorController::class, 'create'])->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', [AdminDoctorController::class, 'show'])->name('admin.doctors.show');
Route::post('/admin/doctors/store', [AdminDoctorController::class, 'store'])->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', [AdminDoctorController::class, 'edit'])->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', [AdminDoctorController::class, 'update'])->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', [AdminDoctorController::class, 'destroy'])->name('admin.doctors.destroy');

//doctor routes
Route::get('/doctor/doctors/', [DoctorDoctorController::class, 'index'])->name('doctor.doctors.index');
Route::get('/doctor/doctors/{id}', [DoctorDoctorController::class, 'show'])->name('doctor.doctors.show');

//patient routes

//secretary routes i.e visit user
