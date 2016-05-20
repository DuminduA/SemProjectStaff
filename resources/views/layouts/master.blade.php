<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">--}}
    <link rel="stylesheet" href="{{ URL::to('src/css/error.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('src/css/materialize.min.css') }}">
    {{--<link rel="stylesheet" href="{{ URL::to('src/css/materialize.min.css') }}">--}}

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style type="text/css">
        #but1{position:absolute;
            top:520px;
            left:800px;
        }
        #but2{position:absolute;
            top:520px;
            left:300px;
        }

        nav {background-color: #2ca02c}
    </style>

</head>

<body>
@include('includes.header')

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
<script type="text/javascript" src="{{ URL::asset('/src/js/jquery.min.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>--}}
<script type="text/javascript" src="{{ URL::asset('/src/js/materialize.min.js') }}"></script>


<div class="container">

    @yield('contain')

</div>
</body>


</html>
