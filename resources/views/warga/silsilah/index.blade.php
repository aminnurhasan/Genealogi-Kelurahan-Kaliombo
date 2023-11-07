@extends('warga.layouts.app')

@section('konten')
<div class="wrapper">
    <div class="row justify-content-center">
        <div class="col">
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
                                            <span>(Alm) {{ $grandKakekAyah->namaAyah }}</span> ({{$grandKakekAyah->jkAyah}})
                                        @else
                                            <span>{{ $grandKakekAyah->namaAyah }}</span> ({{$grandKakekAyah->jkAyah}})
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
                                            <span>(Alm) {{ $grandKakekAyah->namaIbu }}</span> ({{$grandKakekAyah->jkIbu}})    
                                        @else
                                            <span>{{ $grandKakekAyah->namaIbu }}</a></span> ({{$grandKakekAyah->jkIbu}})
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
                                            <span>(Alm) {{ $grandNenekAyah->namaAyah }}</span> ({{$grandNenekAyah->jkAyah}})    
                                        @else
                                            <span>{{ $grandNenekAyah->namaAyah }}</span> ({{$grandNenekAyah->jkAyah}})
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
                                            <span><p>Alm.</p>{{ $grandNenekAyah->namaIbu }}</span> ({{$grandNenekAyah->jkIbu}})    
                                        @else
                                            <span>{{ $grandNenekAyah->namaIbu }}</span> ({{$grandNenekAyah->jkIbu}})
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
                                            <span>(Alm) {{ $grandKakekIbu->namaAyah }}</span> ({{$grandKakekIbu->jkAyah}})    
                                        @else
                                            <span>{{ $grandKakekIbu->namaAyah }}</span> ({{$grandKakekIbu->jkAyah}})
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
                                            <span>(Alm) {{ $grandKakekIbu->namaIbu }}</span> ({{$grandKakekIbu->jkIbu}})    
                                        @else
                                            <span>{{ $grandKakekIbu->namaIbu }}</span> ({{$grandKakekIbu->jkIbu}})
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
                                            <span>(Alm) {{ $grandNenekIbu->namaAyah }}</span> ({{$grandNenekIbu->jkAyah}})    
                                        @else
                                            <span>{{ $grandNenekIbu->namaAyah }}</span> ({{$grandNenekIbu->jkAyah}})
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
                                            <span>(Alm) {{ $grandNenekIbu->namaIbu }}</span> ({{$grandNenekIbu->jkIbu}})    
                                        @else
                                            <span>{{ $grandNenekIbu->namaIbu }}</span> ({{$grandNenekIbu->jkIbu}})
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
                                            <span>(Alm) {{ $grandAyah->namaAyah }}</span> ({{$grandAyah->jkAyah}})    
                                        @else
                                            <span>{{ $grandAyah->namaAyah }}</span> ({{$grandAyah->jkAyah}})
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
                                            <span>(Alm) {{ $grandAyah->namaIbu }}</span> ({{$grandAyah->jkIbu}})    
                                        @else
                                            <span>{{ $grandAyah->namaIbu }}</span> ({{$grandAyah->jkIbu}})
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
                                            <span>(Alm) {{ $grandIbu->namaAyah }}</span> ({{$grandIbu->jkAyah}})    
                                        @else
                                            <span>{{ $grandIbu->namaAyah }}</span> ({{$grandIbu->jkAyah}})
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
                                            <span>(Alm) {{ $grandIbu->namaIbu }}</span> ({{$grandIbu->jkIbu}})    
                                        @else
                                            <span>{{ $grandIbu->namaIbu }}</span> ({{$grandIbu->jkIbu}})
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
                                            <span>(Alm) {{ $ortu->namaAyah }}</span> ({{$ortu->jkAyah}})
                                        @else
                                            <span>{{ $ortu->namaAyah }}</span> ({{$ortu->jkAyah}})
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
                                            <span>(Alm) {{ $ortu->namaIbu }}</span> ({{$ortu->jkIbu}})    
                                        @else
                                            <span>{{ $ortu->namaIbu }}</span> ({{$ortu->jkIbu}})
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
                                                    <h5>{{ ++$no }}. (Alm) {{ $anak->nama }} ({{$anak->jk}})</h5>    
                                                @else
                                                    <h5>{{ ++$no }}. {{ $anak->nama }} ({{$anak->jk}})</h5>
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