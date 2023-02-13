@extends('layouts.app')

@section('content')
@php 
$selected_items_array=[];
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route(env("REGISTER_ROUTE")) }}" id="register_form" name="register_form">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Fullname') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>



                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                               <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Establishment') }}</label>

                            <div class="col-md-6">
                               <select class="form-control " name="establishment" >
                                   
                                    <option disabled>Choose Establishment </option>
     @php
       $data_e = DB::select(DB::raw("SELECT * from establishments"));
   @endphp
  @foreach($data_e as $key => $datas_e)
 <option value="{{$datas_e->establishment_name}}">{{$datas_e->establishment_name}}</option>
@endforeach
</select>



                                @error('establishment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

  <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Company Role') }}</label>

                            <div class="col-md-6">
<select class="form-control" list="datalistOptions" id="exampleDataList" name="role" >

  <option disabled>Choose Company Role </option>
     @php
       $data = DB::select(DB::raw("SELECT * from company_roles"));
   @endphp
  @foreach($data as $key => $datas)
 <option value="{{$datas->company_role}}">{{$datas->company_role}}</option>
@endforeach
</select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="password" id="psw" onkeyup='check();'name="password" class="form-control" required><button class="btn btn-outline-dark" type="button"
                                                    id="showPassword" name="showPassword"> <i class="far fa-eye" style="font-size:20px" id="togglePassword1" ></i></button>
                                    <!-- <button class="btn btn-outline-dark" type="button" id="showPasswordReset" name="showPassword"><i class="fa fa-solid fa-eye"></i></button> -->
                                    
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id="message">
  
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="special" class="invalid">A <b>Special Character</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
                            </div>
                            
                        </div>
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="txtConfirmPassword" type="password" onkeyup='check();' class="form-control" name="password_confirmation" required autocomplete="new-password"><button class="btn btn-outline-dark" type="button"
                                                    id="showPassword" name="showPassword"> <i class="far fa-eye" style="font-size:20px" id="togglePassword" ></i></button>
                                   
                                </div>
                            </div>
                            <center>
                           <div class="registrationFormAlert" id="divCheckPasswordMatchs"><span id='messages'></span></div>
                        </center>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>

<script type="text/javascript">


      const togglePassword1 = document.querySelector('#togglePassword1');
  const password1 = document.querySelector('#psw');

  togglePassword1.addEventListener('click', function (e) {
    // toggle the type attribute
    const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type1);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>

<script type="text/javascript">


      const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#txtConfirmPassword');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
</script>
<script src='//cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js'>
</script>
<script src="//cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">
</script>
<script type="text/javascript">
//     $(function() {
//     $("#txtConfirmPassword").keydown(function() {
//         alert('Here');
//         var password = $("#psw").val();
//         $("#divCheckPasswordMatchs").html(password == $(this).val() ? "Passwords match." : "Passwords do not match!");
//     });

// });

$('form').validate();

$('#psw, #txtConfirmPassword').on('keyup', function() {
    var passw=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if($('#psw').val().match(passw)) 
{ 
// alert('Correct, try another...')
// return true;
  if ($('#psw').val() == $('#txtConfirmPassword').val()) {
    $('#messages').html('Password Valid').css('color', 'green');
    $('#submit').prop('disabled', false);
  } else {
    $('#messages').html('Password did not Match!').css('color', 'red');
    $('#submit').prop('disabled', true);
  }
} else {
    $('#messages').html('Password Is invalid!').css('color', 'red');
    $('#submit').prop('disabled', true);
  }
});
</script>
<script type="text/javascript">

var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var special = document.getElementById("special");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }
  var special_char=/[!\@\$\%\^\&\*\(\)\_\-\?\=\+\<\>\.\,]/g;
   if (myInput.value.match(special_char)) {  
   special.classList.remove("invalid");
    special.classList.add("valid");
  } else {
    special.classList.remove("valid");
    special.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
@endsection
