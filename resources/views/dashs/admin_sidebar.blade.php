<ul class="navbar-nav bg-gradient-gradient sidebar sidebar accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>Admin</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0"> 
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('reports.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashoard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Examiner's
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Teachers</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Users:</h6>
                <a class="collapse-item" href="{{ route('users.create') }}">Add Teacher</a>
                <a class="collapse-item" href="{{ route('users.index') }}">Show All Teachers</a>
                
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
  
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
            aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fas fa-fw fa-file"></i>
            <span>Sections</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Adminstrations:</h6>
                <a class="collapse-item" href="{{ route('colleges.index') }}">Add College</a>
                <a class="collapse-item" href="{{ route('departments.index') }}">Add Department</a>
              
                
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Report
    </div>
    {{-- nav bar reports --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
            aria-expanded="true" aria-controls="collapseUtilities3">
            <i class="fas fa-fw fa-file"></i>
            <span>Reports</span>
        </a>
        <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Reports:</h6>
                <a class="collapse-item" href="{{ route('reports.index') }}">General Reports</a>
                <a class="collapse-item" href="{{ route('reports.index') }}">Analysis</a>
              
                
            </div>
        </div>
    </li>
</ul>
<!-- End of Sidebar -->