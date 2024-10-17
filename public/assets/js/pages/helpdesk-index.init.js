/**
 * Theme: Tailfox - Responsive Tailwindcss Admin Dashboard
 * Author: Mannatthemes
 * Helpdesk Dashboard Js
 */


// saprkline chart


var dash_spark_1 = {
    
  chart: {
      type: 'area',
      height: 60,
      sparkline: {
          enabled: true
      },
      dropShadow: {
        enabled: true,
        top: 12,
        left: 0,
        bottom: 5,
        right: 0,
        blur: 2,
        color: '#45404a2e',
        opacity: 0.1
    },
  },
  stroke: {
      curve: 'smooth',
      width: 2
    },
  fill: {
      opacity: 1,
      gradient: {
        shade: '#2c77f4',
        type: "horizontal",
        shadeIntensity: 0.5,
        inverseColors: true,
        opacityFrom: 0.1,
        opacityTo: 0.1,
        stops: [0, 80, 100],
        colorStops: []
    },
  },
  series: [{
    data: [4, 8, 5, 10, 4, 16, 5, 11, 6, 11, 30, 10, 13, 4, 6, 3, 6]
  }],
  yaxis: {
      min: 0
  },
  colors: ['#2c77f4'],
}
new ApexCharts(document.querySelector("#dash_spark_1"), dash_spark_1).render();

 var dash_spark_2 = {
    
  chart: {
      type: 'area',
      height: 60,
      sparkline: {
          enabled: true
      },
      dropShadow: {
        enabled: true,
        top: 12,
        left: 0,
        bottom: 5,
        right: 0,
        blur: 2,
        color: '#45404a2e',
        opacity: 0.1
    },
  },
  stroke: {
      curve: 'smooth',
      width: 2
    },
  fill: {
      opacity: 1,
      gradient: {
        shade: '#fd3c97',
        type: "horizontal",
        shadeIntensity: 0.5,
        inverseColors: true,
        opacityFrom: 0.1,
        opacityTo: 0.1,
        stops: [0, 80, 100],
        colorStops: []
    },
  },
  series: [{
    data: [4, 8, 5, 10, 4, 25, 5, 11, 6, 11, 5, 10, 3, 14, 6, 8, 6]
  }],
  yaxis: {
      min: 0
  },
  colors: ['#fd3c97'],
}
new ApexCharts(document.querySelector("#dash_spark_2"), dash_spark_2).render();

var dash_spark_3 = {
    
  chart: {
      type: 'area',
      height: 60,
      sparkline: {
          enabled: true
      },
      dropShadow: {
        enabled: true,
        top: 12,
        left: 0,
        bottom: 5,
        right: 0,
        blur: 2,
        color: '#45404a2e',
        opacity: 0.1
    },
  },
  stroke: {
      curve: 'smooth',
      width: 2
    },
  fill: {
      opacity: 1,
      gradient: {
        shade: '#34bfa3',
        type: "horizontal",
        shadeIntensity: 0.5,
        inverseColors: true,
        opacityFrom: 0.1,
        opacityTo: 0.1,
        stops: [0, 80, 100],
        colorStops: []
    },
  },
  series: [{
    data: [4, 8, 5, 10, 4, 16, 5, 11, 6, 11, 30, 10, 13, 4, 6, 3, 6]
  }],
  yaxis: {
      min: 0
  },
  colors: ['#34bfa3'],
}
new ApexCharts(document.querySelector("#dash_spark_3"), dash_spark_3).render();

 var dash_spark_4 = {
    
  chart: {
      type: 'area',
      height: 60,
      sparkline: {
          enabled: true
      },
      dropShadow: {
        enabled: true,
        top: 12,
        left: 0,
        bottom: 5,
        right: 0,
        blur: 2,
        color: '#45404a2e',
        opacity: 0.1
    },
  },
  stroke: {
      curve: 'smooth',
      width: 2
    },
  fill: {
      opacity: 1,
      gradient: {
        shade: '#ff9f43',
        type: "horizontal",
        shadeIntensity: 0.5,
        inverseColors: true,
        opacityFrom: 0.1,
        opacityTo: 0.1,
        stops: [0, 80, 100],
        colorStops: []
    },
  },
  series: [{
    data: [4, 8, 5, 10, 4, 25, 5, 11, 6, 11, 5, 10, 3, 14, 6, 8, 6]
  }],
  yaxis: {
      min: 0
  },
  colors: ['#ff9f43'],
}
new ApexCharts(document.querySelector("#dash_spark_4"), dash_spark_4).render();

var options = {
  chart: {
    height: 275,
    type: "donut",
  },
  plotOptions: {
    pie: {
      donut: {
        size: "70%",
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
  labels: ["Excellent", "Very Good", "Good"],
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


var options = {
  chart: {
      height: 300,
      type: 'bar',
      toolbar: {
          show: false
      },
      
  },
  plotOptions: {
      bar: {
          horizontal: false,
          endingShape: 'rounded',
          columnWidth: '25%',
      },
  },
  dataLabels: {
      enabled: false,
  },
  stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
  },
  colors: ["#2c77f4", "rgba(42, 118, 244, .5)"],
  series: [{
      name: 'New Tickets',
      data: [68, 44, 55, 57, 56, 61, 58, 63, 60, 66, 70, 75] 
  }, {
      name: 'Solved Tickets',
      data: [51, 76, 85, 101, 98, 87, 105, 91, 114, 94, 72, 84]
  },],
  xaxis: {
      categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      axisBorder: {
        show: true,
      },  
      axisTicks: {
        show: true,
      },    
  },
  legend: {
    offsetY: 0,
  },
  yaxis: {
      title: {
          text: 'Tickets'
      }
  },
  fill: {
      opacity: 1,
  },
  // legend: {
  //     floating: true
  // },
  grid: {
    row: {
      colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.2
    },
    padding: {
      left: 0,
      right: 0
    },
    strokeDashArray: 3,
  },
  
  tooltip: {
      y: {
          formatter: function (val) {
              return "" + val + ""
          }
      }
  }
}

var chart = new ApexCharts(
  document.querySelector("#ana_dash_1"),
  options
);

chart.render();