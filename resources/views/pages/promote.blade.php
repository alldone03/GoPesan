@extends('pages.template')

@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Promote</div>
                    <div class="table-responsive">
                        <table id="tb1" class="table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>NRP</td>
                                    <td>Nama</td>
                                    <td>Role</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->username }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>
                                            @if ($d->role == 0)
                                                Master
                                            @endif
                                            @if ($d->role == 1)
                                                Admin
                                            @endif
                                            @if ($d->role == 2)
                                                User
                                            @endif
                                        </td>
                                        <td>
                                            @if ($d->role != 0)
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                                    data-bs-target="#inlineForm{{ $d->id }}">
                                                    Edit
                                                </button> <a href="{{ route('promote') }}/{{ $d->id }}"
                                                    class="btn btn-danger" onclick="return confirm_delete()">Delete</a>
                                            @endif
                                        </td>
                                        <div class="modal fade text-left" id="inlineForm{{ $d->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">{{ $d->nama }}
                                                        </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('promote') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $d->id }}">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="role" value="1"
                                                                            class="form-check-input"
                                                                            @if ($d->role == 1) checked @endif>
                                                                        Admin<i class="input-helper"></i></label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" name="role" value="2"
                                                                            class="form-check-input"
                                                                            @if ($d->role == 2) checked @endif>
                                                                        User<i class="input-helper"></i></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <input type="submit" class="btn btn-primary ml-1"
                                                                data-bs-dismiss="modal" value="Edit">

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @pushOnce('js')
        <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('/assets/vendors/chart.js/Chart.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('/assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('/assets/js/misc.js') }}"></script>
        <script src="{{ asset('/assets/js/settings.js') }}"></script>
        <script src="{{ asset('/assets/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ asset('/assets/js/chart.js') }}"></script>
        <!-- End custom js for this page -->

        {{-- datatables --}}


        <script type="text/javascript" charset="utf8" src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#tb1').DataTable({
                    paging: false,
                });
            });
            $(document).ready(function() {
                $('#tb2').DataTable({
                    paging: false,
                });
            });
        </script>
        <script type="text/javascript">
            function confirm_delete() {
                return confirm('are you sure?');
            }
        </script>
    @endPushOnce
@endsection
