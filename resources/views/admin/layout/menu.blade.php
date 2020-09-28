<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{ asset('admin/images/faces/face8.jpg') }}"
                        alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{ $auth['name'] }}</p>
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blogs.index') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Manage Blog</span>
                </a>
            </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Manage Product</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manage Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column susb-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customers.index') }}"> Customers </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>