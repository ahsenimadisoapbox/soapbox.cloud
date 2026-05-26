<?php

use App\Http\Controllers\EhsAIController;
use App\Http\Controllers\VisitorTrackingController;
use Illuminate\Support\Facades\Route;

Route::post('/visitor-tracking', [VisitorTrackingController::class, 'store'])->name('visitor.tracking.store');

Route::post('/generate-ehs-ai-insight', [EhsAIController::class, 'generateInsight']);
