@extends('pages.template')

@section('konten')
    @if (!$datanow)
        <div class="alert alert-danger" role="alert">
            Mohon Maaf, Untuk Pemesanan Telah Ditutup!!!
        </div>
    @endif
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
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Makanan</h4>
                    <div class="table-responsive">
                        <table id="tb1" class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Pesanan</th>
                                    <th>Harga</th>
                                    <th>Bayar</th>
                                    <th>VerifyBy</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    @if ($d->jenis == 0)
                                        <tr>
                                            <td>{{ $d->nama }}</td>
                                            <td>{!! $d->pesanan !!}</td>
                                            <td>@currency($d->harga)</td>
                                            <td>@currency($d->bayar)</td>
                                            <td>{{ $d->verifiedby }}</td>
                                            <td>
                                                @if ($d->status == 1)
                                                    <label class="badge badge-success">Sudah Bayar</label>
                                                @else
                                                    <label class="badge badge-danger">Belum Bayar</label>
                                                @endif
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
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Minuman</h4>
                    <div class="table-responsive">
                        <table id="tb2" class="table">
                            <thead>
                                <tr>

                                    <th>Nama</th>
                                    <th>Pesanan</th>
                                    <th>Harga</th>
                                    <th>Bayar</th>
                                    <th>VerifyBy</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    @if ($d->jenis == 1)
                                        <tr>
                                            <td>{{ $d->nama }}</td>
                                            <td>{!! $d->pesanan !!}</td>
                                            <td>@currency($d->harga)</td>
                                            <td>@currency($d->bayar)</td>
                                            <td>{{ $d->verifiedby }}</td>
                                            <td>
                                                @if ($d->status == 1)
                                                    <label class="badge badge-success">Sudah Bayar</label>
                                                @else
                                                    <label class="badge badge-danger">Belum Bayar</label>
                                                @endif
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
    </div>

@endsection
