<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>SPK Innovation Award</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <!-- font awesome cdn -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}" />
    <style>
        #carouselExampleIndicators .carousel-inner .carousel-item {
            position: relative;
            height: 100%;
            width: 100%;
            background: url("{{ asset('img/bg1.jpeg') }}");
            background-size: 100% 100%;
            background-position: center;
            background-attachment: fixed;
        }

        #carouselExampleIndicators .carousel-inner .carousel-item:nth-child(2) {
            background: url("{{ asset('img/bg2.jpeg') }}");
            background-size: 100% 100%;
            background-position: center;
            background-attachment: fixed;
        }

        #carouselExampleIndicators .carousel-inner .carousel-item:nth-child(3) {
            background: url("{{ asset('img/bg3.jpg') }}");
            background-size: 100% 100%;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
    <!-- jquery cdn -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 navbar">
                <a href="/" class="logo navbar-brandoffset-md-2 bg-white">
                    {{-- <img style="height: 100px" src="{{ asset('img/logo.png') }}" /> --}}
                </a>
                <ul class="nav">
                    @auth
                        <li class="nav-item active"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
                    @endauth
                </ul>
            </div>

            <!-- slider banner	 -->

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="info">
                            {{-- <h1>SLIDE ONE</h1> --}}
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p> --}}
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="info">
                            {{-- <h1>SLIDE TWO</h1> --}}
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p> --}}
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="info">
                            {{-- <h1>SLIDE THREE</h1> --}}
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p> --}}
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>



    <!-- scripts -->
    <!-- bootstrap javascript cdn -->
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
