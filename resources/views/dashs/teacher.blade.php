<ul class="navbar-nav bg-gradient-gradient sidebar sidebar accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>Representative</sup></div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>
  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie"
            aria-expanded="true" aria-controls="collapseUtilitie">
            <i class="fas fa-user-graduate"></i>
            <span>GC Book</span>
        </a>
        <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Your GC Book:</h6>
                @if($gcbook_check_stat)
                    @if($gcbook_check_stat->status==0 || $gcbook_check_stat->status==1 )
                        <a class="collapse-item" href="{{ route('request_gc_book') }}">Request</a>
                    @else 
                        <a class="collapse-item" href="{{ route('addlastword', [$gcbook_check_stat->user_id]) }}">Add Last Word</a>
                        <a class="collapse-item" href="#">View GC Book</a>
                    @endif
                @else
                    <a class="collapse-item" href="{{ route('request_gc_book') }}">Request</a>
                @endif
            </div>
        </div>
    </li>

    <!-- Request management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
            aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fas fa-fw fa-book"></i>
            <span>GC Book Request</span>
        </a>
        <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage GC Book Requests:</h6>
                <a class="collapse-item" href="{{ route('viewrequest') }}">View Request</a>
            </div>
        </div>
    </li>
    <!-- -->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
</ul>
<!-- End of Sidebar -->