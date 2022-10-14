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
                            
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fas fa-folder"></i>
                <span>Authorization</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{ route('admin.index') }}">Data Admin</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{ route('role.index') }}">Data Role</a>
                </li>
                <li class="submenu-item ">
                    <a href="#">Data Module</a>
                </li>
                <li class="submenu-item ">
                    <a href="#">Data Permission</a>
                </li>
            </ul>
        </li>
                            
        <li class="sidebar-item has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fas fa-folder"></i>
                <span>Data Master</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{ route('customer.index') }}">Data Customer</a>
                </li>
            </ul>
        </li>            
    </ul>
</div>