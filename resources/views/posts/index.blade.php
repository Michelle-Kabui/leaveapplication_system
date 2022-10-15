@extends('layouts.app')

@section('content')
    <div class="p-3">
    <form action="{{route('posts')}}" method="post">
            {{ csrf_field() }} 
    
            <div class="form-group mb-3 p-5">
                <label for="body">Today's Blog</label>
                
                <textarea name="body" id="body" cols="30" rows="5" class=" p-4 bg-info bg-opacity-10 form-control @error('body') border border-danger @enderror"
                placeholder="Post something here "></textarea>

                @error('body')
                    <div class="fw-light text-danger" >
                        {{$message}}

                    </div>
                @enderror
            </div>

            
            <button type="submit" class="btn btn-primary">Post</button>
            <button type="reset" class="btn btn-danger">Cancel</button>

        </form>

    </div>
@endsection