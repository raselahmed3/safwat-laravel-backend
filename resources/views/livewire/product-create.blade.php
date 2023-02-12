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
            'name' => 'namEe',
            'label' => 'NamEe',
            'type' => 'text',
            'placeholder' => 'Enter namEe',

        ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'product_image',
            'label' => 'Image',
            'type' => 'text',
            'placeholder' => 'image url',
            'required' => 'required',
        ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'placeholder' => 'Enter product description',
            'required' => 'required',
        ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',

            'placeholder' => 'Add price',
            'required' => 'required',
        ])
    </div>

    <div class="mb-6">
        @include('components.form-field', [
            'name' => 'DiscountPrice',
            'label' => 'DiscountPrice',
            'type' => 'number',

            'placeholder' => 'Discount Price',

        ])
    </div>



    @include('components.wire-loading-btn')
</form>
