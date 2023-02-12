<div>
    <table class="w-full table-auto">
<tr>
    <th class="border px-4 py-2 text-left">Id</th>
    <th class="border px-4 py-2 text-left">Name</th>
    <th class="border px-4 py-2 text-left">Phone</th>
   <th class="border px-4 py-2 text-left">Address</th>
   <th class="border px-4 py-2 text-left">Street Address</th>
    <th class="border px-4 py-2 text-left">products</th>
    <th class="border px-4 py-2 text-left">Actions</th>
</tr>
@foreach ($invoices as $invoice )
<tr>
    <td class="border px-4 py-2 ">{{ $invoice->id }}</td>
    <td class="border px-4 py-2 ">{{ $invoice->name }}</td>
    <td class="border px-4 py-2 ">{{  $invoice->phone }}</td>
    <td class="border px-4 py-2 ">{{ $invoice->address }}</td>
    <td class="border px-4 py-2 ">{{ $invoice->Staddress }}</td>
    <td class="border px-4 py-2 ">
        <div class="flex gap-2 flex-wrap">
            @foreach($invoice->items as $item)
                <p class="bg-green-500 text-xs text-white py-1 px-2">{{$item->product->name}}</p>
            @endforeach
        </div>
    </td>

    <td class="border px-4 py-2 text-center">
        <div class="flex items-center justify-center">
            {{-- <a href="{{route('invoice-edit', $invoice->id)}}">@include('components.icons.edit')</a> --}}
            <a href="{{route('invoice-show', $invoice->id)}}">@include('components.icons.eye')</a>
        <form onsubmit="return comfirm(Are You Sure?);" wire:submit.prevent="invoiceDelete({{ $invoice->id }})">
            <button type="submit">
                @include('components.icons.trash')
            </button>
        </form>
        </div>
    </td>
</tr>

@endforeach
    </table>
    <div class="mt-4">
        {{ $invoices->links() }}
    </div>
</div>
