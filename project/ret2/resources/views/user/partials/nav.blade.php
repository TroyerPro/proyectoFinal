<div class="input-group">
    <input type="text" class="form-control" placeholder="Buscar...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">
            <i class="fa fa-search"></i>
        </button>
      </span>
</div>


<ul class="nav nav-pills nav-stacked" id="menu">
    <li {{ (Request::is('admin/dashboard') ? ' class=active' : '') }}>
        <a href="{{URL::to('admin/dashboard')}}"
                >
            <i class="fa fa-dashboard fa-fw"></i><span class="hidden-sm text">
Inicio</span>
        </a>
    </li>
    <li {{ (Request::is('user/subastas*') ? ' class=active' : '') }} >
        <a href="{{URL::to('user/subastas')}}"
                >
            <i class="glyphicon glyphicon-user"></i><span
                    class="hidden-sm text"> Subastas</span>
        </a>
    </li>
    <li {{ (Request::is('user/pujas*') ? ' class=active' : '') }} >
        <a href="{{URL::to('user/pujas')}}"
                >
            <i class="glyphicon glyphicon-user"></i><span
                    class="hidden-sm text"> Pujas</span>
        </a>
    </li>
    <li {{ (Request::is('user/perfil*') ? ' class=active' : '') }} >
        <a href="{{URL::to('user/perfil')}}"
                >
            <i class="glyphicon glyphicon-user"></i><span
                    class="hidden-sm text"> Perfil Usuario</span>
        </a>
    </li>
</ul>
