<x-admin-master>
    @section('content')
        <h1>Permissions</h1>

        <x-alerts></x-alerts>

        <div class="row">
            <div class="col-sm-3">
                <form method="post" action="{{ route('permissions.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>
            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Delete</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Delete</th>
                            </tr>
                          </tfoot>
                          <tbody>
                              @foreach ($permissions as $permission)
                              <tr>
                                <td>{{ $permission->id }}</td>
                                <td><a href="{{ route('permissions.edit', $permission->id) }}">{{ $permission->name }}</a></td>
                                <td>{{ $permission->slug }}</td>
                                <td>
                                    <form action="{{ route('permissions.destroy', $permission) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>