<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titre')</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  
    
    <link href="{{asset('frontend/css/bootstrap5.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/cust.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">

  
</head>
<body>
    @include('layouts.inc.navbar')
    <div class="content">
        @yield('content')
    </div>
    
    @include('layouts.inc.footer')
       
    <!--Script-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/default-passive-events"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>
    @if (session('succes'))
        <script>
            swal("{{ session('succes') }}");
        </script>
    @endif
        
    @yield('scripts')
</body>
</html>
