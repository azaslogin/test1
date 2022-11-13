<div class="form-group mb-6">
    <label class="default-label">
        {{$title}}
    </label>
    <select name="{{$name}}[]" class="default-input" multiple>
        <option value="">Select {{$title}}</option>
        @foreach ($items as $item)
            <option
                value="{{ $item->id }}" @if (is_array($values) && in_array($item->id, $values)) selected @endif>{{ $item->title }}</option>
        @endforeach
    </select>

    @error($name)
        @include('forms.validation-message')
    @enderror
</div>

