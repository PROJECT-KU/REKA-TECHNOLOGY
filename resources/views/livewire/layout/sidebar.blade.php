<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/');
    }
}; ?>

<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}" class="" wire:navigate>
                        <small>Reka Technology</small>
                    </a>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link' wire:navigate>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub {{ request()->routeIs('admin.Banners.*') || request()->routeIs('admin.Paket.*') || request()->routeIs('admin.Portofolio.*') ? 'active open' : '' }}">

                    <a href="javascript:void(0)"
                        class="sidebar-link {{ request()->routeIs('admin.Banners.*') || request()->routeIs('admin.Paket.*') || request()->routeIs('admin.Portofolio.*') ? 'text-primary fw-bold' : '' }}">
                        <i class="bi bi-globe-americas {{ request()->routeIs('admin.Banners.*') || request()->routeIs('admin.Paket.*') || request()->routeIs('admin.Portofolio.*') ? 'text-primary' : '' }}"></i>
                        <span class="{{ request()->routeIs('admin.Banners.*') || request()->routeIs('admin.Paket.*') || request()->routeIs('admin.Portofolio.*') ? 'text-primary' : '' }}">
                            Data Public
                        </span>
                    </a>

                    <ul class="submenu">

                        <li class="submenu-item {{ request()->routeIs('admin.Banners.*') ? 'active' : '' }}">
                            <a wire:navigate href="{{ route('admin.Banners.index') }}" class="submenu-link">
                                Data Banner
                            </a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('admin.Paket.*') ? 'active' : '' }}">
                            <a wire:navigate href="{{ route('admin.Paket.index') }}" class="submenu-link">
                                Data Paket
                            </a>
                        </li>

                        <li class="submenu-item {{ request()->routeIs('admin.Portofolio.*') ? 'active' : '' }}">
                            <a wire:navigate href="{{ route('admin.Portofolio.index') }}" class="submenu-link">
                                Portofolio
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item  has-sub {{ request()->routeIs('admin.account.*') ? 'active' : '' }}">
                    <a href="#"
                        class='sidebar-link {{ request()->routeIs('admin.account.*') ? 'text-primary fw-bold' : '' }}'>
                        <i class="bi bi-person {{ request()->routeIs('admin.account.*') ? 'text-primary' : '' }}"></i>
                        <span class="{{ request()->routeIs('admin.account.*') ? 'text-primary' : '' }}">Akun</span>
                    </a>

                    <ul class="submenu {{ request()->routeIs('admin.account.*') ? 'active' : '' }}">
                        <li class="submenu-item {{ request()->routeIs('admin.account.profile') ? 'active' : '' }}">
                            <a wire:navigate href="{{ route('admin.account.profile') }}"
                                class="submenu-link">Pengaturan Profil</a>
                        </li>
                        @if (auth()->user()->hasRole('admin'))
                        <li class="submenu-item  {{ request()->routeIs('admin.account.role') ? 'active' : '' }}">
                            <a wire:navigate href="{{ route('admin.account.role') }}"
                                class="submenu-link">Pengaturan Role</a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="sidebar-item">
                    <button wire:click="logout" class="sidebar-link btn btn-link w-100 text-start">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const sidebar = document.getElementById("sidebar");
        const toggler = document.querySelector(".sidebar-hide");

        toggler.addEventListener("click", (e) => {
            e.preventDefault();
            sidebar.classList.toggle("active");
        });
    });
</script>