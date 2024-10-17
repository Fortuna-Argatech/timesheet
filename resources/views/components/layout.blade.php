<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? '' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Mannatthemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fortuna/favicon.ico') }}" />
    <!-- Css -->
    @stack('css')
    <!-- Main Css -->
    <link href="{{ asset('assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    @vite('resources/css/app.css')
</head>

<body data-layout-mode="light" data-sidebar-size="default" data-theme-layout="vertical"
    class="bg-gray-100 dark:bg-gray-900 bg-[url('../../public/assets/images/bg-body.png')] dark:bg-[url('../../public/assets/images/bg-body-2.png')]">

    {{-- Sidebar --}}
    <x-aside/>
    <div class="flex-1 ltr:flex rtl:flex-row-reverse">
        <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-276px)] px-4 duration-300" style="padding-top: 5rem;">
            {{-- Put header if want to use --}}
            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14 ">
                <div class="grid gap-4 mb-4 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12">
                    <div class="sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12 ">
                        {{ $slot }}
                    </div>
                </div>
                <x-footer></x-footer>
            </div>
        </div>
    </div>




    <!-- JAVASCRIPTS -->
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/components.js') }}"></script>

    @stack('scripts')
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- JAVASCRIPTS -->
</body>

</html>
