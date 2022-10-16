@extends('pages.template')

@section('konten')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-tile">
                        Edit Menu
                    </div>
                    <table id="tbl1" class="table">
                        <thead>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Jenis</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $u)
                                <tr>
                                    <td>{!! $u->menu !!}</td>
                                    <td>@currency($u->harga)</td>
                                    <td>
                                        @if ($u->jenis == 0)
                                            Makanan
                                        @else
                                            Minuman
                                        @endif
                                    </td>
                                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                            data-bs-target="#inlineForm{{ $u->id }}">
                                            Edit
                                        </button> <a href="/editmenu/delete/{{ $u->id }}" class="btn btn-danger"
                                            onclick="return confirm_delete()">Delete</a>
                                    </td>
                                    <div class="modal fade text-left" id="inlineForm{{ $u->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">
                                                        {{ $u->nama }}
                                                    </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="{{ route('editmenu/update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="verifiedby"
                                                        value="{{ Auth::user()->nama }}">
                                                    <input type="hidden" name="id" value="{{ $u->id }}">
                                                    <div class="modal-body">
                                                        <label>Menu</label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="" name="menu"
                                                                class="form-control" value="{{ ucwords($u->menu) }}">
                                                        </div>
                                                        <label>Harga</label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="" name="harga"
                                                                class="form-control" value="{{ $u->harga }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="jenis" value="0"
                                                                        class="form-check-input"
                                                                        @if ($u->jenis == 0) checked @endif>
                                                                    Makanan <i class="input-helper"></i></label>
                                                            </div>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" name="jenis" value="1"
                                                                        class="form-check-input"
                                                                        @if ($u->jenis == 1) checked @endif>
                                                                    Minuman <i class="input-helper"></i></label>
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
@endsection

@push('js')
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
            $('#tbl1').DataTable({
                paging: false,
            });
        });
    </script>
    <script type="text/javascript">
        function confirm_delete() {
            return confirm('are you sure?');
        }
    </script>
@endpush
