<form wire:submit.prevent="formSubmit">
    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Enter name',
            'required' => 'required',
        ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'phone_number',
            'label' => 'Phone Number',
            'type' => 'text',
            'placeholder' => '+8801354343428',
            'required' => 'required',
        ])
    </div>

    <div class="mb-6">
       @include('components.form-field', [
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text',
            'placeholder' => 'Enter your address',
            'required' => 'required',
        ])
    </div>
    <div class="mb-6">
        @include('components.form-field', [
             'name' => 'Staddress',
             'label' => 'Street Address',
             'type' => 'text',
             'placeholder' => 'Enter your street address',
             'required' => 'required',
         ])
     </div>
  <div class="flex flex-wrap gap-4 items-center">
      @foreach ($products as $product)
          <div class="flex items-center">
              <input wire:click="addQuantity" id="checked-checkbox-{{$product->id}}" wire:model="selectedProducts" type="checkbox" value="{{$product->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2">
              <label for="checked-checkbox-{{$product->id}}" class="ml-2 text-sm font-medium text-gray-900">{{$product->name}}</label>
          </div>
      @endforeach
  </div>

  @if(!empty($selectedProducts))
        <table class="w-full table-auto mt-4">
            <tr>
                <th class="border px-4 py-2 text-left">Id</th>
                <th class="border px-4 py-2 text-left">Name</th>
                <th class="border px-4 py-2 text-left">Image</th>
                <th class="border px-4 py-2 text-left">Quantity</th>
                <th class="border px-4 py-2 text-left">Price</th>
                <th class="border px-4 py-2">Total</th>
            </tr>

            @foreach ($products->whereIn('id', $selectedProducts) as $product)
                <tr >
                    <td class="border px-4 py-2">{{ $product->id }}</td>
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border text-center px-4 py-2">
                        <img class="w-32 mx-auto" src="{{$product->image}}" alt="">
                    </td>
                    <td class="border px-4 py-2">
                        <input type="number" min="1"  wire:model="quantities.{{$product->id}}">
                    </td>
                   <td class="border px-4 py-2">{{ number_format($product->price,2) }} tk</td>

                    <td class="border px-4 py-2">{{number_format($product->price * $quantities[$product->id],2)}} tk</td>
                </tr>
            @endforeach
        </table>
  @endif



    @include('components.wire-loading-btn')
</form>

