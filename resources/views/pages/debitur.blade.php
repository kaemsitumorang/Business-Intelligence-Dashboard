@extends('layouts.app')
@section('style')
<style type="text/css">
.btn{
margin-bottom: 2em;
}
#form{
    margin-bottom: 1em;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Add New Debitur
            </button>
            <div class="collapse" id="collapseExample">
                <div class="well">
                    {!! Form::open(['url' => 'pages/debitur']) !!}
                    <div class="form-group">
                        <div class="row" id="form">
                            <div class="col-md-4">
                                {!! Form::label('nama', 'Nama') !!}
                                {!! Form::text('nama', null, ['class' => 'validate form-control', 'placeholder' => 'Nama calon debitur', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-4">
                                {!! Form::label('no_ktp', 'KTP') !!}
                                {!! Form::text('no_ktp', null, ['class' => 'validate form-control', 'placeholder' => 'No KTP', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-4">
                                {!! Form::label('kebutuhan', 'Kebutuhan') !!}
                                {!! Form::text('kebutuhan', null, ['class' => 'validate form-control', 'placeholder' => 'Deskripsi kebutuhan pinjaman', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-4">
                                {!! Form::label('gaji', 'Jumlah Gaji') !!}
                                {!! Form::text('gaji', null, ['class' => 'validate form-control', 'placeholder' => 'Nominal gaji', 'required' => "", 'aria-required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="row" id="form">
                            <div class="col-md-4">
                                {!! Form::label('tanggungan', 'Jumlah Tanggungan') !!}
                                {!! Form::text('tanggungan', null, ['class' => 'validate form-control', 'placeholder' => 'Jumlah tanggungan debitur', 'required' => "", 'aria-required' => 'true']) !!}
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
                                <th>Nama</th>
                                <th>Gaji</th>
                                <th>Tanggungan</th>
                                <th>Kebutuhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($debitur as $debiturr)
                            <tr>
                                <th>{{$debiturr->nama}}</th>
                                <th>{{$debiturr->gaji}}</th>
                                <th>{{$debiturr->tanggungan}}</th>
                                <th>{{$debiturr->kebutuhan}}</th>
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
@section('script')
<script type="text/javascript">
$('.collapse').collapse()
</script>
@endsection