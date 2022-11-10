@extends('layouts.app')

@section('pageName')
My Profile
@endsection

@section('content')
<div class="page-content">
    <div class="container margin-pages3">
       <div class="container">
          <div class="background-white border-radius box-shadow padding-box-middle text-center">
             <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data" >
               {{-- <div class="form-group">
                  <input type="file" name="image"  id="imageName" class="border-radius margin-bottom-middle">
               </div> --}}
               @csrf
              
                <div class="form-group">
                   <input type="text" name="name"  id="name" class="border-radius margin-bottom-middle form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" required placeholder="Name">
                   @error('name')
                   <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <div class="form-group">
                   <input type="text" name="email"  id="email" class="border-radius margin-bottom-middle form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" required placeholder="Email">
                   @error('email')
                   <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <div class="form-group">
                   <input type="text" name="phone_number" id="phone" class="border-radius margin-bottom-middle form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" value="{{ Auth::user()->phone_number }}" required>
                   @error('phone')
                   <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="border-radius margin-bottom-middle form-control @error('password') is-invalid @enderror" placeholder="Password" value="" required>
                    @error('passord')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                 </div>
                <div class="form-group button">
                   <button type="submit" class="buttons box-shadow"><i class="fas fa-user-edit"></i> Update Profile</button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection