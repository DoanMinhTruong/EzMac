@extends("layouts.app")
@section("content")
    <div class="container-fluid col-9" style="height:800px ;">
        <div class="row h-100">
            <div class="col-2 bg-dark" id="admin-menu">
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-decoration-none text-white">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route("admin.user") }}" class="nav-link text-decoration-none text-white">
                            User
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('admin.category') }}" class="nav-link text-decoration-none text-white">
                            Category
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('admin.product') }}" class="nav-link text-decoration-none text-white">
                            Product
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu col-10 bg-light" id="admin-content">
                @yield('admin_content')
            </div>
        </div>
    </div>
@endsection