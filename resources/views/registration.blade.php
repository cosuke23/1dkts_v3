@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Department Head') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route(env("REGISTER_ROUTE")) }}" id="register_form" name="register_form">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

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
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Project Name') }}</label>

                            <div class="col-md-6">
                                <input id="establishment" type="text" class="form-control @error('establishment') is-invalid @enderror" name="establishment"  autofocus required>



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
  <option value="Super Admin">Super Admin</option>
  <option value="Admin">Admin</option>
  <option value="Business Analyst">Business Analyst</option>
  <option value="BA/SA">Business/System Analyst</option>
  <option value="Developer">Developer</option>
    <option value="Support">Support</option>
         <option value="Quality Assurance">Quality Assurance </option>
         <option value="Hospital Staff Admin">Hospital Staff Admin</option>
         <option value="Hospital Staff">Hospital Staff</option>
</select>
                            </div>
                        </div>
                   

 

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
</script>
<script src='//cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js'>
</script>
<script src="//cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">
</script>


@endsection
