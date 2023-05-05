<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/novels') || Request::is('dashboard/novels/*') ? 'active' : '' }}"
                    href="/dashboard/novels">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Novels
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/authors') || Request::is('dashboard/authors/*') ? 'active' : '' }}"
                    href="/dashboard/authors">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Authors
                </a>
            </li>
        </ul>
    </div>
</nav>
