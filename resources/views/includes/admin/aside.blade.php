<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/main" class="brand-link">
        <img src="{{ asset('images/meganet-newlogo-backup.png') }}" width="100%">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">CONTENT</li>
                <li class="nav-item ">
                    <a href="{{ url('main/view-all-meganews') }}"
                        class="nav-link {{ Request::is('main/view-all-meganews') ? 'active' : '' }}">
                        <i class="fa fa-newspaper"></i>
                        <p>MegaNews</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/view-all-megatrivia') }}"
                        class="nav-link {{ Request::is('main/view-all-megatrivia') ? 'active' : '' }}">
                        <i class="fa-regular fa-lightbulb"></i>
                        <p>MegaTrivia</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/view-all-megagoodvibes') }}"
                        class="nav-link {{ Request::is('main/view-all-megagoodvibes') ? 'active' : '' }}">
                        <i class="fa-solid fa-video"></i>
                        <p>MegaGood Vibes</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/view-all-megaprojects') }}"
                        class="nav-link {{ Request::is('main/view-all-megaprojects') ? 'active' : '' }}">
                        <i class="fa-solid fa-bars-progress"></i>
                        <p>MegaProjects</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/view-all-megaprojectsegments') }}"
                        class="nav-link {{ Request::is('main/view-all-megaprojectsegments') ? 'active' : '' }}">
                        <i class="fa-solid fa-bridge-water"></i>
                        <p>Segments</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/view-all-bannerQuestions') }}"
                        class="nav-link {{ Request::is('main/view-all-bannerQuestions') ? 'active' : '' }}">
                        <i class="fa-solid fa-clipboard-question"></i>
                        <p>Banner</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/view-all-corporateoffice') }}"
                        class="nav-link {{ Request::is('main/view-all-corporateoffice') ? 'active' : '' }}">
                        <i class="fa-regular fa-building"></i>
                        <p>Corporate Office</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/view-all-our-businesses-and-subsidiaries') }}"
                        class="nav-link {{ Request::is('main/view-all-our-businesses-and-subsidiaries') ? 'active' : '' }}">
                        <i class="fa-solid fa-briefcase"></i>
                        <p>Our Businesses and Subsidiaries</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/view-all-our-companies') }}"
                        class="nav-link {{ Request::is('main/view-all-our-companies') ? 'active' : '' }}">
                        <i class="fa-solid fa-city"></i>
                        <p>Our Company</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/view-all-runningCredits') }}"
                        class="nav-link {{ Request::is('main/view-all-runningCredits') ? 'active' : '' }}">
                        <i class="fa-solid fa-bullhorn"></i>
                        <p>Running Credits</p>
                    </a>
                </li>
                <br>
                <li class="nav-header">METRICS</li>
                <li class="nav-item ">
                    <a href="{{ url('main/total-visits') }}"
                        class="nav-link {{ Request::is('main/total-visits') ? 'active' : '' }}">
                        <i class="fa-solid fa-flag"></i>
                        <p>Total Visits</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('main/usage') }}"
                        class="nav-link {{ Request::is('main/usage') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-line"></i>
                        <p>Usage</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/conversionRate') }}"
                        class="nav-link {{ Request::is('main/conversionRate') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-simple"></i>
                        <p>Conversion Rate</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ url('main/engagement') }}"
                        class="nav-link {{ Request::is('main/engagement') ? 'active' : '' }}">
                        <i class="fa-solid fa-diagram-project"></i>
                        <p>Engagement</p>
                    </a>
                </li>
                <br>
                @if (Auth::user()->email == 'cjzarsuelo@megawide.com.ph' ||
                        Auth::user()->email == 'tosma@megawide.com.ph' ||
                        Auth::user()->email == 'kfresnoza@megawide.com.ph' ||
                        Auth::user()->email == 'wmatias@megawide.com.ph')
                    <li class="nav-header">NOMINATION</li>
                    <li class="nav-item ">
                        <a href="{{ url('/main/individual-nominees') }}"
                            class="nav-link {{ Request::is('main/individual-nominees') ? 'active' : '' }}">
                            <i class="fa-solid fa-diagram-project"></i>
                            <p>Individual Nomination</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('/main/team-nominees') }}"
                            class="nav-link {{ Request::is('main/team-nominees') ? 'active' : '' }}">
                            <i class="fa-solid fa-diagram-project"></i>
                            <p>Team Nomination</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('award.index') }}"
                            class="nav-link {{ Request::is('main/award') ? 'active' : '' }}">
                            <i class="fa-solid fa-diagram-project"></i>
                            <p>Sigla Award Content</p>
                        </a>
                    </li>
                @endif
                <br>

                <li class="nav-item ">
                    <a href="{{ url('/logout') }}" class="nav-link ">
                        <i class="fa-solid fa-sign-out"></i>
                        <p>Logout</p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Visitors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('main/view-all-visitors-website') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Website Visitors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('main/view-all-visitors-corporate') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Corporate Office Visitors</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
