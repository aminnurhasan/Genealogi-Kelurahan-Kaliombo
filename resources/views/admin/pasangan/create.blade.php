@extends('admin.layouts.app')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('pasangan.index') }}" class="btn btn-md btn-secondary mb-2">Kembali</a>

            <div class="card">

                <div class="card-header">
                    Tambah Data Pasangan
                </div>

                <div class="card-body">
                    <form action="{{ route('pasangan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2 mt-1">
                                    <label for="">Suami</label>
                                </div>
                                <div class="col-sm-10">
                                    <select name="nik_suami" class="form-control">
                                        <option value="">-- Masukkan Nama Suami --</option>
                                            @foreach ($suami as $item)
                                                <option value="{{ $item->email }}">{{ $item->nama}} - {{ $item->email }}</option>
                                            @endforeach
                                        </select>                       
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-2 mt-1">
                                    <label for="">Istri</label>
                                </div>
                                <div class="col-sm-10">
                                    <select name="nik_istri" class="form-control">
                                        <option value="">-- Masukkan Nama Istri --</option>
                                        @foreach ($istri as $item)
                                            <option value="{{ $item->email }}">{{ $item->nama}} - {{ $item->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-2 mt-1">
                                    <label for="">Tanggal Menikah</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tglMenikah" placeholder="contoh: 19-02-1999">
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection