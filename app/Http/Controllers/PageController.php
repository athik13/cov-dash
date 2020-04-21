<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\CurrentStat;
use App\DailyCases;

class PageController extends Controller
{
    public function blankPage()
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Blank Page"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true];
        return view('pages.page-blank', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);
    }

    public function collapsePage()
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Page Collapse"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'bodyCustomClass' => 'menu-collapse'];

        return view('pages.page-collapse', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);
    }

    public function dashboard()
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Page Collapse"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = [
            'mainLayoutType' => 'horizontal-menu',
            'pageHeader' => false,
            'bodyCustomClass' => 'menu-collapse',
            'navbarLarge' => true,
            'navbarBgColor' => 'gradient-45deg-light-blue-cyan',
            'isMenuDark' => true,
            'isMenuCollapsed' => true,
            'isFooterDark' => true,
            'isNavbarFixed' => false,
        ];

        $hpa = Http::get('http://covid19.health.gov.mv/api/fetch_stats');
        $hpa = json_decode($hpa);

        $currentStat = CurrentStat::first();

        $last15confirmedCases = DailyCases::orderBy('id', 'desc')->take(15)->pluck('total')->toArray();
        $last15recovered = DailyCases::orderBy('id', 'desc')->take(15)->pluck('recovered')->toArray();
        $last15active = DailyCases::orderBy('id', 'desc')->take(15)->pluck('active')->toArray();
        $last15deaths = DailyCases::orderBy('id', 'desc')->take(15)->pluck('dead')->toArray();

        $dailyCases = DailyCases::all();
        $casesLabel = $dailyCases->map(function ($model) {
            return $model->date->format('d/m/Y');
        });

        // return $last15confirmedCases;

        return view('pages.dashboard.index', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs])
                    ->with('hpa', $hpa)
                    ->with('currentStat', $currentStat)
                    ->with('last15confirmedCases', $last15confirmedCases)
                    ->with('last15recovered', $last15recovered)
                    ->with('last15active', $last15active)
                    ->with('last15deaths', $last15deaths)
                    ->with('casesLabel', $casesLabel->toArray())
                    ->with('dailyCasesConfirmed', $dailyCases->pluck('total')->toArray())
                    ->with('dailyCasesRecovered', $dailyCases->pluck('recovered')->toArray())
                    ->with('dailyCasesDeaths', $dailyCases->pluck('dead')->toArray());
    }
}
