@extends('layouts.base')

@section('title', 'showmessage')

@section('content')
<div class="container">
    <h2>Chat Room</h2>
    <div class="col-md-8 mx-auto">
        @foreach($conversation as $message)
          @if($message->from_user_id == $me->id)
              {{-- Show My Messages --}}
              <div class="message-container-right">
                  <p class="username">{{ $me->name }}</p>
                  <div class="balloon1-right">
                      <p>{{ $message->body }}</p>
                  </div>
              </div>
        　@else
        　    <div class="message-containe-left">
        　        <p class="username">{{ $message->from_user->name }}</p>
            　    <div class="balloon1-left">
                     <p>{{ $message->body }}</p>
                 </div>
             </div>
          @endif
        @endforeach
    </div>
</div>
@endsection