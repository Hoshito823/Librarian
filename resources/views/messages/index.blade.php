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
        
        <div class="sendBox" style="position: sticky; bottom: 20px;">
            <form action="{{ action('MessageController@send') }}" method="post" enctype="multipart/form-data">
                <div class="input-group" style="margin-top:40px">
                  <input type="text" class="form-control" name="body" placeholder="" aria-label="" aria-describedby="basic-addon1">
                  <input type="hidden" class="form-control" name="receiverId" value="{{ $you['id'] }}">
                  <div class="input-group-append">
                    <button class="btn btn-success" type="button">Sent</button>
                  </div>
                </div>
                {{ csrf_field() }}
            </form>
            
            <div style="margin-top: 10px; text-align: right;">
                <a href="{{ action('MessageController@back') }}"><button type="button" class="btn btn-light">Back</button></a>
            </div>
            
        </div>
    
    </div>
    
</div>
@endsection