

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('/')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-articulo" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Articulos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-articulo" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('articulos')}}">
              <i class="bi bi-circle"></i><span>Crear</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-venta" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>VENTAS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-venta" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('ventas')}}">
              <i class="bi bi-circle"></i><span>Facturar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
   
    </ul>