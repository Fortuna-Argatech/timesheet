/**
 * Theme: Tailfox - Tailwind Admin Dashboard Template
 * Author: Mannatthemes
 * Analytics Dashboard Js
 */
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


var optionsCircle = {
  chart: {
    type: 'radialBar',
    height: 265,
  },
  plotOptions: {
    radialBar: {
      inverseOrder: true,      
      hollow: {
        margin: 5,
        size: '60%',
        background: 'transparent',
      },
      track: {
        show: true,
        background: '#ddd',
        strokeWidth: '10%',
        opacity: 1,
        margin: 5, // margin is in pixels
      },

      dataLabels: {
        name: {
          fontSize: '18px',
      },
      value: {
          fontSize: '16px',
          color: '#50649c',
      },
      }
    },
  },
  series: [71, 63],
  labels: ['Domestic', 'International'],
  legend: {
    show: true,
    position: 'bottom',
    offsetX: -40,
    offsetY: -5,
    formatter: function (val, opts) {
      return val + " - " + opts.w.globals.series[opts.seriesIndex] + '%'
    }
  },
  colors: ["#1ccab8", '#2a76f4'],
  stroke: {
    lineCap: 'round',
    width: 2
  },
}

var chartCircle = new ApexCharts(document.querySelector('#circlechart'), optionsCircle);
chartCircle.render();


var iteration = 11

function getRandom() {
  var i = iteration;
  return (Math.sin(i / trigoStrength) * (i / trigoStrength) + i / trigoStrength + 1) * (trigoStrength * 2)
}

function getRangeRandom(yrange) {
  return Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
}

window.setInterval(function () {

  iteration++;

  chartCircle.updateSeries([getRangeRandom({ min: 10, max: 100 }), getRangeRandom({ min: 10, max: 100 })])


}, 3000)

 

