@extends('admin.layouts.app')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h4><b>{{$warga->jumlah}} Orang</b></h4>
                                    <p>Warga</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <p class="small-box-footer"><i class="fa-brands fa-squarespace"></i></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h4><b>{{$wargaL->jumlah}} Orang</b></h4>
                                    <p>Warga Laki-Laki</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-mars"></i>
                                </div>
                                <p class="small-box-footer"><i class="fa-brands fa-squarespace"></i></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div style="color: #fff" class="inner">
                                    <h4><b>{{$wargaP->jumlah}} Orang</b></h4>
                                    <p>Warga Perempuan</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-venus"></i>
                                </div>
                                <p class="small-box-footer"><i class="fa-brands fa-squarespace"></i></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h4><b>{{$pasangan->jumlah}} Pasangan</b></h4>
                                    <p>Pasangan Sah</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-venus-mars"></i>
                                </div>
                                <p class="small-box-footer"><i class="fa-brands fa-squarespace"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="ion ion-clipboard mr-1"></i>
                                        Grafik Perbandingan Jenis Kelamin Warga
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="jenisKelamin" height="100" width="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="ion ion-clipboard mr-1"></i>
                                        Grafik Perbandingan Agama Warga
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="agama"></canvas>
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
@push('scripts')
<script type="text/javascript">
    var labelsJk =  {{ Js::from($labelsJk) }};
    var dataJk =  {{ Js::from($dataJk) }};

    const dataJenisKelamin = {
        labels: labelsJk,
        datasets: [{
            label: 'Jumlah',
            backgroundColor: [
                'rgba(255, 0, 0, 0.2)',
                'rgba(0, 255, 0, 0.2)',
            ],
            borderWidth: 2,
            data: dataJk,
            tension: 0.1
        }]
    };

    const configJk = {
        type: 'doughnut',
        data: dataJenisKelamin,
        options: {
            maintainAspectRatio: true,
            aspectRatio: 2
        }
    };

    const jenisKelamin = new Chart(
    document.getElementById('jenisKelamin'),
    configJk
    );
</script>

<script type="text/javascript">
    var labelsAgama =  {{ Js::from($labelsAgama) }};
    var dataAgama =  {{ Js::from($dataAgama) }};

    const dataAgamas = {
    labels: labelsAgama,
    datasets: [{
        label: 'Jumlah',
        backgroundColor: [
            'rgba(255, 0, 0, 0.2)',
            'rgba(0, 255, 0, 0.2)',
            'rgba(0, 0, 255, 0.2)',
            'rgba(255, 255, 0, 0.2)',
            'rgba(255, 0, 255, 0.2)'
        ],
        borderWidth: 2,
        data: dataAgama,
        tension: 0.1
    }]
    };

    const configAgama = {
        type: 'doughnut',
        data: dataAgamas,
        options: {
            maintainAspectRatio: true,
            aspectRatio: 2
        }
    };

    const agama = new Chart(
    document.getElementById('agama'),
    configAgama
    );
</script>
@endpush