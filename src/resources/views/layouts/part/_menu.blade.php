<div class="sidebar-menu">
    <div class="d-flex justify-content-center">
        <p class="text-mute">2022 &copy;
            <a href="https://zuramai.github.io/mazer/" target="_blank" rel="noopener noreferrer">Mazer</a>
            |
            <a href="http://" target="_blank" rel="noopener noreferrer">Raungdev Lab</a>
        </p>
    </div>
                        
    <ul class="menu">
        <li class="sidebar-title">Main Menu</li>
        <li class="sidebar-item {{ Route::is('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        
            <li class="sidebar-item {{ Route::is('google2fa.index','password.confirm') ? 'active' : '' }} has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fas fa-user-lock"></i>
                    <span>Authentication</span>
                </a>
                <ul class="submenu {{ Route::is('google2fa.index','password.confirm') ? 'active' : '' }}">
                        <li class="submenu-item {{ Route::is('google2fa.index','password.confirm') ? 'active' : '' }}">
                            <a href="{{ route('google2fa.index') }}">Google2FA</a>
                        </li>
                </ul>
            </li>

        @can('Menu Logs')
            <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-folder"></i>
                        <span>Master Logs</span>
                    </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="{{ route('log-viewer.index') }}" target="_blank" class='sidebar-link'>
                            <i class="fas fa-clipboard-list"></i>
                            <span>Logs View</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @can('Authorization')
        <li class="sidebar-item {{ Route::is('admin.*', 'role.*', 'module.*', 'permissions.*') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-folder"></i>
                        <span>Authorization</span>
                    </a>
                <ul class="submenu {{ Route::is('admin.*', 'role.*', 'module.*', 'permissions.*') ? 'active' : '' }}">
                    @can('Admin Show')
                        <li class="submenu-item {{ Route::is('admin.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.index') }}">Data Admin</a>
                        </li>
                    @endcan

                    @can('Role Show')
                        <li class="submenu-item {{ Route::is('role.*') ? 'active' : '' }}">
                            <a href="{{ route('role.index') }}">Data Role</a>
                        </li>
                    @endcan

                    @can('Module Show')
                    <li class="submenu-item {{ Route::is('module.*') ? 'active' : '' }}">
                            <a href="{{ route('module.index') }}">Data Module</a>
                        </li>
                    @endcan
                    
                    @can('Permissions Show')
                    <li class="submenu-item {{ Route::is('permissions.*') ? 'active' : '' }}">
                        <a href="{{ route('permissions.index') }}">Data Permission</a>
                    </li>
                    @endcan
                </ul>
            </li>
        @endcan
        
        @can('Menu Customer')
            <li class="sidebar-item {{ Route::is('customer.*') ? 'active' : '' }} has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fas fa-folder"></i>
                    <span>Data Master</span>
                </a>
                <ul class="submenu {{ Route::is('customer.*') ? 'active' : '' }}">
                    @can('Customer Show')
                        <li class="submenu-item {{ Route::is('customer.*') ? 'active' : '' }}">
                            <a href="{{ route('customer.index') }}">Data Customer</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan         
    </ul>
</div>