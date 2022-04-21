<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('/img/logo-color.png') }}" class="img-fluid" width="170px" height="170px"
            alt="{{ config('app.name') }} Logo" class="brand-image img-circle elevation-3">
        </div>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
