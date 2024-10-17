/**
 * Theme: Tailfox - Tailwind Admin Dashboard Template
 * Author: Mannatthemes
 * Analytics Dashboard Js
 */

var ctx2 = document.getElementById("bar").getContext("2d");
var myChart = new Chart(ctx2, {
  type: "bar",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
    datasets: [
      {
        label: "Monthly Report",
        data: [12, 19, 13, 9, 12, 11, 12, 19, 13, 9, 12, 11],
        borderRadius: 100,
        borderSkipped: false,
        backgroundColor: "#367de4",
        borderColor: "#367de4",
        borderWidth: 1,
        indexAxis: "x",
        barThickness: 15,
        grouped: true,
        maxBarThickness: 9,
        barPercentage: 50,
      },
      {
        label: "Monthly Report",
        data: [8, 12, 15, 11, 8, 14, 16, 13, 10, 7, 19, 16],
        borderRadius: 100,
        borderSkipped: false,
        backgroundColor: "rgba(34, 183, 176, 0.15)",
        borderColor: "rgba(34, 183, 176, 0.45)",
        borderWidth: 1,
        indexAxis: "x",
        barThickness: 15,
        grouped: true,
        maxBarThickness: 9,
      },
    ],
  },

  options: {
    maintainAspectRatio: false,
    responsive: true,
    plugins: {
      legend: {
        display: false,
        position: "top",
        labels: {
          color: "#7c8ea7",
        },
      },
      title: {
        display: false,
        text: "Chart.js Bar Chart",
      },
    },
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          // Include a dollar sign in the ticks
          callback: function (value, index, values) {
            return "$" + value;
          },
          color: "#7c8ea7",
        },
        grid: {
          drawBorder: "border",
          color: "rgba(132, 145, 183, 0.15)",
          borderDash: [3],
          borderColor: "rgba(132, 145, 183, 0.15)",
        },
        beginAtZero: true,
      },
      x: {
        ticks: {
          color: "#7c8ea7",
        },
        grid: {
          display: false,
          color: "rgba(132, 145, 183, 0.09)",
          borderDash: [3],
          borderColor: "rgba(132, 145, 183, 0.09)",
        },
      },
    },
  },
});

var options = {
  chart: {
    height: 255,
    type: "donut",
  },
  plotOptions: {
    pie: {
      donut: {
        size: "85%",
      },
    },
  },
  dataLabels: {
    enabled: false,
  },

  stroke: {
    show: true,
    width: 2,
    colors: ["transparent"],
  },

  series: [50, 25, 25],
  legend: {
    show: true,
    position: "bottom",
    horizontalAlign: "center",
    verticalAlign: "middle",
    floating: false,
    fontSize: "13px",
    offsetX: 0,
    offsetY: 0,
  },
  labels: ["Mobile", "Tablet", "Desktop"],
  colors: ["#2a76f4", "rgba(42, 118, 244, .5)", "rgba(42, 118, 244, .18)"],

  responsive: [
    {
      breakpoint: 600,
      options: {
        plotOptions: {
          donut: {
            customScale: 0.2,
          },
        },
        chart: {
          height: 240,
        },
        legend: {
          show: false,
        },
      },
    },
  ],
  tooltip: {
    y: {
      formatter: function (val) {
        return val + " %";
      },
    },
  },
};

var chart = new ApexCharts(document.querySelector("#ana_device"), options);
chart.render();

var map = new jsVectorMap({
  map: "world",
  selector: "#map_1",
  zoomOnScroll: false,
  zoomButtons: false,
  selectedMarkers: [1, 1],
  markersSelectable: true,
  markers: [
    {
      name: "Russia",
      coords: [61.524, 105.3188],
      // style: { fill: 'red' }
    },
    { name: "Canada", coords: [56.1304, -106.3468] },
    { name: "Palestine", coords: [31.9474, 35.2272] },
    { name: "Greenland", coords: [71.7069, -42.6043] },
  ],
  markerStyle: {
    initial: { fill: "#5c5cff" },
    selected: { fill: "#ff5da0" },
    // initial: {
    //   image: '../../assets/images/flags/us_flag.jpg'
    // }
  },
  labels: {
    markers: {
      render: (marker) => marker.name,
    },
  },
});



var options = {
  chart: {
    height: 300,
    type: "area",
    toolbar: {
      show: false,
    },
    dropShadow: {
      enabled: true,
      top: 12,
      left: 0,
      bottom: 0,
      right: 0,
      blur: 2,
      color: "rgba(132, 145, 183, 0.3)",
      opacity: 0.35,
    },
  },
  colors: ["#f1a760", "#6d81f5"],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    show: true,
    curve: "smooth",
    width: [2, 2],
    dashArray: [0, 4],
    lineCap: "round",
  },
  series: [
    {
      name: "Income",
      data: [31, 40, 28, 51, 31, 40, 28, 51, 31, 40, 28, 51],
    },
    {
      name: "Expenses",
      data: [0, 30, 10, 40, 30, 60, 50, 80, 70, 100, 90, 130],
    },
  ],
  labels: [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
  ],

  yaxis: {
    
    labels: {
      formatter: function (value) {
          return value + "k";
      },
      offsetX: -12,
      offsetY: 0,
  },
  },
  grid: {
    strokeDashArray: 3,
    xaxis: {
      lines: {
        show: true,
      },
    },
    yaxis: {
      lines: {
        show: false,
      },
    },
  },
  legend: {
    show: false,
  },

  fill: {
    type: "gradient",
    gradient: {
      type: "vertical",
      shadeIntensity: 1,
      inverseColors: !1,
      opacityFrom: 0.05,
      opacityTo: 0.05,
      stops: [45, 100],
    },
  },
};

var chart = new ApexCharts(document.querySelector("#Revenu_Status"), options);
chart.render();



var chartDom = document.getElementById('Users_Time');
var myChart = echarts.init(chartDom);
var option;

// prettier-ignore
const hours = [
    '12a', '1a', '2a', '3a', '4a', '5a', '6a',
    '7a', '8a', '9a', '10a', '11a',
    '12p', '1p', '2p', '3p', '4p', '5p',
    '6p', '7p', '8p', '9p', '10p', '11p'
];
// prettier-ignore
const days = [
    'Sat', 'Fri', 'Thu',
    'Wed', 'Tue', 'Mon', 'Sun'
];
// prettier-ignore
const data = [[0, 0, 5], [0, 1, 1], [0, 2, 0], [0, 3, 0], [0, 4, 0], [0, 5, 0], [0, 6, 0], [0, 7, 0], [0, 8, 0], [0, 9, 0], [0, 10, 0], [0, 11, 2], [0, 12, 4], [0, 13, 1], [0, 14, 1], [0, 15, 3], [0, 16, 4], [0, 17, 6], [0, 18, 4], [0, 19, 4], [0, 20, 3], [0, 21, 3], [0, 22, 2], [0, 23, 5], [1, 0, 7], [1, 1, 0], [1, 2, 0], [1, 3, 0], [1, 4, 0], [1, 5, 0], [1, 6, 0], [1, 7, 0], [1, 8, 0], [1, 9, 0], [1, 10, 5], [1, 11, 2], [1, 12, 2], [1, 13, 6], [1, 14, 9], [1, 15, 11], [1, 16, 6], [1, 17, 7], [1, 18, 8], [1, 19, 12], [1, 20, 5], [1, 21, 5], [1, 22, 7], [1, 23, 2], [2, 0, 1], [2, 1, 1], [2, 2, 0], [2, 3, 0], [2, 4, 0], [2, 5, 0], [2, 6, 0], [2, 7, 0], [2, 8, 0], [2, 9, 0], [2, 10, 3], [2, 11, 2], [2, 12, 1], [2, 13, 9], [2, 14, 8], [2, 15, 10], [2, 16, 6], [2, 17, 5], [2, 18, 5], [2, 19, 5], [2, 20, 7], [2, 21, 4], [2, 22, 2], [2, 23, 4], [3, 0, 7], [3, 1, 3], [3, 2, 0], [3, 3, 0], [3, 4, 0], [3, 5, 0], [3, 6, 0], [3, 7, 0], [3, 8, 1], [3, 9, 0], [3, 10, 5], [3, 11, 4], [3, 12, 7], [3, 13, 14], [3, 14, 13], [3, 15, 12], [3, 16, 9], [3, 17, 5], [3, 18, 5], [3, 19, 10], [3, 20, 6], [3, 21, 4], [3, 22, 4], [3, 23, 1], [4, 0, 1], [4, 1, 3], [4, 2, 0], [4, 3, 0], [4, 4, 0], [4, 5, 1], [4, 6, 0], [4, 7, 0], [4, 8, 0], [4, 9, 2], [4, 10, 4], [4, 11, 4], [4, 12, 2], [4, 13, 4], [4, 14, 4], [4, 15, 14], [4, 16, 12], [4, 17, 1], [4, 18, 8], [4, 19, 5], [4, 20, 3], [4, 21, 7], [4, 22, 3], [4, 23, 0], [5, 0, 2], [5, 1, 1], [5, 2, 0], [5, 3, 3], [5, 4, 0], [5, 5, 0], [5, 6, 0], [5, 7, 0], [5, 8, 2], [5, 9, 0], [5, 10, 4], [5, 11, 1], [5, 12, 5], [5, 13, 10], [5, 14, 5], [5, 15, 7], [5, 16, 11], [5, 17, 6], [5, 18, 0], [5, 19, 5], [5, 20, 3], [5, 21, 4], [5, 22, 2], [5, 23, 0], [6, 0, 1], [6, 1, 0], [6, 2, 0], [6, 3, 0], [6, 4, 0], [6, 5, 0], [6, 6, 0], [6, 7, 0], [6, 8, 0], [6, 9, 0], [6, 10, 1], [6, 11, 0], [6, 12, 2], [6, 13, 1], [6, 14, 3], [6, 15, 4], [6, 16, 0], [6, 17, 0], [6, 18, 0], [6, 19, 0], [6, 20, 1], [6, 21, 2], [6, 22, 2], [6, 23, 6]]
    .map(function (item) {
    return [item[1], item[0], item[2] || '-'];
});
option = {
  tooltip: {
    position: 'top',
    padding: [7, 10],
  },
  grid: {
    right: '0px',
    left: '0px',
    bottom: '20%',
    top: '0%'
  },
  xAxis: {
    type: 'category',
    data: hours,
    color: "#fff",
    axisLine: {
      show: true,
      color: "#76797b",
      lineStyle:{
        color: "#9ca3af",
      }
    },
    splitArea: {
      show: true
    },
    axisTick: {
      show: false
    },
  },
  yAxis: {
    type: 'category',
    data: days,
    axisTick: {
      show: false
    },
    splitArea: {
      show: false
    }
  },
  visualMap: {
    min: 0,
    max: 10,
    calculable: true,
    orient: 'horizontal',
    left: 'center',
    bottom: '-3%',
    color: ["#2E86C1", "#3498DB", "#5DADE2", "#85C1E9", "#48C9B0", "#48C9B0"],
    type: 'piecewise',          
    itemSymbol: 'diamond',
    itemWidth: '10px',
    itemHeight: '10px',    
    splitNumber: 4,
    textGap: 5,
    textStyle: {
      color: "#76797b",
      fontWeight: "normal"
    },
  },
  series: [
    {
      name: 'Punch Card',
      type: 'heatmap',
      data: data,
      label: {
        show: true,
        color: "#fff",
      },
      
      emphasis: {
        itemStyle: {
          shadowBlur: 10,
          shadowColor: 'rgba(0, 0, 0, 0.5)'
        },        
      }
    }
  ]
};

option && myChart.setOption(option);


try{
  var chartDom = document.getElementById("visitors");
  var myChart = echarts.init(chartDom);
  var option;

  const data = [];
  for (let i = 0; i < 4; ++i) {
    data.push(Math.round(Math.random() * 200));
  }
  option = {
    grid: {
      left: "1%",
      right: "7%",
      bottom: "0%",
      top: "4%",
      containLabel: true,
    },
    xAxis: {
      max: "dataMax",
      axisLine: {
        lineStyle: {
          color: "#858d98",
        },
      },
      splitLine: {
        lineStyle: {
          color: "rgba(133, 141, 152, 0.1)",
        },
      },
    },
    yAxis: {
      type: "category",
      data: ["Organic", "Direct", "Campaign", "Social Media"],
      inverse: true,
      gridIndex: 0,
      animationDuration: 300,
      animationDurationUpdate: 300,
      max: 3, // only the largest 3 bars will be displayed,
      axisLabel: {
        color: "#858d98",
      },
      axisLine: {
        lineStyle: {
          color: "rgba(133, 141, 152, 0.2)",
        },
      },
      axisTick: {
        lineStyle: {
          color: "rgba(133, 141, 152, 0.5)",
        },
      },
      splitLine: {
        lineStyle: {
          color: "rgba(133, 141, 152, 0.1)",
        },
      },
    },
    series: [
      {
        realtimeSort: true,
        name: "Visitors",
        type: "bar",
        data: data,
        barWidth: "10",
        label: {
          show: true,
          position: "right",
          valueAnimation: true,
        },
        itemStyle: {
          emphasis: {
            barBorderRadius: [50, 50, 50, 50],
          },
          normal: {
            barBorderRadius: [50, 50, 50, 50],
            color: "#1da1f2",
          },
        },
      },
    ],

    legend: {
      show: false,
    },
    animationDuration: 0,
    animationDurationUpdate: 3000,
    animationEasing: "linear",
    animationEasingUpdate: "linear",
  };
  function run() {
    for (var i = 0; i < data.length; ++i) {
      if (Math.random() > 0.9) {
        data[i] += Math.round(Math.random() * 2000);
      } else {
        data[i] += Math.round(Math.random() * 200);
      }
    }
    myChart.setOption({
      series: [
        {
          type: "bar",
          data,
        },
      ],
    });
  }
  setTimeout(function () {
    run();
  }, 0);
  setInterval(function () {
    run();
  }, 3000);

  option && myChart.setOption(option);
}catch (err) {

}
  




