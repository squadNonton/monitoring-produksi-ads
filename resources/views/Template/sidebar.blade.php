<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('dasbor')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('masterbaseprice')}}">
                <i class="bi bi-cash-stack"></i>
                <span>Master Base Price</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('ppicschedule')}}">
                <i class="bi bi-calendar-check"></i>
                <span>PPIC - Schedule</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('prodoutput')}}">
                <i class="bi bi-bag-check"></i>
                <span>Production - Output</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('prodefisiensi')}}">
                <i class="bi bi-robot"></i>
                <span>Production - Efisiensi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('prodmanpower')}}">
                <i class="bi bi-person-fill-gear"></i>
                <span>Production - Man Power</span>
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
