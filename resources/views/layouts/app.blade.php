<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    <script src="https://kit.fontawesome.com/be418caf84.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <style>
        :root {
            --tblr-font-sans-serif: Poppins, -apple-system, BlinkMacSystemFont,
                San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>

<body>
    <div class="page">
        @include('_partials.sidebar')
        <div class="page-wrapper">
            <div class="page-header">
                <div class="container-xl">
                    <div class="d-lg-flex align-items-center gap-y-lg-2">
                        <div class="col">
                            <h2 class="page-title">
                                @yield('title')
                            </h2>
                        </div>
                        <div class="col-auto ms-auto">
                            @include('_partials.header')
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
