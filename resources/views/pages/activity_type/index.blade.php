<x-layout>
    <x-slot name="title">Data Activity Type</x-slot>

    <div class="relative w-full bg-white rounded-md shadow dark:bg-slate-800">
        <div
            class="flex items-center justify-between px-4 py-3 border-b border-dashed border-slate-200 dark:border-slate-700 dark:text-slate-300/70">
            <h4 class="font-medium">Data Activity Type</h4>
            <a href="#modalcenter" data-modal-toggle="modal"
                class="px-3 py-2 text-sm font-semibold text-white bg-blue-500 rounded lg:px-4 collapse:bg-green-100 hover:bg-blue-600">Create
                New</a>
        </div>
        <div class="grid grid-cols-1 p-4">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="relative block w-full overflow-x-auto sm:px-6 lg:px-8">
                    <table class="w-full mb-5 border-collapse" id="datatable_1">
                        <thead class="bg-gray-50 dark:bg-gray-600/20">
                            <tr>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    ID
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Name
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Rate
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activityTypes as $activityType)
                                @php
                                    $index = $loop->index;
                                @endphp
                                <tr class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                    <td class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $activityType->name }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $activityType->formatted_rate }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <a href="#modalcenter" data-modal-toggle="modal"
                                            data-id="{{ $activityType->id }}" class="btn-edit">
                                            <i class="text-lg text-blue-500 ti ti-edit dark:text-blue-400"></i>
                                        </a>
                                        <button type="button" class="btn-delete" data-id="{{ $activityType->id }}">
                                            <i class="text-lg text-red-500 ti ti-trash dark:text-red-400"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Center Modal -->
    <div class="bg-slate-500/50 modal animate-ModalSlide" id="modalcenter">
        <div
            class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
            <div
                class="relative flex flex-col w-full bg-white rounded pointer-events-auto dark:bg-slate-800 bg-clip-padding">
                <div
                    class="flex items-center justify-between px-4 py-2 border-b border-solid rounded-t shrink-0 dark:border-gray-700 bg-slate-800">
                    <h6 class="mt-0 mb-0 text-base font-semibold leading-4 text-slate-300" id="staticBackdropLabel1">
                        Create Data Activity Type</h6>
                    <button type="button"
                        class="box-content w-4 h-4 p-1 text-xl leading-4 rounded-full bg-slate-700/60 text-slate-300 close"
                        aria-label="Close">&times;</button>
                </div>
                <div class="relative flex-auto p-4 leading-relaxed text-slate-600 dark:text-gray-300">
                    <form method="post" id="formSubmit">
                        @csrf
                        <input type="hidden" name="activity_type_id" id="activity_type_id" value="">
                        <div class="mb-2">
                            <label for="name" class="text-sm font-medium text-slate-600 dark:text-slate-400">Name</label>
                            <input type="text" id="name" name="name" value="" class="@error('name') error @enderror w-full px-3 py-1 mt-1 bg-transparent border rounded-md form-input border-slate-300/60 dark:border-slate-700 dark:text-slate-300 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700"
                                placeholder="ex: Lembur Hari Kerja" required>
                            @error('name')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="rate" class="text-sm font-medium text-slate-600 dark:text-slate-400">Rate</label>
                            <input type="number" id="rate" name="rate" value="" placeholder="ex: 200000" class="@error('rate') error @enderror w-full px-3 py-1 mt-1 bg-transparent border rounded-md form-input border-slate-300/60 dark:border-slate-700 dark:text-slate-300 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700"
                                required>
                            @error('rate')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div
                            class="flex flex-wrap justify-end p-3 border-t border-dashed rounded-b shrink-0 dark:border-gray-700">
                            <button type="button"
                                class="inline-block px-3 py-1 mr-1 text-sm font-medium text-red-500 bg-transparent border border-gray-200 rounded btn-close focus:outline-none hover:bg-red-500 hover:text-white dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500 close">Close</button>
                            <button type="submit"
                                class="inline-block px-3 py-1 text-sm font-medium bg-transparent border border-gray-200 rounded focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script src="{{ asset('assets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/js/pages/datatable.init.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
        @vite('resources/js/pages/activity-type.js')
    @endpush

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/mobius1-selectr/selectr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/libs/simple-datatables/style.css') }}">
    @endpush
</x-layout>
