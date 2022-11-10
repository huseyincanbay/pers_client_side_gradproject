@extends('layouts.app')

@section('pageName')
PERS
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
          <div class="page page-home page-with-subnavbar page-current">
             <!-- tabs -->
             <div class="tabs-animated-wrap">
                <div class="tabs">
                   <!-- tabs 1 -->
                   <div id="tab-1" class="tab tab-active page-content">
                      <!-- title -->
                      <div class="title-apps padding-middle background-primer">
                         <div class="container">
                            <div class="row row-no-margin-bottom">
                               <div class="col">
                                  <h3 class="color-white">@yield('pageName')</h3>
                               </div>
                               <div class="col">
                                  <a href="url">
                                  <span class="icon-middle margin-left-small float-right color-white">
                                  <i class="fas fa-bell"></i>
                                  </span>
                                  </a>
                               </div>
                            </div>
                         </div>
                      </div>
                      <!-- end title -->
                      <!-- profile balance -->
                      <div class="border-radius-style background-circle background-primer">
                         <div class="container">
                            <div class="background-white border-radius padding-box-middle box-shadow">
                               <div class="row row-no-margin-bottom">
                                  <div class="col-60">
                                      @if (Auth::check())
                                          <div class="float-left margin-right-small">
                                              <img class="people" src="images/görsel1.jpg" alt="">
                                          </div>
                                          <div class="overflow-hidden">
                                              <h6 class="usernamefield">{{ Auth::user()->name }}</h6>
                                          </div>
                                      @else
                                          Please login
                                      @endif

                                  </div>
                                  <div class="col-40">
                                    <a class="buttons float-right letter-spacing margin-top-small" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                    Logout

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <!-- end profile balance -->
                      <!-- separator -->
                      <div class="separator"></div>
                      <!-- end separator -->
                      <!-- menus -->
                      <div class="menus">
                         <div class="container">
                            <div class="row">
                               <div class="col">
                                  <a href="{{route('department', [ 'id' => 2 ])}}">
                                     <div class="background-white text-center border-radius padding-box box-shadow">
                                        <span class="icon-big icon-color-red"><i class="fa fa-fire" aria-hidden="true"></i></span>
                                        <h6 class="font-weight-500">Fire Department</h6>
                                     </div>
                                  </a>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col">
                                   <a href="{{route('department', [ 'id' => 1 ])}}">
                                     <div class="background-white text-center border-radius padding-box box-shadow">
                                        <span class="icon-big icon-color-blue"><i class="fas fa-user-shield"></i></span>
                                        <h6 class="font-weight-500">Police Department</h6>
                                     </div>
                                  </a>
                               </div>
                            </div>
                            <div class="row">
                               <div class="col">
                                   <a href="{{route('department', [ 'id' => 3 ])}}">
                                     <div class="background-white text-center border-radius padding-box box-shadow">
                                        <span class="icon-big icon-color-purple"><i class="fas fa-ambulance"></i></span>
                                        <h6 class="font-weight-500">Medical Department</h6>
                                     </div>
                                  </a>
                               </div>
                            </div>
                            {{--<div class="row">
                               <div class="col">
                                   <a href="{{route('department', [ 'id' => 4 ])}}">
                                     <div class="background-white text-center border-radius padding-box box-shadow">
                                        <span class="icon-big icon-color-yellow"><i class="fas fa-building"></i></span>
                                        <h6 class="font-weight-500">Other Departments</h6>
                                     </div>
                                  </a>
                               </div>
                            </div>--}}
                         </div>
                      </div>
                      <!-- end menus -->
                      <!-- separator -->
                      <div class="separator-bottom"></div>
                      <!-- end separator -->
                   </div>
                </div>
             </div>
             <!-- end tabs -->
          </div>
       </div>
    </div>
 </div>
@endsection
