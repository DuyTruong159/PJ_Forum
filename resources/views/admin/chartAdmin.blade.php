@extends('admin.layoutAdmin')
@section('contentAdmin')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div>
                <form method="get" action="{{route('chartFormat')}}">
                <label for="year" class="font-20" style="font-weight: 600;">Năm:</label>
                <select name="year" id="year">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
                <button type="submit" class="btn-primary">Tìm kiếm</button>
                <div id="chart-form">
                    <canvas id="myChart"></canvas>
                </div>
                </form>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>

<script>
    const labels = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July',
      'August',
      'September',
      'October',
      'November',
      'December'
    ];

    const data = {
      labels: labels,
      datasets: [{
        label: 'Số lượng bài đăng trong tháng',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: @json($data),
      }]
    };

    const config = {
      type: 'line',
      data: data,
      options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    console.log(@json($data));
</script>

@endsection
