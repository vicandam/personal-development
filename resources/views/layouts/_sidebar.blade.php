<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
                <div class="nav-profile-image">
                    <img src="{{asset('https://vicandam.com/portfolio/img/vic.jpg')}}" alt="image" />
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                    <span class="font-weight-semibold mb-1 mt-2 text-center">{{auth()->user()->name}}</span>
                    <span class="text-secondary icon-sm text-center">Motivator</span>
                </div>
            </a>
        </li>
        <li class="nav-item pt-3">
            <a class="nav-link d-block" href="/">
                <img class="sidebar-brand-logo" src="{{asset('theme/template/assets/images/logo.svg')}}" alt="" />
                <img class="sidebar-brand-logomini" src="{{asset('theme/template/assets/images/logo-mini.svg')}}" alt="" />
                <div class="small font-weight-light pt-1">Responsive Dashboard</div>
            </a>
            <form class="d-flex align-items-center" action="#">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" class="form-control border-0" placeholder="Search" />
                </div>
            </form>
        </li>
        <li class="pt-2 pb-1">
            <span class="nav-item-head">Admin Controls</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-compass-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                <span class="menu-title">Core Features</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="">Goal Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Progress Tracking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Task Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Reminders and Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Motivational Content</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Time Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Journaling</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Community Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Customization</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Feedback and Rewards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Burnout Prevention</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('ai_instruct.list')}}">
                <i class="mdi mdi-console menu-icon"></i>
                <span class="menu-title">AI Instructions</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="mdi mdi-tumblr-reblog menu-icon"></i>
                <span class="menu-title">User Activities</span>
            </a>
        </li>

        <li class="nav-item">
            <a  id="copyLink" onclick="copyToClipboard('This is the text to be copied')" class="nav-link" href="javascript:void(0)">
                <i class="mdi mdi-folder-multiple-image menu-icon"></i>
                <span class="menu-title">UI Elements</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ai-links" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-code-braces menu-icon"></i>
                <span class="menu-title">Open Ai</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ai-links">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a  class="nav-link" href="https://github.com/openai-php/client#finetuning-resource">
                            <i class="mdi mdi-code-not-equal-variant menu-icon"></i>
                            <span class="menu-title">Open Ai lib</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="https://platform.openai.com/finetune">
                            <i class="mdi mdi-codepen menu-icon"></i>
                            <span class="menu-title">Open Ai docs</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="nav-item pt-3">
            <a class="nav-link" href="{{ route('switch-role', ['role' => 'user']) }}">
                <i class="mdi mdi-camera-switch menu-icon"></i>
                <span class="menu-title">Switch to User</span>
            </a>
        </li>

        <li class="nav-item pt-3">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a onclick="document.getElementById('logout-form').submit();" class="nav-link" href="javascript:void(0)">
                    <i class="mdi mdi-logout menu-icon"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </form>
        </li>
    </ul>
</nav>
