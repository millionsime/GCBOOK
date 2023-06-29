@if(Auth::User()->isAdmin())  
@include('dashs.admin_sidebar')
@endif
@if(Auth::User()->isTeacher()) 
@include('dashs.teacher') 
@endif
@if(Auth::User()->isStudent()) 
@include('dashs.student') 
@endif

   


