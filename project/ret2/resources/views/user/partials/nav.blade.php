<div class="input-group">
  <div class="col-xs-12">
    Panel de Usuario
  </div>
</div>

<ul class="nav nav-pills nav-stacked" id="menu">
    <li {{ (Request::is('admin/dashboard') ? ' class=active' : '') }}>
        <a href="{{URL::to('user/dashboard')}}"
                >
            <i class="fa fa-home"></i><span class="hidden-sm text">
Inicio</span>
        </a>
    </li>

    <li {{ (Request::is('user/chat*') ? ' class=active' : '') }} >
        <a href="{{URL::to('user/chat')}}">
            <i class="fa fa-comments-o"></i><span
                    class="hidden-sm text"> Chat</span>
        </a>
    </li>

    <li {{ (Request::is('user/subastas*') ? ' class=active' : '') }} >
        <a href="#">
            <i class="glyphicon glyphicon-shopping-cart "></i> Subastas<span class="fa arrow"</span>
        </a>
        <ul class="nav nav-second-level collapse">
          <li {{ (Request::is('user/subasta/create') ? ' class=active' : '') }} >
              <a href="{{URL::to('user/subasta/create')}}">
                  <i class="glyphicon glyphicon-hand-right"></i><span
                          class="hidden-sm text"> Crear</span>
              </a>
          </li>
            <li {{ (Request::is('user/subastas') ? ' class=active' : '') }} >
                <a href="{{URL::to('user/subastas')}}">
                    <i class="glyphicon glyphicon-hand-right"></i><span
                            class="hidden-sm text "> Activas</span>
                </a>
            </li>
            <li {{ (Request::is('user/subasta/finalizadas') ? ' class=active' : '') }} >
                <a href="{{URL::to('user/subasta/finalizadas')}}">
                    <i class="glyphicon glyphicon-hand-right"></i><span
                            class="hidden-sm text"> Finalizadas</span>
                </a>
            </li>
            <li {{ (Request::is('user/subasta/ganadas') ? ' class=active' : '') }} >
                <a href="{{URL::to('user/subasta/ganadas')}}">
                    <i class="glyphicon glyphicon-hand-right"></i><span
                            class="hidden-sm text"> Ganadas </span>
                </a>
            </li>
        </ul>
    </li>
    <li {{ (Request::is('user/pujas*') ? ' class=active' : '') }} >
        <a href="#">
            <i class="fa fa-money "></i> Pujas<span class="fa arrow"</span>
        </a>
        <ul class="nav nav-second-level collapse">
          <li {{ (Request::is('user/pujas/auto') ? ' class=active' : '') }} >
              <a href="{{URL::to('user/pujas')}}">
                  <i class="glyphicon glyphicon-hand-right"></i><span
                          class="hidden-sm text"> Normales</span>
              </a>
          </li>
            <li {{ (Request::is('user/pujas/auto') ? ' class=active' : '') }} >
                <a href="{{URL::to('user/pujas/auto')}}">
                    <i class="glyphicon glyphicon-hand-right"></i><span
                            class="hidden-sm text "> Automáticas</span>
                </a>
            </li>
        </ul>
    </li>
    <li {{ (Request::is('user/perfil*') ? ' class=active' : '') }} >
        <a href="{{URL::to('user/perfil')}}"
                >
            <i class="fa fa-user"></i><span
                    class="hidden-sm text"> Perfil Usuario</span>
        </a>
    </li>

@if(Auth::user()->admin==1)
  <li {{ (Request::is('admin/dashboard*') ? ' class=active' : '') }} >
      <a href="{{URL::to('admin/dashboard')}}"
              >
          <i class="fa fa-user"></i><span
                  class="hidden-sm text">Modo admin</span>
      </a>
  </li>
@endif
</ul>
