@extends('layouts.app')
@section('style')
<style type="text/css">
.btn{
margin-bottom: 2em;
}
#form{
margin-bottom: 1em;
}
#pagination{
margin-left: 1em;
}
</style>
@endsection
@section('content')
<div class="containers">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @foreach($debitur as $debiturs)
                <div class="panel-heading">Debitur #{{$debiturs->id_debitur}}</div>
                
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nama</p>
                            <h4>{{$debiturs->nama}}</h4>
                            <p>KTP</p>
                            <h4>{{$debiturs->no_ktp}}</h4>
                            <p>Tanggal Lahir</p>
                            <h4>{{$debiturs->ttl}}</h4>
                            <p>Pekerjaan</p>
                            <h4>{{$debiturs->occupation}}</h4>
                            <div class="divider"></div>
                            <p>Gaji</p>
                            <h4>Rp {{number_format($debiturs->gaji)}}</h4>
                            <p>Tanggungan</p>
                            <h4>{{$debiturs->tanggungan}} orang</h4>
                            <p>Jumlah Pinjaman</p>
                            <h4>Rp {{number_format($debiturs->pinjaman)}}</h4>
                            <p>Tanggal Meminjam</p>
                            <h4>{{$debiturs->tanggalpinjam}}</h4>
                            <p>Status</p>
                            <h4>{{$debiturs->approved}}</h4>
                        </div>
                        <div class="col-md-6">
                            <h2>FORECAST</h2>
                            <div class="divider"></div>
                            <div class="well">
                                <h4 class="text-center">Approved</h4>
                                @if($yes !== null)
                                <h1 class="text-center"><strong>YES</strong></h1>
                                @else
                                <h1 class="text-center"><strong>NO</strong></h1>
                                @endif
                                <br>
                                <h4 class="text-center">Confidence Level</h4>
                                @if($yes !== null)
                                <h1 class="text-center"><strong>{!! $yes !!}</strong></h1>
                                @else
                                <h1 class="text-center"><strong>{!! $no !!}</strong></h1>
                                @endif
                            </div>
                            <br>
                            <h4 class="text-center">Approved?</h4>
                            <!-- Single button -->
                            <div class="row">
                                <div class="text-center">
                                    <a href="{{action('Controller@updateapproved', $debiturs->id)}}">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary" name="yes" value="yes">
                                            Yes
                                            </button>
                                        </div>
                                    </a>
                                    <a href="{{action('Controller@updateapproved2', $debiturs->id)}}">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger" name="no" value="no">
                                            No
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection