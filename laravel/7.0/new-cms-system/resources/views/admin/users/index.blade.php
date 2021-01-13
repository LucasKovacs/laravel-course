<x-admin-master>
    @section('content')
        <h1>All Users</h1>

        <x-alerts></x-alerts>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Registered on</th>
                        <th>Updated profile date</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Registered on</th>
                        <th>Updated profile date</th>
                        <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td><img src="{{ $user->avatar }}" alt="" class="img-fluid" style="max-width: 150px"></td>
                        <td><a href="{{ route('user.profile.show', $user->id) }}" title="{{ $user->name }}">{{ $user->name }}</a></td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                        <td>
                            {{-- @can('delete', auth()->user()) --}}
                            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger">Delete</button>
                            </form>
                            {{-- @endcan --}}
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="d-flex">
            <div class="mx-auto">
              {{-- {{$users->links()}} --}}
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/datatables-demo.js') }}"></script>
    @endsection
</x-admin-master>