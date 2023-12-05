<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\BerandaController;
use App\Http\Controllers\admin\PerusahaanController;
use App\Http\Controllers\admin\TelecommunicationController;
use App\Http\Controllers\admin\CatudayaController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SeoController;
use App\Http\Controllers\admin\SettingmenuController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\PageController;

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

Route::get('/storage-link', function () { 
    $targetFolder = base_path().'/storage/app/public'; 
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage'; 
    symlink($targetFolder, $linkFolder); 
});

Route::get('/clear-cache', function () {
    Artisan::call('route:cache');
});

// Route::get('/', [LoginController::class, 'index']);

// Authentication
Route::get('/admin/login', [LoginController::class, 'index'])
->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'authenticate'])
->name('admin.login');
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/admin/forgot-password', [LoginController::class, 'forgot_password'])->name('admin.forgot-password');
Route::post('/admin/forgot', [LoginController::class, 'forgot'])->name('admin.forgot');


Route::post('/', [WebController::class, 'lang'])->name('lang');

Route::get('/', [WebController::class, 'index'])->name('beranda');
Route::get('/perusahaan', [WebController::class, 'perusahaan'])->name('perusahaan');
Route::get('/kontraktor', [WebController::class, 'kontraktor'])->name('kontraktor');
Route::get('/catudaya', [WebController::class, 'catudaya'])->name('catudaya');
Route::get('/kontak', [WebController::class, 'kontak'])->name('kontak');
Route::get('/page/{slug}', [PageController::class, 'index']);

//Admin
Route::prefix('admin')
->middleware('auth')
->group(function(){
    Route::resource('/user', UserController::class);
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin-dashboard');
    Route::get('/beranda',[BerandaController::class, 'index'])->name('admin.beranda');
    Route::post('/beranda',[BerandaController::class, 'store'])->name('admin.beranda.create');

    Route::get('/perusahaan',[PerusahaanController::class, 'index'])->name('admin.perusahaan');
    Route::post('/perusahaan',[PerusahaanController::class, 'store'])->name('admin.perusahaan.create');
    Route::post('/perusahaan/milestones',[PerusahaanController::class, 'store_milestones'])->name('admin.perusahaan.milestones.create');
    Route::post('/perusahaan/milestones/{id}',[PerusahaanController::class, 'update_milestones'])->name('admin.perusahaan.milestones.update');

    Route::post('/perusahaan/certificate',[PerusahaanController::class, 'store_certificate'])->name('admin.perusahaan.certificate.create');
    Route::post('/perusahaan/certificate/{id}',[PerusahaanController::class, 'update_certificate'])->name('admin.perusahaan.certificate.update');

    Route::post('/perusahaan/award',[PerusahaanController::class, 'store_award'])->name('admin.perusahaan.award.create');
    Route::post('/perusahaan/award/{id}',[PerusahaanController::class, 'update_award'])->name('admin.perusahaan.award.update');

    Route::get('/telecommunication_contractor',[TelecommunicationController::class, 'index'])->name('admin.telecommunication_contractor');
    Route::post('/telecommunication_contractor',[TelecommunicationController::class, 'store'])->name('admin.telecommunication_contractor.create');
    Route::post('/telecommunication_contractor/image',[TelecommunicationController::class, 'store_image'])->name('admin.telecommunication_contractor.image.create');
    Route::post('/telecommunication_contractor/image/{id}',[TelecommunicationController::class, 'update_image'])->name('admin.telecommunication_contractor.image.update');

    Route::get('/catudaya',[CatudayaController::class, 'index'])->name('admin.catudaya');
    Route::post('/catudaya',[CatudayaController::class, 'store'])->name('admin.catudaya.create');
    Route::post('/catudaya/project',[CatudayaController::class, 'store_project'])->name('admin.catudaya.project.create');
    Route::post('/catudaya/project/{id}',[CatudayaController::class, 'update_project'])->name('admin.catudaya.project.update');

    Route::get('/contact',[ContactController::class, 'index'])->name('admin.contact');
    Route::post('/contact',[ContactController::class, 'store'])->name('admin.contact.create');

    Route::get('/seo',[SeoController::class, 'index'])->name('admin.seo');
    Route::post('/seo',[SeoController::class, 'store'])->name('admin.seo.create');

    Route::get('/settings',[SettingmenuController::class, 'index'])->name('admin.setting');
    Route::post('/settings/store',[SettingmenuController::class, 'store'])->name('admin.setting.store');
    Route::post('/settings/hidden/{id}',[SettingmenuController::class, 'hidden'])->name('admin.setting.hidden');
    Route::post('/settings/update/{id}',[SettingmenuController::class, 'update'])->name('admin.setting.update');
    Route::delete('/settings/delete/{id}',[SettingmenuController::class, 'destroy'])->name('admin.setting.destroy');

    Route::resource('/customer', CustomerController::class);
    Route::post('/customer/section',[CustomerController::class, 'section'])->name('admin.customer.section');

    Route::post('/footer',[SettingmenuController::class, 'footer'])->name('admin.footer');
});