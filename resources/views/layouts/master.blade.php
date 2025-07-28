<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaadAli | Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/png">


    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Caveat:wght@400..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Monoton&family=Noto+Sans:ital,wdth,wght@0,62.5,100..900;1,62.5,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Onest:wght@100..900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main class="container mx-auto main-section">
        <img style="z-index: -1" class="absolute top-[-120px] left-[-120px] bg-blue"
            src="{{ asset('assets/images/Ellipse 1.png') }}" alt="" id="bg-image">
        @yield('content')

    </main>

    <div class="zxy__UptBtn_wrpr d-flex justify-content-center align-items-center p-2" id="zxy__ScrollTopBtn">
        <div class="zxy__UptBtn_bg"></div>
        <div class="zxy__UptBtn_fill" id="zxy__FillBar"></div>
        <div class="zxy__UptBtn_inner d-flex gap-2 align-items-center justify-content-center nunito-700 f-25"><img
                src="images/Group 11 (3).png" alt="" width="50%">Top</div>
    </div>
</body>
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
<script src="{{ asset('assets/js/jQuery.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

</html>
