<div>
    <div class="flex flex-col mt-10">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 dark:border-gray-700 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left dark:text-gray-400 text-gray-500 uppercase">
                                    Started Shift
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left dark:text-gray-400 text-gray-500 uppercase">
                                    Ended Shift
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left dark:text-gray-400 text-gray-500 uppercase">
                                    Total Hours
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($shifts as $shift)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-gray-300">{{ $shift->started_at }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                        {{ $shift->finished_at }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                        {{ $shift->total_hours }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if( count($shifts) > 0 )
                    <div wire:click="loadMore()" class="flex items-center justify-start w-full py-2 pl-8 text-xs font-medium text-gray-500 dark:text-gray-400 duration-200 ease-out bg-gray-200 dark:bg-gray-600 cursor-pointer hover:text-gray-600 hover:bg-gray-300 transition-color md:pl-0 md:justify-center">Load More</div>
                    @else
                        <div class="flex items-center justify-start w-full py-2 pl-8 text-xs font-medium text-gray-500 duration-200 ease-out bg-gray-100 dark:bg-gray-600 transition-color md:pl-0 md:justify-center">No more entries</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
