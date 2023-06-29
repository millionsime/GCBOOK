<ul class="navbar-nav bg-gradient-gradient sidebar sidebar accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>Instructor</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0"> 
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
   

    <!-- Divider -->
    <hr class="sidebar-divider">
  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie"
            aria-expanded="true" aria-controls="collapseUtilitie">
            <i class="fas fa-user-graduate"></i>
            <span>Students</span>
        </a>
        <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Candidates:</h6>
                <a class="collapse-item" href="{{ route('add_stud.index') }}">Add Students</a>
                <a class="collapse-item" href="{{ route('resetstud') }}">Reset Password</a>
                
            </div>
        </div>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Exam's
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('exams.create') }}" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-book-open"></i>
            <span>Exam's</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Exams:</h6>
                <a class="collapse-item" href="{{ route('exams.index') }} ">Exams</a>
                <a class="collapse-item" href="{{ route('exams.create') }}">Add Exam</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-school"></i>
            <span>Question's</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Questions:</h6>
                <a class="collapse-item" href="{{ route('questions.index') }}">All questions</a>
                <a class="collapse-item" href="{{ route('questions.create') }}">Add Question</a>
                <!--<a class="collapse-item" href="{{ route('questions_options.index') }}">Question Options</a>-->
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
            aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="	fas fa-award"></i>
            <span>Result</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Reports:</h6>
                <a class="collapse-item" href="{{ route('results.index') }}">Exam result</a>
                <a class="collapse-item" href="{{ route('results.create') }}">Analysis</a>
                
                
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="profiles">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>
    <!-- Heading -->
   


</ul>
<!-- End of Sidebar -->