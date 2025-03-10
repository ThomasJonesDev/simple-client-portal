<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SupportTicketController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

Route::controller(SiteController::class)->group(function () {
    Route::get('sites', 'index')
        ->middleware('auth')
        ->name('sites');

    Route::get('sites/create', 'create')
        ->middleware('auth')
        ->name('sites.create');

    Route::post('sites', 'store')
        ->middleware('auth')
        ->name('sites.store');

//    Route::get('sites/{site}', 'show')
//        ->middleware('auth')
//        ->can('access', 'site')
//        ->name('sites.show');

    Route::get('sites/{site}/edit', 'edit')
        ->middleware('auth')
        ->can('access', 'site')
        ->name('sites.edit');

    Route::patch('sites/{site}', 'update')
        ->middleware('auth')
        ->can('access', 'site')
        ->name('sites.update');

    Route::delete('sites/{site}', 'destroy')
        ->middleware('auth')
        ->can('access', 'site')
        ->name('sites.destroy');
});

Route::controller(InvoiceController::class)->group(function () {
    Route::get('invoices', 'index')
        ->middleware('auth')
        ->name('invoices');
});

Route::controller(SupportTicketController::class)->group(function () {
    Route::get('tickets', 'index')
        ->middleware('auth')
        ->name('tickets');

    Route::get('tickets/create', 'create')
        ->middleware('auth')
        ->name('tickets.create');

    Route::post('tickets', 'store')
        ->middleware('auth')
        ->name('tickets.store');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
