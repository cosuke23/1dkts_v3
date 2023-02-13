<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <style type="text/css">


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


.toggle span {
  width:100%;
  height:3px;
  background:#555;
  display:block;
  position:relative;
  coursor:pointer;
}

.toggle span:before,
.toggle span:after {
  content:'';
  position:absolute;
  left:0;
  width:100%;
  height:100%;
  background:#555;
  transition: all 0.3s ease-out;
}

.toggle span:before {
  top:-8px;
}

.toggle span:after {
  top:8px;
}

.toggle span.toggle {
  background:transparent;
}

.toggle span.toggle:before {
  top:0;
  transform:rotate(-45deg);
  background:#4CAF50;

}

.toggle span.toggle:after {
  top:0;
  transform:rotate(45deg);
  background:#4CAF50;
}

.sidebar {
  background:#fff;
  width:155px;
  position:fixed;
  top:0;
  left:-235px;
  height:100%;
  box-shadow:0 2px 8px rgba(0,0,0,0.2);
  padding-top:90px;
  transition:all 0.3s ease-out;
}
.sidebar a, .dropdown-btn {
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}
.dropdown-container {
  display: none;
  background-color:white;
  font-size:5px;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
.sidebar ul {
  list-style:none;
}

.sidebar ul li {
  display:block;
}

.sidebar ul li a {
  padding:8px 15px;
  font-size:16px;
  color:#222;
  font-family:arial;
  text-decoration:none;
  display:block;
  position:relative;
  z-index:1;
  transition:all 0.3s ease-out;
  font-weight:500;
}

.sidebar ul li a:before {
  content:'';
  position:absolute;
  bottom:0;
  left:50%;
  right:50%;
  transform:translate(-50%,-50%);
  width:0;
  height:1px;
  background:#4CAF50;
  z-index:-1;
  transition:all 0.3s ease-out;
}

.sidebar ul li a:hover:before {
  width:100%;
}

.sidebar ul li a:hover {
  color:#4CAF50;
}

.sidebarshow {
  left:0;
}
ul.right{
    float: right;
}

/*input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

 Style the submit button
input[type=submit] {
  background-color: #04AA6D;
  color: white;
}*/

/* Style the container for inputs */
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

.navbar{
  background-color:#222;
  border:1px solid grey;
  z-index: 1;
 position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  box-shadow: 1px 1px 5px rgba(0,0,0,.5);
}

.navbar-default .navbar-nav > li > a{
  color:#fff;
  padding:15px 15px;
  outline:none;
}

.navbar-nav>li>.dropdown-menu {
  border-radius:6px;
}

.navbar-default .navbar-nav > li > a:hover{
  color:#121212;
  background-color:#fff;
}

.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
    color: #fff;
    background-color: #000;

}

.dropdown-menu>li>a:hover {
    color: #c9c3c3;
    text-decoration: none;
    background-color: #121212;
}

.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
    color: #fff;
    background-color: #d71919;
}

.dropdown-menu>li>a {
    color: #000;
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
  height: 150px;
  border: 2px dashed red;
}
  </style>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>

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
<header  style="height:50px;">
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('home') }}">
              {{ config('app.name', 'Laravel') }}
          </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tickets
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/ticket">Ticket</a></li>
            <li><a class="dropdown-item" href="audit_ticket">Audit Trails</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="completed">FInished Tickets</a></li>
          </ul>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/home">File</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/system-change">System Change </a></li>
            <li><a class="dropdown-item" href="change_order">Change Order</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Approved Request</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu"> 
   
          </a>
        
               <a  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} || {{ Auth::user()->role }}||
                                </a>


                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
       

     </ul>
    </div>
  </div>
</nav>
@endif
    @endif
    <script type="text/javascript">
        var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
    </script>
<script type="text/javascript">
  var btn = document.querySelector('.toggle');
var btnst = true;
btn.onclick = function() {
  if(btnst == true) {
    document.querySelector('.toggle span').classList.add('toggle');
    document.getElementById('sidebar').classList.add('sidebarshow');
    btnst = false;
  }else if(btnst == false) {
    document.querySelector('.toggle span').classList.remove('toggle');
    document.getElementById('sidebar').classList.remove('sidebarshow');
    btnst = true;
  }
}
</script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
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
