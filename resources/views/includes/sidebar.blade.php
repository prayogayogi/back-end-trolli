<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="{{ asset("assets/dist/assets/images/logo.svg") }}" alt="" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>

                <li class="sidebar-item{{ request()->is('dashboar*') ? ' active' : '' }}">
                    <a href="{{ route("dashboard.index") }}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('product*') ? 'active' : '' }}">
                    <a href="{{ route("product.index") }}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i>
                        <span>Product</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="triangle" width="20"></i>
                        <span>Components</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="component-alert.html">Alert</a>
                        </li>
                        <li>
                            <a href="component-badge.html">Badge</a>
                        </li>
                        <li>
                            <a href="component-breadcrumb.html">Breadcrumb</a>
                        </li>
                    </ul>

                </li>

                <li class='sidebar-title'>Forms &amp; Tables</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i>
                        <span>Form Elements</span>
                    </a>

                    <ul class="submenu ">

                        <li>
                            <a href="form-element-input.html">Input</a>
                        </li>

                        <li>
                            <a href="form-element-input-group.html">Input Group</a>
                        </li>

                        <li>
                            <a href="form-element-select.html">Select</a>
                        </li>

                        <li>
                            <a href="form-element-radio.html">Radio</a>
                        </li>

                        <li>
                            <a href="form-element-checkbox.html">Checkbox</a>
                        </li>

                        <li>
                            <a href="form-element-textarea.html">Textarea</a>
                        </li>

                    </ul>

                </li>

                <li class="sidebar-item  ">
                    <a href="form-layout.html" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i>
                        <span>Form Layout</span>
                    </a>
                </li>

                <li class='sidebar-title'>Pages</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i>
                        <span>Authentication</span>
                    </a>

                    <ul class="submenu ">

                        <li>
                            <a href="auth-login.html">Login</a>
                        </li>

                        <li>
                            <a href="auth-register.html">Register</a>
                        </li>

                        <li>
                            <a href="auth-forgot-password.html">Forgot Password</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
