@extends('layouts.app')

@section('content')

<ul>
    @foreach ($posts as $post)
        <div class="image-container">
            <img src="{{$post->path}}" alt="{{$post->title}}" height="100px">
        </div>
        <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
    @endforeach
</ul>
<a href="{{route('posts.create')}}">Create</a>

@endsection

@yield('footer')