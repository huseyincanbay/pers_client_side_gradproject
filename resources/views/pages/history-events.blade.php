@extends('layouts.app')

@section('pageName')
Events
@endsection

@section('content')
<div class="page-content">
    <div class="events margin-pages3">
       <div class="container">
           @foreach($events as $event)
          <div class="background-white box-shadow border-radius padding-box-middle">
             <div class="row">
                <div class="col-70">
                   <div class="float-left margin-right-middle">
                      <span class="icon-small icon-color-green">
                      <i class="fa fa-lightbulb"></i>
                      </span>
                   </div>
                   <div class="overflow-hidden">
                      <h6>{{ $event->title }}</h6>
                      <span>{{ $event->created_at }}</span>
                   </div>
                </div>
             </div>
          </div>
          <div class="separator-small"></div>
           @endforeach
               <div class="d-flex justify-content-center">
                   {{ $events->links() }}
               </div>

         {{-- <div class="background-white box-shadow border-radius padding-box-middle">
             <div class="row">
                <div class="col-70">
                   <div class="float-left margin-right-middle">
                      <span class="icon-small icon-color-blue">
                      <i class="fa fa-laptop"></i>
                      </span>
                   </div>
                   <div class="overflow-hidden">
                      <h6>Medical</h6>
                      <span>15 February 2020</span>
                   </div>
                </div>
                <div class="col-30">
                   <a href="/event-details/">
                   <button class="buttonsuccess float-right letter-spacing margin-top-small"><i class="fas fa-arrow-right"></i></button>
                   </a>
                </div>
             </div>
          </div>
          <div class="separator-small"></div>
          <div class="background-white box-shadow border-radius padding-box-middle">
             <div class="row">
                <div class="col-70">
                   <div class="float-left margin-right-middle">
                      <span class="icon-small icon-color-orange">
                      <i class="fa fa-ticket-alt"></i>
                      </span>
                   </div>
                   <div class="overflow-hidden">
                      <h6>Fire</h6>
                      <span>23 March 2021</span>
                   </div>
                </div>
                <div class="col-30">
                   <a href="/event-details/">
                   <button class="buttonsuccess float-right letter-spacing margin-top-small"><i class="fas fa-arrow-right"></i></button>
                   </a>
                </div>
             </div>
          </div>
          <div class="separator-small"></div>
          <div class="background-white box-shadow border-radius padding-box-middle">
             <div class="row">
                <div class="col-70">
                   <div class="float-left margin-right-middle">
                      <span class="icon-small icon-color-purple">
                      <i class="fa fa-mobile"></i>
                      </span>
                   </div>
                   <div class="overflow-hidden">
                      <h6>Police</h6>
                      <span>23 March 2021</span>
                   </div>
                </div>
                <div class="col-30">
                   <a href="/event-details/">
                   <button class="buttonsuccess float-right letter-spacing margin-top-small"><i class="fas fa-arrow-right"></i></button>
                   </a>
                </div>
             </div>
          </div>
          <div class="separator-small"></div>--}}
       </div>
    </div>
 </div>
@endsection
