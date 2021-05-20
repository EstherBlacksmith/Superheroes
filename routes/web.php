<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PowerController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\AlignmentController;
use App\Http\Controllers\HeroeController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/power.create',[PowerController::class,'createView'])->name('createPowerView');
Route::post('/power.create',[PowerController::class,'create'])->name('createPowerStore');
Route::get('/power.index', [PowerController::class,'powerView'])->name('powerView');
Route::get('/power.update/{id}',[PowerController::class,'updateView'])->name('updatePower');
Route::post('/power.update',[PowerController::class,'update'])->name('updatePowerStore');
Route::get('/power.delete/{id}',[PowerController::class,'delete'])->name('deletePower');


Route::get('/organization.create',[OrganizationController::class,'createView'])->name('createOrganizationView');
Route::post('/organization.create',[OrganizationController::class,'create'])->name('createOrganizationStore');
Route::get('/organization.index', [OrganizationController::class,'organizationView'])->name('organizationView');
Route::get('/organization.update/{id}',[OrganizationController::class,'updateView'])->name('updateOrganization');
Route::post('/organization.update',[OrganizationController::class,'update'])->name('updateOrganizationStore');
Route::get('/organization.delete/{id}',[OrganizationController::class,'delete'])->name('deleteOrganization');

Route::get('/alignment.index', [AlignmentController::class,'alignmentView'])->name('alignmentView');
Route::get('/alignment.create',[AlignmentController::class,'createView'])->name('createAlignmentView');
Route::post('/alignment.create',[AlignmentController::class,'create'])->name('createAlignmentStore');
Route::get('/alignment.update/{id}',[AlignmentController::class,'updateView'])->name('updateAlignment');
Route::post('/alignment.update',[AlignmentController::class,'update'])->name('updateAlignmentStore');
Route::get('/alignment.delete/{id}',[AlignmentController::class,'delete'])->name('deleteAlignment');


Route::get('/index', [HeroeController::class,'IndexView'])->name('IndexView');
Route::get('/heroe.create',[HeroeController::class,'createView'])->name('HeroeCreateView');
Route::post('/heroe.create',[HeroeController::class,'create'])->name('createHeroeStore');
Route::get('/heroe.update/{id}',[HeroeController::class,'updateView'])->name('updateHeroe');
Route::post('/heroe.update',[HeroeController::class,'update'])->name('updateHeroeStore');
Route::get('/heroe.delete/{id}',[HeroeController::class,'delete'])->name('deleteHeroe');