@extends('layouts.app')
@push('css')
	<style>
		span.badge.badge-danger {
			width: 35px;
			height: 35px;
			border-radius: 100px;
			padding: 11px 0px 0px 0px;
			}
	</style>
@endpush
@section('content')

    <div class="card">
        <div class="dolar-area">
            <div class="row">
				
                <div class="col-sm-12 col-sm-6 col-md-3">
					<img src="{{URL::to('assets/new-theme/images/db_icon/002-growth.svg')}}" alt="" class="db_image_icon" style="margin-left: 10px;">
                    <div class="dolar-content">
                        <h2 style="margin-left:10px;"> {{get_settings($settingdata, 'currency')}} @php print_r($todayDate); @endphp</h2>
                        {{-- <p>Daily  <br>
                            Income</p> --}}
                    </div>
				</div>
		
				
                <div class="col-sm-12 col-sm-6 col-md-3">
					<img src="{{URL::to('assets/new-theme/images/db_icon/001-growth-1.svg')}}" alt="" class="db_image_icon" >
                    <div class="dolar-content">
                        <h2>{{get_settings($settingdata, 'currency')}} @php print_r($thisMonth) @endphp</h2>
                        <p><!--Monthly  <br>
                            Income--></p>
                    </div>
				</div>
				
                <div class="col-sm-12 col-sm-6 col-md-3">
					<img src="{{URL::to('assets/new-theme/images/db_icon/003-overflow.svg')}}" alt="" class="db_image_icon">
                    <div class="dolar-content">
                        <h2>@php print_r($todaySaleQty); @endphp</h2>
                        {{-- <p>Daily <br>
                            Sales Qty</p> --}}
                    </div>
				</div>
				
                <div class="col-sm-12 col-sm-6 col-md-3">
					<img src="{{URL::to('assets/new-theme/images/db_icon/004-link.svg')}}" alt="" class="db_image_icon" >
                    <div class="dolar-content">
                        <h2>@php print_r($totalMember); @endphp</h2>
                        {{-- <p>Total  <br>
                            Members</p> --}}
                    </div>
				</div>
				
            </div>
        </div>
	</div>
	

    <div class="card">
        <div class="chart">
            <canvas id="bar-chart" width="800" height="300"></canvas>
        </div>
    </div>
   
	<div class="card">
		
			<h3 style=" padding: 10px; text-align: center; color: red; font-weight: bold; border-bottom: 2px solid; ">Alert Quantity</h3>
	
        <div class="card-body">
            <table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Total Quantity</th>
					</tr>
				</thead>
				<tbody> 
					@foreach($alartProducts as $ProductAlert)
						<tr>
							<td style="color: red;">{{$ProductAlert->name}}</td>
							<td><span class="badge badge-danger">{{$ProductAlert->avQty}}</span></td>
						</tr>
					@endforeach
				
				
				</tbody>
			</table>
        </div>
    </div>

@endsection
@push('js')
<script src="{{asset('assets/new-theme/js/moment.js')}}"></script>
<script src="{{asset('assets/new-theme/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/new-theme/js/utils.js')}}"></script>

<script>
    var dateFormat = 'MMMM DD YYYY'; 
	var chartdata = <?php echo json_encode($chartData); ?>;
	console.log(chartdata);

	var data = [];
	chartdata.forEach( function(element){
		let item = {
			t: moment(element.t, dateFormat),
			y: element.y
		}
		data.push(item);
	});
	console.log(data);
	var ctx = document.getElementById('bar-chart').getContext('2d');
	ctx.canvas.width = 1000;
	ctx.canvas.height = 300;

	var color = Chart.helpers.color;
	var cfg = {
		type: 'bar',
		data: {
			datasets: [{
				label: 'Bike Solution',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				data: data,
				type: 'bar',
				pointRadius: 0,
				fill: false,
				lineTension: 0,
				borderWidth: 2
			}]
		},
		options: {
			scales: {
				xAxes: [{
					type: 'time', 
					time: {
						parser: 'DD MMMM, YYYY',
						tooltipFormat: 'DD MMMM, YYYY',
						unit: 'day',
						unitStepSize: 1,
						displayFormats: {
						'day': 'DD MMMM, YYYY'
						}
					}
                
				}],
				yAxes: [{
					scaleLabel: {
						display: true,
						labelString: 'Closing price ($)'
					}
				}]
			},
			tooltips: {
				intersect: false,
				mode: 'index',
				callbacks: {
					label: function(tooltipItem, myData) {
						var label = myData.datasets[tooltipItem.datasetIndex].label || '';
						if (label) {
							label += ': ';
						}
						label += parseFloat(tooltipItem.value).toFixed(2);
						return label;
					}
				}
			}
		}
	};

	var chart = new Chart(ctx, cfg);

	 
</script>

@endpush