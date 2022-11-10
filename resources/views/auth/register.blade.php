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
            <form method="POST" action="{{ route('register') }}">
               @csrf
               <div class="row mb-3">
                  <div class="col-md-6">
                     <input id="name" type="text" placeholder="Enter your name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                     @error('name')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <input id="email" type="email" placeholder="Enter your email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <input id="phone" type="text" placeholder="Enter your phone number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>
                     @error('phone_number')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <input id="identity" type="text" placeholder="Enter your indentity number" class="form-control @error('identity_number') is-invalid @enderror" name="identity_number" value="{{ old('identity_number') }}" required>
                     @error('identity_number')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <select class="form-select @error('gender') is-invalid @enderror" name='gender' id="gender" aria-label="Default select example">
                        <option selected>Select Your Gender</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                     </select>
                     @error('gender')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> @error('password')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span> @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-md-6">
                     <input id="password-confirm" type="password" placeholder="Confirm your password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="row mb-0">
                     <div class="col-md-6 offset-md-4">
                        <button type="submit" class="buttons buttons-center buttons-full box-shadow">
                        {{ __('Register') }}
                        </button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- end login register -->
   </div>
</div>
@endsection
