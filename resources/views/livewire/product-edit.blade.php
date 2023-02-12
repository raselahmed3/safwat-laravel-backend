

<div>
    <form class="p-4" wire:submit.prevent="productEdit">
        <div class="flex w-full">
            @include('components.form-field',['name'=>'product_name','type'=>'text','label' => 'Name', 'placeholder'=>'Product Name'])
            @include('components.form-field',['name'=>'product_namEe','type'=>'text','label' => 'NamEe', 'placeholder'=>'Product NamEe'])

           @include('components.form-field',['name'=>'product_image','type'=>'text','label' => 'Image', 'placeholder'=>'image url'])
            @include('components.form-field',['name'=>'price','type'=>'number','label' => 'Price', 'placeholder'=>'Amount'])
            @include('components.form-field', [ 'name' => 'DiscountPrice','label' => 'DiscountPrice','type' => 'number', 'placeholder' => 'Discount Price','required' => 'required', ])
        </div>
        <div class="w-full mt-8">
            @include('components.form-field',['name'=>'description','type'=>'textarea','label' => 'Description', 'placeholder'=>'Description'])
        </div>





        @include('components.wire-loading-btn',[
            // 'target' =>'productEdit',
            // 'class' => 'bg-green-500 ml-3',
            // 'buttonText'=>'Update'
        ])
    </form>

</div>
