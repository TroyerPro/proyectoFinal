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

    <li {{ (Request::is('user/chat*') ? ' class=active' : '') }} >
        <a href="{{URL::to('user/chat')}}"
                >
            <i class="glyphicon glyphicon-user"></i><span
                    class="hidden-sm text">Chat</span>
        </a>
    </li>

    <li {{ (Request::is('user/subastas*') ? ' class=active' : '') }} >
        <a href="#">
            <i class="glyphicon glyphicon-user"></i> Subastas<span class="fa arrow"</span>
        </a>
        <ul class="nav nav-second-level collapse">
            <li {{ (Request::is('admin/newscategory') ? ' class=active' : '') }} >
                <a href="{{URL::to('user/subastas')}}">
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text">Ver</span>
                </a>
            </li>
            <li {{ (Request::is('admin/newscategory') ? ' class=active' : '') }} >
                <a href="{{URL::to('user/subasta/create')}}">
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text">Crear</span>
                </a>
            </li>
            <li {{ (Request::is('admin/newscategory') ? ' class=active' : '') }} >
                <a href="{{URL::to('user/subasta/ganadas')}}">
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text">Ganadas </span>
                </a>
            </li>
        </ul>
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
