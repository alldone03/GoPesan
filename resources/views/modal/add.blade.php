<div class="modal fade text-left" id="adddata" tabindex="-1" role="dialog" aria-labelledby="adddatalable"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">

                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="/edit" method="POST">
                @csrf
                <input type="hidden" name="verifiedby" value="{{ Auth::user()->nama }}">
                <input type="hidden" name="id" value="">
                <div class="modal-body">
                    <label>Pesanan</label>
                    <div class="form-group">
                        <input type="text" name="pesanan" placeholder="" class="form-control-plaintext"
                            value="" disabled>
                    </div>
                    <label>Harga</label>
                    <div class="form-group">
                        <input type="text" name="harga" placeholder="" class="form-control" value="">
                    </div>
                    <label>Bayar</label>
                    <div class="form-group">
                        <input type="text" name="bayar" id="focusbayar" placeholder="" class="form-control"
                            value="" autofocus>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="status" value="1" class="form-check-input">
                                Sudah Bayar <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="status" value="0" class="form-check-input">
                                Belum Bayar <i class="input-helper"></i></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <input type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal" value="Edit">
                </div>
            </form>
        </div>
    </div>
</div>
