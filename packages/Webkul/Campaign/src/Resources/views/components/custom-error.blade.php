@props([
    'name'        => null,
])
@error($name)
<div class="text-red-500">{{ $message }}</div>
@enderror
