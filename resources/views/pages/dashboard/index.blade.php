{{-- extend Layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Dashboard Analytics')

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard.css')}}">
<style type="text/css">
    #mynetwork {
        width: 100%;
        height: 100%;
        border: 1px solid lightgray;
    }
</style>
@endsection

{{-- page content --}}
@section('content')


<div class="section">
	<!-- card stats start -->
	<div id="card-stats" class="pt-0">
		<div class="row">
			<div class="col s12 m6 l3">
				<div class="card animate fadeLeft">
					<div class="card-content red accent-2 white-text">
						<p class="card-stats-title"><i class="material-icons">person_outline</i> {{ $hpa->local->surveillance[0]->english_label }}</p>
						<h4 class="card-stats-number white-text">{{ $hpa->local->surveillance[0]->statistic }}</h4>
						<p class="card-stats-compare">
							<i class="material-icons">keyboard_arrow_up</i> 15%
							<span class="red-text text-lighten-5">from yesterday</span>
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
						<p class="card-stats-title"><i class="material-icons">content_copy</i> {{ $hpa->local->surveillance[3]->english_label }}</p>
						<h4 class="card-stats-number white-text">{{ $hpa->local->surveillance[3]->statistic }}</h4>
						<p class="card-stats-compare">
							<i class="material-icons">keyboard_arrow_down</i> 3%
							<span class="green-text text-lighten-5">from last month</span>
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
						<p class="card-stats-title"><i class="material-icons">trending_up</i> {{ $hpa->local->surveillance[5]->english_label }}</p>
						<h4 class="card-stats-number white-text">{{ $hpa->local->surveillance[5]->statistic }}</h4>
						<p class="card-stats-compare">
							<i class="material-icons">keyboard_arrow_up</i> 80%
							<span class="orange-text text-lighten-5">from yesterday</span>
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
						<p class="card-stats-title"><i class="material-icons">attach_money</i> {{ $hpa->local->surveillance[4]->english_label }}</p>
						<h4 class="card-stats-number white-text">{{ $hpa->local->surveillance[4]->statistic }}</h4>
						<p class="card-stats-compare">
                            <i class="material-icons">keyboard_arrow_up</i> 70%
                            <span class="red-text text-lighten-5">last month</span>
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
                        <a class="btn-floating btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                            <i class="material-icons activator">filter_list</i>
                        </a>
                        <div class="trending-line-chart-wrapper">
                            <canvas id="cases-chart" height="150%"></canvas>
                        </div>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Revenue by Month <i class="material-icons right">close</i>
                        </span>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="month">Month</th>
                                    <th data-field="item-sold">Item Sold</th>
                                    <th data-field="item-price">Item Price</th>
                                    <th data-field="total-profit">Total Profit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>January</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>February</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>March</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>April</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>May</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>June</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>July</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>August</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Septmber</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Octomber</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>November</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>December</td>
                                    <td>122</td>
                                    <td>100</td>
                                    <td>$122,00.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l5">
                <div class="card animate fadeUp">
                    <div class="card-move-up blue darken-2 waves-effect waves-block waves-light">
                        <div class="move-up">
                            <span class="chart-title white-text">People Tested</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <a class="btn-floating btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                            <i class="material-icons activator">filter_list</i>
                        </a>
                        <div class="line-chart-wrapper">
                            <canvas id="people-tested-chart" height="200%"></canvas>
                        </div>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Revenue by country <i
                            class="material-icons right">close</i>
                        </span>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th data-field="country-name">Country Name</th>
                                    <th data-field="item-sold">Item Sold</th>
                                    <th data-field="total-profit">Total Profit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>USA</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>UK</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Canada</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Brazil</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>India</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>France</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Austrelia</td>
                                    <td>65</td>
                                    <td>$452.55</td>
                                </tr>
                                <tr>
                                    <td>Russia</td>
                                    <td>76</td>
                                    <td>$452.55</td>
                                </tr>
                            </tbody>
                        </table>
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
                        <a class="btn-floating btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                            <i class="material-icons activator">filter_list</i>
                        </a>
                        <div class="trending-line-chart-wrapper">
                            <canvas id="local-vs-foreigners-chart" height="150%"></canvas>
                        </div>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Revenue by Month <i class="material-icons right">close</i>
                        </span>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="month">Month</th>
                                    <th data-field="item-sold">Item Sold</th>
                                    <th data-field="item-price">Item Price</th>
                                    <th data-field="total-profit">Total Profit</th>
                                </tr>
                            </thead>

                        </table>
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
                        <a class="btn-floating btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                            <i class="material-icons activator">filter_list</i>
                        </a>
                        <div class="trending-line-chart-wrapper">
                            <canvas id="maldives-vs-out-country-chart" height="150%"></canvas>
                        </div>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Revenue by Month <i class="material-icons right">close</i>
                        </span>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="month">Month</th>
                                    <th data-field="item-sold">Item Sold</th>
                                    <th data-field="item-price">Item Price</th>
                                    <th data-field="total-profit">Total Profit</th>
                                </tr>
                            </thead>

                        </table>
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
                        <a class="btn-floating btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                            <i class="material-icons activator">filter_list</i>
                        </a>
                        <div class="trending-line-chart-wrapper">
                            <canvas id="isolation-and-quarantine-chart" height="150%"></canvas>
                        </div>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Revenue by Month <i class="material-icons right">close</i>
                        </span>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="month">Month</th>
                                    <th data-field="item-sold">Item Sold</th>
                                    <th data-field="item-price">Item Price</th>
                                    <th data-field="total-profit">Total Profit</th>
                                </tr>
                            </thead>

                        </table>
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
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
<script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
<script src="{{asset('vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('vendors/chartjs/chart.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/dashboard-analytics.js')}}"></script>

<script>

var clusterNodes = '[{"id":1,"label":"MAV\\n001"},{"id":2,"label":"MAV\\n002"},{"id":3,"label":"MAV\\n003"},{"id":4,"label":"MAV\\n004"},{"id":5,"label":"MAV\\n005"},{"id":6,"label":"MAV\\n006"},{"id":7,"label":"MAV\\n007"},{"id":8,"label":"MAV\\n008"},{"id":9,"label":"MAV\\n009"},{"id":10,"label":"MAV\\n010"},{"id":11,"label":"MAV\\n011"},{"id":12,"label":"MAV\\n012"},{"id":13,"label":"MAV\\n013"},{"id":14,"label":"MAV\\n014"},{"id":15,"label":"MAV\\n015"},{"id":16,"label":"MAV\\n016"},{"id":17,"label":"MAV\\n017"},{"id":18,"label":"MAV\\n018"},{"id":19,"label":"MAV\\n019"},{"id":20,"label":"MAV\\n020"},{"id":21,"label":"MAV\\n021","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":22,"label":"MAV\\n022","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":23,"label":"MAV\\n023","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":24,"label":"MAV\\n024","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":25,"label":"MAV\\n025","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":26,"label":"MAV\\n026","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":27,"label":"MAV\\n027","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":28,"label":"MAV\\n028","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":29,"label":"MAV\\n029","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":30,"label":"MAV\\n030","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":31,"label":"MAV\\n031","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":32,"label":"MAV\\n032","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":33,"label":"MAV\\n033","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":34,"label":"MAV\\n034","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":35,"label":"MAV\\n035","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":36,"label":"MAV\\n036","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":37,"label":"MAV\\n037","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":38,"label":"MAV\\n038","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":39,"label":"MAV\\n039","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":40,"label":"MAV\\n040","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":41,"label":"MAV\\n041","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":42,"label":"MAV\\n042","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":43,"label":"MAV\\n043","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":44,"label":"MAV\\n044","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":45,"label":"MAV\\n045","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":46,"label":"MAV\\n046","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":47,"label":"MAV\\n047","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":48,"label":"MAV\\n048","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":49,"label":"MAV\\n049","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":50,"label":"MAV\\n050","color":{"border":"#ff9933","highlight":{"border":"#ff9933"}}},{"id":51,"label":"MAV\\n051","color":{"border":"#ff9933","highlight":{"border":"#ff9933"}}},{"id":52,"label":"MAV\\n052","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":53,"label":"MAV\\n053","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":54,"label":"MAV\\n054","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":55,"label":"MAV\\n055","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":56,"label":"MAV\\n056","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":57,"label":"MAV\\n057","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":58,"label":"MAV\\n058","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":59,"label":"MAV\\n059","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":60,"label":"MAV\\n060","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":61,"label":"MAV\\n061","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":62,"label":"MAV\\n062","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":63,"label":"MAV\\n063","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":64,"label":"MAV\\n064","color":{"border":"#006a4e","highlight":{"border":"#006a4e"}}},{"id":65,"label":"MAV\\n065","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":66,"label":"MAV\\n066","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}},{"id":67,"label":"MAV\\n067","color":{"border":"#d20f35","highlight":{"border":"#d20f35"}}}]';
var clusterEdges = '[{"to":21,"from":0},{"to":22,"from":21},{"to":23,"from":21},{"to":24,"from":23},{"to":25,"from":23},{"to":26,"from":23},{"to":27,"from":0},{"to":28,"from":0},{"to":29,"from":27},{"to":30,"from":27},{"to":31,"from":28},{"to":32,"from":30},{"to":33,"from":28},{"to":34,"from":27},{"to":35,"from":0},{"to":36,"from":0},{"to":37,"from":27},{"to":38,"from":27},{"to":39,"from":27},{"to":40,"from":27},{"to":41,"from":27},{"to":42,"from":27},{"to":43,"from":27},{"to":44,"from":27},{"to":45,"from":27},{"to":46,"from":27},{"to":47,"from":27},{"to":48,"from":27},{"to":49,"from":27},{"to":50,"from":28},{"to":51,"from":28},{"to":52,"from":0},{"to":53,"from":0},{"to":54,"from":0},{"to":55,"from":29},{"to":56,"from":34},{"to":57,"from":27},{"to":58,"from":0},{"to":59,"from":0},{"to":60,"from":0},{"to":61,"from":0},{"to":62,"from":0},{"to":63,"from":0},{"to":64,"from":0},{"to":65,"from":0},{"to":66,"from":0},{"to":67,"from":0}]';

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
@endsection
