@php
    $badges = [
        'primary' => 'bg-primary-500/10 text-primary-500',
        'Draft' => 'bg-gray-500/10 text-gray-500',
        'red' => 'bg-red-500/10 text-red-500',
        'Submitted' => 'bg-green-500/10 text-green-500',
        'yellow' => 'bg-yellow-500/10 text-yellow-500',
        'indigo' => 'bg-indigo-500/10 text-indigo-500',
        'purple' => 'bg-purple-500/10 text-purple-500',
        'pink' => 'bg-pink-500/10 text-pink-500',
    ];
@endphp
<x-layout>
    <x-slot name="title">Timesheet Data</x-slot>

    <div class="relative w-full bg-white rounded-md shadow dark:bg-slate-800">
        <div
            class="flex items-center justify-between px-4 py-3 border-b border-dashed border-slate-200 dark:border-slate-700 dark:text-slate-300/70">
            <h4 class="w-full font-medium">Timesheet Data</h4>
            <form method="POST" class="flex items-center w-full gap-4 py-4" id="createData">
                @csrf
                <select name="timesheet_id" id="timesheetSelect" class="w-full px-3 py-1 mt-1 bg-transparent border rounded-md form-input border-slate-300/60 dark:border-slate-700 dark:text-slate-300 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700">
                    <option selected disabled>Select Timesheet First</option>
                </select>
                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="w-32 px-3 py-2 text-sm font-semibold text-white bg-blue-500 rounded create-data lg:px-4 collapse:bg-green-100 hover:bg-blue-600">Fetch
                        Data</button>
                </div>
            </form>
        </div>
        <div class="grid grid-cols-1 p-4">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="relative block w-full overflow-x-auto sm:px-6 lg:px-8">
                    <table class="w-full border-collapse" id="datatable_1">
                        <thead class="bg-gray-50 dark:bg-gray-600/20">
                            <tr>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    ID
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Employee ID
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Name
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Email
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Company
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Status
                                </th>
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Total Hours
                                </th>
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Total Billing
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    note
                                </th>
                                <th scope="col"
                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($timesheets as $timesheet)
                                <tr class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                    <td class="p-3 text-sm font-medium dark:text-white">
                                        {{ $timesheet->timesheet_id }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $timesheet->employee_id }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $timesheet->employee->name }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $timesheet->employee->email }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $timesheet->employee->company }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                        @php
                                        $statusClass = $badges[$timesheet->status] ?? 'bg-gray-500/10 text-gray-500';
                                        @endphp
                                        <span class="{{ $statusClass }} text-[11px] font-medium px-2.5 py-0.5 rounded h-5">{{ $timesheet->status }}</span>
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $timesheet->total_hours }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $timesheet->formatted_billable_amount }}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                        {!! $timesheet->note !!}
                                    </td>
                                    <td class="p-3 text-sm text-gray-500 dark:text-gray-400">
                                        <a href="{{ route('timesheet.timelogs.index', $timesheet->timesheet_id) }}">
                                            <i class="text-lg text-gray-500 fas fa-eye dark:text-gray-400"></i>
                                        </a>
                                        <button type="button" class="btn-delete" data-name="{{ $timesheet->timesheet_id }}">
                                            <i class="text-lg text-red-500 ti ti-trash dark:text-red-400"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script src="{{ asset('assets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/js/pages/datatable.init.js') }}"></script>
        <script src="{{ asset('assets/libs/mobius1-selectr/selectr.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
        @vite('resources/js/pages/timesheet.js')
    @endpush

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/mobius1-selectr/selectr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/libs/simple-datatables/style.css') }}">
    @endpush
</x-layout>
