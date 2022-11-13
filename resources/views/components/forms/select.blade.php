<div class="form-group mb-6">
    <label class="default-label">
        {{$title}}
    </label>
    <select name="{{$name}}" class="default-input">
        <option value="">Select {{$title}}</option>
        @foreach ($items as $item)
            <option
                value="{{ $item->id }}" @selected($value == $item->id)>{{ $item->title }}</option>
        @endforeach
    </select>

    @error($name)
        @include('forms.validation-message')
    @enderror
</div>

