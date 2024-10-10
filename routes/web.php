<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('admin/profile', [AdminController::class, 'AdminProfile']);

    Route::post('admin_profile/update', [AdminController::class, 'AdminProfileUpdate']);

    Route::get('admin/users', [AdminController::class, 'AdminUsers']);

    Route::get('admin/users/view/{id}', [AdminController::class, 'AdminUsersView']);

    Route::get('admin/users/edit/{id}', [AdminController::class, 'AdminUsersEditId']);

    Route::post('admin/users/edit/{id}', [AdminController::class, 'AdminUsersEditIdUpdate']);

    Route::get('admin/users/delete/{id}', [AdminController::class, 'AdminDeleteSoft']);

    Route::post('admin/users/update', [AdminController::class, 'AdminUsersUpdate']);

    Route::get('admin/users/add', [AdminController::class, 'AdminAddUsers']);

    Route::post('admin/users/add', [AdminController::class, 'AdminAddUsersStore']);

    Route::get('admin/email/compose', [EmailController::class, 'EmailCompose']);

    Route::post('admin/email/compose_post', [EmailController::class, 'EmailComposePost']);

    Route::get('admin/email/sent', [EmailController::class, 'EmailSent']);

    Route::get('admin/email_sent', [EmailController::class, 'AdminEmailSentDelete']);

    Route::get('admin/email/read/{id}', [EmailController::class, 'AdminEmailRead']);

    Route::get('admin/email/read_delete/{id}', [EmailController::class, 'AdminEmailReadDelete']);
});

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard'); 
});

Route::get('set_new_password/{token}', [AdminController::class, 'SetNewPassword']);

Route::post('set_new_password/{token}', [AdminController::class, 'SetNewPasswordPost']);

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');