<!DOCTYPE html>
<html lang="fr" class="no-js">
@include('partials.head')
<body class=" @yield('class')">

@yield('header')
@yield('content')
</div>

<div class="footer__container">
    <footer class="footer">
        @include('partials.footer')
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
</script>
<script src={{ asset('app.js') }}></script>
</body>
</html>