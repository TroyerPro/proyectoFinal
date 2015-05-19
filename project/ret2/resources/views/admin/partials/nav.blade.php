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
    <li {{ (Request::is('admin/news*') ? ' class=active' : '') }}>
        <a href="#">
            <i class="glyphicon fa fa-columns"></i> Categorias <span
                    class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse">
            <li {{ (Request::is('admin/newscategory') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/newscategory')}}">
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text"> Todas </span>
                </a>
            </li>
        </ul>
    </li>
    <li {{ (Request::is('user/subastas*') ? ' class=active' : '') }} >
        <a href="#">
            <i class="glyphicon glyphicon-user"></i> Subastas<span class="fa arrow"</span>
        </a>
        <ul class="nav nav-second-level collapse">
            <li {{ (Request::is('admin/subastas') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/subastas')}}">
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text">Activas</span>
                </a>
            </li>
            <li {{ (Request::is('admin/subasta') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/subasta/finalizadas')}}">
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text">Finalizadas</span>
                </a>
            </li>
        </ul>
    </li>
    <li {{ (Request::is('admin/users*') ? ' class=active' : '') }} >
        <a href="{{URL::to('admin/users')}}"
                >
            <i class="glyphicon glyphicon-user"></i><span
                    class="hidden-sm text"> Users</span>
        </a>
    </li>
    <li {{ (Request::is('admin/site*') ? ' class=active' : '') }} >
        <a href="{{URL::to('admin/site/config')}}"
                >
            <i class="glyphicon glyphicon glyphicon-cog"></i><span
                    class="hidden-sm text">Conf. Subasta</span>
        </a>
    </li>
    <li {{ (Request::is('admin/estadisticas*') ? ' class=active' : '') }} >
        <a href="{{URL::to('admin/estadisticas')}}"
                >
            <i class="glyphicon glyphicon glyphicon-cog"></i><span
                    class="hidden-sm text">Estadísticas</span>
        </a>
    </li>
</ul>
