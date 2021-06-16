@if(session('user'))
<h3 style ="color:green"> Hello {{session('user')}} welcome to our website</h3>
@endif