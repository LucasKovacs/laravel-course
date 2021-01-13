@extends('layouts.app')

@section('content')
    
<h1>Edit Post</h1>

{!! Form::model($post, ['method' => 'patch', 'action' => ['PostsController@update', $post->id]]) !!}

    {{--https://laravelcollective.com/docs/5.2/html--}}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}

<h1>Delete Post</h1>

{!! Form::open(['method' => 'delete', 'action' => ['PostsController@destroy', $post->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete Post', ['class' => 'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}

@endsection

@yield('footer')