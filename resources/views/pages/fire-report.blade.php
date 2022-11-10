@extends('layouts.app')

@section('pageName')
Fire
@endsection

@section('content')
<div class="page-content">
    <div class="container margin-pages3">
       <div class="container">
          <div class="background-white border-radius box-shadow padding-box-middle text-center">
             <h4 class="margin-bottom-small">Report Emergency</h4>
             <form action="upload" method="POST" enctype="multipart/form-data">
                <input class="border-radius margin-bottom-middle" type="text" placeholder="What do you want to report?">
                <input class="border-radius margin-bottom-middle" type="datetime-local" placeholder="Time/Date">
                <textarea placeholder="Give us information about Location" class="border-radius margin-bottom-middle" cols="10" rows="5"></textarea>
                <textarea class="border-radius margin-bottom-middle" cols="30" rows="10" placeholder="Give us more information about event."></textarea>
                <small class="text-center margin-bottom-small">Upload File</small>
                <input type="file" id="fileUpload" name="video" multiple="multiple">
                <button class=" buttons box-shadow ">Send</button>
             </form>
          </div>
       </div>
    </div>
 </div>

@endsection