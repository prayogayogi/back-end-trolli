<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- Include Style --}}
    @stack('before-style')

        @include('includes.style')

    @stack('after-style')

</head>
<body>
    <div id="app">
        {{-- Include Sidebar --}}
        @include('includes.sidebar')

        <div id="main">

        {{-- Include navbar --}}
            @include('includes.navbar')

            {{-- yield content --}}
            @yield('content')


        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-left">
                    <p>2020 &copy; Voler</p>
                </div>
                <div class="float-right">
                    <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>

    {{-- Include script --}}
    @stack('before-script')

        @include('includes.script')

    @stack('after-script')

</body>
</html>
