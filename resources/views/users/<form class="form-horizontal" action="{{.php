<form class="form-horizontal" action="{{ asset('/') }}users/{{ $row->id }}" method="post">
    <div class="mb-3 row">
        <label for="nip" class="col-sm-2 control-label">Satuan Kerja</label>
        <div class="col-sm-10">
            {{ $satker->nama }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nip" class="col-sm-2 control-label">NIP</label>
        <div class="col-sm-10">
            {{ $row->nip }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-10">
            {{ $row->name }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            {{ $row->email }}
        </div>
    </div>
    <div class="mb-3">
        <div class="offset-sm-2 col-sm-10">
            @method("DELETE")
            <input type="hidden" name="action" value="{{ $action }}">
            <input type="hidden" name="id" value="{{ $row->id }}">
            <button type="submit" class="btn btn-danger">Hapus</button>
            <button type="button" class="btn btn-primary" onclick="button_cancel()">Kembali</button>
        </div>
    </div>
    {{ csrf_field() }}
</form>