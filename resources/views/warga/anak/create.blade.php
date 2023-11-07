@extends('warga.layouts.app')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('anak.index') }}" class="btn btn-md btn-secondary mb-2">Kembali</a>

            <div class="card">

                <div class="card-header">
                    Tambah Data Anak
                </div>

                <div class="card-body">
                    <form action="{{ route('anak.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-1">
                                        <label>NIK</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-1">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-1">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="jk" type="radio" id="inlineRadio1" value="L">
                                            <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="jk" type="radio" id="inlineRadio2" value="P">
                                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-1">
                                        <label>Agama</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select name="agama" class="form-control">
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="1" {{ old('agama') == 1 ? 'selected' : '' }}>Islam</option>
                                            <option value="2" {{ old('agama') == 2 ? 'selected' : '' }}>Kristen</option>
                                            <option value="3" {{ old('agama') == 3 ? 'selected' : '' }}>Katolik</option>
                                            <option value="4" {{ old('agama') == 4 ? 'selected' : '' }}>Hindu</option>
                                            <option value="5" {{ old('agama') == 5 ? 'selected' : '' }}>Buddha</option>
                                            <option value="6" {{ old('agama') == 6 ? 'selected' : '' }}>Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-1">
                                        <label>Tgl Lahir</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tglLahir" placeholder="contoh: 19-02-1999">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-1">
                                        <label>Anak Ke</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="anakKe">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection