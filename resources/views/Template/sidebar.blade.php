<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('dasbor')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#produksi-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Produksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="produksi-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('prodin')}}" class="active">
                        <i class="bi bi-circle"></i><span>Produksi IN</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('prodout')}}">
                        <i class="bi bi-circle"></i><span>Produksi OUT</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('effmachine')}}">
                        <i class="bi bi-circle"></i><span>Effisiensi Machine</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('actmanpower')}}">
                        <i class="bi bi-circle"></i><span>Activity Man Power</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-grid"></i>
                <span>Man Power</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-grid"></i>
                <span>Machine</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link @if(Route::currentRouteName()=='produksi') active @endif" href="{{route('produksi')}}">
                <i class="bi bi-grid"></i>
                <span>Produksi</span>
            </a>
        </li> --}}

    </ul>

</aside>
