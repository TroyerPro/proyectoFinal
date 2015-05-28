<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--    <a class="navbar-brand" href="{!! URL::to('/') !!}"> <img src="{{ asset('img/logomini.png') }}" /></a>-->
            <a class="navbar-brand" href="{!! URL::to('/') !!}"><img class="logo" src="{{ URL::asset('img/logomini.png') }}"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="{{ (Request::is('/') ? 'active' : '') }}">
                  <a href="{!! URL::to('/') !!}"><i class="fa fa-home"></i> Inicio</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-expanded="false"><i class="fa fa-search"></i> Buscar</a>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="{!! URL::to('search/subasta') !!}"><i class="glyphicon glyphicon-euro"></i> Subasta</a>
                    </li>
                    <li>
                      <a href="{!! URL::to('search/user') !!}"><i class="fa fa-user"></i> Usuario</a>
                    </li>
                  </ul>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li class="{{ (Request::is('auth/login') ? 'active' : '') }}"><a href="{!! URL::to('auth/login') !!}"><i
                                    class="fa fa-sign-in"></i> Entrar</a></li>
                    <li class="{{ (Request::is('auth/register') ? 'active' : '') }}"><a
                                href="{!! URL::to('auth/register') !!}">Registro</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name }} <i
                                    class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::check())
                                @if(Auth::user()->admin==1)
                                    <li>
                                        <a href="{!! URL::to('admin/dashboard') !!}"><i class="fa fa-th"></i> Panel general</a>
                                    </li>
                                @else
                                  <li>
                                      <a href="{!! URL::to('user/dashboard') !!}"><i class="fa fa-th"></i> Panel general</a>
                                  </li>
                                @endif
                                <li role="presentation" class="divider"></li>
                            @endif
                            <li>
                                <a href="{!! URL::to('auth/logout') !!}"><i class="fa fa-sign-out"></i> Desconectarte</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
