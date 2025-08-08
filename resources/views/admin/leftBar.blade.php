<form class="d-block d-xl-none pt-8 px-6">
    <div class="input-group position-relative bg-body-tertiary">
        <input type="text" class="form-control border-0 bg-transparent pl-4 shadow-none" placeholder="Search Item">
        <div class="input-group-append fs-14px px-6 border-start border-2x ">
            <button class="bg-transparent border-0 outline-none py-5">
                <i class="far fa-search"></i>
            </button>
        </div>
    </div>
</form>
<ul class="list-group list-group-flush list-group-no-border w-100 p-6">
    <li class="list-group-item px-0 py-0 sidebar-item mb-3 border-0">
        <a href="{{ route('admin.dashboard') }}"
            class="text-heading text-decoration-none lh-1 sidebar-link py-5 px-6 d-flex align-items-center"
            title="Dashboard">
            <span class="sidebar-item-icon w-40px d-inline-block text-muted">
                <i class="fas fa-home-lg-alt"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Dashboard</span>
        </a>
    </li>

    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
        <a href="#categories_tab" aria-controls="categories_tab"
            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative active show"
            data-bs-toggle="collapse" aria-expanded="true"
            title="Add Product">
            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                <i class="fas fa-plus-square"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Category</span>
            <span class="position-absolute top-50 end-5 translate-middle-y"><i class="far fa-angle-down"></i></span>
        </a>
        <div class="collapse menu-collapse show {{ request()->routeIs('admin.category.*') ? 'show' : '' }} "
            id="categories_tab">
            <ul class="sub-menu list-unstyled ">
                <li class="sidebar-item {{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="{{ route('admin.category.index') }}" title="Categoried">Categoried</a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('admin.category.create') ? 'active' : '' }}">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="{{ route('admin.category.create') }}" title="Categoried">Add Category</a>
                </li>
                {{-- <li class="sidebar-item {{ request()->routeIs('admin.category.datatable') ? 'active' : '' }}">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="{{ route('admin.category.datatable') }}" title="Categoried">Category Data Table</a>
                </li> --}}
            </ul>
        </div>
    </li>

    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0 ">
        <a href="#product"
            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
            data-bs-toggle="collapse" aria-expanded="false" title="Products">
            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                <i class="fas fa-shopping-bag"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Products</span>
            <span class="position-absolute top-50 end-5 translate-middle-y"><i class="far fa-angle-down"></i></span>
        </a>
        <div class="collapse menu-collapse" id="product">
            <ul class="sub-menu list-unstyled">
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="{{ route('admin.product.index') }}" title="Product List">Product List</a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="{{ route('admin.product.create') }}" title="Product Grid">Add Product</a>
                </li>
                {{-- <li class="sidebar-item">
            <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
               href="product-grid-02.html" title="Product Grid 2">Product Grid 2</a>
        </li> --}}

            </ul>
        </div>
    </li>



    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
        <a href="#order"
            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
            data-bs-toggle="collapse" aria-expanded="false" title="Order">
            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Order</span>
            <span class="position-absolute top-50 end-5 translate-middle-y"><i class="far fa-angle-down"></i></span>
        </a>
        <div class="collapse menu-collapse" id="order">
            <ul class="sub-menu list-unstyled">
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="order-list.html" title="Order List 1">Order List 1</a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="order-list-2.html" title="Order List 2">Order List 2</a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="order-detail.html" title="Order detail">Order detail</a>
                </li>
            </ul>
        </div>
    </li>


    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
        <a href="#sellers"
            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
            data-bs-toggle="collapse" aria-expanded="false" title="Sellers">
            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                <i class="fas fa-users"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Sellers</span>
            <span class="position-absolute top-50 end-5 translate-middle-y"><i class="far fa-angle-down"></i></span>
        </a>
        <div class="collapse menu-collapse" id="sellers">
            <ul class="sub-menu list-unstyled">
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="sellers-cards.html" title="Sellers Cards">Sellers Cards</a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="sellers-list.html" title="Sellers List">Sellers List</a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="sellers-profile.html" title="Sellers Profile">Sellers
                        Profile</a>
                </li>
            </ul>
        </div>
    </li>





    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
        <a href="#transaction"
            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
            data-bs-toggle="collapse" aria-expanded="false" title="Transactions">
            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                <i class="fas fa-circle-dollar-to-slot"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Transactions</span>
            <span class="position-absolute top-50 end-5 translate-middle-y"><i class="far fa-angle-down"></i></span>
        </a>
        <div class="collapse menu-collapse" id="transaction">
            <ul class="sub-menu list-unstyled">
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="transactions-1.html" title="Transactions 1">Transactions
                        1</a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="transactions-2.html" title="Transactions 2">Transactions
                        2</a>
                </li>
            </ul>
        </div>
    </li>


    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
        <a href="#account"
            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
            data-bs-toggle="collapse" aria-expanded="false" title="Account">
            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                <i class="fas fa-user"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Account</span>
            <span class="position-absolute top-50 end-5 translate-middle-y"><i class="far fa-angle-down"></i></span>
        </a>
        <div class="collapse menu-collapse" id="account">
            <ul class="sub-menu list-unstyled">
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="../user-login.html" title="User login">User login</a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="../user-registration.html" title="User registration">User
                        registration</a>
                </li>
            </ul>
        </div>
    </li>


    <li class="list-group-item px-0 py-0 sidebar-item mb-3 border-0">
        <a href="reviews.html"
            class="text-heading text-decoration-none lh-1 sidebar-link py-5 px-6 d-flex align-items-center"
            title="Reivews">
            <span class="sidebar-item-icon w-40px d-inline-block text-muted">
                <i class="fas fa-comment-alt"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Reivews</span>
        </a>
    </li>

    <li class="list-group-item px-0 py-0 sidebar-item mb-3 border-0">
        <a href="brands.html"
            class="text-heading text-decoration-none lh-1 sidebar-link py-5 px-6 d-flex align-items-center"
            title="Brand">
            <span class="sidebar-item-icon w-40px d-inline-block text-muted">
                <i class="fas fa-certificate"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Brand</span>
        </a>
    </li>

    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
        <a href="#setting"
            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
            data-bs-toggle="collapse" aria-expanded="false" title="Setting">
            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                <i class="fas fa-cog"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Setting</span>
            <span class="position-absolute top-50 end-5 translate-middle-y"><i class="far fa-angle-down"></i></span>
        </a>
        <div class="collapse menu-collapse" id="setting">
            <ul class="sub-menu list-unstyled">
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="profile-settings.html" title="Profile settings">Profile
                        settings</a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link pe-5 ps-8 py-5 lh-1 text-decoration-none fs-14px fw-semibold"
                        href="site-settings.html" title="Site settings">Site settings</a>
                </li>
            </ul>
        </div>
    </li>


    <li class="list-group-item px-0 py-0 sidebar-item mb-3 border-0">
        <a href="starter-page.html"
            class="text-heading text-decoration-none lh-1 sidebar-link py-5 px-6 d-flex align-items-center"
            title="Starter page">
            <span class="sidebar-item-icon w-40px d-inline-block text-muted">
                <i class="fas fa-tag"></i>
            </span>
            <span class="sidebar-item-text fs-14px fw-semibold">Starter page</span>
        </a>
    </li>

</ul>
