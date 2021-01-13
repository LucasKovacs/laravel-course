<x-admin-master>
    @section('content')
        <h1>Edit a post</h1>

        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <div><img src="{{ $post->post_image }}" alt="" class="img-fluid" width="150px"></div>
                <label for="file">File</label>
                <input type="file" name="post_image" id="post_image" class="form-control-file">
            </div>
            <div class="form-group">
                <textarea name="body" id="body" cols="30" rows="10" class="form-comtrol">{{ $post->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    @endsection
</x-admin-master>