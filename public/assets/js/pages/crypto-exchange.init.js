/**
 * Theme: Tailfox - Tailwind Admin Dashboard Template
 * Author: Mannatthemes
 * Analytics Dashboard Js
 */


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
