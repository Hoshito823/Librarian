@extends('layouts.base')

@section('title', 'Books List')

{{-- road Toastr --}}
@section('toastr')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <script>
                    @if (session('successMessage'))
                        $(function () {
                            toastr.success('{{ session('successMessage') }}');
                        });
                    @endif
                </script>
                
                <div>
                    <h2 class="col-md-6" style="display:inline;">Available Books List</h2>
                    <a class="col-md-2 offset-md-2" href="{{ action('BookController@registerPage') }}">
                        <button type="button" class="btn btn-light">Book Register</button>
                    </a>
                    
                    <div style="margin-top: 15px;">
                        <form class="form-inline" action="{{ action('BookController@index') }}" method="post" enctype="multipart/form-data">
                          <label class="sr-only" for="inlineFormInputName2">Book Title</label>
                          <input type="text" class="form-control mb-2 mr-sm-2 col-md-6" id="inlineFormInputName2" placeholder="Book Title" name="searchText">
                          <button type="submit" class="btn btn-light mb-2 col-md-2 offset-md-2">Search</button>
                          {{ csrf_field() }}
                        </form>
                    </div>
                </div>
    
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
                                            <a href="{{ action('MessageController@displayChat', ['id' => $book->owner->id]) }}">
                                                <button type="button" class="btn btn-light">Chatt</button>
                                            </a>
                                            
                                            <a href="{{ action('BookController@borrow' , ['id' => $book->id]) }}">
                                                <button type="button" class="btn btn-warning">Borrow</button>
                                            </a>
                                            
                                        </div>
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <hr color="#c0c0c0">
                        @endforeach
                    </div>
                </div>
                
                {{ $books->appends(request()->input())->links() }}
                
            </div>
            
        </div>
    </div>
@endsection