<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosts" aria-expanded="true" aria-controls="collapsePosts">
        <i class="fas fa-fw fa-cog"></i>
        <span>Posts</span>
    </a>
    <div id="collapsePosts" class="collapse" aria-labelledby="headingPosts" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Posts</h6>
        <a class="collapse-item" href="{{ route('post.create') }}">Create a post</a>
        <a class="collapse-item" href="{{ route('post.index') }}">View All Posts</a>
        </div>
    </div>
</li>