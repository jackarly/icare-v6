<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PcrController;
use App\Http\Controllers\PatientAssessmentController;
use App\Http\Controllers\PatientManagementController;
use App\Http\Controllers\PatientObservationController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ResponseTeamController;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/account/create/{userType?}', [AccountController::class, 'create'])->name('account.create');
Route::post('/account/store', [AccountController::class, 'store'])->name('account.store');
Route::get('/account/overview/{userType?}', [AccountController::class, 'index'])->name('account.overview');
Route::get('/account/{id}', [AccountController::class, 'show'])->name('account.show');

Route::get('/account', [AccountController::class, 'showMyAccount'])->name('account.own');
Route::get('/account-edit', [AccountController::class, 'editMyAccount'])->name('account.edit');
Route::put('/account-update', [AccountController::class, 'updateMyAccount'])->name('account.update');

Route::get('/ambulance/{user}/edit', [AccountController::class, 'editAmbulance'])->name('ambulance.edit');
Route::put('/ambulance/{user}/update', [AccountController::class, 'updateAmbulance'])->name('ambulance.update');
Route::get('/hospital/{user}/edit', [AccountController::class, 'editHospital'])->name('hospital.edit');
Route::put('/hospital/{user}/update', [AccountController::class, 'updateHospital'])->name('hospital.update');
Route::get('/comcen/{user}/edit', [AccountController::class, 'editComcen'])->name('comcen.edit');
Route::put('/comcen/{user}/update', [AccountController::class, 'updateComcen'])->name('comcen.update');
Route::get('/admin/{user}/edit', [AccountController::class, 'editAdmin'])->name('admin.edit');
Route::put('/admin/{user}/update', [AccountController::class, 'updateAdmin'])->name('admin.update');

Route::get('/incident/create', [IncidentController::class, 'create'])->name('incident.create');
Route::post('/incident/store', [IncidentController::class, 'store'])->name('incident.store');
Route::get('/incident/overview/{status?}', [IncidentController::class, 'index'])->name('incident');
Route::get('/incident/{incident}', [IncidentController::class, 'show'])->name('incident.show');
Route::put('/incident/asign/{incident}', [IncidentController::class, 'assign'])->name('incident.assign');
Route::put('/incident/timings/{patient}', [IncidentController::class, 'updateTimings'])->name('incident.timings');
Route::get('/incident/{incident}/edit', [IncidentController::class, 'edit'])->name('incident.edit');
Route::put('/incident/{incident}/update', [IncidentController::class, 'update'])->name('incident.update');

Route::get('/patient/create/{incident}', [PatientController::class, 'create'])->name('patient.create');
Route::post('/patient/store/{incident}', [PatientController::class, 'store'])->name('patient.store');
Route::get('/patient/overview/{status?}', [PatientController::class, 'index'])->name('patient');
Route::get('/patient/{patient}/edit', [PatientController::class, 'edit'])->name('patient.edit');
Route::put('/patient/{patient}/update', [PatientController::class, 'update'])->name('patient.update');
Route::put('/patient/{patient}/complete', [PatientController::class, 'completePatient'])->name('patient.complete');

Route::get('/pcr/{patient}', [PcrController::class, 'show'])->name('pcr.show');

Route::get('/assessment/create/{patient}', [PatientAssessmentController::class, 'create'])->name('assessment.create');
Route::post('/assessment/store/{patient}', [PatientAssessmentController::class, 'store'])->name('assessment.store');
Route::get('/assessment/{patientAssessment}/edit', [PatientAssessmentController::class, 'edit'])->name('assessment.edit');
Route::put('/assessment/{patientAssessment}/update', [PatientAssessmentController::class, 'update'])->name('assessment.update');

Route::get('/management/create/{patient}', [PatientManagementController::class, 'create'])->name('management.create');
Route::post('/management/store/{patient}', [PatientManagementController::class, 'store'])->name('management.store');
Route::get('/management/{patientManagement}/edit', [PatientManagementController::class, 'edit'])->name('management.edit');
Route::put('/management/{patientManagement}/update', [PatientManagementController::class, 'update'])->name('management.update');

Route::get('/observation/create/{patient}', [PatientObservationController::class, 'create'])->name('observation.create');
Route::post('/observation/store/{patient}', [PatientObservationController::class, 'store'])->name('observation.store');
Route::get('/observation/{patientObservation}/edit', [PatientObservationController::class, 'edit'])->name('observation.edit');
Route::put('/observation/{patientObservation}/update', [PatientObservationController::class, 'update'])->name('observation.update');

Route::get('/personnel/create', [PersonnelController::class, 'create'])->name('personnel.create');
Route::post('/personnel/store', [PersonnelController::class, 'store'])->name('personnel.store');
Route::get('/personnel/overview/{status?}', [PersonnelController::class, 'index'])->name('personnel');
Route::get('/personnel/{personnel}', [PersonnelController::class, 'show'])->name('personnel.show');
Route::get('/personnel/{personnel}/edit', [PersonnelController::class, 'edit'])->name('personnel.edit');
Route::put('/personnel/{personnel}/update', [PersonnelController::class, 'update'])->name('personnel.update');

Route::get('/response/create', [ResponseTeamController::class, 'create'])->name('response.create');
Route::post('/response/store', [ResponseTeamController::class, 'store'])->name('response.store');
Route::get('/response', [ResponseTeamController::class, 'index'])->name('response');
Route::get('/response/{responseTeam}', [ResponseTeamController::class, 'show'])->name('response.show');
Route::get('/response/{responseTeam}/edit', [ResponseTeamController::class, 'edit'])->name('response.edit');
Route::put('/response/{responseTeam}/update', [ResponseTeamController::class, 'update'])->name('response.update');

// Route::fallback(function () {
//     dd('welp');
// });

Route::fallback(function () {
    view('errors.404');
});



