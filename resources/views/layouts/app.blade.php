<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <style type="text/css">
      /* 12 */
.btn-12{
  background: white;
  position: relative;
  margin-left: 10px;
  right: 20px;
  bottom: 20px;
  border:none;
  box-shadow: none;
  width: 130px;
  height: 40px;
  line-height: 42px;
  -webkit-perspective: 230px;
  perspective: 230px;
}
.btn-12 span {
  background: rgb(0,172,238);
background: linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%);
  display: block;
  position: absolute;
  width: 130px;
  height: 40px;
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  border-radius: 5px;
  margin:0;
  text-align: center;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all .3s;
  transition: all .3s;
}
.btn-12 span:nth-child(1) {
  box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001;
  -webkit-transform: rotateX(90deg);
  -moz-transform: rotateX(90deg);
  transform: rotateX(90deg);
  -webkit-transform-origin: 50% 50% -20px;
  -moz-transform-origin: 50% 50% -20px;
  transform-origin: 50% 50% -20px;
}
.btn-12 span:nth-child(2) {
  -webkit-transform: rotateX(0deg);
  -moz-transform: rotateX(0deg);
  transform: rotateX(0deg);
  -webkit-transform-origin: 50% 50% -20px;
  -moz-transform-origin: 50% 50% -20px;
  transform-origin: 50% 50% -20px;
}
.btn-12:hover span:nth-child(1) {
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  -webkit-transform: rotateX(0deg);
  -moz-transform: rotateX(0deg);
  transform: rotateX(0deg);
}
.btn-12:hover span:nth-child(2) {
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
 color: transparent;
  -webkit-transform: rotateX(-90deg);
  -moz-transform: rotateX(-90deg);
  transform: rotateX(-90deg);
}


/*login*/
html {
  height: 100%;
}
login-body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#141e30, #243b55);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 500px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
  font-family: "Times New Roman", Times, serif;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 80%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

/*end login*/

body {
  background:#e1e1e1;
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif;
}

.header {
  background:#fff;
  box-shadow:0 2px 5px rgba(0,0,0,0.2);
  padding: 15px 20px;
  width:100%;
  position:fixed;
  top:0;
  left:0;
  z-index:9;
}

.containers {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "/";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "X";
}
#indicator{
    width:20px;
    height:20px;
    display:block;
    border-radius:10px;
}
.green{
    background-color:green;
    display:block;
}
.red{
    background-color:red;
    display:block;
}
 .dropzone {
            background: #e3e6ff;
            border-radius: 13px;
            max-width: 550px;
            margin-left: auto;
            margin-right: auto;
            border: 2px dotted #1833FF;
            margin-top: 50px;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #9C27B0;
            color: white;
            text-align: center;
        }

      @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600&display=swap');

*,::after,::before {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}



/* MAIN STYLE */

.cards {
    width: 400px;
    height: auto;
    padding: 15px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    border-radius: 5px;
    overflow: hidden;
    background: #fafbff;
}

.cards .tops {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.cards p {
    font-size: 0.9rem;
    font-weight: 600;
    color: #878a9a;
}

.cards button {
    outline: 0;
    border: 0;
        -webkit-appearence: none;
  background: #5256ad;
  color: #fff;
  border-radius: 4px;
  transition: 0.3s;
  cursor: pointer;
  font-weight: 400;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  font-size: 0.8rem;
  padding: 8px 13px;
}

.cards button:hover {
  opacity: 0.8;
}

.cards button:active {
  transform: translateY(5px);
}

.cards .drag-area {
  width: 100%;
  height: 160px;
  border-radius: 5px;
  border: 2px dashed #d5d5e1;
  color: #c8c9dd;
  font-size: 0.9rem;
  font-weight: 500;
  position: relative;
  background: #dfe3f259;
  display: flex;
  justify-content: center;
  align-items: center;
  user-select: none;
  -webkit-user-select: none;
  margin-top: 10px;
}

.cards .drag-area .visible {
  font-size: 18px;
}
.cards .select {
    color: #5256ad;
  margin-left: 5px;
  cursor: pointer;
  transition: 0.4s;
}

.cards .select:hover {
  opacity: 0.6;
}

.cards .containers {
  width: 100%;
  height: auto;
  display: flex;
  justify-content: flex-start;
  align-items: flex-start;
  flex-wrap: wrap;
  max-height: 200px;
  overflow-y: auto;
  margin-top: 10px;
}

.cards .containers .image {
  width: calc(26% - 19px);
  margin-right: 15px;
  height: 75px;
  position: relative;
  margin-bottom: 8px;
}

.cards .containers .image img {
  width: 100%;
  height: 100%;
  border-radius: 5px;
}

.cards .containers .image span {
  position: absolute;
  top: -2px;
  right: 9px;
  font-size: 20px;
  cursor: pointer;
}
.cards .drag-area.dragover {
  background: rgba(0, 0, 0, 0.4);
}

.cards .drag-area.dragover .on-drop {
  display: inline;
  font-size: 28px;
}

.cards input,
.cards .drag-area .on-drop,
.cards .drag-area.dragover .visible {
  display: none;
}



#t_container {
  display: flex;                  /* establish flex container */
  flex-direction: row;            /* default value; can be omitted */
  flex-wrap: nowrap;              /* default value; can be omitted */
  justify-content: space-between; /* switched from default (flex-start, see below) */
  background-color: lightyellow;
}
#t_container > div {
  width: 150px;
  height: 60px;
  border: 2px dashed red;
}
     .outerDiv {
                color: #fff;
                width: 600px;
                height: 200px;
                padding: 5px;
            }
            .leftDiv {
                color: #000;
                width: 50%;
                height: 80px;
                float: left;
            }
            .rightDiv {
                color: #000;
                width: 50%;
                height: 80px;
                float: right;
            }


/*two columns*/
.outerDiv2 {
/*                background-color: #006699;*/
                color: #fff;
                width: 100%;
                height: 100%;
                padding: 5px;
            }
            .leftDiv2 {
               
                color: #000;
                width: 59%;
                height: 100%;
                float: left;
            }
            .rightDiv2 {
            
                color: #000;
                width: 39%;
                height: 100%;
                float: right;
            }
            .outerDiv3 {
                color: #fff;
                width: 100%;
                height: 100%;
                padding: 5px;
            }
            .leftDiv3 {
                color: #000;
                width: 29%;
                height: 100%;
                float: left;
            }
            .rightDiv3 {
            
                color: #000;
                width: 69%;
                height: 100%;
                float: right;
            }
            .centerdiv {
            
                color: #000;
                width: 100%;
                height: 100%;
                float: right;
            }
            .centerdiv2 {
            
                color: #000;
                width: 100%;
                height: 100%;
                float: right;
            }
             
            .dataTables_filter {
display: none;
}
.tdbreak {
  word-break: break-all
}
div.ex3 {
/* background-color: lightblue;*/
  height: 360px;
  width: 100%;
  overflow-y: scroll;
}

  </style>
 <!-- Multiple dropdown -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <!-- multiple Drop down End -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  

      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8"> 
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
      <!-- Scripts -->
      <link rel="shortcut icon" href="{{ asset('upload/ticket.png') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
     <script src="{{ asset('js/issue.js') }}"></script>
</head>
<body>

@if (Auth::user() !='')
 @if  (!empty(Auth::user()->email_verified_at))
<header  style="height:50px;" >
   <nav class="navbar navbar-expand-sm" style="background-color:#3C9ACD;">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('home') }}">
          
          </a>
      
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="color:white;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tickets
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item"  href="/ticket">Ticket</a></li>
              @if (Auth::user()->role!="Hospital Staff")
            <li><a class="dropdown-item" href="/system-change">System Change </a></li>
            @endif
            <li><hr class="dropdown-divider"></li>
         <li><a class="dropdown-item" href="completed">Closed Tickets</a></li>
            <!-- <li><hr class="dropdown-divider"></li> -->
          
            
          </ul>
        </li>
          
  
               <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" style="color:white;" data-bs-toggle="dropdown" aria-expanded="false">
            FILES
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/home">Upload File</a></li>
          </ul>
        </li>
   @if (Auth::user()->role!="Hospital Staff")
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" style="color:white;" data-bs-toggle="dropdown" aria-expanded="false">
            LINKS
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/link">Upload Link</a></li>
          
          </ul>
        </li>
@endif
@if (Auth::user()->role=="Super Admin")
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" style="color:white;" data-bs-toggle="dropdown" aria-expanded="false">
           User Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="project_manager">Department Head</a></li>
            <li><a class="dropdown-item" href="project_name">Project Name</a></li>
            <li><a class="dropdown-item" href="company_role">Company Role</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="establishment">Establishment</a></li>
            <li><a class="dropdown-item" href="company_users">User's List</a></li>
          </ul>
        </li>
                 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" style="color:white;" data-bs-toggle="dropdown" aria-expanded="false">
            Audit Trails
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <li><a class="dropdown-item" href="audit_ticket">Ticket Audit Trails</a></li>
              <li><a class="dropdown-item" href="audit_link">Links Audit Trails</a></li>
            <li><a class="dropdown-item" href="audit_file">File Audit Trails</a></li>
          </ul>
        </li>
@endif
      </ul>


     <!-- <a  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a> -->
                                 
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">                
                 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="color:white;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         <i class="far fa-user-circle" aria-hidden="true" style="font-size:15px;"> {{ Auth::user()->name }} </i> 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a></li>
          </ul>
        </li>
</ul>
                                 

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
    </div>
  </div>
</nav>
@endif
    @endif
   
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js">
      document.querySelectorAll('.dropdown-toggle').forEach(item => {
  item.addEventListener('click', event => {
 
    if(event.target.classList.contains('dropdown-toggle') ){
      event.target.classList.toggle('toggle-change');
    }
    else if(event.target.parentElement.classList.contains('dropdown-toggle')){
      event.target.parentElement.classList.toggle('toggle-change');
    }
  })
});
    </script>
<script type="text/javascript">
    function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<script type="text/javascript">
$(document).ready(function () {
  $('#myTable').DataTable();
  $('.dataTables_length').addClass('bs-select');
});</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
