@extends('layouts.admin')

@section('content')

<div class="page-header-container">
    <div class="page-header-wrapper container">

        <div class="d-flex justify-content-between mt-3">

            <div>
                <div class="page-header-title" data-hook="page-header-title">
                    <h1>การเข้า-ออกงานของพนักงาน</h1>
                </div>
                {{-- <div class="page-header-subtitle"></div>
                    --}}
            </div>


</div>


<div class="card-container container mb-5 mt-3">
    <div class="card">
        <div class="card-header ml-2">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-0 col-form-label">จาก</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    <label for="inputEmail3" class="col-sm-0 col-form-label">ถึง</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                    </div>
                </div>
            </form>

            <div class="card-body text-center">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                  google.charts.load("current", {packages:["corechart"]});
                  google.charts.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Task', 'Lave'],
                      ['ลา',      0.5 ,],
                      ['ขาด', 9],
                      ['มาสาย',    15]
                    ]);

                    var options = {
                      pieHole: 0.5,

                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                    chart.draw(data, options);
                  }
                </script>
              <body>
                <div id="donutchart" style="width: 1000px; height: 500px;"></div>
              </body>

            </div>
        </div>
    </div>
</div>

@endsection
