@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href="  ">
            <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">Cafetería Konecta</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'Productos' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('TraductorPosNcr') }}">
                    <span class="nav-link-text ms-1">Productos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'Ventas' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('ventas') }}">
                    <span class="nav-link-text ms-1">Ventas</span>
                </a>
            </li>            
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        
    </div>
</aside>
