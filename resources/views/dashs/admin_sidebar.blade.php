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
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Heading -->
   

    <!-- Nav Item - Pages Collapse Menu -->
   

    <!-- Nav Item - Utilities Collapse Menu -->
  
    
    <!-- LastWords -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
            aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fas fa-fw fa-file"></i>
            <span>GC Book</span>
        </a>
        <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Lastwords:</h6>
                <a class="collapse-item" href="{{ route('prelastword') }}">Add Lastword</a>
                <h6 class="collapse-header">Manage GC Book Requests:</h6>
                <a class="collapse-item" href="{{ route('adminviewrequest') }}">View Request</a>
            </div>
        </div>
    </li>
    <!-- -->

    <!-- Divider -->
</ul>
<!-- End of Sidebar -->