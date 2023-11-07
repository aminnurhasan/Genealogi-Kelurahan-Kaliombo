@extends('admin.layouts.app')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('silsilah.index', $warga->id) }}" class="btn btn-md btn-secondary mb-2">Kembali</a>

            <div class="card">

                <div class="card-header">
                    Data Silsilah
                </div>

                <div class="card-body">
                    <form action="{{ route('silsilah.update', $warga->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-1">
                                        <label>NIK</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" disabled name="email" value="{{ $warga->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-1">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" value="{{ $warga->nama }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <div class="row">
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
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
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
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-1">
                                        <label>Orang Tua</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <select name="id_ortu" class="form-control">
                                            @if ($warga->pasangan_id == NULL)
                                                <option selected value="">-- Masukkan Nama Ortu --</option>
                                                @foreach ($ortu as $item)
                                                    {{-- <option value="{{ $item->email }}">{{ $item->nama }} - {{ $item->email }}</option> --}}
                                                    <option value="{{ $item->id }}">{{ $item->suami}} - {{ $item->nikSuami }} dan {{ $item->istri }} - {{ $item->nikIstri }}</option>
                                                @endforeach
                                            @else
                                                <option value="">-- Masukkan Nama Ortu --</option>
                                                @foreach ($ortu as $item)
                                                    <option value="{{ $item->id }}" {{ $warga->pasangan_id == $ss ? 'selected' : '' }}>{{ $item->suami}} - {{ $item->nikSuami }} dan {{ $item->istri }} - {{ $item->nikIstri }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-2 mt-1">
                                        <label>Anak Ke</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="anakKe" value="{{ old('anakKe', $warga->anakKe) }}">
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