<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "watchCom")</title>

    <!-- Link to compiled Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


@yield("style")
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    .pagination .page-link {
        background-color: white;
        color: #3730a3; 
    }

    .pagination .page-item.active .page-link {
        background-color: #3730a3;
        color: white;
    }

    .pagination .page-link:hover {
        background-color: #f0f0f0;
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
