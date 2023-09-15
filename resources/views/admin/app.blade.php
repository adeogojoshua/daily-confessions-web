<!DOCTYPE html>
<html lang="en">


@include('admin.components.header')

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('admin.components.navbar')

            @include('admin.components.sidebar')



            <!-- Main Content -->
            <div class="main-content">
                @include('components.notif')
                @yield('content')

            </div>
            {{-- <footer class="main-footer">
                <div class="footer-left">
                    <a href="templateshub.net">Templateshub</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer> --}}
        </div>
    </div>
    @include('admin.components.footer')
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
