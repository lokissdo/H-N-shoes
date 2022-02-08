
var x_values_week = ["Italy", "France", "Spain", "USA", "Argentina"];
var y_values_week = [55, 49, 44, 24, 15];
var barColors = ["red", "green","blue","orange","brown"];

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
      text: "Top 10 sản phẩm trong tuần"
    }
  }
});
