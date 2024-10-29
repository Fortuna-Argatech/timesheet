<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>{{ $code }}</title>
        <meta  name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta  content="Tailwind Multipurpose Admin & Dashboard Template"  name="description"/>
        <meta content="" name="Mannatthemes" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/fortuna/favicon.ico') }}" />


        <!-- Css -->
        <!-- Main Css -->
        <link href="{{ asset('assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">

    </head>

    <body data-layout-mode="light"  data-sidebar-size="default" data-theme-layout="vertical" class="bg-[url('../../public/assets/images/bg-body.png')] dark:bg-[url('../../public/assets/images/bg-body-2.png')]">
        <div class="relative flex flex-col justify-center min-h-screen overflow-hidden">
        <div class="w-full m-auto bg-white rounded shadow-lg dark:bg-slate-800/60 ring-2 ring-slate-300/50 dark:ring-slate-700/50 lg:max-w-md">
            <div class="p-6 text-center rounded-t bg-slate-900">
                <a href="index.html"><img src="{{ asset('assets/images/logo_fortuna.png') }}" alt="logo" class="mx-auto mb-2 w-14 h-14"></a>
                <h3 class="mb-1 text-xl font-semibold text-white">Oops! Something went wrong.</h3>
                <p class="text-xs text-slate-400">Back to dashboard.</p>
            </div>

            <form class="p-6">
                <div class="text-center">
                    <img src="{{ asset('assets/images/widgets/error.png') }}" alt="" class="block w-32 h-32 mx-auto my-6">
                    <h1 class="font-bold text-7xl dark:text-slate-200">{{ $code }}!</h1>
                    <h5 class="text-lg font-medium text-slate-400">{{ $message }}</h5>
                </div>
                <div class="mt-6">
                    <a href="{{ route('timesheetGet.index') }}"
                        class="block w-full px-4 py-2 tracking-wide text-center text-white transition-colors duration-200 transform bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                        Back to Dashboard
                    </a>
                </div>
            </form>
        </div>
    </div>




        <!-- JAVASCRIPTS -->
        <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/components.js') }}"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>
        <!-- JAVASCRIPTS -->
    </body>
</html>
