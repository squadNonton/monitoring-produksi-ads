<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('dasbor')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
<<<<<<< HEAD
            <a class="nav-link collapsed" data-bs-target="#produksi-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Produksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="produksi-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                {{-- sidebar --}}
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
=======
            <a class="nav-link collapsed" href="{{route('masterbaseprice')}}">
                <i class="bi bi-cash-stack"></i>
                <span>Master Base Price</span>
>>>>>>> 03d62cb793a0ba8c619e1de078e0080d0e727667
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
