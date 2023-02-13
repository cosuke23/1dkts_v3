@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<div class="login-box">
    <div class="row justify-content-center">
                
<body style="background: linear-gradient(#141e30, #243b55);">
                    <form method="POST" id="login" action="{{ route('login') }}">
                        @csrf

                       
                           <h2 style="">1Document Knowledgebase/Ticketing System</h2>

                            <div class="user-box">
                                <div class="input-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                 <label for="email" >Email Address</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      

                        <div class="user-box">
                          

                      
                                  <div class="input-group">
                                    <input id="password" type="password" onkeyup='check();' class="form-control" name="password" required autocomplete="new-password"><button class="btn btn-outline-light" style="height:47px;border-radius: 4px;" type="button"
                                                    id="showPassword" name="showPassword"> <i class="far fa-eye" style="font-size:20px" id="togglePassword" ></i></button>
                                     <label for="password" >Password</label>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                 
                                </div>
                            </div>
                        </div>

                        <div class="user-box">
                            <center>
                                    <input type="submit" name="" hidden>
                                <a href="#"  onclick="myFunction()">
                                
      <span></span>
      <span></span>
      <span></span>
      <span></span>
              Login
            </a>
     <div class="user-box">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">

                                        {{ __('Forgot Your Password?') }}


                                    </a>
                                @endif
                                  </div>
                        </center>
                              </div>
                              </div>
                        <p class="text-end text-secondary mt-3">© One Document Corporation</p>
    <!-- <p class="text-end text-secondary mt-3">For Support, contact <i>support@careteq.ph</i></p> -->
                    </div>
                    </form>
                </div>

</div>
</body>
<script>
            function myFunction() {
                document.getElementById("login").submit();
            }
        </script>
<script type="text/javascript">


      const togglePassword1 = document.querySelector('#togglePassword');
  const password1 = document.querySelector('#password');

  togglePassword1.addEventListener('click', function (e) {
    // toggle the type attribute
    const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type1);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
@endsection
