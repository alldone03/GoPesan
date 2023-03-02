@extends('pages.template')

@section('konten')
    @if (!$datanow)
        <div class="alert alert-danger" role="alert">
            Mohon Maaf, Untuk Pemesanan Telah Ditutup!!!
        </div>
    @endif

    <div class="row">
        @if ($datanow)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pesan Disini Kack</h4>

                        <form class="forms-sample" action="/pesan" method="POST">
                            @csrf

                            <input type="hidden" name="username" value="{{ Auth::user()->username }}">

                            <input type="hidden" name="nama" value="{{ Auth::user()->nama }}">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama</label>
                                @if (Auth::user()->role > 1)
                                    <input type="text" class="form-control-plaintext" name="nama"
                                        id="exampleInputUsername1" placeholder="Username" value="{{ Auth::user()->nama }}"
                                        disabled>
                                @else
                                    <input type="text" class="form-control" name="nama" id="exampleInputUsername1"
                                        placeholder="Username" value="{{ Auth::user()->nama }}">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="pesanan">Pesanan</label>
                                {{-- <input type="text" class="form-control" name="pesanan" id="Pesanan" placeholder="Pesanan"> --}}
                                <select name="pesanan" id="pesanan" class="form-select"
                                    aria-label="Default select example" required>

                                    <option disabled selected>Pilih Menu kack!!!</option>


                                    <optgroup label="----------------Makanan----------------">
                                        @foreach ($menu as $u)
                                            @if ($u->jenis == 0)
                                                <option value="{{ $u->id }}">{{ $u->menu }} - @currency($u->harga)
                                                </option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="----------------Minuman----------------">
                                        @foreach ($menu as $u)
                                            @if ($u->jenis == 1)
                                                <option value="{{ $u->id }}">{{ $u->menu }} - @currency($u->harga)
                                                </option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>


                            <br>
                            <input type="submit" class="btn btn-primary me-2" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        @endif
        @if (Auth::user()->role == 0 || Auth::user()->role == 1)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Kalo Menu belum ada Tambah Menu Disini
                        </div>
                        <form action="/tambahMenu" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="menu">Menu</label>
                                <input type="text" class="form-control" name="menu" id="menu" placeholder="menu">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga"
                                    placeholder="harga">
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" name="jenis" value="0" class="form-check-input">
                                    Makanan <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" name="jenis" value="1" class="form-check-input">
                                    Minuman <i class="input-helper"></i></label>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary me-2" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Menu Makanan
                    </div>
                    <table class="table">
                        <thead>
                            <th>Menu</th>
                            <th>Harga</th>

                        </thead>
                        <tbody>
                            @foreach ($menu as $u)
                                @if ($u->jenis == 0)
                                    <tr>
                                        <td>{{ $u->menu }}</td>
                                        <td>@currency($u->harga)</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Menu Minuman
                    </div>
                    <table class="table">
                        <thead>
                            <th>Menu</th>
                            <th>Harga</th>

                        </thead>
                        <tbody>
                            @foreach ($menu as $u)
                                @if ($u->jenis == 1)
                                    <tr>
                                        <td>{{ $u->menu }}</td>
                                        <td>@currency($u->harga)</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @pushOnce('js')
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="{{ asset('/assets/js/jquery.priceformat.min.js') }}"></script>
        <script>
            $('#harga').priceFormat({
                prefix: 'Rp',
                centsLimit: 0,
                thousandsSeparator: '.'
            });
        </script>
    @endPushOnce
@endsection
