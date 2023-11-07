@extends('admin.layouts.app')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('pasangan.index') }}" class="btn btn-md btn-secondary mb-2">Kembali</a>

            <div class="card">

                <div class="card-header">
                    Edit Data Pasangan
                </div>

                <div class="card-body">
                    <form action="{{ route('pasangan.update', $pasangan->id) }}" method="post" enctype="multipart/form-data">
                        @csrf @method('POST')
                        <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>ID</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id" disabled value="{{ old('id', $pasangan->id) }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Suami</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="nik_suami" class="form-control">
                                    @foreach ($suami as $item)
                                        <option value="{{ $item->email }}" {{ $pasangan->nik_suami == $item->email ? 'selected' : '' }}>{{ $item->nama }}, NIK : {{ $item->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Istri</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="nik_istri" class="form-control">
                                    @foreach ($istri as $item)
                                        <option value="{{ $item->email }}" {{ $pasangan->nik_istri == $item->email ? 'selected' : '' }}>{{ $item->nama }}, NIK : {{ $item->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Tanggal Menikah</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tglMenikah" value="{{ old('tglMenikah', $pasangan->tglMenikah) }}">
                            </div>
                        </div>
                        <div >
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection