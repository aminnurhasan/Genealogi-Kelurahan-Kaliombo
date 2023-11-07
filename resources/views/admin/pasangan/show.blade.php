@extends('admin.layouts.app')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('pasangan.index') }}" class="btn btn-md btn-secondary mb-2">Kembali</a>

            <div class="card">

                <div class="card-header">
                    Detail Data Pasangan
                </div>

                <div class="card-body">
                    <div class="container">
                        @foreach($pasangan as $pasangan)
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>ID</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id" disabled value="{{ $pasangan->id }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Suami</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="suami" disabled value="{{ $pasangan->suami }}, NIK : {{ $pasangan->nikSuami }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Istri</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="istri" disabled value="{{ $pasangan->istri }}, NIK : {{ $pasangan->nikIstri }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-2 mt-1">
                                <label>Tanggal Menikah</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tglMenikah" disabled value="{{ $pasangan->tglMenikah }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection