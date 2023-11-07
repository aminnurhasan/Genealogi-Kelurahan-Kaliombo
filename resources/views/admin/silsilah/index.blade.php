@extends('admin.layouts.app')

@section('konten')
<div class="wrapper">
    <div class="row justify-content-center">
        <div class="col">
            <a href="{{ route('silsilah.edit', $warga->id) }}" class="btn btn-md btn-primary mb-2">Edit Data Silsilah</a>
            <a href="{{ route('warga.index') }}" class="btn btn-md btn-secondary mb-2">Kembali</a>

            <div class="card">
                <div class="card-header">
                    Data Silsilah {{$warga->nama}}
                </div>

                <div class="card-body">
                    <table class="table table-bordered border-dark table-striped">
                        <tbody>
                            <tr class="text-center">
                                <th style="width: 10%">Kakek & Nenek Buyut</th>
                                <td style="font-size: 12px" class="text-center col-2">
                                    @if(isset($grandKakekAyah->namaAyah))
                                        @if($grandKakekAyah->ayahM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandKakekAyah->idAyah) }}">{{ $grandKakekAyah->namaAyah }}</a></span> ({{$grandKakekAyah->jkAyah}})
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandKakekAyah->idAyah) }}">{{ $grandKakekAyah->namaAyah }}</a></span> ({{$grandKakekAyah->jkAyah}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandKakekAyah->fotoAyah) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                                <td style="font-size: 12px" class="text-center col-1">
                                    @if(isset($grandKakekAyah->namaIbu))
                                        @if($grandKakekAyah->ibuM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandKakekAyah->idIbu) }}">{{ $grandKakekAyah->namaIbu }}</a></span> ({{$grandKakekAyah->jkIbu}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandKakekAyah->idIbu) }}">{{ $grandKakekAyah->namaIbu }}</a></span> ({{$grandKakekAyah->jkIbu}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandKakekAyah->fotoIbu) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                                <td style="font-size: 12px" class="text-center col-1">
                                    @if(isset($grandNenekAyah->namaAyah))
                                        @if($grandNenekAyah->ayahM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandNenekAyah->idAyah) }}">{{ $grandNenekAyah->namaAyah }}</a></span> ({{$grandNenekAyah->jkAyah}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandNenekAyah->idAyah) }}">{{ $grandNenekAyah->namaAyah }}</a></span> ({{$grandNenekAyah->jkAyah}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandNenekAyah->fotoAyah) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                                <td style="font-size: 12px" class="text-center col-1">
                                    @if(isset($grandNenekAyah->namaIbu))
                                        @if($grandNenekAyah->ibuM == 1)
                                            <span><p>Alm.</p><a href="{{ url('admin/silsilah/'.$grandNenekAyah->idIbu) }}">{{ $grandNenekAyah->namaIbu }}</a></span> ({{$grandNenekAyah->jkIbu}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandNenekAyah->idIbu) }}">{{ $grandNenekAyah->namaIbu }}</a></span> ({{$grandNenekAyah->jkIbu}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandNenekAyah->fotoIbu) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                                <td style="font-size: 12px" class="text-center col-1">
                                    @if(isset($grandKakekIbu->namaAyah))
                                        @if($grandKakekIbu->ayahM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandKakekIbu->idAyah) }}">{{ $grandKakekIbu->namaAyah }}</a></span> ({{$grandKakekIbu->jkAyah}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandKakekIbu->idAyah) }}">{{ $grandKakekIbu->namaAyah }}</a></span> ({{$grandKakekIbu->jkAyah}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandKakekIbu->fotoAyah) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                                <td style="font-size: 12px" class="text-center col-1">
                                    @if(isset($grandKakekIbu->namaIbu))
                                        @if($grandKakekIbu->ibuM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandKakekIbu->idIbu) }}">{{ $grandKakekIbu->namaIbu }}</a></span> ({{$grandKakekIbu->jkIbu}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandKakekIbu->idIbu) }}">{{ $grandKakekIbu->namaIbu }}</a></span> ({{$grandKakekIbu->jkIbu}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandKakekIbu->fotoIbu) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                                <td style="font-size: 12px" class="text-center col-1">
                                    @if(isset($grandNenekIbu->namaAyah))
                                        @if($grandNenekIbu->ayahM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandNenekIbu->idAyah) }}">{{ $grandNenekIbu->namaAyah }}</a></span> ({{$grandNenekIbu->jkAyah}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandNenekIbu->idAyah) }}">{{ $grandNenekIbu->namaAyah }}</a></span> ({{$grandNenekIbu->jkAyah}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandNenekIbu->fotoAyah) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                                <td style="font-size: 12px" class="text-center col-2">
                                    @if(isset($grandNenekIbu->namaIbu))
                                        @if($grandNenekIbu->ibuM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandNenekIbu->idIbu) }}">{{ $grandNenekIbu->namaIbu }}</a></span> ({{$grandNenekIbu->jkIbu}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandNenekIbu->idIbu) }}">{{ $grandNenekIbu->namaIbu }}</a></span> ({{$grandNenekIbu->jkIbu}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandNenekIbu->fotoIbu) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                            </tr>
                            <tr class="text-center">
                                <th style="width: 10%">Kakek & Nenek</th>
                                <td style="font-size: 12px" class="text-center col-3" colspan="2">
                                    @if(isset($grandAyah->namaAyah))
                                        @if($grandAyah->ayahM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandAyah->idAyah) }}">{{ $grandAyah->namaAyah }}</a></span> ({{$grandAyah->jkAyah}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandAyah->idAyah) }}">{{ $grandAyah->namaAyah }}</a></span> ({{$grandAyah->jkAyah}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandAyah->fotoAyah) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                                <td style="font-size: 12px" class="text-center col-2" colspan="2">
                                    @if(isset($grandAyah->namaIbu))
                                        @if($grandIbu->ibuM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandAyah->idIbu) }}">{{ $grandAyah->namaIbu }}</a></span> ({{$grandAyah->jkIbu}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandAyah->idIbu) }}">{{ $grandAyah->namaIbu }}</a></span> ({{$grandAyah->jkIbu}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandAyah->fotoIbu) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                                <td style="font-size: 12px" class="text-center col-2" colspan="2">
                                    @if(isset($grandIbu->namaAyah))
                                        @if($grandIbu->ayahM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandIbu->idAyah) }}">{{ $grandIbu->namaAyah }}</a></span> ({{$grandIbu->jkAyah}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandIbu->idAyah) }}">{{ $grandIbu->namaAyah }}</a></span> ({{$grandIbu->jkAyah}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandIbu->fotoAyah) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                                <td style="font-size: 12px" class="text-center col-3" colspan="2">
                                    @if(isset($grandIbu->namaIbu))
                                        @if($grandIbu->ibuM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$grandIbu->idIbu) }}">{{ $grandIbu->namaIbu }}</a></span> ({{$grandIbu->jkIbu}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$grandIbu->idIbu) }}">{{ $grandIbu->namaIbu }}</a></span> ({{$grandIbu->jkIbu}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $grandIbu->fotoIbu) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                            </tr>
                            <tr class="text-center">
                                <th style="width: 10%">Ayah & Ibu</th>
                                <td style="font-size: 12px" class="text-center" colspan="4">
                                    @if ($ortu->namaAyah != NULL)
                                        @if($ortu->ayahM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$ortu->idAyah) }}">{{ $ortu->namaAyah }}</a></span> ({{$ortu->jkAyah}})
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$ortu->idAyah) }}">{{ $ortu->namaAyah }}</a></span> ({{$ortu->jkAyah}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $ortu->fotoAyah) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>

                                <td style="font-size: 12px" class="text-center" colspan="4">
                                    @if ($ortu->namaIbu != NULL)
                                        @if($ortu->ibuM == 1)
                                            <span>(Alm) <a href="{{ url('admin/silsilah/'.$ortu->idIbu) }}">{{ $ortu->namaIbu }}</a></span> ({{$ortu->jkIbu}})    
                                        @else
                                            <span><a href="{{ url('admin/silsilah/'.$ortu->idIbu) }}">{{ $ortu->namaIbu }}</a></span> ({{$ortu->jkIbu}})
                                        @endif
                                        <br>
                                        <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $ortu->fotoIbu) }}" alt="">
                                    @else
                                        ?
                                    @endif
                                </td>
                            </tr>
                            <tr class="text-center">
                                <th style="width: 10%"></th>
                                @if ($warga->meninggal == 1)
                                    <td class="text-center lead" colspan="8">Alm. {{ $warga->nama }} ({{$warga->jk}})</td>
                                @else
                                    <td class="text-center lead" colspan="8">{{ $warga->nama }} ({{$warga->jk}})</td>
                                @endif
                            </tr>
                            <tr class="text-center">
                                <th style="width: 10%">Anak</th>
                                <td style="font-size: 12px" colspan="8">
                                    <?php $no = 0; ?>
                                    <div class="row">
                                        @foreach($anak as $anak)
                                            <div class="col text-center">
                                                @if($anak->meninggal == 1)
                                                    <h5>{{ ++$no }}. (Alm) <a href="{{ url('admin/silsilah/'. $anak->id) }}">{{ $anak->nama }}</a> ({{$anak->jk}})</h5>    
                                                @else
                                                    <h5>{{ ++$no }}. <a href="{{ url('admin/silsilah/'. $anak->id) }}">{{ $anak->nama }}</a> ({{$anak->jk}})</h5>
                                                @endif
                                                <br>
                                                <img width="60px" height="80px" src="{{ asset('/storage/profile/' . $anak->foto) }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection