@props(['name'])
@error($name)
    <div>
        <p class="text-xs text-danger font-semibold">{{$message}}</p>
    </div>
@enderror
