<?php

use App\Livewire\Pages\Admin\Profile;
use App\Livewire\Pages\Admin\Role;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Public\Homepage\Index;

// Data Banners
use App\Livewire\Pages\Admin\Banners\BannersCreate;
use App\Livewire\Pages\Admin\Banners\BannersEdit;
use App\Livewire\Pages\Admin\Banners\BannersList;

// Data Paket
use App\Livewire\Pages\Admin\Price\PriceList;
use App\Livewire\Pages\Admin\Price\PriceCreate;
use App\Livewire\Pages\Admin\Price\PriceEdit;

Route::get('/', Index::class)->name('homepage');

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
});

require __DIR__ . '/auth.php';
