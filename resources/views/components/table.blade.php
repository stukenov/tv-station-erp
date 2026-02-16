<table class="min-w-full divide-y divide-gray-300">
    @if($thead==true)

    <thead class="bg-gray-50">
        <tr>
            @foreach($theadth as $th)
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ $th }}</th>
            @endforeach

        </tr>
    </thead>
    @endif
    @if($tbody==true)
    <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($tbodydata as $data)
            <tr>
                @foreach($tbodyth as $th)
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $data->$th }}</td>
                @endforeach
            </tr>
            @endforeach
    </tbody>
    @endif
</table>
