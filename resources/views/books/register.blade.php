@extends('layouts.base')

@section('title', 'Register Book Info')

@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Register your book information</h2>
            
                <form action="{{ action('BookController@registerPage') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">Book Title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('title') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">Tags</label>
                        <div class="col-md-10">
                        @foreach($tags as $tag)
                            <div class="custom-control custom-checkbox col-md-10">
                              <input type="checkbox" class="custom-control-input" id="{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                              <label class="custom-control-label" for="{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">Book Image</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    
                    <input type="submit" class="btn btn-primary" value="Register">
                    
                </form>
            </div>
        </div>
    </div>

@endsection
