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
                    <h1 class="color-primer text-center">PERS</h1>
                    <div class="separator"></div>
                    <form method="POST" action="{{ route('sms.verify') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input name="sms_code" id="sms_code" type="text" placeholder="Enter Verification Code" class="form-control">
                                <input name="phone_number" id="phone_number" type="hidden" value="{{ session('phone_number') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row mb-0" style="width: 100%;display: flex;justify-content: space-between;align-items: center;">
                                    <button type="submit" class="buttons box-shadow">
                                        {{ __('Verify') }}
                                    </button>
                                    <a href="#" id="getNewCode">Get New Code</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end login register -->
        </div>
    </div>
@endsection

@section('footer-scripts')
    @include('scripts.sms-script')
@endsection
