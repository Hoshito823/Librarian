@extends('layouts.base')

@section('title', 'Books List')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Available Books List</h2>

                <div class="row">
                    <div class="posts">
                        <hr color="#c0c0c0">
                        @foreach($books as $book)
                            <div class="post">
                                <div class="row">
                                    
                                    <div class="image col-md-6">
                                        @if ($book->image_path)
                                            <img class="bookImage" src="{{ asset('storage/image/' . $book->image_path) }}">
                                        @else
                                            <p>No Image</p>
                                        @endif
                                    </div>
                                    
                                    <div class="text col-md-6">
                                        <div class="date">
                                            {{ 'Updated at : ' . $book->updated_at->format('Y年m月d日') }}
                                        </div>
                                        
                                        <div class="owner">
                                            {{ 'Owner : ' . $book->owner->name }}
                                        </div>
                                        
                                        <div class="name">
                                            {{ 'Title : ' . \Str::limit($book->name, 150) }}
                                        </div>
                                        
                                        <div>
                                            <a href="{{ action('MessageController@displayChat', ['id' => $book->owner->id]) }}"><button type="button" class="btn btn-light">Request Rental</button></a>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <hr color="#c0c0c0">
                        @endforeach
                    </div>
                </div>
            
            <div>
                <a href="{{ action('BookController@registerPage') }}"><button type="button" class="btn btn-primary">Book Register</button></a>
            </div>
    
            </div>
            
        </div>
    </div>
@endsection