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
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Add New Debitur
            </button>
            <!-- <a href="{{action('Controller@insertdata')}}" class="btn">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a> -->
            <div class="collapse" id="collapseExample">
                <div class="well">
                    {!! Form::open(['url' => 'pages/debitur']) !!}
                    <div class="form-group">
                        <div class="row" id="form">
                            <div class="col-md-6">
                                {!! Form::label('nama', 'Nama') !!}
                                {!! Form::text('nama', null, ['class' => 'validate form-control', 'placeholder' => 'Nama calon debitur', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-6">
                                {!! Form::label('gender', 'Jenis Kelamin') !!}
                                {!! Form::select('gender', array('Male' => 'Laki-laki', 'Female' => 'Perempuan'), null, ['placeholder' => 'Gender', 'class' => 'validate form-control']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-6">
                                {!! Form::label('ttl', 'Tanggal Lahir') !!}
                                {!! Form::text('ttl', null, ['class' => 'validate form-control', 'placeholder' => 'yyyy-mm-dd', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-6">
                                {!! Form::label('occupation', 'Pekerjaan') !!}
                                {!! Form::text('occupation', null, ['class' => 'validate form-control', 'placeholder' => 'Jenis pekerjaan', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-6">
                                {!! Form::label('no_ktp', 'KTP') !!}
                                {!! Form::text('no_ktp', null, ['class' => 'validate form-control', 'placeholder' => 'No KTP', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-6">
                                {!! Form::label('kebutuhan', 'Kebutuhan') !!}
                                {!! Form::textarea('kebutuhan', null, ['class' => 'validate form-control', 'placeholder' => 'Deskripsi kebutuhan pinjaman', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-6">
                                {!! Form::label('gaji', 'Jumlah Gaji') !!}
                                {!! Form::text('gaji', null, ['class' => 'validate form-control', 'placeholder' => 'Nominal gaji', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-6">
                                {!! Form::label('tanggungan', 'Jumlah Tanggungan') !!}
                                {!! Form::text('tanggungan', null, ['class' => 'validate form-control', 'placeholder' => 'Jumlah tanggungan debitur', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-6">
                                {!! Form::label('pinjaman', 'Permintaan Pinjaman') !!}
                                {!! Form::text('pinjaman', null, ['class' => 'validate form-control', 'placeholder' => 'Nominan penjiman', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                    </div>
                    <button class="waves-effect waves-light btn pink darken-4">SUBMIT</button>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Debitur</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Gaji</th>
                                <th>Tanggungan</th>
                                <th>Kebutuhan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($debitur as $debiturr)
                            <tr>
                                <th>{{$debiturr->id_debitur}}</th>
                                <th>{{$debiturr->nama}}</th>
                                <th>Rp {{number_format($debiturr->gaji)}}</th>
                                <th>{{$debiturr->tanggungan}}</th>
                                <th>{{$debiturr->kebutuhan}}</th>
                                <th>
                                    <!-- Button trigger modal -->
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a type="button" class="btn" data-toggle="modal" data-target="#info{{$debiturr->id}}">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{action('Controller@deletedebitur', $debiturr->id)}}" class="btn">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{action('Controller@forecastdebitur', $debiturr->id)}}" class="btn">
                                            <span aria-hidden="true">forecast</span>
                                        </a>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="info{{$debiturr->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Detail Debitur</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>ID #{{$debiturr->id}}</h3>
                                                    <h4>{{$debiturr->nama}}</h4>
                                                    <h4>KTP {{$debiturr->no_ktp}}</h4>
                                                    <h4>Tanggal Lahir {{$debiturr->ttl}}</h4>
                                                    <h4>Pekerjaan {{$debiturr->occupation}}</h4>
                                                    <p class="divider"></p>
                                                    <h3>Gaji</h3>
                                                    <h4>Rp {{number_format($debiturr->gaji)}}</h4>
                                                    <h3>Tanggungan</h3>
                                                    <h4>{{$debiturr->tanggungan}}</h4>
                                                    <h3>Kebutuhan</h3>
                                                    <h4>{{$debiturr->kebutuhan}}</h4>
                                                    <h3>Jumlah Pinjaman</h3>
                                                    <h4>Rp {{number_format($debiturr->pinjaman)}}</h4>
                                                    <h3>Tanggal Meminjam</h3>
                                                    <h4>{{$debiturr->tanggalpinjam}}</h4>
                                                    <h3>Approved</h3>
                                                    <h4>{{$debiturr->approved}}</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row right" id="pagination">{!! $debitur->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection