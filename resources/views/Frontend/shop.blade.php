@extends('welcome')

@section('titre')
    SHOPINO
@endsection

@section('content')
    <!-- Shop-Page -->
    <div class="page-shop u-s-p-t-80">
        <div class="container">
            <!-- Shop-Intro -->
            <div class="shop-intro">
                <h3>{{ $genre }} store</h3>
            </div>
            <br><br>
            <!-- Shop-Intro /- -->
            <div class="row">
                @include('Frontend.inc.shopsidebare')
                <!-- Shop-Right-Wrapper -->
                @yield('section')
            </div>
        </div>
    </div>
    <!-- Shop-Page /- -->  
@endsection