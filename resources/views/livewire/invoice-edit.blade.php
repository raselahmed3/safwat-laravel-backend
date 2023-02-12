<div>
    <h2>Information</h2>
    <p>Invoice to: {{$invoice->name}}</p>

    <table class="table-auto w-full">
        <tr>
            <th class="lms-cell-border text-left">Name</th>
            <th class="lms-cell-border">Price</th>
            <th class="lms-cell-border">Quantity</th>
            <th class="lms-cell-border text-right">Total</th>
        </tr>

        @foreach($invoice->items as $item)
        <tr>
            <td class="lms-cell-border">{{$item->product->name}}</td>
            <td class="lms-cell-border text-center">${{number_format($item->price, 2)}}</td>
            <td class="lms-cell-border text-center">{{$item->quantity}}</td>
            <td class="lms-cell-border text-right">${{number_format($item->price * $item->quantity, 2)}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" class="lms-cell-border text-right">Subtotal</td>
            <td class="lms-cell-border text-right">${{number_format($invoice->amount()['total'], 2)}}</td>
        </tr>
    </table>




</div>
