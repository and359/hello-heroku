
<script async src="//jsfiddle.net/beaver71/3qkcLk6v/embed/"></script>
   
   
<script>

   
var marketing = ['2017-08-05', '2017-08-12'];
var amount = [50, 70];
// populate 'annotations' array dynamically based on 'marketing'
var annotations = marketing.map(function(date, index) {
   return {
      type: 'line',
      id: 'vline' + index,
      mode: 'vertical',
      scaleID: 'x-axis-0',
      value: date,
      borderColor: 'green',
      borderWidth: 1,
      label: {
         enabled: true,
         position: "center",
         content: amount[index]
      }
   }
});

var chart = new Chart(ctx, {
   type: 'line',
   data: {
      labels: ['2017-08-02', '2017-08-05', '2017-08-09', '2017-08-12', '2017-08-14'],
      datasets: [{
         label: 'LINE',
         data: [3, 1, 4, 2, 5],
         backgroundColor: 'rgba(0, 119, 290, 0.2)',
         borderColor: 'rgba(0, 119, 290, 0.6)'
      }]
   },
   options: {
      scales: {
         yAxes: [{
            ticks: {
               beginAtZero: true
            }
         }]
      },
      annotation: {
         drawTime: 'afterDatasetsDraw',
         annotations: annotations
      }
   }
});




      </script>
