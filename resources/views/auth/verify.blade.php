@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" id="theForm" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" id="resendEmailVerification"  class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 // $(document).ready(function(){
 //        var counter = 10;

 //        var interval = setInterval(function() {
 //            counter--;
 //            // Display 'counter' wherever you want to display it.
 //            if (counter <= 0) {
 //                    clearInterval(interval);
 //                    $('#time').text(counter);
 //                    $('#resendEmailVerification').prop('disabled', false);
 //                    $('#timer').hide();
 //                    return;
 //            }else{
 //                    $('#time').text(counter);
 //                    $('#resendEmailVerification').prop('disabled', true);
 //                    console.log("Timer --> " + counter);
 //            }
 //        }, 1000)});
    </script>
<script>
//     window.setInterval(function(){
// document.getElementById("theForm").submit();
// }, 10000);
    </script>
@endsection
