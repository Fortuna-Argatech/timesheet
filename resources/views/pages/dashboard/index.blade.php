<x-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="relative w-full bg-white rounded-md shadow dark:bg-slate-800">
        <div class="px-4 py-3 border-b border-dashed border-slate-200 dark:border-slate-700 dark:text-slate-300/70">
            <h4 class="font-medium">Title</h4>
        </div>
        <div class="flex-auto p-4">
            <div class=" sm:col-span-3 md:col-span-4 lg:col-span-4 xl:col-span-3">
                <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4">
                    <div class="md:col-span-2 lg:col-span-1 xl:col-span-1">
                        <div class="relative w-full p-4 bg-white rounded-md shadow dark:bg-slate-800">
                            <div class="flex justify-between xl:gap-x-2 items-cente">
                                <div class="relative -m-3 overflow-hidden text-transparent">
                                    <i data-feather="hexagon"
                                        class="relative w-20 h-20 mx-auto rotate-90 fill-slate-500/5 group-hover:fill-white/10 top-1"></i>
                                    <div
                                        class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 text-slate-500 rounded-xl group-hover:text-white">
                                        <i class="text-3xl ti ti-users"></i>
                                    </div>
                                </div>
                                <div class="self-center ml-auto">
                                    <h3 class="my-1 text-2xl font-semibold dark:text-slate-200">{{ $data['employee'] }}</h3>
                                    <p class="mb-0 font-medium text-gray-400">Employee</p>
                                </div>
                            </div>
                        </div> <!--end inner-grid-->
                    </div>
                    <div class="md:col-span-2 lg:col-span-1 xl:col-span-1">
                        <div class="relative w-full p-4 bg-white rounded-md shadow dark:bg-slate-800">
                            <div class="flex justify-between xl:gap-x-2 items-cente">
                                <div class="relative -m-3 overflow-hidden text-transparent">
                                    <i data-feather="hexagon"
                                        class="relative w-20 h-20 mx-auto rotate-90 fill-slate-500/5 group-hover:fill-white/10 top-1"></i>
                                    <div
                                        class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 text-slate-500 rounded-xl group-hover:text-white">
                                        <i class="text-3xl ti ti-activity"></i>
                                    </div>
                                </div>
                                <div class="self-center ml-auto">
                                    <h3 class="my-1 text-2xl font-semibold dark:text-slate-200">{{ $data['activityType'] }}</h3>
                                    <p class="mb-0 font-medium text-gray-400">Activity Type</p>
                                </div>
                            </div>
                        </div> <!--end inner-grid-->
                    </div>
                    <div class="md:col-span-2 lg:col-span-1 xl:col-span-1">
                        <div class="relative w-full p-4 bg-white rounded-md shadow dark:bg-slate-800">
                            <div class="flex justify-between xl:gap-x-2 items-cente">
                                <div class="relative -m-3 overflow-hidden text-transparent">
                                    <i data-feather="hexagon"
                                        class="relative w-20 h-20 mx-auto rotate-90 fill-slate-500/5 group-hover:fill-white/10 top-1"></i>
                                    <div
                                        class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 text-slate-500 rounded-xl group-hover:text-white">
                                        <i class="text-3xl ti ti-file-report"></i>
                                    </div>
                                </div>
                                <div class="self-center ml-auto">
                                    <h3 class="my-1 text-2xl font-semibold dark:text-slate-200">{{ $data['timesheet'] }}</h3>
                                    <p class="mb-0 font-medium text-gray-400">Timesheet</p>
                                </div>
                            </div>
                        </div> <!--end inner-grid-->
                    </div>
                    <div class="md:col-span-2 lg:col-span-1 xl:col-span-1">
                        <div class="relative w-full p-4 bg-white rounded-md shadow dark:bg-slate-800">
                            <div class="flex justify-between xl:gap-x-2 items-cente">
                                <div class="relative -m-3 overflow-hidden text-transparent">
                                    <i data-feather="hexagon"
                                        class="relative w-20 h-20 mx-auto rotate-90 fill-slate-500/5 group-hover:fill-white/10 top-1"></i>
                                    <div
                                        class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 text-slate-500 rounded-xl group-hover:text-white">
                                        <i class="text-3xl ti ti-file-horizontal"></i>
                                    </div>
                                </div>
                                <div class="self-center ml-auto">
                                    <h3 class="my-1 text-2xl font-semibold dark:text-slate-200">{{ $data['timeLog'] }}</h3>
                                    <p class="mb-0 font-medium text-gray-400 truncate ">Time Logs</p>
                                </div>
                            </div>
                        </div> <!--end inner-grid-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
