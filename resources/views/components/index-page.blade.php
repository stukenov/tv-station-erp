<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if($header==true)
    <div class="sm:flex sm:items-center sm:justify-between">
        <h1 class="text-3xl font-semibold text-gray-900">{{ $title }}</h1>
        @if($actionbutton==true)
        <a href="{{ $actionbuttonroute }}" class="mt-3 sm:mt-0 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            {{ $actionbuttontext }}
            </a>
        @endif
    </div>
    @endif

    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    @if($table==true)
                    <x-table
                    thead="true"
                    :thead="$thead"
                    :theadth="$theadth"
                    :tbody="$tbody"
                    :tbodydata="$tbodydata"
                    :tbodyth="$tbodyth"
                    />
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
            {{-- {{ $tbodydata->links() }} --}}
    </div>
</div>
