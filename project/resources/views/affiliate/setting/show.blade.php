@extends('layouts.affiliate')
@section('style')
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
    @show
@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ $langg->lang479 }} <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ $langg->lang480 }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('affiliate-show') }}">{{ $langg->lang441 }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">Setting</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">

                            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                            <!-- The text field -->
                            <div>
                                <input type="text" value="{{route('user.login').'?ref='.Crypt::encryptString(auth()->guard('web')->user()->email)}}" id="myInput" disabled>
                                <!-- The button used to copy the text -->
                                <button onclick="myFunction()">Copy text</button>
                            </div>
{{--                            <div>--}}
{{--                                <input type="text" value="{{route('front.index').'?ref='.Crypt::encryptString(auth()->guard('web')->user()->email)}}" id="myInput" disabled>--}}
{{--                                <!-- The button used to copy the text -->--}}
{{--                                <button onclick="myFunction()">Copy text</button>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field */
            copyText.select();
            // copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

        }
    </script>
@endsection