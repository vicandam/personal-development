<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="/">
                    <img src="{{asset('theme/template/assets/images/logo.svg')}}" alt="logo"/>
                    <span class="font-12 d-block font-weight-light">Grow Rich Journey </span>
                </a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('theme/template/assets/images/logo-mini.svg')}}" alt="logo"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                  <span class="input-group-text" id="search">
                                    <i class="mdi mdi-magnify"></i>
                                  </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search"/>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{asset('theme/template/assets/images/faces-clipart/pic-1.png')}}"
                                     alt="image"/>
                            </div>
                            <div class="nav-profile-text">
                                <p class="text-black font-weight-semibold m-0">{{\Illuminate\Support\Str::limit(auth()->user()->name, 15, '')}}</p>
                                <span class="font-13 online-color">online <i
                                        class="mdi mdi-chevron-down"></i></span>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#"><i class="mdi mdi-cached me-2 text-success"></i>
                                Activity Log </a>
                            <div class="dropdown-divider"></div>

                            @if(auth()->user()->isAdmin())
                                <a class="dropdown-item" href="{{route('switch-role', ['role' => 'admin'])}}"><i
                                        class="mdi mdi-cached me-2 text-success"></i> Switch to Admin </a>
                                <div class="dropdown-divider"></div>
                            @endif

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item"><i
                                        class="mdi mdi-logout me-2 text-primary"></i> Signout
                                </button>
                            </form>

                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="mdi mdi-compass-outline menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/chat">
                        <i class="mdi mdi-wechat menu-icon"></i>

                        <span class="menu-title">Chat Assistant</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/task">
                        <i class="mdi mdi-pen menu-icon"></i>
                        <span class="menu-title">Tasks</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/goal">
                        <i class="mdi mdi-flag menu-icon"></i>
                        <span class="menu-title">Goals</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/timeline">
                        <i class="mdi mdi-timer-sand menu-icon"></i>
                        <span class="menu-title">Timeline</span>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="nav-link d-flex">
                        <button class="btn btn-sm bg-danger text-white"> Trailing</button>
                        <div class="nav-item dropdown">
                            <a class="nav-link count-indicator dropdown-toggle text-white font-weight-semibold"
                               id="notificationDropdown" href="#" data-bs-toggle="dropdown"> English </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                 aria-labelledby="notificationDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-bl me-3"></i> French </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-cn me-3"></i> Chinese </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-de me-3"></i> German </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-ru me-3"></i>Russian </a>
                            </div>
                        </div>
                        <a class="text-white" href="/"><i class="mdi mdi-home-circle"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
