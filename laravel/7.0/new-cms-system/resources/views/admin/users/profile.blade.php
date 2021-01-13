<x-admin-master>
    @section('content')
        <h1>User profile for: {{ $user->name }}</h1>    

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <img class="img-profile rounded-circle" height="150px" style="width: 10rem; height:10rem;" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="avatar" id="">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}">

                        @error('username')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{ $user->name }}">

                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{ $user->email }}">

                        @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control  {{$errors->has('password') ? 'is-invalid' : ''}}" value="">

                        @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" name="password-confirmation" id="password-confirmation" class="form-control {{$errors->has('password-confirmation') ? 'is-invalid' : ''}}" value="">

                        @error('password-confirmation')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4 mt-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="roles-table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="" id=""
                                        @foreach ($user->roles as $userRole)
                                            @if ($userRole->slug == $role->slug)
                                                checked
                                            @endif
                                        @endforeach
                                        >
                                    </td>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td>
                                        <form action="{{ route('user.role.attach', $user) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button class="btn btn-success"
                                            @if ($user->roles->contains($role))
                                                disabled
                                            @endif
                                            >Attach</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('user.role.detach', $user) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button class="btn btn-danger"
                                            @if (!$user->roles->contains($role))
                                                disabled
                                            @endif
                                            >Detach</button>
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