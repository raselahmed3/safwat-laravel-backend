<div>

    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Id </th>
            <th class="border px-4 py-2 text-left">Name </th>
            <th class="border px-4 py-2 text-left">Image </th>
            <th class="border px-4 py-2 text-left">Description </th>
            <th class="border px-4 py-2 text-left">Price</th>
            <th class="border px-4 py-2">Created at</th>

        </tr>

        {{-- @foreach ($products as $product) --}}
            <tr >
                <td class="border px-4 py-2">{{ $product->id }}</td>
                <td class="border px-4 py-2">{{ $product->name }}</td>
                <td class="border text-center px-4 py-2">
                    <img class="w-32 mx-auto" src="{{$product->image}}" alt="">
                </td>
               <td class="border px-4 py-2">{{ $product->description }}</td>
                <td class="border px-4 py-2">{{ $product->price }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F,j,Y',strtotime($product->created_at)) }}</td>

            </tr>
        {{-- @endforeach --}}
    </table>
</div>
