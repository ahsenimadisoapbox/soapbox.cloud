<?php 

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EhsAssessmentController;
use App\Http\Controllers\DemoRequestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\DemoController;
use App\Http\Controllers\Admin\EhsAssessmentController as AdminEhsAssessmentController;
use App\Http\Controllers\Admin\ModuleController as AdminModuleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MetaController;
use App\Http\Controllers\Admin\LegalPageController;
use App\Http\Controllers\Admin\MediaController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Admin\BlogController as AdminBlog;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\VisitorAnalyticsController;

use App\Http\Controllers\AssetController;

use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/modules/{id}', [ModuleController::class, 'show'])->name('modules.show');
Route::get('/early-adopters-program', [HomeController::class, 'eap'])->name('eap');

Route::get('/who-we-are', [HomeController::class, 'whoweare'])->name('whoweare');

Route::post('/ehs-assessment', [EhsAssessmentController::class, 'store'])->name('ehs-assessment-store');
Route::post('/demo-request', [DemoRequestController::class, 'store'])->name('demo.store');

Route::get('/legal/{slug}', [LegalController::class, 'show'])->name('legal.show');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/assets/style.css', [AssetController::class, 'css']);
Route::get('/assets/script.js', [AssetController::class, 'js']);

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact.submit');
Route::get('/thank-you', [ContactController::class, 'thankYou'])->name('thank.you');

Auth::routes();

Route::middleware('auth')->prefix('admins')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/demo', [DemoController::class, 'index'])->name('admin.demo.index');
    Route::get('/visitor-analytics', [VisitorAnalyticsController::class, 'index'])->name('admin.visitor-analytics.index');
    Route::get('/ehs-assessments', [AdminEhsAssessmentController::class, 'index'])->name('admin.ehs_assessments.index');
    Route::get('/assessments/{id}', [AdminEhsAssessmentController::class, 'show'])->name('admin.ehs_assessments.show');
    Route::resource('metas', MetaController::class)->names([
        'index' => 'admin.metas.index',
        'create' => 'admin.metas.create',
        'store' => 'admin.metas.store',
        'show' => 'admin.metas.show',
        'edit' => 'admin.metas.edit',
        'update' => 'admin.metas.update',
        'destroy' => 'admin.metas.destroy',
    ]);
    Route::resource('modules', AdminModuleController::class)->names([
        'index' => 'admin.modules.index',
        'create' => 'admin.modules.create',
        'store' => 'admin.modules.store',
        'show' => 'admin.modules.show',
        'edit' => 'admin.modules.edit',
        'update' => 'admin.modules.update',
        'destroy' => 'admin.modules.destroy',
    ]);
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'show' => 'admin.categories.show',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);

    Route::resource('legal-pages', LegalPageController::class)->names([
        'index' => 'admin.legal-pages.index',
        'create' => 'admin.legal-pages.create',
        'store' => 'admin.legal-pages.store',
        'show' => 'admin.legal-pages.show',
        'edit' => 'admin.legal-pages.edit',
        'update' => 'admin.legal-pages.update',
        'destroy' => 'admin.legal-pages.destroy',
    ]);

    Route::resource('blogs', AdminBlog::class)->names([
        'index' => 'admin.blogs.index',
        'create' => 'admin.blogs.create',
        'store' => 'admin.blogs.store',
        'show' => 'admin.blogs.show',
        'edit' => 'admin.blogs.edit',
        'update' => 'admin.blogs.update',
        'destroy' => 'admin.blogs.destroy',
    ]);

    Route::resource('faqs', FaqController::class)->names([
        'index' => 'admin.faqs.index',
        'create' => 'admin.faqs.create',
        'store' => 'admin.faqs.store',
        'show' => 'admin.faqs.show',
        'edit' => 'admin.faqs.edit',
        'update' => 'admin.faqs.update',
        'destroy' => 'admin.faqs.destroy',
    ]);
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'Migration completed';
})->name('migrate');

Route::any('/register', function () {
    return redirect()->route('home');
})->name('register');

// clear cache route
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'Cache cleared';
})->name('clear-cache');

Route::get('/test-mail', function () {
    Mail::raw('Test Email from Laravel', function ($message) {
        $message->to('imadiahsen8@gmail.com')
                ->subject('Test Mail');
    });

    return 'Mail sent!';
});
