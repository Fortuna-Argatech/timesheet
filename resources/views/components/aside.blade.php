<div class="leftbar-tab min-w-[260px] z-[99] duration-300 print:hidden">
    <div
        class="flex w-[60px] bg-iconbar dark:bg-slate-800 py-4 items-center fixed top-0 z-[99]
      rounded-[100px] m-4 flex-col h-[calc(100%-30px)]">
        <a href="index.html" class="block text-center logo">
            <span>
                <img src="{{ asset('assets/images/fortuna/android-chrome-512x512.png') }}" alt="logo-small" class="h-8 logo-sm">
            </span>
        </a>

        <div class="w-full max-h-full overflow-hidden icon-body">
            <div class="relative h-full">
                <ul class="flex-col w-[60px] items-center mt-[60px] flex-1 border-b-0 tab-menu" id="tab-menu"
                    data-tabs-toggle="#Icon-menu">
                    <li class="flex justify-center my-0 menu-items" role="presentation">
                        <button
                            class="relative inline-block px-4 py-4 text-sm font-medium text-center text-gray-700 border-0 border-transparent rounded-t-lg hover:text-primary-500 dark:text-gray-400 dark:hover:text-primary-400 menu-link"
                            id="Dashboards-tab" data-tabs-target="#Dashboards" type="button" role="tab"
                            aria-controls="Dashboards" aria-selected="false">
                            <i class="text-3xl ti ti-smart-home"></i>
                        </button>
                    </li>
                    <li class="flex justify-center my-0 menu-items" role="presentation">
                        <button
                            class="relative inline-block px-4 py-4 text-sm font-medium text-center text-gray-700 border-0 border-transparent rounded-t-lg hover:text-primary-500 dark:text-gray-400 dark:hover:text-primary-400 menu-link"
                            id="Pages-tab" data-tabs-target="#Pages" type="button" role="tab" aria-controls="Pages"
                            aria-selected="false">
                            <i class="text-3xl mdi mdi-book"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        {{-- <div class="flex flex-col items-center mt-auto bg-iconbar dark:bg-slate-800 shrink-0">
            <a href="">
                <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="w-8 h-8 rounded-full">
            </a>
        </div> --}}
    </div>
    <div
        class="main-menu-inner h-full w-[200px] my-4  fixed top-0 z-[99] left-[calc(60px+16px)] rtl:right-[calc(60px+16px)] rtl:left-0 rounded-lg transition delay-150 duration-300 ease-in-out">
        <div class="main-menu-inner-logo">
            <div class="flex items-center justify-center">
                <a href="index.html" class="leading-[60px]">
                    <img src="{{ asset('assets/images/logo_fortuna_w_text.png') }}" alt=""
                        class="inline-block h-10 dark:hidden ltr:ml-4 rtl:ml-0 rtl:mr-4">
                    <img src="{{ asset('assets/images/logo_fortuna_w_text.png') }}" alt=""
                        class="hidden h-10 dark:inline-block ltr:ml-4 rtl:ml-0 rtl:mr-4">
                </a>
                <div class="block ml-auto ltr:mr-2 ltr:lg:mr-4 rtl:mr-0 rtl:ml-2 rtl:lg:mr-0 rtl:lg:ml-4 xl:hidden">
                    <button id="toggle-menu-hide-2" class="relative flex rounded-full button-menu-mobile-2 md:mr-0">
                        <i class="text-3xl ti ti-chevrons-left top-icon"></i>
                    </button>
                </div>
            </div>
            <div class="menu-body h-[calc(100vh-60px)] p-4" data-simplebar>
                <div id="Icon-menu">
                    <div class="hidden" id="Dashboards" role="tabpanel" aria-labelledby="Dashboards-tab">
                        <div class="mb-3 title-box">
                            <h6 class="text-sm font-medium uppercase text-slate-400">Dashboard</h6>
                        </div>
                        <ul class="flex flex-col flex-wrap pl-0 mb-0 nav">
                            <li>
                                <div id="accordion-flush" data-accordion="collapse" data-active-classes=""
                                    data-inactive-classes="text-gray-700 hover:text-primary-500 dark:text-gray-400">

                                    {{-- <div id="Apps-Analytics">
                                        <a href="#"
                                            class="nav-link hover:bg-gray-50 hover:text-primary-500 dark:hover:bg-gray-800/20 rounded-md dark:hover:text-primary-500 font-medium text-sm flex items-center h-[38px] decoration-0 px-2 py-4 cursor-pointer  "
                                            data-accordion-target="#Analytics-flush" aria-expanded="false"
                                            aria-controls="Analytics-flush">
                                            <span>Analytics</span>
                                            <i class="inline-block ml-auto text-sm transition-transform duration-300 transform fas fa-angle-down"
                                                data-accordion-icon></i>
                                        </a>
                                    </div> --}}
                                </div>
                            </li>

                            <li class="relative block nav-item">
                                <a href="{{ route('dashboard.index') }}"
                                    class="nav-link hover:bg-gray-50 hover:text-primary-500 dark:hover:bg-gray-800/20 rounded-md dark:hover:text-primary-500 relative font-medium text-sm flex items-center h-[38px] decoration-0 px-2 py-4">
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="hidden" id="Pages" role="tabpanel" aria-labelledby="Pages-tab">
                        <div class="mb-3 title-box">
                            <h6 class="text-sm font-medium uppercase text-slate-400">Applications</h6>
                        </div>
                        <ul class="flex flex-col flex-wrap pl-0 mb-0 nav">
                            <li class="relative block nav-item">
                                <a href="{{ route('timesheetGet.index') }}"
                                    class="nav-link hover:bg-gray-50 hover:text-primary-500 dark:hover:bg-gray-800/20 rounded-md dark:hover:text-primary-500 relative font-medium text-sm flex items-center h-[38px] decoration-0 px-2 py-4">
                                    Timesheet
                                </a>
                            </li>
                            <li class="relative block nav-item">
                                <a href="{{ route('activityTypeGet.index') }}"
                                    class="nav-link hover:bg-gray-50 hover:text-primary-500 dark:hover:bg-gray-800/20 rounded-md dark:hover:text-primary-500 relative font-medium text-sm flex items-center h-[38px] decoration-0 px-2 py-4">
                                    Activity Type
                                </a>
                            </li>
                            <li class="relative block nav-item">
                                <a href="{{ route('employeeGet.index') }}"
                                    class="nav-link hover:bg-gray-50 hover:text-primary-500 dark:hover:bg-gray-800/20 rounded-md dark:hover:text-primary-500 relative font-medium text-sm flex items-center h-[38px] decoration-0 px-2 py-4">
                                    Employee
                                </a>
                            </li>
                            {{-- <li>
                                <div id="accordion-flush" data-accordion="collapse" data-active-classes=""
                                    data-inactive-classes="text-gray-700 hover:text-primary-500 dark:text-gray-400">

                                    <div id="Apps-Analytics">
                                        <a href="#"
                                            class="nav-link hover:bg-gray-50 hover:text-primary-500 dark:hover:bg-gray-800/20 rounded-md dark:hover:text-primary-500 font-medium text-sm flex items-center h-[38px] decoration-0 px-2 py-4 cursor-pointer  "
                                            data-accordion-target="#Analytics-flush" aria-expanded="false"
                                            aria-controls="Analytics-flush">
                                            <span>Analytics</span>
                                            <i class="inline-block ml-auto text-sm transition-transform duration-300 transform fas fa-angle-down"
                                                data-accordion-icon></i>
                                        </a>
                                    </div>
                                    <div id="Analytics-flush" class="hidden collapse-menu"
                                        aria-labelledby="Apps-Analytics">
                                        <ul class="flex flex-col flex-wrap pl-0 mb-0 nav">

                                            <li class="relative block nav-item">
                                                <a href="analytics-customers.html"
                                                    class="nav-link hover:bg-gray-50 hover:text-primary-500 dark:hover:bg-gray-800/20 rounded-md dark:hover:text-primary-500 relative font-medium text-sm flex items-center h-[38px] decoration-0 px-2 py-4">
                                                    Customers
                                                </a>
                                            </li>
                                            <li class="relative block nav-item">
                                                <a href="analytics-reports.html"
                                                    class="nav-link hover:bg-gray-50 hover:text-primary-500 dark:hover:bg-gray-800/20 rounded-md dark:hover:text-primary-500 relative font-medium text-sm flex items-center h-[38px] decoration-0 px-2 py-4">
                                                    Reports
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixed z-50 ltr:left-0 ltr:right-4 rtl:right-0 rtl:left-4 print:hidden">
    <nav id="topbar"
        class="topbar border-gray-200  relative ltr:ml-0 rtl:ml-0 ltr:lg:ml-0  rtl:lg:mr-0   ltr:xl:ml-[calc(260px+32px)]  rtl:xl:mr-[calc(260px+32px)] duration-300
     block ">
        <div class="flex flex-wrap items-center max-w-full mx-0 lg:mx-auto">
            <div class="ml-4 ltr:mr-2 ltr:lg:mr-4 rtl:mr-0 rtl:ml-2 rtl:lg:mr-0 rtl:lg:ml-4 xl:ml-0">
                <button id="toggle-menu-hide" class="relative flex rounded-full button-menu-mobile md:mr-0">
                    <i class="text-3xl ti ti-chevrons-left top-icon"></i>
                </button>
            </div>
            {{-- <div class="flex items-center md:w-[40%] lg:w-[30%] xl:w-[20%]">
                <div class="relative hidden w-full ltr:mr-2 rtl:mr-0 rtl:ml-2 lg:mr-4 md:block lg:block">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="z-10 text-gray-400 ti ti-search"></i>
                    </div>
                    <input type="text" id="email-adress-icon"
                        class="block w-full p-2 pl-10 border rounded-lg outline-none border-slate-200 dark:border-slate-700/60 bg-slate-200/10 text-slate-600 dark:text-slate-400 focus:border-slate-300 focus:ring-slate-300 dark:bg-slate-800/20 sm:text-sm"
                        placeholder="Search..." />
                </div>
            </div> --}}
            <div class="flex items-center order-1 ltr:ml-auto rtl:ml-0 rtl:mr-auto md:order-2">

                <div class="ltr:mr-2 ltr:lg:mr-4 rtl:mr-0 rtl:ml-2 rtl:lg:mr-0 rtl:lg:ml-4">
                    <button id="toggle-theme" class="relative flex rounded-full md:mr-0">
                        <i class="text-3xl ti ti-moon top-icon"></i>
                    </button>
                </div>
                {{-- <div class="relative ltr:mr-2 ltr:lg:mr-4 rtl:mr-0 rtl:ml-2 rtl:lg:mr-0 rtl:lg:ml-4 dropdown">
                    <button type="button" class="flex rounded-full dropdown-toggle md:mr-0" id="Notifications"
                        aria-expanded="false" data-dropdown-toggle="navNotifications">
                        <i class="text-3xl ti ti-bell top-icon"></i>
                    </button>

                    <div class="z-50 hidden w-64 my-1 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dropdown-menu dropdown-menu-right h-52 border-slate-700 md:border-white dark:divide-gray-600 dark:bg-slate-800"
                        id="navNotifications" data-simplebar>
                        <ul class="py-1" aria-labelledby="navNotifications">
                            <li class="px-4 py-2">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="flex align-items-start">
                                        <img class="object-cover w-8 h-8 mr-3 rounded-full shrink-0"
                                            src="assets/images/users/avatar-2.jpg" alt="logo" />
                                        <div class="flex-grow ml-0.5 overflow-hidden">
                                            <p
                                                class="text-sm font-medium text-gray-800 truncate dark:text-gray-300">
                                                Karen Robinson</p>
                                            <p
                                                class="mb-0 text-xs text-gray-500 truncate dark:text-gray-400">
                                                Hey ! i'm available here
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="px-4 py-2">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="flex align-items-start">
                                        <img class="object-cover w-8 h-8 mr-3 rounded-full shrink-0"
                                            src="assets/images/users/avatar-3.jpg" alt="logo" />
                                        <div class="flex-grow ml-0.5 overflow-hidden">
                                            <p
                                                class="text-sm font-medium text-gray-800 truncate dark:text-gray-300">
                                                Your order is placed</p>
                                            <p
                                                class="mb-0 text-xs text-gray-500 truncate dark:text-gray-400">
                                                Dummy text of the printing and industry.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="px-4 py-2">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="flex align-items-start">
                                        <img class="object-cover w-8 h-8 mr-3 rounded-full shrink-0"
                                            src="assets/images/users/avatar-9.jpg" alt="logo" />
                                        <div class="flex-grow ml-0.5 overflow-hidden">
                                            <p
                                                class="text-sm font-medium text-gray-800 truncate dark:text-gray-300">
                                                Robert McCray</p>
                                            <p
                                                class="mb-0 text-xs text-gray-500 truncate dark:text-gray-400">
                                                Good Morning!
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="px-4 py-2">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="flex align-items-start">
                                        <img class="object-cover w-8 h-8 mr-3 rounded-full shrink-0"
                                            src="assets/images/users/avatar-6.jpg" alt="logo" />
                                        <div class="flex-grow ml-0.5 overflow-hidden">
                                            <p
                                                class="text-sm font-medium text-gray-800 truncate dark:text-gray-300">
                                                Meeting with designers</p>
                                            <p
                                                class="mb-0 text-xs text-gray-500 truncate dark:text-gray-400">
                                                It is a long established fact that a reader.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                {{-- <div class="relative mr-2 lg:mr-0 dropdown">
                    <button type="button"
                        class="flex items-center text-sm rounded-full dropdown-toggle focus:bg-none focus:ring-0 dark:focus:ring-0 md:mr-0"
                        id="user-profile" aria-expanded="false" data-dropdown-toggle="navUserdata">
                        <img class="w-8 h-8 rounded-full" src="assets/images/users/avatar-1.jpg" alt="user photo" />
                        <span class="hidden text-left ltr:ml-2 rtl:ml-0 rtl:mr-2 xl:block">
                            <span class="block font-medium text-slate-600 dark:text-gray-400">Maria Gibson</span>
                            <span class="block -mt-1 text-xs text-slate-500 dark:text-gray-500">Admin</span>
                        </span>
                    </button>

                    <div class="z-50 hidden my-1 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dropdown-menu dropdown-menu-right border-slate-700 md:border-white dark:divide-gray-600 dark:bg-slate-800"
                        id="navUserdata">
                        <div class="px-4 py-3">
                            <span class="block text-sm font-medium text-gray-900 dark:text-white">Bonnie
                                Green</span>
                            <span
                                class="block text-sm font-normal text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                        </div>
                        <ul class="py-1" aria-labelledby="navUserdata">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 dark:text-gray-200 dark:hover:bg-gray-900/20 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 dark:text-gray-200 dark:hover:bg-gray-900/20 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 dark:text-gray-200 dark:hover:bg-gray-900/20 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 dark:text-gray-200 dark:hover:bg-gray-900/20 dark:hover:text-white">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </nav>
</div>
