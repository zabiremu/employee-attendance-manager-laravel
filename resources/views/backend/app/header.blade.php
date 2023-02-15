<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <!-- search form -->
        <div class="search-form d-none d-lg-inline-block">
           
        </div>

        <div class="navbar-right ">
            <ul class="nav navbar-nav">
                <!-- Github Link Button -->
                <li class="github-link mr-3">
                   
                </li>
                <li class="dropdown notifications-menu">
                   
                </li>
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="https://api.dicebear.com/5.x/initials/svg?seed={{ $user->full_name }}" class="user-image" alt="User Image" />
                        <span class="d-none d-lg-inline-block">{{ $user->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <!-- User image -->
                        <li class="dropdown-header">
                            <img src="https://api.dicebear.com/5.x/initials/svg?seed={{ $user->full_name }}" class="img-circle" alt="User Image" />
                            <div class="d-inline-block">
                               {{ $user->name }}<small class="pt-1">{{ $user->email }}</small>
                            </div>
                        </li>

                        <li>
                            <a href="{{ route('admin.profile') }}">
                                <i class="mdi mdi-account"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.password') }}"> <i class="mdi mdi-settings"></i> Password</a>
                        </li>

                        <li class="dropdown-footer">
                            <a href="{{ route('admin.logout') }}"> <i class="mdi mdi-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>