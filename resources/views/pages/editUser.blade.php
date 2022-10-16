@extends('pages.template')

@section('konten')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Edit User
                    </h5>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('edituser/update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control-plaintext" name="username" id="exampleInputUsername1"
                                placeholder="Username" value="{{ Auth::user()->username }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Username"
                                value="{{ Auth::user()->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Ganti Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required>
                        </div>
                        <input type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        @if (Auth::user()->role == 0)
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Change State</div>
                        <form action="{{ route('edituser/updatestate') }}" method="post">
                            @csrf
                            <input type="hidden" name="data"
                                value="@if ($datanow) 0 @endif @if (!$datanow) 1 @endif">
                            <input
                                class="btn @if ($datanow) btn-success
                            @else
                            btn-danger @endif "
                                type="submit"
                                value="@if ($datanow) Terbuka @endif @if (!$datanow) Tertutup @endif ">
                        </form>
                    </div>
                </div>
            </div>
        @endif
        @if (Auth::user()->role == 0)
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Change State</div>

                        @foreach ($datamenu as $d)
                            <button class="btn btn-success" type="button" onclick="" value="hello">
                        @endforeach

                    </div>
                </div>
            </div>
        @endif
    </div>
    @pushOnce('js')
        <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    @endPushOnce
@endsection
