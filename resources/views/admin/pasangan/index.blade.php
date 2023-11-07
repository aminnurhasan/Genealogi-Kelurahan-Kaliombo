@extends('admin.layouts.app')

@section('konten')
<div class="wrapper">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('pasangan.create') }}" class="btn btn-md btn-primary mb-2">Tambah Data Pasangan</a>

            <div class="card">
                <div class="card-header">
                    Data Pasangan Kaliombo
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-1">ID</th>
                                <th class="col-2">Suami</th>
                                <th class="col-2">Istri</th>
                                <th class="col-2">Tanggal Menikah</th>
                                <th class="col-1">Status</th>
                                <th class="col-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasangan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->suami }}, NIK : {{ $item->nikSuami }}</td>
                                    <td>{{ $item->istri }}, NIK : {{ $item->nikIstri }}</td>
                                    <td>{{ $item->tglMenikah }}</td>
                                    <td class="text-center">
                                    @if ($item->status == 0)
                                        <a href="{{ route('statusPasangan', $item->id) }}" type="button" class="btn btn-md btn-danger">Non-aktif</a>
                                    @else
                                        <a href="{{ route('statusPasangan', $item->id) }}" type="button" class="btn btn-md btn-success">Aktif</a>
                                    @endif
                                </td>
                                    <td>
                                        <a href='{{ route('pasangan.show', $item->id) }}' class="btn btn-warning btn-md fas fa-eye"></a>
                                        <a href='{{ url('admin/pasangan/' . $item->id . '/edit') }}' class="btn btn-warning btn-md fas fa-pen"></a>
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