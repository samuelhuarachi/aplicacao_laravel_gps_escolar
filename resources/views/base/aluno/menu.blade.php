<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="glyphicon glyphicon-menu-hamburger"></span> MENU
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                @guest('student')
                    <li><a href="/"><span class="glyphicon glyphicon-arrow-left"></span> VOLTAR</a></li>
                @else
                    <li class="active">
                    <a href="{{ route('admin.index') }}">
                    <span class="glyphicon glyphicon-screenshot"></span> VAN GPS <span class="sr-only">(current)</span>
                    </a></li>
                    <!-- <li><a>Seja bem vindo(a) {{ Auth::user()->name }}</a></li> -->
                @endguest
            </ul>
            @guest('student')

            @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> MINHA CONTA</a></li>
                    <li>
                        <a href="{{ route('student.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
                            <span class="glyphicon glyphicon-log-out"></span> {{ __('SAIR') }}
                        </a>

                        <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>