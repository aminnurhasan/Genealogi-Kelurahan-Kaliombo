@extends('admin.layouts.app')

@section('konten')
<div class="wrapper">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('warga.create') }}" class="btn btn-md btn-primary mb-2">Tambah Data Warga</a>

            <div class="card">
                <div class="card-header">
                    Data Warga Kaliombo
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-2">NIK</th>
                                <th class="col-2">Nama</th>
                                <th class="col-1">Gender</th>
                                <th class="col-1">Tgl Lahir</th>
                                <th class="col-2">Alamat</th>
                                <th class="col-1">Silsilah</th>
                                <th class="col-1">Status</th>
                                <th class="col-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($warga as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama }}</td>
                                    @if ($item->jk == 'L')
                                    <td>Laki - Laki</td>
                                    @else
                                        <td>Perempuan</td>
                                    @endif
                                    <td>{{ $item->tglLahir }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <a href="{{ route('silsilah.index', $item->id) }}" type="button" class="btn btn-md btn-secondary">Silsilah</a>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->status == 0)
                                            <a href="{{ route('statusWarga', $item->id) }}" type="button" class="btn btn-md btn-danger">Non-aktif</a>
                                        @else
                                            <a href="{{ route('statusWarga', $item->id) }}" type="button" class="btn btn-md btn-success">Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href='{{ route('warga.show', $item->id) }}' class="btn btn-warning btn-md fas fa-eye"></a>
                                        <a href='{{ url('admin/warga/' . $item->id . '/edit') }}' class="btn btn-warning btn-md fas fa-pen"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection