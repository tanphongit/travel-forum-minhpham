<!DOCTYPE html>
<html lang="vi">

<head>
    @include('frontend.include.head')
</head>

<body>
    <!-- header -->
    @if(!isset($isMainPage))
    @include('frontend.include.header')
    @endif
    <!-- end header -->

    <!-- main -->
    <main class="wrapper @if(isset($isMainPage)) mainPage @endif">
        @yield('content')
    </main>
    <!-- end main -->

    <!-- footer -->
    @if(!isset($isMainPage))
    @include('frontend.include.footer')
    @include('frontend.include.modal')
    @endif
    <!-- end footer -->

    <!-- script -->
    @if(isset($isHome))
    <script src="/assets/js/library_homepage.js"></script>
    <script async src="/assets/js/main.js"></script>
    @else
    <script src="/assets/js/library.js"></script>
    <script async src="/assets/js/pages.js"></script>
    @endif

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}'
            }
        });
        $( function () {
            @if(session()->has("error"))
                alert('Login fail');
            @endif
            @if(session()->has("success"))
                $('#modalSuccessSent').modal('show');
            @endif

            $('#modalSuccessSent').on('hidden.bs.modal', ()=>{
                window.location.href='/'
            });
        });
    </script>
    @stack('scripts')
    <!-- end script -->
</body>

</html>
