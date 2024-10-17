/**
 * Theme: Tailfox - Tailwind Admin Dashboard Template
 * Author: Mannatthemes
 * Ecommerce Dashboard Js
 */

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
      offsetX: -12,
      offsetY: 0,
      formatter: function (value) {
        return "$" + value ;
    }
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

var options = {
  series: [{
  name: 'Inflation',
  data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
},],
  chart: {
  height: 300,
  type: 'bar',
  toolbar: {
    show: false,
  },
},
plotOptions: {
  bar: {
    borderRadius: 10,
    dataLabels: {
      position: 'top', // top, center, bottom
    },
  }
},
colors:['#394766'],
dataLabels: {
  enabled: true,
  formatter: function (val) {
    return  val + "%";
  },
  offsetY: -20,
  style: {
    fontSize: '12px',
    colors: ["#304758"]
  }
},

xaxis: {
  categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  position: 'top',
  axisBorder: {
    show: false
  },
  axisTicks: {
    show: false
  },
  crosshairs: {
    fill: {
      type: 'gradient',
      gradient: {
        colorFrom: '#D8E3F0',
        colorTo: '#BED1E6',
        stops: [0, 100],
        opacityFrom: 0.4,
        opacityTo: 0.5,
      }
    }
  },
  tooltip: {
    enabled: true,
  }
},
yaxis: {
  axisBorder: {
    show: false
  },
  axisTicks: {
    show: false,
  },
  labels: {
    show: false,
    formatter: function (val) {
      return val + "%";
    }
  }

},
grid: {
  row: {
      colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.2,           
  },
  strokeDashArray: 2.5,
},

};

var chart = new ApexCharts(document.querySelector("#products_sold"), options);
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



var colors = ['#55b18f', '#367de4', '#f1a760', '#109ae7'];
var options = {
  chart: {
      height: 250,
      type: 'bar',
     
    toolbar:{
      show:false
    },
    dropShadow: {
      enabled: true,
      top: 0,
      left: 5,
      bottom: 5,
      right: 0,
      blur: 5,
      color: '#45404a2e',
      opacity: 0.35
  },
  },
  colors: colors,
  plotOptions: {
      bar: {
          dataLabels: {
              position: 'top', // top, center, bottom              
          },
          columnWidth: '30',
          distributed: true,
      },

  },
  dataLabels: {
      enabled: true,
      formatter: function (val) {
          return val + "%";
      },
      offsetY: -20,
      style: {
          fontSize: '12px',
          colors: ["#8997bd"]
      }
  },
  series: [{
      name: 'Inflation',
      data: [ 4.0, 10.1, 6.0, 9.1]
  }],
  xaxis: {
      categories: ["Electronics", "Fashion", "Furniture", "Toys",],
      position: 'top',
      labels: {
          offsetY: 0,
          style: {
            cssClass: 'apexcharts-xaxis-label',
          },
      },
      axisBorder: {
          show: false
      },
      axisTicks: {
          show: false
      },
      crosshairs: {
          fill: {
              type: 'gradient',
              gradient: {
                  colorFrom: '#D8E3F0',
                  colorTo: '#BED1E6',
                  stops: [0, 100],
                  opacityFrom: 0.4,
                  opacityTo: 0.5,
              }
          }
      },
      tooltip: {
          enabled: true,
          offsetY: -37,
      }
  },
  fill: {
      gradient: {
          type: "gradient",
          gradientToColors: ['#FEB019', '#775DD0', '#FEB019', '#FF4560', '#775DD0'],
      },
  },
  yaxis: {
      axisBorder: {
          show: false
      },
      axisTicks: {
          show: false,
      },
      labels: {
          show: false,
          formatter: function (val) {
              return val + "%";
          }
      }

  },
  grid: {
    row: {
        colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.2,           
    },
    strokeDashArray: 2.5,
  },
}

var chart = new ApexCharts(
  document.querySelector("#barchart"),
  options
);

chart.render();

  //Device-widget

 
  var options = {
    chart: {
        height: 270,
        type: 'donut',
    }, 
    plotOptions: {
      pie: {
        donut: {
          size: '85%'
        }
      }
    },
    dataLabels: {
      enabled: false,
    },
  
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
   
    series: [50, 25, 25,],
    legend: {
      show: true,
      position: 'bottom',
      horizontalAlign: 'center',
      verticalAlign: 'middle',
      floating: false,
      fontSize: '13px',
      offsetX: 0,
      offsetY: 0,
    },
    labels: [ "Mobile","Tablet", "Desktop" ],
    colors: ["#2a76f4","rgba(42, 118, 244, .5)","rgba(42, 118, 244, .18)"],
   
    responsive: [{
        breakpoint: 600,
        options: {
          plotOptions: {
              donut: {
                customScale: 0.2
              }
            },        
            chart: {
                height: 240
            },
            legend: {
                show: false
            },
        }
    }],
    tooltip: {
      y: {
          formatter: function (val) {
              return   val + " %"
          }
      }
    }
    
  }
  
  var chart = new ApexCharts(
    document.querySelector("#eco_device"),
    options
  );
  
  chart.render();

