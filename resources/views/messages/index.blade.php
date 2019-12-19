@extends('layouts.base')

@section('title', 'showmessage')

@section('content')
<div class="container">
    <h2>Chat Room</h2>
    <div class="col-md-6 mx-auto">
        @foreach($conversation as $message)
          @if($message->from_user_id == $me->id)
              {{-- Show My Messages --}}
              <div class="message" style="text-align:right">
                  <p style="color:yellow">{{ $me->name }}</p>
                  <p style="color:yellow">{{ $message->body }}</p>
              </div>
        　@else
        　    <div class="message">
        　        <p>{{ $message->from_user->name }}</p>
                 <p>{{ $message->body }}</p>
             </div>
          @endif
        @endforeach
    </div>
</div>
@endsection