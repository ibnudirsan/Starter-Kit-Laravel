<div class="sidebar-menu">
    <div class="d-flex justify-content-center">
        <p class="text-mute">2022 &copy;
            <a href="https://zuramai.github.io/mazer/" target="_blank" rel="noopener noreferrer">Mazer</a>
            |
            <a href="http://" target="_blank" rel="noopener noreferrer">RumahDev Lab</a>
        </p>
    </div>
                        
    <ul class="menu">
        <li class="sidebar-title">Main Menu</li>
            <li class="sidebar-item ">
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        
            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fas fa-user-lock"></i>
                    <span>Authentication</span>
                </a>
                <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('google2fa.index') }}">Google2FA</a>
                        </li>
                </ul>
            </li>

        @can('Authorization')
            <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-folder"></i>
                        <span>Authorization</span>
                    </a>
                <ul class="submenu ">
                    @can('Admin Show')
                        <li class="submenu-item ">
                            <a href="{{ route('admin.index') }}">Data Admin</a>
                        </li>
                    @endcan

                    @can('Role Show')
                        <li class="submenu-item ">
                            <a href="{{ route('role.index') }}">Data Role</a>
                        </li>
                    @endcan

                    @can('Module Show')
                    <li class="submenu-item ">
                            <a href="{{ route('module.index') }}">Data Module</a>
                        </li>
                    @endcan
                    
                    @can('Permissions Show')
                    <li class="submenu-item ">
                        <a href="{{ route('permissions.index') }}">Data Permission</a>
                    </li>
                    @endcan
                </ul>
            </li>
        @endcan
        
        @can('Menu Customer')
            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fas fa-folder"></i>
                    <span>Data Master</span>
                </a>
                <ul class="submenu ">
                    @can('Customer Show')
                        <li class="submenu-item ">
                            <a href="{{ route('customer.index') }}">Data Customer</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan         
    </ul>
</div>