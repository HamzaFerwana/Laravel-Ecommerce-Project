        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ url('http://127.0.0.1:8000/admin') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSliders"
                    aria-expanded="true" aria-controls="collapseSliders">
                    <i class="fas fa-sliders-h"></i>
                    <span>Sliders</span>
                </a>
                <div id="collapseSliders" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.sliders.index') }}">Show All</a>
                        <a class="collapse-item" href="{{ route('admin.sliders.create') }}">Add New</a>
                        <a class="collapse-item" href="{{ route('admin.sliders-bg-image') }}">Change BG Image</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout"
                    aria-expanded="true" aria-controls="collapseAbout">
                    <i class="fas fa-info-circle"></i>
                    <span>About</span>
                </a>
                <div id="collapseAbout" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.about.index') }}">Show All</a>
                        <a class="collapse-item" href="{{ route('admin.about.create') }}">Add New</a>
                    </div>
                </div>
            </li>

                     <!-- Divider -->
                     <hr class="sidebar-divider">
                     <!-- Nav Item - Pages Collapse Menu -->
                     <li class="nav-item">
                         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                             aria-expanded="true" aria-controls="collapseProducts">
                             <i class="fas fa-tags"></i>
                             <span>Products</span>
                         </a>
                         <div id="collapseProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                             <div class="bg-white py-2 collapse-inner rounded">
                                 <a class="collapse-item" href="{{ route('admin.products.index') }}">Show All</a>
                                 <a class="collapse-item" href="{{ route('admin.products.create') }}">Add New</a>
                             </div>
                         </div>
                     </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
