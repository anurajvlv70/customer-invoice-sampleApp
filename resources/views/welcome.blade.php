<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sample</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Styles --
</head>
<body class="d-flex align-items-center justify-content-center">
    
    <!-- Background Image -->

    <!-- Overlay -->

    <br>
        <div class="row justify-content-center">
            
            <div class="col-lg-6">
                <h1 class="fw-bolder">Sample App</h1>
                <p>
                 </p>
                
                @if (Route::has('login'))
                    <div class="d-flex justify-content-center flex-column flex-sm-row mt-4">
                        @auth
                            <a href="{{ url('/index') }}" class="btn btn-outline-success rounded-0 me-sm-2 mb-2 mb-sm-0">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-success rounded-0 me-sm-2 mb-2 mb-sm-0 btn-width">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-success rounded-0 me-sm-2 mb-2 mb-sm-0 btn-width">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+65nZ74RRMpW5V1MkL5Zk8P0p4kG/" crossorigin="anonymous"></script>
</body>
</html>