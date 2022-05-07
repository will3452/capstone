<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ForgotPasswordController;
use App\Models\Appointment;
use Carbon\Carbon;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', 'login');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'showRegister']);
    Route::post('register', [LoginController::class, 'register']);
    Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
    Route::post('/forgot-password', [ForgotPasswordController::class, 'checkEmail']);
    Route::get('/change-password', [ForgotPasswordController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [ForgotPasswordController::class, 'updatePassword']);

});

Route::middleware('auth')->group(function () {
    Route::get('/home', HomeController::class);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/profile/{user:email}', [ProfileController::class, 'show']);
    Route::put('/personal', [ProfileController::class, 'updatePersonal']);
    Route::put('/contact', [ProfileController::class, 'updateContact']);
    Route::put('/account', [ProfileController::class, 'updateAccount']);

    Route::get('/diagnoses', [DiagnoseController::class, 'index']);
    Route::get('/diagnoses-list', [DiagnoseController::class, 'getResults']);
    Route::post('/diagnoses-process', [DiagnoseController::class, 'process']);

    Route::get('appointments', [AppointmentController::class, 'index']);

    Route::get('/messages', [MessageController::class, 'index']);
    Route::post('/messages', [MessageController::class, 'send']);

    Route::get('/send-email-link', function () {
        $html = "Hi, " . auth()->user()->name . ", go to this link to verify your email : " . url('check-account-is-existing') . '?email=' . auth()->user()->email . '&key=' . bcrypt(auth()->user()->first_name);

        Mail::send(array(), array(), function ($message) use ($html) {
            $message->to(auth()->user()->email)
                ->subject('verificy account!')
                ->setBody($html, 'text/html');
        });
        return 'email sent ! <a href="/home">back to home</a>';
    });

});

Route::get('/check-account-is-existing', function () {
    $user = User::where('email', request()->email)->first();

    if (request()->email == null || request()->key == null) {
        return 'page expired!';
    }
    if (!$user) {
        return 'invalid resource!';
    }

    $user->email_verified_at = now();
    $user->save();
    alert('Email verified!');
    return redirect('/home');
});

Route::get('/report', function (Request $request) {
    $from = Carbon::parse($request->from);
    $to = Carbon::parse($request->to);

    $appointments =  Appointment::whereBetween('date', [$from, $to])->get();

    return view('reports', compact('appointments'));
});
