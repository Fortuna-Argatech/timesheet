/**
 * Theme: Tailfox - Tailwind Admin Dashboard Template
 * Author: Mannatthemes
 * Analytics Dashboard Js
 */
var options = {
  chart: {
    height: 375,
    type: 'line',
   
    toolbar: {
      show: false
    }
  },
  stroke: {
    width: 3,
    curve: 'smooth'
  },
  series: [{
    name: 'Likes',
    data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
  }],
  xaxis: {
    type: 'datetime',
    categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001', '4/11/2001', '5/11/2001', '6/11/2001'],
    axisBorder: {
      show: true,
      color: '#bec7e0',
    },  
    axisTicks: {
      show: true,
      color: '#bec7e0',
    },    
  },
  colors:['#5766da'],
  markers: {
    size: 3,
    opacity: 0.9,
    colors: ["#fdb5c8"],
    strokeColors: '#fff',
    strokeWidth: 1,
    style: 'inverted', // full, hollow, inverted
    hover: {
      size: 5,
    }
  },
  yaxis: {
    min: -10,
    max: 40,
    title: {
      text: 'Engagement',
    },
  },
  grid: {
    row: {
      colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.2
    },
    strokeDashArray: 3.5,
  },
  responsive: [{
    breakpoint: 600,
    options: {
      chart: {
        toolbar: {
          show: false
        }
      },
      legend: {
        show: false
      },
    }
  }]
}

var chart = new ApexCharts(
  document.querySelector("#apex_line1"),
  options
);




var options5 = {
  series: [{
    name: 'New Visitors',
    data: [68, 44, 55, 57, 56, 61, 58, 63, 60, 66]
  }, {
      name: 'Unique Visitors',
      data: [51, 76, 85, 101, 98, 87, 105, 91, 114, 94]
  },],

  chart: {
  type: 'bar',
  width: 200,
  height: 35,
  sparkline: {
    enabled: true
  }
},
colors: ["#4d79f6", "#e0e7fd"],
plotOptions: {
  bar: {
    columnWidth: '50%'
  }
},
labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
xaxis: {
  crosshairs: {
    width: 2
  },
},
tooltip: {
  fixed: {
    enabled: false
  },
  x: {
    show: false
  },
  y: {
    title: {
      formatter: function (seriesName) {
        return ''
      }
    }
  },
  marker: {
    show: false
  }
}
};

var chart5 = new ApexCharts(document.querySelector("#bar-1"), options5);


var options7 = {
  series: [45],
  chart: {
  type: 'radialBar',
  width: 50,
  height: 50,
  sparkline: {
    enabled: true
  }
},
dataLabels: {
  enabled: false
},
plotOptions: {
  radialBar: {
    hollow: {
      margin: 0,
      size: '50%'
    },
    track: {
      margin: 0
    },
    dataLabels: {
      show: false
    }
  }
}
};

var chart7 = new ApexCharts(document.querySelector("#radialBar-1"), options7);


var options1 = {
  series: [{
  data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]
}],
  chart: {
  type: 'line',
  width: 200,
  height: 35,
  sparkline: {
    enabled: true
  }
},
stroke: {
  show: true,
  curve: 'smooth',
  width: [2],
  lineCap: 'round',
},
tooltip: {
  fixed: {
    enabled: false
  },
  x: {
    show: false
  },
  y: {
    title: {
      formatter: function (seriesName) {
        return ''
      }
    }
  },
  marker: {
    show: false
  }
}
};

var chart1 = new ApexCharts(document.querySelector("#line-1"), options1);

window.addEventListener('DOMContentLoaded', (event) => {
  chart.render();
  chart1.render();
  chart7.render();
  chart5.render();
});



