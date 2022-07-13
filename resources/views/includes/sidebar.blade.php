<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header ml-4">
            <img src="{{ asset("images/Frame.png") }}" alt="" srcset="" width="100" height="150">
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

                <li class="sidebar-item has-sub {{ (request()->is('product*') || request()->is('category*')) ? 'active':''  }}">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="shopping-bag" width="20"></i>
                        <span>Product</span>
                    </a>
                    <ul class="submenu {{ (request()->is('product*') || request()->is('category*')) ? 'active':''  }}">
                        <li>
                            <a href="{{ route("product.index") }}" class="{{ request()->is('product*') ? 'text-primary' : '' }}">Product</a>
                        </li>
                        <li>
                            <a href="{{ route("category.index") }}" class="{{ request()->is('category*') ? 'text-primary' : '' }}">Product Category</a>
                        </li>
                    </ul>

                </li>

                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="triangle" width="20"></i>
                        <span>Transaction</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="component-alert.html">All Transaction</a>
                        </li>
                    </ul>

                </li>

                <li class='sidebar-title'>Setting and user</li>

                <li class="sidebar-item  has-sub {{ request()->is('user*') ? 'active':''  }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i>
                        <span>Authentication</span>
                    </a>

                    <ul class="submenu {{ request()->is('user*') ? 'active':''  }}">

                        <li>
                            <a href="{{ route("user.index") }}" class="{{ request()->is('user*') ? 'text-primary':''  }}">User</a>
                        </li>

                        <li>
                            <a href="auth-register.html">Role Manajement</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
