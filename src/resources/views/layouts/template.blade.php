<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker3.standalone.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/countrySelect.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/intlTelInput.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"/>

    <title>Registration Form - Laravel</title>
</head>

<body>

@yield('content')

<script src="{{ URL::asset('js/app.js') }}"></script>
@stack('scripts')

</body>

</html>