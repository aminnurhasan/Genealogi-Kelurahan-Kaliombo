@extends('warga.layouts.app')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('profil.index') }}" class="btn btn-md btn-secondary mb-2">Kembali</a>

            <div class="card">

                <div class="card-header">
                    Detail Data Anak
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>NIK</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" disabled value="{{ $warga->email }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Nama</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" disabled value="{{ $warga->nama }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-sm-10">
                                @if($warga->jk == "L")
                                    <input type="text" class="form-control" name="jk" disabled value="Laki-Laki">
                                @else
                                    <input type="text" class="form-control" name="jk" disabled value="Perempuan">
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Agama</label>
                            </div>
                            <div class="col-sm-10">
                                @if($warga->agama == 1)
                                    <input type="text" class="form-control" name="agama" disabled value="Islam">
                                @elseif($warga->agama == 2)
                                    <input type="text" class="form-control" name="agama" disabled value="Kristen">
                                @elseif($warga->agama == 3)
                                    <input type="text" class="form-control" name="agama" disabled value="Katolik">
                                @elseif($warga->agama == 4)
                                    <input type="text" class="form-control" name="agama" disabled value="Hindu">
                                @elseif($warga->agama == 5)
                                    <input type="text" class="form-control" name="agama" disabled value="Buddha">
                                @else
                                    <input type="text" class="form-control" name="agama" disabled value="Konghucu">
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Alamat</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" disabled value="{{ $warga->alamat }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>No Hp</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" disabled value="{{ $warga->hp }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Tanggal Lahir</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" disabled value="{{ $warga->tglLahir }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Tanggal Meninggal</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" disabled value="{{ $warga->tglMeninggal }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Nama Ayah</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $ortu->namaAyah }}, NIK : {{ $ortu->nikAyah }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Nama Ibu</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $ortu->namaIbu }}, NIK : {{ $ortu->nikIbu }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Anak Ke</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $warga->anakKe }}">
                                </div>
                            </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-2">
                                <label>Foto</label>
                            </div>
                            <div class="col-sm-10">
                                <img width="350" src="{{ asset('/storage/profile/' . $warga->foto) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection