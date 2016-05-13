@extends('layouts.app')
@section('style')
<style type="text/css">
  #chart{
    margin-top: 2em;
    margin-bottom: 2em;
  }
</style>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <!-- <div class="col-md-10"> -->
    <div class="panel panel-default">
      <div class="panel-heading">Dashboard</div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="well">
          <h4 class="text-center">Total Request</h4>
          <p class="text-center">2016</p>
          <h1 class="text-center"><strong>{!! $totalTransaction !!}</strong></h1>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="well">
          <h4 class="text-center">This Month Request</h4>
          <p class="text-center">{!! $thisMonthString !!}</p>
          <h1 class="text-center"><strong>{!! $transactionThisMonth !!}</strong></h1>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="well">
          <h4 class="text-center"><a href="{{ url('/debitur-new') }}">Request</a></h4>
          <p class="text-center">Needed approval</p>
          <h1 class="text-center"><strong>{!! $transactionPending !!}</strong></h1>
        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
  <div class="row" id="chart">
      <div class="center-block" id="barchart_material" style="width: 900px; height: 500px;"></div>
      <div class="divider"></div>
  </div>
  <div class="row" id="chart">
      <div class="col-md-6">
          <div id="scatterchart_material" style="height: 500px;"></div>
      </div>
      <div class="col-md-6">
        <div id="line_top_x" style="height: 500px;"></div>
      </div>
  </div>
  <div class="row" id="chart">
      <div class="col-md-6">
          <div id="scatterchart_material2" style="height: 500px;"></div>
      </div>
      <div class="col-md-6">
        <div id="scatterchart_material3" style="height: 500px;"></div>
      </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar', 'scatter', 'line']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);
      google.charts.setOnLoadCallback(drawChart4);
      google.charts.setOnLoadCallback(drawChart5);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Bulan', 'Request', 'Approved', 'Rejected'],
          ['Januari', {!! $transactionJanuary !!}, {!! $transactionJanuaryYes !!}, {!! $transactionJanuaryNo !!}],
          ['Februari', {!! $transactionFebruary !!}, {!! $transactionFebruaryYes !!}, {!! $transactionFebruaryNo !!}],
          ['Maret', {!! $transactionMarch !!}, {!! $transactionMarchYes !!}, {!! $transactionMarchNo !!}],
          ['April', {!! $transactionApril !!}, {!! $transactionAprilYes !!}, {!! $transactionAprilNo !!}],
          ['Mei', {!! $transactionMay !!}, {!! $transactionMayYes !!}, {!! $transactionMayNo !!}],
        ]);

        var options = {
          chart: {
            title: 'Performa Kredit Plus-Plus',
            subtitle: 'Request, Approved, dan Rejected: 2016',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, options);
      }
      function drawChart2 () {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Gaji');
        data.addColumn('number', 'Pinjaman');

        data.addRows([
          @foreach($debitur as $debiturs)
          [{{$debiturs->gaji}},{{$debiturs->pinjaman}}],
          @endforeach
        ]);

        var options = {
          chart: {
            title: 'Persebaran Gaji Beserta Pinjaman',
            subtitle: 'Scatter Plot'
          },
          hAxis: {title: 'Gaji'},
          vAxis: {title: 'Pinjaman'},
          colors: ['#fdd835']
        };

        var chart = new google.charts.Scatter(document.getElementById('scatterchart_material'));

        chart.draw(data, google.charts.Scatter.convertOptions(options));
      }
      function drawChart3() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Bulan');
      data.addColumn('number', 'Request');
      data.addColumn('number', 'Approved');
      data.addColumn('number', 'Rejected');

      data.addRows([
        [1, {!! $transactionJanuary !!}, {!! $transactionJanuaryYes !!}, {!! $transactionJanuaryNo !!}],
        [2, {!! $transactionFebruary !!}, {!! $transactionFebruaryYes !!}, {!! $transactionFebruaryNo !!}],
        [3, {!! $transactionMarch !!}, {!! $transactionMarchYes !!}, {!! $transactionMarchNo !!}],
        [4, {!! $transactionApril !!}, {!! $transactionAprilYes !!}, {!! $transactionAprilNo !!}],
        [5, {!! $transactionMay !!}, {!! $transactionMayYes !!}, {!! $transactionMayNo !!}],
      
      ]);

      var options = {
        chart: {
          title: 'Trend Peminjaman Diterima dan Ditolak'
        },
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, options);
    }
    function drawChart4 () {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Gaji');
        data.addColumn('number', 'Pinjaman');

        data.addRows([
          @foreach($debiturDiterima as $debiturs)
          [{{$debiturs->gaji}},{{$debiturs->pinjaman}}],
          @endforeach
        ]);

        var options = {
          chart: {
            title: 'Pinjaman Diterima',
            subtitle: 'Persebaran Gaji Beserta Pinjaman'
          },
          hAxis: {title: 'Gaji'},
          vAxis: {title: 'Pinjaman'}
        };

        var chart = new google.charts.Scatter(document.getElementById('scatterchart_material2'));

        chart.draw(data, google.charts.Scatter.convertOptions(options));
      }
      function drawChart5 () {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Gaji');
        data.addColumn('number', 'Pinjaman');

        data.addRows([
          @foreach($debiturDitolak as $debiturs)
          [{{$debiturs->gaji}},{{$debiturs->pinjaman}}],
          @endforeach
        ]);

        var options = {
          chart: {
            title: 'Pinjaman Ditolak',
            subtitle: 'Persebaran Gaji Beserta Pinjaman'
          },
          hAxis: {title: 'Gaji'},
          vAxis: {title: 'Pinjaman'},
          colors: ['#ad1457']
        };

        var chart = new google.charts.Scatter(document.getElementById('scatterchart_material3'));

        chart.draw(data, google.charts.Scatter.convertOptions(options));
      }
    </script>
@endsection