{{-- <label for="{{ $name }}" class="lms-label">{{ $label }}</label>
@if ($type === 'textarea')
    <textarea wire:model.lazy="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" class="lms-input"
        {{ $required }}> </textarea>
@else
    <input wire:model.lazy="{{ $name }}" id="{{ $name }}" type="{{ $type }}"
        placeholder="{{ $placeholder }}" class="lms-input" {{ $required }}>
@endif

@error($name)
    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
@enderror --}}


@if($type == 'textarea')
    <div class="w-full mx-3">
        <label for="{{$name}}" class="lms-label">{{$label}}</label>
        <textarea id="{{$name}}" class="lms-input !h-48" name="{{$name}}" wire:model="{{$name}}" placeholder="{{$placeholder}}"></textarea>
        @error($name)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
        @enderror
    </div>
@else
    <div class="w-full mx-3">
        <label for="{{$name}}" class="lms-label">{{$label}}</label>
        <input type="{{$type}}" wire:model="{{$name}}" id="{{$name}}"  class="lms-input" placeholder="{{$placeholder}}" />
        @error($name)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
        @enderror
    </div>
@endif

