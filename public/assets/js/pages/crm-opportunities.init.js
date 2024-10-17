/**
 * Theme: Tailfox - Responsive Tailwindcss Admin Dashboard
 * Author: Mannatthemes
 * CRM Opportunites Js
 */


var options = {
  chart: {
      height: 170,
      type: 'radialBar',
      toolbar: {
      show: false
      }
  },
  plotOptions: {
      radialBar: {
      hollow: {
          margin: 0,
          size: "70%",
          background: 'transparent',
      },
      
      dataLabels: {
          name: {
          offsetY: -5,
          fontSize: "13px",
          },
          value: {
          offsetY: 5,
          fontSize: "18px",
          show: true
          }
      }
      }
  },
  colors:['#2c74de'],
  series: [75],
  stroke: {
      lineCap: 'round'
  },
  labels: ['Leads Won'],

}

var chart = new ApexCharts(
  document.querySelector("#apex_radialbar4"),
  options
);

chart.render();