<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <div class="logo"><a href="{{ url('/') }}" class="simple-text logo-normal">
          SHOPINO
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('dashboard') ? "active":"" }}  ">
            <a class="nav-link" href="{{'/dashboard'}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('categories','categories/create',) ? "active":"" }}  ">
            <a class="nav-link" href="{{ url('categories')}}">
              <i class="material-icons">category</i>
              <p>categories</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('promotions','promotions/create') ? "active":"" }}">
            <a class="nav-link" href="{{ url('promotions')}}">
              <i class="material-icons">content_paste</i>
              <p>promotion</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('produits','produits/create') ? "active":"" }}">
            <a class="nav-link" href="{{ url('produits')}}">
              <i class="material-icons">collections</i>
              <p>produit</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('orders','order_completed') ? "active":"" }}">
            <a class="nav-link" href="{{ url('orders') }}">
              <i class="material-icons">content_paste</i>
              <p>orders</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('users') ? "active":"" }}">
            <a class="nav-link" href="{{ url('users') }}">
              <i class="material-icons">person</i>
              <p>users</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('logout') }}" 
            onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();">
              <i class="material-icons">logout</i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </div>