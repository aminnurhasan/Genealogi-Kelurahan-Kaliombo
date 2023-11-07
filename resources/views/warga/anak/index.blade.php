@extends('warga.layouts.app')

@section('konten')
<div class="wrapper">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('anak.create') }}" class="btn btn-md btn-primary mb-2">Tambah Data Anak</a>

            <div class="card">
                <div class="card-header">
                    Data Anak dari {{$ua->nama}}
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="col-1">No</th>
                                <th class="col-2">NIK</th>
                                <th class="col-2">Nama</th>
                                <th class="col-1">Gender</th>
                                <th class="col-1">Agama</th>
                                <th class="col-1">Tgl Lahir</th>
                                <th class="col-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anak as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->nama }}</td>
                                    @if ($item->jk == 'L')
                                        <td>Laki - Laki</td>
                                    @else
                                        <td>Perempuan</td>
                                    @endif

                                    @if($item->agama == 1)
                                        <td>Islam</td>
                                    @elseif($item->agama == 2)
                                        <td>Kristen</td>
                                    @elseif($item->agama == 3)
                                        <td>Katolik</td>
                                    @elseif($item->agama == 4)
                                        <td>Hindu</td>
                                    @elseif($item->agama == 5)
                                        <td>Buddha</td>
                                    @else
                                        <td>Konghucu</td>
                                    @endif
                                    <td>{{ $item->tglLahir }}</td>
                                    <td>
                                        <a href='{{ route('anak.show', $item->id) }}' class="btn btn-warning btn-md fas fa-eye"></a>
                                        <a href='{{ url('warga/anak/' . $item->id . '/edit') }}' class="btn btn-warning btn-md fas fa-pen"></a>
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