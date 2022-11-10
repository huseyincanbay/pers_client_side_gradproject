<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TwilioController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;
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


Auth::routes();

Route::get('/', function () {
    return redirect()->route('index');
});

Route::middleware(['auth', 'phone_verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('index');

    Route::get('/fire-department',[UserController::class, 'firedepartment'])->name('firedepartment');

    Route::get('/police-department',[UserController::class, 'policedepartment'])->name('policedepartment');

    Route::get('/medical-department',[UserController::class, 'medicaldepartment'])->name('medicaldepartment');

    Route::get('/my-profile', [UserController::class, 'myprofile'])->name('myprofile');

    Route::get('/events', [UserController::class, 'events'])->name('events');

    Route::get('/event-details', [UserController::class, 'eventdetails'])->name('eventdetails');

    Route::get('/events-history', [UserController::class, 'historyofevents'])->name('events-history');

    Route::post('/my-profile', [UserController::class, 'update'])->name('update.profile');



    Route::get('/department/{id}', [UserController::class, 'department'])->name('department');

    Route::post('/new-event', [EventController::class, 'store'])->name('event.create');
});


Route::get('/sms-verify', [TwilioController::class, 'index'])->name('sms.index');
Route::post('/sms-verify', [TwilioController::class, 'sms_verify'])->name('sms.verify');
Route::post('/resend-code', [TwilioController::class, 'resend_code'])->name('sms.resend');


Route::get('/api/test', function () {
   return response()->json(['data' => User::all()]);
});

/*Route::post('/api/sms-send', [TwilioController::class, 'sms_send'])->name('sms.send');
Route::post('/api/sms-verify', [TwilioController::class, 'sms_verify'])->name('sms.verify');*/
/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
