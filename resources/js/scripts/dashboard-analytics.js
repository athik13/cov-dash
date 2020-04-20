// Dashboard - Analytics
//----------------------

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
                labels: ['03/07/2020', '03/08/2020', '03/09/2020', '03/10/2020', '03/11/2020', '03/12/2020', '03/13/2020', '03/14/2020', '03/15/2020', '03/16/2020', '03/17/2020', '03/18/2020', '03/19/2020', '03/20/2020', '03/21/2020', '03/22/2020', '03/23/2020', '03/24/2020', '03/25/2020', '03/26/2020', '03/27/2020', '03/28/2020', '03/29/2020', '03/30/2020', '03/31/2020', '04/01/2020', '04/02/2020', '04/03/2020', '04/04/2020', '04/05/2020', '04/06/2020', '04/07/2020', '04/08/2020', '04/09/2020', '04/10/2020', '04/11/2020', '04/12/2020', '04/13/2020', '04/14/2020', '04/15/2020', '04/16/2020', '04/17/2020', '04/18/2020', '04/19/2020', '04/20/2020'],
                datasets: [
                    {
                        label: 'Confirmed',
                        backgroundColor: '#ff5252',
                        borderColor: '#ff5252',
                        data: [2, 2, 6, 6, 8, 8, 9, 10, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 16, 16, 17, 17, 18, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20, 22, 23, 28, 35, 52, 67],
                        fill: false,
                    },
                    {
                        label: 'Recovered',
                        backgroundColor: '#66bb6a',
                        borderColor: '#66bb6a',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 3, 3, 5, 5, 8, 9, 9, 11, 11, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 14, 14, 16, 16, 16, 16, 16, 16, 16],
                        fill: false,
                    },
                    {
                        label: 'Deaths',
                        backgroundColor: '#000000',
                        borderColor: '#000000',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                        fill: false,
                    },
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
                        data: [52]
                    },
                    {
                        label: 'Negative',
                        backgroundColor: '#66bb6a',
                        borderColor: '#66bb6a',
                        data: [3676]
                    },
                    {
                        label: 'Pending',
                        backgroundColor: '#999999',
                        borderColor: '#999999',
                        data: [286]
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
                        data: [29, 38],
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
                    intersect: false
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
                        data: [49, 2],
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
                    intersect: false
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
                        data: [114, 1145],
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
                    intersect: false
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
        $("#total-confirmed-cases-bar").sparkline([19, 19, 19, 19, 19, 19, 20, 20, 20, 22, 23, 28, 35, 52, 67], {
            type: "bar",
            height: "25",
            barWidth: 7,
            barSpacing: 4,
            barColor: "#d1d1d1",
            negBarColor: "#81d4fa",
            zeroColor: "#81d4fa"
        });

        $("#total-recovered-cases-bar").sparkline([13, 13, 13, 13, 13, 13, 14, 14, 16, 16, 16, 16, 16, 16, 16], {
            type: "bar",
            height: "25",
            barWidth: 7,
            barSpacing: 4,
            barColor: "#d1d1d1",
            negBarColor: "#81d4fa",
            zeroColor: "#81d4fa"
        });

        $("#active-cases-bar").sparkline([6, 6, 6, 6, 6, 6, 6, 6, 4, 6, 7, 12, 19, 36, 51], {
            type: "bar",
            height: "25",
            barWidth: 7,
            barSpacing: 4,
            barColor: "#d1d1d1",
            negBarColor: "#81d4fa",
            zeroColor: "#81d4fa"
        });

        $("#total-deaths-bar").sparkline([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], {
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
