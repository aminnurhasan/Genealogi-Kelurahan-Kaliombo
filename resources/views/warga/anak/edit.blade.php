@extends('admin.layouts.app')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('anak.index') }}" class="btn btn-md btn-secondary mb-2">Kembali</a>

            <div class="card">

                <div class="card-header">
                    Edit Data Anak
                </div>

                <div class="card-body">
                    <form action="{{ route('anak.update', $warga->id) }}" method="post" enctype="multipart/form-data">
                        @csrf @method('POST')
                        <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>ID</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id" disabled value="{{ old('id', $warga->id) }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>NIK</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" value="{{ old('email', $warga->email) }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Nama</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{ old('nama', $warga->nama) }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="jk" type="radio" id="inlineRadio1" value="L" {{ old('jk', $warga->jk) == 'L' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="jk" type="radio" id="inlineRadio2" value="L" {{ old('jk', $warga->jk) == 'P' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Agama</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="agama" class="form-control">
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="1" {{ old('agama', $warga->agama) == 1 ? 'selected' : '' }}>Islam</option>
                                    <option value="2" {{ old('agama', $warga->agama) == 2 ? 'selected' : '' }}>Kristen</option>
                                    <option value="3" {{ old('agama', $warga->agama) == 3 ? 'selected' : '' }}>Katolik</option>
                                    <option value="4" {{ old('agama', $warga->agama) == 4 ? 'selected' : '' }}>Hindu</option>
                                    <option value="5" {{ old('agama', $warga->agama) == 5 ? 'selected' : '' }}>Buddha</option>
                                    <option value="6" {{ old('agama', $warga->agama) == 6 ? 'selected' : '' }}>Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Alamat</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $warga->alamat) }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>No Hp</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hp" value="{{ old('hp', $warga->hp) }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Tanggal Lahir</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tglLahir" value="{{ old('tglLahir', $warga->tglLahir) }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Ayah</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="ayah" class="form-control">
                                    @if ($warga->ayah == NULL)
                                        <option selected value="">-- Masukkan Nama Ayah --</option>
                                        @foreach ($ayah as $item)
                                            <option value="{{ $item->email }}">{{ $item->nama }} - {{ $item->email }}</option>
                                        @endforeach
                                    @else
                                        <option value="">-- Masukkan Nama Ayah --</option>
                                        @foreach ($ayah as $item)
                                            <option value="{{ $item->email }}" {{ $item->email == $warga->ayah ? 'selected' : '' }}>{{ $item->nama }} - {{ $item->email }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Ibu</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="ibu" class="form-control">
                                    @if ($warga->ibu == NULL)
                                        <option selected value="">-- Masukkan Nama Ibu --</option>
                                        @foreach ($ibu as $item)
                                            <option value="{{ $item->email }}">{{ $item->nama }} - {{ $item->email }}</option>
                                        @endforeach
                                    @else
                                        <option value="">-- Masukkan Nama Ibu --</option>
                                        @foreach ($ibu as $item)
                                            <option value="{{ $item->email }}" {{ $item->email == $warga->ibu ? 'selected' : '' }}>{{ $item->nama }} - {{ $item->email }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="foto">
                                <img width="350" src="{{ asset('/storage/profile/' . $warga->foto) }}" alt="">
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