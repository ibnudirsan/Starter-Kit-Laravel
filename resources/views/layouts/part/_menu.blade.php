<div class="sidebar-menu">
    <div class="d-flex justify-content-center">
        <p class="text-mute">2021 &copy; Mazer</p>
    </div>
                        
    <ul class="menu">
        <li class="sidebar-title">Main Menu</li>
            <li class="sidebar-item ">
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        
        @can('Master Auth')
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fas fa-folder"></i>
                    <span>Authorization</span>
                </a>
                <ul class="submenu ">
                    @can('Admin')
                        <li class="submenu-item ">
                            <a href="{{ route('admin.index') }}">Data Admin</a>
                        </li>
                    @endcan

                    @can('Role')
                        <li class="submenu-item ">
                            <a href="{{ route('role.index') }}">Data Role</a>
                        </li>
                    @endcan

                    @can('Module')
                    <li class="submenu-item ">
                            <a href="{{ route('module.index') }}">Data Module</a>
                        </li>
                    @endcan
                    
                    @can('Permissions')
                    <li class="submenu-item ">
                        <a href="{{ route('permissions.index') }}">Data Permission</a>
                    </li>
                    @endcan
                </ul>
            </li>
        @endcan
                            
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
    </ul>
</div>