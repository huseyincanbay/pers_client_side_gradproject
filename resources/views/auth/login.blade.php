@extends('layouts.app')
@section('content')
<div class="page">
   <div class="page-content">
      <!-- login register -->
      <div class="login-register">
         <div class="link-closess">
            <a href="#" class="link back float-right"></a>
         </div>
         <div class="container">
            <h1 class="color-primer text-center">P E R S</h1>
            <div class="separator"></div>
            <form method="POST" action="{{ route('login') }}">
               @csrf
               <div class="col-md-6">
                  <input id="email" type="email" placeholder="Enter your email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span> @enderror
               </div>
               <div class="col-md-6">
                  <input id="password" type="password" placeholder="Enter your password"class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span> @enderror
               </div>
               <p class="text-center margin-bottom-middle">Not have an account? <a href="{{route('register')}}">Register Now</a></p>
               <div class="row mb-0">
                  <div class="col-md-8 offset-md-4">
                     <button type="submit" class="buttons buttons-center buttons-full box-shadow">
                     {{ __('Login') }}
                     </button> @if (Route::has('password.request'))
                     <a class="btn btn-link" href="{{ route('password.request') }}">
                     {{ __('Forgot Your Password?') }}
                     </a> @endif
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- end login register -->
   </div>
</div>
@endsection