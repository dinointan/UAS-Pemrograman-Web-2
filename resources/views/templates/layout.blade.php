<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header,
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .header {
            margin-bottom: 40px;
        }

        .nav {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 20px;
            gap: 20px
        }

        .nav a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .nav a.active {
            color: #000;
        }

        .content {
            background-color: #73c7a7;
            padding: 100px;
            border-radius: 10px;
        }

        .content h1 {
            margin-bottom: 20px;
        }

        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .features div {
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 23%;
        }

        .login {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
        }

        .login select {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">

    @yield('content')
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>
