@extends('layouts.app')

@section('pageName')
{{ $department->department_title }}
@endsection

@section('content')
<div class="page-content">
    <div class="container margin-pages3">
       <div class="container">
          <div class="background-white border-radius box-shadow padding-box-middle text-center">
             <h4 class="margin-bottom-small">Report Emergency</h4>
             <form method="POST" enctype="multipart/form-data" id="eventReport" action="{{ route('event.create') }}">
                 @csrf
                <input class="border-radius margin-bottom-middle" type="text" placeholder="What do you want to report?" name="title">

                <textarea class="border-radius margin-bottom-middle" cols="10" rows="5" placeholder="Give us information about Location" name="address"></textarea>

                <textarea class="border-radius margin-bottom-middle" cols="30" rows="10" placeholder="Give us more information about event." name="note"></textarea>

               {{-- <small class="text-center margin-bottom-small">Upload File</small>
                <input type="file" id="fileUpload" name="video" multiple="multiple">--}}

                <input type="hidden" value="{{ $id }}" name="department">
                <input type="hidden" name="longitude" id="longitude">
                <input type="hidden" name="latitude" id="latitude">

                <button type="submit" class="buttons box-shadow">Send</button>
             </form>
          </div>
       </div>
    </div>
 </div>

@endsection


@section('footer-scripts')
    @include('scripts.event-script')
@endsection
