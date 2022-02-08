
eval(document.getElementById('graph_data').innerHTML);
let barColors = ["red", "green","blue","orange","brown"];

new Chart("week_chart", {
  type: "bar",
  data: {
    labels: x_values_week,
    datasets: [{
      backgroundColor: barColors,
      data: y_values_week
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Top 5 sản phẩm trong tuần"
    },
    responsive: true,
    scales: {
            yAxes: [{
                display: true,
                ticks: {
                    beginAtZero: true
                }
            }]
            pointLabels: {
        callback: (label: any) => {
          return label.length > 5 ? label.substr(0, 5) + '...' : label;
        },
      }
        }
  }
});

new Chart("month_chart", {
  type: "bar",
  data: {
    labels: x_values_month,
    datasets: [{
      backgroundColor: barColors,
      data: y_values_month
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Top 5 sản phẩm trong tháng"
    },
    responsive: true,
    scales: {
            yAxes: [{
                display: true,
                ticks: {
                    beginAtZero: true
                }
            }]
            pointLabels: {
        callback: (label: any) => {
          return label.length > 5 ? label.substr(0, 5) + '...' : label;
        },
      }
        }
  }
});
