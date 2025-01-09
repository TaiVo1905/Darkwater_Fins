function renderChart(xValues, yValues, maxValue) {
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
          text: "Product Sales Overview " + (new Date()).getFullYear(),
        },
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: 0, max: maxValue, stepSize: Math.floor(yValues/10)}}],
        }
      }
    });
}

function getProductSoldPerMonth() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "./admin/getProductSoldPerMonth", true);
    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            const xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const yValues = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            const response = JSON.parse(this.response);
            console.log(response)
            if(response[0].month != null && response[0].quantity != null) {
              response.forEach(item => {
                  yValues[item.month - 1] = parseInt(item.quantity);
              });
            }
            renderChart(xValues, yValues, (Math.max(...yValues) || 10));
        }
    }
    xhr.send();
}

getProductSoldPerMonth();