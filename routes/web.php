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

    Route::get('sites/{site}', 'show')
        ->middleware('auth')
        ->can('access', 'site')
        ->name('sites.show');

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

Route::resource('invoices', InvoiceController::class)
    ->middleware(['auth'])
    ->only(['index']);

Route::resource('support', SupportTicketController::class, )
    ->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
