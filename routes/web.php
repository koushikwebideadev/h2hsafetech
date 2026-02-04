<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\SiteContent;

Route::get('/', function () {
    $contents = SiteContent::whereIn('section', ['hero', 'enterprise_dashboard'])
        ->get()
        ->groupBy('section');
    $features = \App\Models\Feature::orderBy('order')->get();
    $screenshots = \App\Models\Screenshot::orderBy('order')->get();
    return view('welcome', compact('contents', 'features', 'screenshots'));
})->name('home');

Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/features', [App\Http\Controllers\HomeController::class, 'features'])->name('features');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::get('/book-a-demo', [\App\Http\Controllers\BookDemoController::class, 'index'])->name('book-demo.index');
Route::post('/book-a-demo', [\App\Http\Controllers\BookDemoController::class, 'store'])->name('book-demo.store');

Route::get('/blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blogs.show');

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PageController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Profile Management
        Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');

        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        // Feature Management
        Route::resource('features', \App\Http\Controllers\Admin\FeatureController::class);

        // Screenshot Management
        Route::resource('screenshots', \App\Http\Controllers\Admin\ScreenshotController::class);

        // Service Management
        Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);

        // Feature Category Management
        Route::resource('feature-categories', \App\Http\Controllers\Admin\FeatureCategoryController::class);

        // Page Management
        Route::prefix('pages')->name('pages.')->group(function () {
            Route::get('/home', [PageController::class, 'editHome'])->name('home.edit');
            Route::post('/home', [PageController::class, 'updateHome'])->name('home.update');

            Route::get('/about-us', [PageController::class, 'editAboutUs'])->name('about-us.edit');
            Route::post('/about-us', [PageController::class, 'updateAboutUs'])->name('about-us.update');
        });

        // Contact Lead Management
        Route::resource('contact-leads', \App\Http\Controllers\Admin\ContactLeadController::class)->only(['index', 'show', 'destroy']);
        Route::patch('contact-leads/{contact_lead}/status', [\App\Http\Controllers\Admin\ContactLeadController::class, 'updateStatus'])->name('contact-leads.update-status');

        // Blog Management
        Route::resource('blog-categories', \App\Http\Controllers\Admin\BlogCategoryController::class);
        Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);

        // Custom Page Management
        Route::resource('custom-pages', \App\Http\Controllers\Admin\CustomPageController::class);

        // Book Demo Lead Management
        Route::resource('book-demo-leads', \App\Http\Controllers\Admin\BookDemoLeadController::class)->only(['index', 'destroy']);

        // SEO Settings
        Route::resource('seo-settings', \App\Http\Controllers\Admin\SeoSettingController::class);

        // Business Settings
        Route::get('/business-settings', [\App\Http\Controllers\Admin\BusinessSettingController::class, 'index'])->name('business-settings.index');
        Route::post('/business-settings', [\App\Http\Controllers\Admin\BusinessSettingController::class, 'update'])->name('business-settings.update');
        Route::post('/business-settings/test-mail', [\App\Http\Controllers\Admin\BusinessSettingController::class, 'sendTestMail'])->name('business-settings.test-mail');
    });
});

Route::get('/{slug}', [\App\Http\Controllers\HomeController::class, 'customPage'])->name('pages.show');

