<div class="sidebar sidebar-dark">
    <div class="nav-container">
        <ul class='nav nav-sidebar'>
            <!-- Default Menu Admin and Companies -->
            <li>
                <a href="{{ url(config('rules_route.base_sindi').'admin-empresas/admin-secction')) }}" class="@yield('current-setindi', '')"><i class="fa fa-bar-chart" data-toggle="tooltip" data-placement="right" title="Setup de Indicadores"></i>Setup Indicadores</a>
            </li>
            <li class="title-section">CONFIGURACIONES</li>
            <li>
                <a href="{{ url(config('rules_route.base_sindi').'cambiar-password') }}" class="@yield('current-pass', '')" data-toggle="tooltip" data-placement="right" title="Cambiar Contraseña"><i class="fa fa-lock"></i>Cambiar Contraseña</a>
            </li>
            <li>
                <a href="{{ url(config('rules_route.base_sindi').'logout') }}" data-toggle="tooltip" data-placement="right" title="Logout"><i class="fa fa-sign-out"></i>Logout<br><small>{{ auth()->user()->name }}</small></a>
            </li>
        </ul>
    </div>
</div>