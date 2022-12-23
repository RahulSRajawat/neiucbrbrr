<ul class="navbar-nav iq-main-menu" id="sidebar-menu">
    <li class="nav-item static-item">
        <a class="nav-link static-item disabled" href="#" tabindex="-1">
            <span class="default-icon">Home</span>
            <span class="mini-icon">-</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ url('admin/dashboard') }}">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4"
                        d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                        fill="currentColor"></path>
                </svg>
            </i>
            <span class="item-name">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ url('admin/users') }}">
            <i class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </i>
            <span class="item-name">Users</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ url('admin/pending-users') }}">
            <i class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </i>
            <span class="item-name">Pending Users</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ url('admin/user-login-history') }}">
            <i class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-clock">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
            </i>
            <span class="item-name">Users Login History</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ url('admin/all-products') }}">
            <i class="icon">
                <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.7729 9.30504V6.27304C15.7729 4.18904 14.0839 2.50004 12.0009 2.50004C9.91694 2.49104 8.21994 4.17204 8.21094 6.25604V6.27304V9.30504"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    </path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.7422 21.0004H7.25778C4.90569 21.0004 3 19.0954 3 16.7454V11.2294C3 8.87937 4.90569 6.97437 7.25778 6.97437H16.7422C19.0943 6.97437 21 8.87937 21 11.2294V16.7454C21 19.0954 19.0943 21.0004 16.7422 21.0004Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    </path>
                </svg>
            </i>
            <span class="item-name">All Products</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('all-invoice.index') }}">
            <i class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                    <path
                        d="M20 8H4V6h16m0 12H4v-6h16m0-8H4c-1.11 0-2 .89-2 2v12c0 1.105.895 2 2 2h16c1.105 0 2-.895 2-2V6c0-1.11-.898-2-2-2M7 22h2v2H7v-2m4 0h2v2h-2v-2m4 0h2v2h-2Zm0 0"
                        fill="currentColor" />
                </svg>
            </i>
            <span>Invoice</span>
        </a>
    </li>
    <li>
        <hr class="hr-horizontal">
    </li>
    @php
     $prepaid = "prepaid";   
    @endphp 
    <li class="nav-item">
        <a class="nav-link"  href="{{ route('recharge-plan.index') }}" role="button">
            <i class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                    <path
                        d="M8.25 3A2.26 2.26 0 0 0 6 5.25v13.5A2.26 2.26 0 0 0 8.25 21h7.5A2.26 2.26 0 0 0 18 18.75V5.25A2.26 2.26 0 0 0 15.75 3Zm0 1.5h7.5c.418 0 .75.336.75.75v13.5c0 .418-.332.75-.75.75h-7.5a.748.748 0 0 1-.75-.75V5.25a.75.75 0 0 1 .75-.75ZM12 17.25a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5Zm0 0"
                        fill="currentColor" />
                </svg>
            </i>
            <span class="item-name">Recharges</span>
        </a>
    </li> 
    <li>
        <hr class="hr-horizontal">
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
            tabindex="-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-log-out">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
            <span class="default-icon">Logout</span>
        </a>
    </li>
</ul>
