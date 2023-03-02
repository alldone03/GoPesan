@extends('pages.template')

@section('konten')
    @if (!$datanow)
        <div class="alert alert-danger" role="alert">
            Mohon Maaf, Untuk Pemesanan Telah Ditutup!!!
        </div>
    @endif
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Order Makanan</h4>
                <div class="table-responsive">
                    <table id="tb2" class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Pesanan</th>
                                <th>Harga</th>
                                <th>Bayar</th>
                                <th>Status</th>
                                <th>VerfiedBy</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                @if ($d->jenis == 0)
                                    <tr>
                                        <td>{{ $d->nama }}</td>
                                        <td>{!! ucwords($d->pesanan) !!}</td>
                                        <td>@currency($d->harga)</td>
                                        <td>@currency($d->bayar)</td>
                                        <td>
                                            @if ($d->status == 1)
                                                <label class="badge badge-success">Sudah Bayar</label>
                                            @else
                                                <label class="badge badge-danger">Belum Bayar</label>
                                            @endif
                                        </td>
                                        <td>{{ $d->verifiedby }}</td>
                                        <td><button type="button" class="btn btn-outline-success edit"
                                                data-bs-id="{{ $d->id }}">
                                                Edit
                                            </button>
                                            <a href="/deleteitem/{{ $d->id }}" class="btn btn-danger"
                                                onclick="return confirm_delete()">Delete</a>
                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Order Minuman</h4>
                <div class="table-responsive">
                    <table id="tb1" class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Pesanan</th>
                                <th>Harga</th>
                                <th>Bayar</th>
                                <th>Status</th>
                                <th>VerfiedBy</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                @if ($d->jenis == 1)
                                    <tr>
                                        <td>{{ $d->nama }}</td>
                                        <td>{!! ucwords($d->pesanan) !!}</td>
                                        <td>@currency($d->harga)</td>
                                        <td>@currency($d->bayar)</td>
                                        <td>
                                            @if ($d->status == 1)
                                                <label class="badge badge-success">Sudah Bayar</label>
                                            @else
                                                <label class="badge badge-danger">Belum Bayar</label>
                                            @endif
                                        </td>
                                        <td>{{ $d->verifiedby }}</td>
                                        <td><button type="button" class="btn btn-outline-success edit"
                                                data-bs-id="{{ $d->id }}">
                                                Edit
                                            </button> <a href="/deleteitem/{{ $d->id }}" class="btn btn-danger"
                                                onclick="return confirm_delete()">Delete</a>
                                        </td>

                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Total Uang
                    </h4>

                    <h5>@currency($data_uang)</h5>


                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Total Makanan</div>
                    <h5>@currency($data_makanan)</h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Total Uang Pada Admin
                    </h4>
                    <table class="table">
                        <thead>
                            <th>Nama</th>
                            <th>Uang</th>
                        </thead>
                        <tbody>
                            @foreach ($uang_admin as $u)
                                @if ($u['uang_admin'] >= 1)
                                    <tr>
                                        <td>{!! $u['nama_admin'] !!}</td>
                                        <td>@currency($u['uang_admin'])</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Perhitungan Jumlah Makanan
                    </div>
                    <table class="table">
                        <thead>
                            <th>QTY</th>
                            <th>Menu</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach ($datacountmakanan as $a)
                                @if ($a['jumlah'] >= 1)
                                    <tr>
                                        <td>{{ $a['jumlah'] }}</td>
                                        <td>{{ $a['menu'] }}</td>
                                        <td>@currency($a['jumlahHarga'])</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Perhitungan Jumlah Minuman
                    </div>
                    <table class="table">
                        <thead>
                            <th>QTY</th>
                            <th>Menu</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach ($datacountminuman as $a)
                                @if ($a['jumlah'] >= 1)
                                    <tr>
                                        <td>{{ $a['jumlah'] }}</td>
                                        <td>{{ $a['menu'] }}</td>
                                        <td>@currency($a['jumlahHarga'])</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Perhitungan Jumlah Makanan
                    <button type="submit" onclick="copytext()">Click To Copy</button>
                </div>
                <textarea id="copytextdata" id="" cols="80" rows="10">
@foreach ($datacountmakanan as $a)
@if ($a['jumlah'] >= 1)
{{ $a['jumlah'] }}   {{ $a['menu'] }}
@endif
@endforeach
</textarea>
            </div>
        </div>
    </div>
    <br>


    <br>



    @pushOnce('js')
        @include('modal.add')
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
        <script src="{{ asset('/assets/js/jquery-3.6.1.min.js') }}"></script>
        <!-- End custom js for this page -->

        {{-- datatables --}}



        <script type="text/javascript" charset="utf8" src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>

        <script>
            function copytext() {
                // Get the text field
                var copyText = document.getElementById("copytextdata");
                console.log(copyText.innerHTML);

                // Select the text field
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(copyText.innerHTML).then(
                    () => {
                        /* clipboard successfully set */
                        print("copyed");
                    },
                    () => {
                        print("gagal copy");
                        /* clipboard write failed */
                    }
                );

                // Alert the copied text
                alert("Copied the text: " + copyText.innerHTML);
            }
        </script>
        <script type="text/javascript">
            function confirm_delete() {
                return confirm('are you sure?');
            }
        </script>
        <script>
            $(document).ready(function() {
                var tb1 = $('#tb1').DataTable({
                    paging: false,
                    // "ordering": false
                    "order": [
                        [3, 'asc']
                    ]
                });

                var tb2 = $('#tb2').DataTable({
                    paging: false,
                    // "ordering": false
                    "order": [
                        [3, 'asc']
                    ]
                });
                var interval = setInterval(checkdata, 5000);
            });
            var refreshed = 0;
            var datatemp;
            var status;
            // updatable();

            function updatable() {
                // tb1.row($(this).parent('tr')).remove().draw();
                $.ajax({
                    type: "GET",
                    url: "{{ url('dashboard/updatelistpesanan') }}",
                    dataType: "json",
                    success: function(data) {
                        data.forEach(element => {
                            if (element.jenis == 0) {
                                console.log(element.pesanan + "makanan");

                            }
                        });
                        data.forEach(element => {
                            if (element.jenis == 1) {
                                console.log(element.pesanan + "minuman");
                            }
                        });
                    }
                });
            }

            function checkdata() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('dashboard/check') }}",
                    dataType: "json",
                    success: function(data) {
                        if (refreshed == 0) {
                            datatemp = data.updated_at;
                            refreshed = 1;
                        }
                        // console.log(data.updated_at);
                        if (data.updated_at != datatemp) {
                            if (!$('#adddata').hasClass('show')) {
                                datatemp = data.updated_at;
                                location.reload();
                            }
                            // console.log('refreshed');
                        }
                    }
                });
            }
            $(document).ready(function() {
                $('.edit').on("click", function(e) {
                    e.preventDefault()
                    var id = $(this).attr('data-bs-id');
                    // var dataharga = ;
                    // console.log(id);
                    // console.log("{{ url('dashboard/ambildata') }}/".concat(id));
                    $.ajax({
                        type: "GET",
                        url: "{{ url('dashboard/ambildata') }}/".concat(id),
                        dataType: "json",
                        success: function(data) {
                            // console.log(data);

                            $('#myModalLabel').html(data.nama);
                            $('[name=id]').val(data.id);
                            $('[name=pesanan]').val(data.pesanan);
                            $('[name=harga]').val(data.harga);
                            $('[name=bayar]').val(data.harga);

                            $('input[name="status"][value="' + data.status + '"]').prop(
                                'checked', true);
                            $('#adddata').modal('show');
                        }
                    });
                    $('#adddata').on('shown.bs.modal', function() {
                        $('#focusbayar').focus();
                    })
                });
            });
        </script>
    @endPushOnce
@endsection
