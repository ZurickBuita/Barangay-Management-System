
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

fetch("model/RevenuePieChart.php")
.then((response) => {
  return response.json();
})
.then((data) => {
  // pass the data to a function
  createPieChart(data);
});

function createPieChart(chartData) {
  var ctx = document.getElementById("revenuePieChart");
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: chartData.map(row => row.details),
      datasets: [{
        data: chartData.map(row => row.total_amount),
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: true,
        position: "bottom"
      },
      cutoutPercentage: 80,
    },
  });
}
