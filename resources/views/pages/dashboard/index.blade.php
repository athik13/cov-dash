{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Dashboard - Maldives')

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard.css')}}">
<style type="text/css">
    #mynetwork {
        width: 100%;
        height: 100%;
        border: 1px solid lightgray;
    }
    .pulse {
        -webkit-animation:pulse 1.7s cubic-bezier(.25,.1,.25,1) infinite;
        -moz-animation:pulse 1.7s cubic-bezier(.25,.1,.25,1) infinite;
        -o-animation:pulse 1.7s cubic-bezier(.25,.1,.25,1) infinite;
        animation:pulse 1.7s cubic-bezier(.25,.1,.25,1) infinite;
        color: #d32f2f;
    }
    @-webkit-keyframes pulse {
    0% {
    opacity:1
    }
    50% {
    opacity:.3
    }
    100% {
    opacity:1
    }
    }
    @-moz-keyframes pulse {
    0% {
    opacity:1
    }
    50% {
    opacity:.3
    }
    100% {
    opacity:1
    }
    }
    @-o-keyframes pulse {
    0% {
    opacity:1
    }
    50% {
    opacity:.3
    }
    100% {
    opacity:1
    }
    }
    @keyframes pulse {
    0% {
    opacity:1
    }
    50% {
    opacity:.3
    }
    100% {
    opacity:1
    }
    }
</style>
@endsection

{{-- page content --}}
@section('content')


<div class="section">
    <div id="title">
        <h3>Covid-19 Outbreak in Maldives <a class="btn btn-info" href="https://covidmv.live/">Back to Home</a></h3>
        <h6><span class="pulse" style="">Live Updates</span> - Last updated: {{ $currentStat->updated_at->diffForHumans() }}</h6>
    </div>

	<!-- card stats start -->
	<div id="card-stats" class="pt-0">
		<div class="row">
			<div class="col s12 m6 l3">
				<div class="card animate fadeLeft">
					<div class="card-content red accent-2 white-text">
						<p class="card-stats-title"><i class="material-icons">person_outline</i> Total Confirmed Cases</p>
						<h4 class="card-stats-number white-text">{{ $currentStat->totalConfirmedCases }}</h4>
						<p class="card-stats-compare">

						</p>
					</div>
					<div class="card-action red darken-1">
						<div id="total-confirmed-cases-bar" class="center-align"></div>
					</div>
				</div>
            </div>

            <div class="col s12 m6 l3">
				<div class="card animate fadeRight">
					<div class="card-content green lighten-1 white-text">
						<p class="card-stats-title"><i class="material-icons">person_outline</i> Recoveries</p>
						<h4 class="card-stats-number white-text">{{ $currentStat->recovered }}</h4>
						<p class="card-stats-compare">

						</p>
					</div>
					<div class="card-action green">
						<div id="total-recovered-cases-bar" class="center-align"></div>
					</div>
				</div>
            </div>

            <div class="col s12 m6 l3">
				<div class="card animate fadeRight">
					<div class="card-content orange lighten-1 white-text">
						<p class="card-stats-title"><i class="material-icons">person_outline</i> Active Cases</p>
						<h4 class="card-stats-number white-text">{{ $currentStat->active }}</h4>
						<p class="card-stats-compare">

						</p>
					</div>
					<div class="card-action orange">
						<div id="active-cases-bar" class="center-align"></div>
					</div>
				</div>
			</div>

			<div class="col s12 m6 l3">
				<div class="card animate fadeLeft">
					<div class="card-content blue-grey darken-1 white-text">
						<p class="card-stats-title"><i class="material-icons">person_outline</i> Total Deaths</p>
						<h4 class="card-stats-number white-text">{{ $currentStat->deaths }}</h4>
						<p class="card-stats-compare">

						</p>
					</div>
					<div class="card-action blue-grey darken-4">
						<div id="total-deaths-bar" class="center-align"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--card stats end-->

    <div id="chart-dashboard">
        <div class="row">
            <div class="col s12 m12 l7">
                <div class="card animate fadeUp">
                    <div class="card-move-up waves-effect waves-block waves-light">
                        <div class="move-up blue darken-2">
                            <div>
                                <span class="chart-title white-text">Cases</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="trending-line-chart-wrapper table-responsive" style="height: 60vh; padding-bottom: 50px;">
                            <canvas id="cases-chart" style="height: 100%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l5">
                <div class="card animate fadeUp">
                    <div class="card-move-up blue darken-2 waves-effect waves-block waves-light">
                        <div class="move-up">
                            <span class="chart-title white-text">People Tested <span style="font-size: 1rem; font-weight: 300;">source: HPA Twitter</span> </span>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="line-chart-wrapper">
                            <canvas id="people-tested-chart" height="200%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m6 l4">
                <div class="card animate fadeUp">
                    <div class="card-move-up waves-effect waves-block waves-light">
                        <div class="move-up blue darken-2">
                            <div>
                                <span class="chart-title white-text">Local vs Foreigners</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="trending-line-chart-wrapper">
                            <canvas id="local-vs-foreigners-chart" height="150%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card animate fadeUp">
                    <div class="card-move-up waves-effect waves-block waves-light">
                        <div class="move-up blue darken-2">
                            <div>
                                <span class="chart-title white-text">Active Cases in Maldives vs Out of Country</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="trending-line-chart-wrapper">
                            <canvas id="maldives-vs-out-country-chart" height="150%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l4">
                <div class="card animate fadeUp">
                    <div class="card-move-up waves-effect waves-block waves-light">
                        <div class="move-up blue darken-2">
                            <div>
                                <span class="chart-title white-text">Isolation and Quarantine</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="trending-line-chart-wrapper">
                            <canvas id="isolation-and-quarantine-chart" height="150%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 m12 l8">
                <div class="card animate fadeUp" style="height: 80vh;">
                    <div class="card-move-up waves-effect waves-block waves-light">
                        <div class="move-up blue darken-2">
                            <div>
                                <span class="chart-title white-text">Cluster Map</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-content" style="height: 100%;">
                        <ul style="display: inline-block; vertical-align: middle; width:100%">
                            <li style="width: auto; display: inline-block; padding-left: 5px;"> <span style="background-color: #d20f35; color: #d20f35;">....</span> Maldives</li>
                            <li style="width: auto; display: inline-block; padding-left: 5px;"> <span style="background-color: #006a4e; color: #006a4e;">....</span> Bangladesh</li>
                            <li style="width: auto; display: inline-block; padding-left: 5px;"> <span style="background-color: #ff9933; color: #ff9933;">....</span> India</li>
                            <li style="width: auto; display: inline-block; padding-left: 5px;"> <span style="background-color: #4a4a4a; color: #4a4a4a;">....</span> Others</li>
                        </ul>
                        <div id="mynetwork"></div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l4">
                <div class="card animate fadeUp" style="height: 80vh;">
                    <div class="card-move-up waves-effect waves-block waves-light">
                        <div class="move-up blue darken-2">
                            <div>
                                <span class="chart-title white-text">HPA Twitter Feed</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-content" style="height: 100%;">
                        <a class="twitter-timeline" href="https://twitter.com/HPA_MV" data-width="100%" data-height="100%" data-chrome="nofooter noborders">Tweets by HPA_MV</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>


@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
<script src="{{asset('vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script>

var clusterNodes = '[{"id":1,"label":"MAV\\n001"},{"id":2,"label":"MAV\\n002"},{"id":3,"label":"MAV\\n003"},{"id":4,"label":"MAV\\n004"},{"id":5,"label":"MAV\\n005"},{"id":6,"label":"MAV\\n006"},{"id":7,"label":"MAV\\n007"},{"id":8,"label":"MAV\\n008"},{"id":9,"label":"MAV\\n009"},{"id":10,"label":"MAV\\n010"},{"id":11,"label":"MAV\\n011"},{"id":12,"label":"MAV\\n012"},{"id":13,"label":"MAV\\n013"},{"id":14,"label":"MAV\\n014"},{"id":15,"label":"MAV\\n015"},{"id":16,"label":"MAV\\n016","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":17,"label":"MAV\\n017","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":18,"label":"MAV\\n018","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":19,"label":"MAV\\n019","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":20,"label":"MAV\\n020","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":21,"label":"MAV\\n021","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":22,"label":"MAV\\n022","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":23,"label":"MAV\\n023","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":24,"label":"MAV\\n024","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":25,"label":"MAV\\n025","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":26,"label":"MAV\\n026","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":27,"label":"MAV\\n027","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":28,"label":"MAV\\n028","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":29,"label":"MAV\\n029","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":30,"label":"MAV\\n030","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":31,"label":"MAV\\n031","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":32,"label":"MAV\\n032","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":33,"label":"MAV\\n033","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":34,"label":"MAV\\n034","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":35,"label":"MAV\\n035","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":36,"label":"MAV\\n036","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":37,"label":"MAV\\n037","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":38,"label":"MAV\\n038","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":39,"label":"MAV\\n039","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":40,"label":"MAV\\n040","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":41,"label":"MAV\\n041","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":42,"label":"MAV\\n042","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":43,"label":"MAV\\n043","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":44,"label":"MAV\\n044","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":45,"label":"MAV\\n045","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":46,"label":"MAV\\n046","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":47,"label":"MAV\\n047","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":48,"label":"MAV\\n048","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":49,"label":"MAV\\n049","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":50,"label":"MAV\\n050","color":{"border":"#ff9933","highlight":{"border":"#ff9933"}}},{"id":51,"label":"MAV\\n051","color":{"border":"#ff9933","highlight":{"border":"#ff9933"}}},{"id":52,"label":"MAV\\n052","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":53,"label":"MAV\\n053","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":54,"label":"MAV\\n054","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":55,"label":"MAV\\n055","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":56,"label":"MAV\\n056","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":57,"label":"MAV\\n057","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":58,"label":"MAV\\n058","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":59,"label":"MAV\\n059","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":60,"label":"MAV\\n060","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":61,"label":"MAV\\n061","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":62,"label":"MAV\\n062","color":{"border":"#ff9933","highlight":{"border":"#ff9933"}}},{"id":63,"label":"MAV\\n063","color":{"border":"#ff9933","highlight":{"border":"#ff9933"}}},{"id":64,"label":"MAV\\n064","color":{"border":"#ff9933","highlight":{"border":"#ff9933"}}},{"id":65,"label":"MAV\\n065","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":66,"label":"MAV\\n066","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":67,"label":"MAV\\n067","color":{"border":"#ff9933","highlight":{"border":"#ff9933"}}},{"id":68,"label":"MAV\\n068","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":69,"label":"MAV\\n069","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":70,"label":"MAV\\n070","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":71,"label":"MAV\\n071","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":72,"label":"MAV\\n072","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":73,"label":"MAV\\n073","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":74,"label":"MAV\\n074","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":75,"label":"MAV\\n075","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":76,"label":"MAV\\n076","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":77,"label":"MAV\\n077","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":78,"label":"MAV\\n078","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":79,"label":"MAV\\n079","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":80,"label":"MAV\\n080","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":81,"label":"MAV\\n081","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":82,"label":"MAV\\n082","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":83,"label":"MAV\\n083","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":84,"label":"MAV\\n084","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":85,"label":"MAV\\n085","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":86,"label":"MAV\\n086","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":87,"label":"MAV\\n087","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":88,"label":"MAV\\n088","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":89,"label":"MAV\\n089","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":90,"label":"MAV\\n090","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":91,"label":"MAV\\n091","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":92,"label":"MAV\\n092","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":93,"label":"MAV\\n093","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":94,"label":"MAV\\n094","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":95,"label":"MAV\\n095","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":96,"label":"MAV\\n096","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":97,"label":"MAV\\n097","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":98,"label":"MAV\\n098","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":99,"label":"MAV\\n099","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}}]';
var clusterEdges = '[{"to":21,"from":0},{"to":22,"from":21},{"to":23,"from":21},{"to":24,"from":23},{"to":25,"from":23},{"to":26,"from":23},{"to":27,"from":0},{"to":28,"from":0},{"to":29,"from":27},{"to":30,"from":27},{"to":31,"from":28},{"to":32,"from":30},{"to":33,"from":28},{"to":34,"from":27},{"to":35,"from":0},{"to":36,"from":0},{"to":37,"from":27},{"to":38,"from":27},{"to":39,"from":27},{"to":40,"from":27},{"to":41,"from":27},{"to":42,"from":27},{"to":43,"from":27},{"to":44,"from":27},{"to":45,"from":27},{"to":46,"from":27},{"to":47,"from":27},{"to":48,"from":27},{"to":49,"from":27},{"to":50,"from":28},{"to":51,"from":28},{"to":52,"from":0},{"to":53,"from":0},{"to":54,"from":0},{"to":55,"from":29},{"to":56,"from":34},{"to":57,"from":27},{"to":58,"from":0},{"to":59,"from":0},{"to":60,"from":0},{"to":61,"from":36},{"to":62,"from":28},{"to":63,"from":28},{"to":64,"from":28},{"to":65,"from":29},{"to":66,"from":29},{"to":67,"from":29},{"to":68,"from":0},{"to":69,"from":0},{"to":70,"from":0},{"to":71,"from":70},{"to":72,"from":70},{"to":73,"from":68},{"to":74,"from":36},{"to":75,"from":36},{"to":76,"from":0},{"to":77,"from":0},{"to":78,"from":0},{"to":79,"from":31},{"to":80,"from":35},{"to":81,"from":0},{"to":82,"from":35},{"to":83,"from":0},{"to":84,"from":52},{"to":85,"from":0},{"to":86,"from":36},{"to":87,"from":0},{"to":88,"from":0},{"to":89,"from":0},{"to":90,"from":0},{"to":91,"from":0},{"to":92,"from":0},{"to":93,"from":0},{"to":94,"from":0},{"to":95,"from":0},{"to":96,"from":0},{"to":97,"from":0},{"to":98,"from":0},{"to":99,"from":0}]';


clusterNodes = JSON.parse(clusterNodes);
clusterEdges = JSON.parse(clusterEdges);


var nodes = new vis.DataSet(clusterNodes);
var edges = new vis.DataSet(clusterEdges);
var containerCluster = document.getElementById('mynetwork');
var dataCluster = {
    nodes: nodes,
    edges: edges
};
var optionsCluster = {
    width: '100%',
    height: '100%',
    nodes: {
        shape: 'circle',
        borderWidth: 5,
        font:{
            color: 'black',
            size: 15

        },
        color: {
            background: '#e3f2fd',
            border: '#4a4a4a',
            highlight: {
                border: '#4a4a4a',
                background: '#e0f2f1',
            }
        },
        margin:{
            bottom: 0,
            top: 10,
            left: 10,
            right: 10
        }
    }
};
var network = new vis.Network(containerCluster, dataCluster, optionsCluster);

</script>

<script>

(function (window, document, $) {

// Check first if any of the task is checked
$("#task-card input:checkbox").each(function () {
    checkbox_check(this);
});

// Task check box
$("#task-card input:checkbox").change(function () {
    checkbox_check(this);
});

// Check Uncheck function
function checkbox_check(el) {
    if (!$(el).is(":checked")) {
        $(el)
            .next()
            .css("text-decoration", "none"); // or addClass
    } else {
        $(el)
            .next()
            .css("text-decoration", "line-through"); //or addClass
    }
}

//Trending line chart
var casesChartCTX = $("#cases-chart");
var peopleTestedChartCTX = $("#people-tested-chart");
var localVsForeignersChartCTX = $("#local-vs-foreigners-chart");
var maldivesVsOutCountryChartCTX = $("#maldives-vs-out-country-chart");
var isolationAndQuarantineChartCTX = $("#isolation-and-quarantine-chart");



window.onload = function () {
    var casesChart = new Chart(casesChartCTX, {
        type: 'line',
        data: {
            labels: {!! json_encode($casesLabel) !!},
            datasets: [
                {
                    label: 'Confirmed',
                    backgroundColor: '#ff5252',
                    borderColor: '#ff5252',
                    data: {!! json_encode($dailyCasesConfirmed) !!},
                    fill: false,
                },
                {
                    label: 'Recovered',
                    backgroundColor: '#66bb6a',
                    borderColor: '#66bb6a',
                    data: {!! json_encode($dailyCasesRecovered) !!},
                    fill: false,
                },
                {
                    label: 'Deaths',
                    backgroundColor: '#000000',
                    borderColor: '#000000',
                    data: {!! json_encode($dailyCasesDeaths) !!},
                    fill: false,
                },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [
                    {
                    display: true,
                    ticks: {
                        fontColor: "#000"
                    }
                    }
                ],
                yAxes: [
                    {
                    display: true,
                    fontColor: "#000",
                    ticks: {
                        beginAtZero: false,
                        fontColor: "#000"
                    }
                    }
                ]
            }
        }
    });

    var peopleTestedChart = new Chart(peopleTestedChartCTX, {
        type: 'horizontalBar',
        data: {
            labels: ['Tested'],
            datasets: [
                {
                    label: 'Positive',
                    backgroundColor: '#ff5252',
                    borderColor: '#ff5252',
                    data: [{{ $currentStat->people_tested_positive }}]
                },
                {
                    label: 'Negative',
                    backgroundColor: '#66bb6a',
                    borderColor: '#66bb6a',
                    data: [{{ $currentStat->people_tested_negative }}]
                },
                {
                    label: 'Pending',
                    backgroundColor: '#999999',
                    borderColor: '#999999',
                    data: [{{ $currentStat->people_tested_pending }}]
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                display: true
            },
            tooltips: {
                mode: 'index',
                intersect: false
            },
            scales: {
                xAxes: [
                    {
                        display: true,
                        fontColor: "#000",
                        stacked: true,
                    }
                ],
                yAxes: [
                    {
                        display: true,
                        fontColor: "#000",
                        stacked: true,
                    }
                ]
            }
        }
    });

    var localVsForeignersChart = new Chart(localVsForeignersChartCTX, {
        type: 'pie',
        data: {
            labels: ['Maldivians', 'Foreigners'],
            datasets: [
                {
                    data: [{{ $currentStat->locals }}, {{ $currentStat->foreigners }}],
                    backgroundColor: [
                        '#64b5f6',
                        '#80cbc4'
                    ],

                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                display: true
            },
            tooltips: {
                mode: 'index',
                intersect: true
            },
            plugins: {
                labels: {
                    render: 'value'
                }
            }
        }
    });

    var maldivesVsOutCountryChart = new Chart(maldivesVsOutCountryChartCTX, {
        type: 'pie',
        data: {
            labels: ['Active Cases in Maldives', 'Active Cases Out of Country'],
            datasets: [
                {
                    data: [{{ $currentStat->active_in_maldives }}, {{ $currentStat->active_out_of_country }}],
                    backgroundColor: [
                        '#ffb74d',
                        '#ce93d8'
                    ],

                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                display: true
            },
            tooltips: {
                mode: 'index',
                intersect: true
            },
            plugins: {
                labels: {
                    render: 'value'
                }
            }
        }
    });

    var isolationAndQuarantineChart = new Chart(isolationAndQuarantineChartCTX, {
        type: 'pie',
        data: {
            labels: ['In Isolation Facilities', 'Quarantine Facilities'],
            datasets: [
                {
                    data: [{{ $currentStat->isolation }}, {{ $currentStat->quarantine }}],
                    backgroundColor: [
                        '#ffab91',
                        '#ff80ab'
                    ],

                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                display: true
            },
            tooltips: {
                mode: 'index',
                intersect: true
            },
            plugins: {
                labels: {
                    render: 'value'
                }
            }
        }
    });
};

$(function () {
    $("#total-confirmed-cases-bar").sparkline({!! json_encode(array_reverse($last15confirmedCases)) !!}, {
        type: "bar",
        height: "25",
        barWidth: 7,
        barSpacing: 4,
        barColor: "#d1d1d1",
        negBarColor: "#81d4fa",
        zeroColor: "#81d4fa"
    });

    $("#total-recovered-cases-bar").sparkline({!! json_encode(array_reverse($last15recovered)) !!}, {
        type: "bar",
        height: "25",
        barWidth: 7,
        barSpacing: 4,
        barColor: "#d1d1d1",
        negBarColor: "#81d4fa",
        zeroColor: "#81d4fa"
    });

    $("#active-cases-bar").sparkline({!! json_encode(array_reverse($last15active)) !!}, {
        type: "bar",
        height: "25",
        barWidth: 7,
        barSpacing: 4,
        barColor: "#d1d1d1",
        negBarColor: "#81d4fa",
        zeroColor: "#81d4fa"
    });

    $("#total-deaths-bar").sparkline({!! json_encode(array_reverse($last15deaths)) !!}, {
        type: "bar",
        height: "25",
        barWidth: 7,
        barSpacing: 4,
        barColor: "#d1d1d1",
        negBarColor: "#81d4fa",
        zeroColor: "#81d4fa"
    });

});
})(window, document, jQuery);
</script>
@endsection
