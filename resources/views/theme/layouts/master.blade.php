<!doctype html>
<html lang="en">
<head>
    @php $setting =\App\Setting::pluck('value','name')->toArray(); @endphp
    @include('theme.partials.head')
</head>
<body>
<header class="section-header">
    @include('theme.partials.header')
</header>

@include('theme.partials.navbar')
@yield('content')
@include('theme.partials.footer')
@yield('scripts')
</body>

</html>

