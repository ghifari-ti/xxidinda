<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Ticket XX1</title>
</head>
<body style="background-color: deepskyblue">
<div class="container">
    <div class="d-flex justify-content-center mt-3">
        <h1 class="text-white">Ticket XXI</h1>
    </div>
    <div class="d-flex justify-content-center m-1">
        <a href="{{ route('login') }}" class="btn btn-outline-light m-1">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-light m-1">Register</a>
    </div>
    <div class="d-flex justify-content-around">
        @foreach($movies as $movie)
            @php
                $now = \Carbon\Carbon::now();
            @endphp
            @if($now->greaterThanOrEqualTo(\Carbon\Carbon::make($movie->start)) && $now->lessThanOrEqualTo(\Carbon\Carbon::make($movie->end)))
            <div class="col-sm-4 col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="m-3 d-flex justify-content-center">
                            <img src="{{ url('/image/'.$movie->banner) }}" style="width: 200px;">
                        </div>
                        <div>
                            <h3 class="text-center font-weight-bold" style="color: black"> {{ $movie->movie_title }}</h3>
                            <hr>
                            <p>
                                Genre: {{ $movie->genre }} <br>
                                Durasi: {{ $movie->durasi }} <br>
                                Sutradara: {{ $movie->sutradara }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>
</html>
