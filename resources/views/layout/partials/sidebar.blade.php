<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between" style="margin-top: -10px; background-color: ##DADEFF;">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ asset('dist/images/logos/un.png') }}" class="dark-logo" width="40" alt="" style="transform: translateY(-10px);"  />
                <span>ZAM ZAM</span>
                <img src="{{ asset('dist/images/logos/light-logo.svg') }}" class="light-logo" width="180" alt="" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar text-white" data-simplebar style="background-color: #2F2E7A; border-radius:0px;">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4 text-white"></i>
                    <span class="hide-menu text-white" >Main Menu</span>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="/" aria-expanded="false">
                        <span>
                            <i class="ti ti-home text-white"></i>
                        </span>
                        <span class="hide-menu text-white">Dashboard</span>
                    </a>
                </li> --}}


                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow text-white @if(request()->routeIs('project.*')) active @endif " href="#" aria-expanded="false">
                        <span class="d-flex text-white">
                            <i class="ti ti-list text-white"></i>
                        </span>
                        <span class="hide-menu text-white">Projcet List</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level @if(request()->routeIs('project.*')) in @endif">
                        {{-- <li class="sidebar-item">
                            <a href="{{ route('project.rfq.index') }}" class="sidebar-link @if(request()->routeIs('project.rfq.*')) active @endif">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle text-white"></i>
                                </div>
                                <span class="hide-menu text-white">WO</span>
                            </a>
                        </li> --}}
                        {{-- <li class="sidebar-item">
                            <a href="{{ route('master.merek.index') }}" class="sidebar-link @if(request()->routeIs('project.jenis.*')) active @endif">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle text-white"></i>
                                </div>
                                <span class="hide-menu text-white">Merek Produk</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('project.jenis.index') }}" class="sidebar-link @if(request()->routeIs('project.produk.*')) active @endif">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle text-white"></i>
                                </div>
                                <span class="hide-menu text-white">Jenis Produk</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-item">
                            <a href="{{ route('master.produk.index') }}" class="sidebar-link @if(request()->routeIs('project.produk.*')) active @endif">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle text-white"></i>
                                </div>
                                <span class="hide-menu text-white">List Produk</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link @if(request()->routeIs('merek.*')) active @endif" aria-expanded="false">
                        <span>
                            <i class="ti ti-report-search text-white"></i>
                        </span>
                        <span class="hide-menu text-white">Report Penawaran</span>
                    </a>
                </li> --}}
            </ul>

                {{-- <li class="sidebar-item">
                    <a class="sidebar-link has-arrow text-white @if(request()->routeIs('project.*')) active @endif " href="#" aria-expanded="false">
                        <span class="d-flex text-white">
                            <i class="ti ti-database text-white"></i>
                        </span>
                        <span class="hide-menu text-white">project</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level @if(request()->routeIs('project.*')) in @endif">
                        <li class="sidebar-item">
                            <a href="{{ route('project.merek.index') }}" class="sidebar-link @if(request()->routeIs('project.merek.*')) active @endif">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle text-white"></i>
                                </div>
                                <span class="hide-menu text-white">Merek</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('project.jenis.index') }}" class="sidebar-link @if(request()->routeIs('project.jenis.*')) active @endif">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle text-white"></i>
                                </div>
                                <span class="hide-menu text-white">Jenis</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('project.produk.index') }}" class="sidebar-link @if(request()->routeIs('project.produk.*')) active @endif">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle text-white"></i>
                                </div>
                                <span class="hide-menu text-white">Produk</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                @if (auth()->user()->role == 'Administrator')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon text-white fs-4"></i>
                    <span class="hide-menu text-white">Setting</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if(request()->routeIs('user.*')) active @endif" href="{{ route('user.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users text-white"></i>
                        </span>
                        <span class="hide-menu text-white">User</span>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                    <span class="fs-2 text-dark">Designer</span>
                </div>
                <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
