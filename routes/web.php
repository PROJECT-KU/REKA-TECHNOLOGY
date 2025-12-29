<?php

use App\Livewire\Pages\Admin\Profile;
use App\Livewire\Pages\Admin\Role;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Public\Homepage\Index;
use App\Livewire\Pages\Public\Contact\ContactForm;
use App\Livewire\Pages\Public\Service\Serviceform;
use App\Livewire\Pages\Public\Portofolio\PortofolioView;
use App\Livewire\Pages\Public\Portofolio\PortofolioDetail;

// Data Banners
use App\Livewire\Pages\Admin\Banners\BannersCreate;
use App\Livewire\Pages\Admin\Banners\BannersEdit;
use App\Livewire\Pages\Admin\Banners\BannersList;

// Data Paket
use App\Livewire\Pages\Admin\Price\PriceList;
use App\Livewire\Pages\Admin\Price\PriceCreate;
use App\Livewire\Pages\Admin\Price\PriceEdit;

// Data Portofolio
use App\Livewire\Pages\Admin\Portofolio\PortofolioList;
use App\Livewire\Pages\Admin\Portofolio\PortofolioCreate;
use App\Livewire\Pages\Admin\Portofolio\PortofolioEdit;

//Data Project
use App\Livewire\Pages\Admin\Project\ProjectCreate;
use App\Livewire\Pages\Admin\Project\ProjectList;
use App\Livewire\Pages\Admin\Project\ProjectEdit;


Route::get('/', Index::class)->name('homepage');
Route::get('/contact', ContactForm::class)->name('contact');
Route::get('/services', Serviceform::class)->name('services');
Route::get('/portofolio', PortofolioView::class)->name('portofolio');
Route::get('/portofolio-detail/{id}', PortofolioDetail::class)->name('portofolio.detail');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['checkrole:admin'])->group(function () {
    Route::get('/admin/role', Role::class)->name('admin.account.role');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/profile', Profile::class)->name('admin.account.profile');

    // Data Banners
    Route::get('/admin/DataBanners', BannersList::class)->name('admin.Banners.index');
    Route::get('/admin/DataBanners/create', BannersCreate::class)->name('admin.Banners.create');
    Route::get('/admin/DataBanners/{Banners}', BannersEdit::class)->name('admin.Banners.show');
    Route::get('/admin/DataBanners/{Banners}/edit', BannersEdit::class)->name('admin.Banners.edit');

    // Data Paket
    Route::get('/admin/DataPaket', PriceList::class)->name('admin.Paket.index');
    Route::get('/admin/DataPaket/create', PriceCreate::class)->name('admin.Paket.create');
    Route::get('/admin/DataPaket/{Price}/edit', PriceEdit::class)->name('admin.Paket.edit');

    // Data Portofolio
    Route::get('/admin/DataPortofolio', PortofolioList::class)->name('admin.Portofolio.index');
    Route::get('/admin/DataPortofolio/create', PortofolioCreate::class)->name('admin.Portofolio.create');
    Route::get('/admin/DataPortofolio/{Portofolio}/edit', PortofolioEdit::class)->name('admin.Portofolio.edit');

    // Data Project
    Route::get('/admin/Project', ProjectList::class)->name('admin.project.index');
    Route::get('/admin/Project/create', ProjectCreate::class)->name('admin.project.create');
    Route::get('/admin/Project/{project}/edit', ProjectEdit::class)->name('admin.project.edit');
});

require __DIR__ . '/auth.php';
