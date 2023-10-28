<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if(Route::currentRouteName()=='dasbor') active @endif" href="{{route('dasbor')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if(Route::currentRouteName()=='produksi') active @endif" href="{{route('produksi')}}">
                <i class="bi bi-grid"></i>
                <span>Produksi</span>
            </a>
        </li>

    </ul>

</aside>
