<div class="db-sidebar bg-body ">
    <aside
        class="navbar navbar-expand-xl navbar-light d-block px-0 header-sticky dashboard-nav py-0">
        <div class="sticky-area border-right">
            <div
                class="d-flex px-6 px-xl-10 w-100 border-bottom py-7 justify-content-between ">

                <a href="../index.html" class="navbar-brand py-4">
                    <img class="light-mode-img" src="{{ asset('assets/images/others/logo.png') }}" width="179"
                        height="26" alt="Glowing - Bootstrap 5 HTML Templates">
                    <img class="dark-mode-img" src="{{ asset('assets/images/others/logo-white.png') }}" width="179"
                        height="26" alt="Glowing - Bootstrap 5 HTML Templates"></a>

                <div class="ml-auto d-flex align-items-center ">
                    <div class="d-flex align-items-center d-xl-none">

                        <div class="color-modes position-relative px-4">
                            <a class="bd-theme btn btn-link nav-link dropdown-toggle d-inline-flex align-items-center justify-content-center text-primary p-0 position-relative rounded-circle"
                                href="#" aria-expanded="true" data-bs-toggle="dropdown"
                                data-bs-display="static" aria-label="Toggle theme (light)">
                                <svg class="bi my-1 theme-icon-active">
                                    <use href="#sun-fill"></use>
                                </svg>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end fs-14px" data-bs-popper="static">
                                <li>
                                    <button type="button"
                                        class="dropdown-item d-flex align-items-center active"
                                        data-bs-theme-value="light" aria-pressed="true">
                                        <svg class="bi me-4 opacity-50 theme-icon">
                                            <use href="#sun-fill"></use>
                                        </svg>
                                        Light
                                        <svg class="bi ms-auto d-none">
                                            <use href="#check2"></use>
                                        </svg>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="dark" aria-pressed="false">
                                        <svg class="bi me-4 opacity-50 theme-icon">
                                            <use href="#moon-stars-fill"></use>
                                        </svg>
                                        Dark
                                        <svg class="bi ms-auto d-none">
                                            <use href="#check2"></use>
                                        </svg>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="auto" aria-pressed="false">
                                        <svg class="bi me-4 opacity-50 theme-icon">
                                            <use href="#circle-half"></use>
                                        </svg>
                                        Auto
                                        <svg class="bi ms-auto d-none">
                                            <use href="#check2"></use>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown no-caret py-4 px-3 d-flex align-items-center notice me-6">
                            <a href="#"
                                class="dropdown-toggle text-body-emphasis fs-5 fw-500 lh-1 position-relative"
                                data-bs-toggle="dropdown">
                                <i class="far fa-bell"></i>
                                <span
                                    class="badge bg-primary rounded-pill position-absolute fw-bold fs-13px bottom-100 start-100 translate-middle-x">1</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <button class="navbar-toggler border-0 px-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#primaryMenuSidebar" aria-controls="primaryMenuSidebar"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
            {{-- Left Bar --}}
            <div class="collapse navbar-collapse bg-body position-relative z-index-5"
                id="primaryMenuSidebar">
                @include('admin.leftBar')
            </div>
        </div>
    </aside>


</div>