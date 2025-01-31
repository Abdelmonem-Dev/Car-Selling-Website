@props(['message'])

@if(session(  $message  ))
    <div class="alert alert-danger" style="color:red; font-size: 12px;">{{ session($message) }}</div>
    @else
    <div class="alert alert-danger" style="color:red; font-size: 12px;">{{ $message }}</div>
@endif
