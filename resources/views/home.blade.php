@extends('layouts.app')
@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <!--Div that will hold the pie chart-->
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection
@section('script')
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
   //    google.charts.load("current", {packages:["calendar"]});
   //    google.charts.setOnLoadCallback(drawChart);

   // function drawChart() {
   //     var dataTable = new google.visualization.DataTable();
   //     dataTable.addColumn({ type: 'date', id: 'Date' });
   //     dataTable.addColumn({ type: 'number', id: 'Won/Loss' });
   //     dataTable.addRows([
   //        [ new Date(2012, 3, 13), 37032 ],
   //        [ new Date(2012, 3, 13), 38024 ],
   //        [ new Date(2012, 3, 15), 38024 ],
   //        [ new Date(2012, 3, 16), 38108 ],
   //        [ new Date(2012, 3, 17), 38229 ],
   //        // Many rows omitted for brevity.
   //        [ new Date(2013, 9, 4), 38177 ],
   //        [ new Date(2013, 9, 5), 38705 ],
   //        [ new Date(2013, 9, 12), 38210 ],
   //        [ new Date(2013, 9, 13), 38029 ],
   //        [ new Date(2013, 9, 19), 38823 ],
   //        [ new Date(2013, 9, 23), 38345 ],
   //        [ new Date(2013, 9, 24), 38436 ],
   //        [ new Date(2013, 9, 30), 38447 ]
   //      ]);

   //     var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

   //     var options = {
   //       title: "Red Sox Attendance",
   //       height: 350,
   //     };

   //     chart.draw(dataTable, options);
   // }
    </script>
</script>
@endsection