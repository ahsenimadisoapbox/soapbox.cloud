<?php

use App\Http\Controllers\VisitorTrackingController;
use Illuminate\Support\Facades\Route;

Route::post('/visitor-tracking', [VisitorTrackingController::class, 'store'])->name('visitor.tracking.store');
