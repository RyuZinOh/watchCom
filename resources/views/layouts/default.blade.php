<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "watchCom")</title>

    <!-- Link to compiled Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

@yield("style")
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body">

@include("includes.header")
@yield("content")
@include("includes.footer")
    
    <!-- Link to compiled Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
