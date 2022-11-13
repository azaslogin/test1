<div class="form-group mb-6">
    <label class="default-label">
        {{$title}}
    </label>
    <input type="{{$inputType}}" class="default-input" placeholder="{{$title}}" name="{{$name}}"
           value="{{$value}}">

    @error($name)
        @include('forms.validation-message')
    @enderror
</div>
