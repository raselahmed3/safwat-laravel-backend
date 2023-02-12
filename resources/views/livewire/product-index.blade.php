
<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Id </th>
            <th class="border px-4 py-2 text-left">Name </th>
            <th class="border px-4 py-2 text-left">IMG Top </th>
            <th class="border px-4 py-2 text-left">Image </th>
            <th class="border px-4 py-2 text-left">Description </th>
            <th class="border px-4 py-2 text-left">Price</th>
            <th class="border px-4 py-2 text-left">Discount</th>
            <th class="border px-4 py-2">Created at</th>
            <th class="border px-4 py-2">Action</th>
        </tr>

        @foreach ($products as $product)
            <tr >
                <td class="border font-semibold px-4 py-2">{{ $product->id }}</td>
                <td class="border font-semibold px-4 py-2">{{ $product->name }}</td>
                <td class="border font-semibold px-4 py-2">{{ $product->namEe }}</td>
                <td class="border font-semibold text-center px-4 py-2">
                    <img class="w-32 mx-auto" src="{{$product->image}}" alt="">
                </td>
               <td class="border font-semibold px-4 py-2">{{ $product->description }}</td>
                <td class="border font-semibold px-4 py-2">{{ $product->price }}</td>
                <td class="border px-4  text-gray-600 cursor-auto ml-2 py-2">{{ $product->DiscountPrice }}</td>
                <td class="border font-semibold px-4 py-2 text-center">{{ date('F,j,Y',strtotime($product->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                   <div class="flex items-center justify-center">
                    <a href="{{ route('product.edit',$product->id) }}">
                        @include('components.icons.edit')
                       </a>

                       <a class="px-2" href="{{ route('product.show',$product->id) }}">
                        @include('components.icons.eye')
                       </a>

                       <form onsubmit="return confirm('Are you sure?');" wire:submit.prevent="productDelete({{ $product->id }})">
                           <button type="submit">
                                   @include('components.icons.trash')
                           </button>
                       </form>
                   </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
