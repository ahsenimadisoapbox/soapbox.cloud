<?php 

use App\Http\Controllers\Admin\PopupController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Admin\SystemConsoleController;

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
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\VisitorAnalyticsController;
use App\Http\Controllers\AdminDashboardController;

use App\Http\Controllers\AssetController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EhsAIController;
use App\Http\Controllers\EHSAIModuleController;
use App\Http\Controllers\ThankYouController;
use App\Http\Controllers\IndustryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sample', [HomeController::class, 'sample'])->name('sample');

Route::get('/solutions', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/solutions/{id}', [ModuleController::class, 'show'])->name('modules.show');
Route::get(
    '/ehs-ai/{slug}',
    [EHSAIModuleController::class, 'show']
)->name('ehs-ai-module.show');
Route::get('/early-adopters-program', [HomeController::class, 'eap'])->name('eap');
Route::get('/eap', function () {
    return redirect()->route('eap');
});

Route::get('/who-we-are', [HomeController::class, 'whoweare'])->name('whoweare');

Route::post('/ehs-assessment', [EhsAssessmentController::class, 'store'])->name('ehs-assessment-store');
Route::post('/demo-request', [DemoRequestController::class, 'store'])->name('demo.request.store');

Route::get('/legal/{slug}', [LegalController::class, 'show'])->name('legal.show');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/assets/style.css', [AssetController::class, 'css']);
Route::get('/assets/script.js', [AssetController::class, 'js']);

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact.submit');

Route::get('/industries',
    [IndustryController::class, 'industries'])->name('industries.index');

Route::get('/platform', function () {
    return view('platform');
})->name('platform');
Route::get(
    '/ai-assistance',
    [EHSAIModuleController::class, 'index']
)->name('ai');

Route::get('/industries/{slug}',
    [IndustryController::class, 'industryDetails'])->name('industry-details');

Route::get('/services/{slug}',
    [IndustryController::class, 'serviceDetails']);

Auth::routes(['register' => false]);
Route::any('/register', fn() => redirect()->route('home'));

Route::get('/thank-you/{source?}', [ThankYouController::class, 'index'])
    ->name('thank.you')
    ->where('source', 'ehs|contact|demo|early-access');

Route::post('/generate-ehs-ai-insight', [EhsAIController::class, 'generateInsight']);

Route::middleware('auth')->prefix('admins')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/metrics', [AdminDashboardController::class, 'getMetrics'])->name('admin.dashboard.metrics');
    Route::get('/demo', [DemoController::class, 'index'])->name('admin.demo.index');


        Route::get(
            '/demo/{id}',
            [DemoController::class, 'show']
        )->name('admin.demo.show');

        Route::patch(
            '/demo/{id}/status',
            [DemoController::class, 'updateStatus']
        )->name('admin.demo.status');
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

    Route::resource('industries', \App\Http\Controllers\Admin\IndustryController::class)->names([
        'index' => 'admin.industries.index',
        'create' => 'admin.industries.create',
        'store' => 'admin.industries.store',
        'show' => 'admin.industries.show',
        'edit' => 'admin.industries.edit',
        'update' => 'admin.industries.update',
        'destroy' => 'admin.industries.destroy',
    ]);

    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->names([
        'index' => 'admin.services.index',
        'create' => 'admin.services.create',
        'store' => 'admin.services.store',
        'show' => 'admin.services.show',
        'edit' => 'admin.services.edit',
        'update' => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
    ]);
    Route::resource('popups', PopupController::class)->names([
        'index' => 'admin.popups.index',
        'create' => 'admin.popups.create',
        'store' => 'admin.popups.store',
        'show' => 'admin.popups.show',
        'edit' => 'admin.popups.edit',
        'update' => 'admin.popups.update',
        'destroy' => 'admin.popups.destroy',
    ]);
    Route::get('/media', [MediaController::class, 'index'])
    ->name('admin.media.index');

Route::get('/media/create', [MediaController::class, 'create'])
    ->name('admin.media.create');

Route::post('/media', [MediaController::class, 'store'])
    ->name('admin.media.store');

Route::delete('/media/{id}', [MediaController::class, 'destroy'])
    ->name('admin.media.destroy');

    Route::resource(
    'ehs-ai-modules',
    App\Http\Controllers\Admin\EhsAiModuleController::class
);
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{id}', [AdminContactController::class, 'show'])->name('admin.contacts.show');
});

Route::prefix('admins/console')
    ->middleware(['auth'])    // ← add your guards here
    ->name('admin.console.')
    ->group(function () {

        // Dashboard — list all commands
        Route::get('/', [SystemConsoleController::class, 'index'])
            ->name('index');

        // Run a command — POST to avoid browser back-button re-runs
        Route::any('/run/{key}', [SystemConsoleController::class, 'run'])
            ->name('run')
            ->where('key', '[a-z\-]+');
});

Route::get('/test-mail', function () {
    Mail::raw('Test Email from Laravel', function ($message) {
        $message->to('imadiahsen8@gmail.com')
                ->subject('Test Mail');
    });

    return 'Mail sent!';
});
