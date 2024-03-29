<x-admin-master>
    @section('content')
        <h1>Create</h1>

        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="post_image" id="post_image" class="form-control-file">
            </div>
            <div class="form-group">
                <textarea name="body" id="body" cols="30" rows="10" class="form-comtrol"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    @endsection
</x-admin-master>