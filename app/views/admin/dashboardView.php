<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include_once './app/components/bootStrapAndFontLink.php' ?>
    <link rel="stylesheet" href="./public/css/common.css">
</head>
<body style="">
  
<canvas id="dashBoardChart" style="width:100%;"></canvas>

<script>
const xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
const yValues = [7,8,8,9,9,9,10,11,14,14,15, 16];

new Chart("dashBoardChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0.35,
      backgroundColor: "rgba(24, 119, 242,1.0)",
      borderColor: "rgba(24, 119, 242,0.1)",
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Product Sales Overview",
    },
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
</script>
</body>
</html>