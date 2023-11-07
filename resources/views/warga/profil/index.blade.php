@extends('warga.layouts.app')

@section('konten')
<div class="wrapper">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Profil {{$warga->nama}}
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            @if ($warga->foto)
                                <img style="border: 1px solid #6c757d" width="180px" height="240px" src="{{ asset('/storage/profile/' . $warga->foto) }}" alt="">
                                <div style="width: 180px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" class="profile-label bg-secondary text-white p-1 text-center">Foto Profil</div>
                            @else
                                <img style="border: 1px solid #6c757d" width="180px" height="240px" src="{{ asset('/storage/profil.png') }}" alt="">
                                <div style="width: 180px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" class="profile-label bg-secondary text-white p-1 text-center">Tidak Ada Foto</div>
                            @endif
                            <a href="{{ route('profil.edit', $id) }}" style="width: 180px" class="btn btn-success mt-2">Edit Data Diri</a>
                        </div>
                        <div class="col-md-9">
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>NIK</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $warga->email }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Nama</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $warga->nama }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Jenis Kelamin</label>
                                </div>
                                <div class="col-sm-9">
                                    @if ($warga->jk == "L")
                                        <input type="text" class="form-control" name="nama" disabled value="Laki-Laki">
                                    @else
                                        <input type="text" class="form-control" name="nama" disabled value="Perempuan">
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Agama</label>
                                </div>
                                <div class="col-sm-9">
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
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $warga->alamat }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>No Hp</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $warga->hp }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Tanggal Lahir</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $warga->tglLahir }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Tanggal Meninggal</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $warga->tglMeninggal }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Nama Ayah</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $ortu->namaAyah }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Nama Ibu</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $ortu->namaIbu }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mt-1">
                                    <label>Anak Ke</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" disabled value="{{ $warga->anakKe }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection