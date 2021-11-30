<x-app-layout>
    
<h2 class="font-semibold text-xl text-gray-800 leading-tight ">
     Progress
</h2>

  <div class="shadow-lg rounded-lg overflow-hidden pt-2 ">

  <div class="pt-4  mx-0 lg:mx-64 rounded-lg chartBox ">
    <div class="py-3 piechart text-center  px-5">Pie chart</div>
    <canvas class="p-10 " id="chartPie" ></canvas>
  </div>
    <div class="py-3 px-5 bg-gray-50">Student 1</div>
    <canvas class="p-10" id="chartBar"></canvas>

  </div>


<style>
  .chartBox{
    width: 400px;
    height: 450px;
  }

 
 
</style>
<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart bar -->
<script>
  const labelsBarChart = [
    "English",
    "Filipino",
    "Mathematics",
    "Science",
    "Pe",
    "Edukasyon sa Pagpapakatao",
  ];
  const dataBarChart = {
    labels: labelsBarChart,
    datasets: [
      {
        label: "Subject",
        backgroundColor: "hsl(252, 82.9%, 67.8%)",
        borderColor: "hsl(252, 82.9%, 67.8%)",
        data: [10, 30, 100, 20, 20, 30, 100],
      },
    ],
  };

  const configBarChart = {
    type: "bar",
    data: dataBarChart,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("chartBar"),
    configBarChart
  );

 //Pie Chart
  const dataPie = {
    labels: ["JavaScript", "Python", "Ruby"],
    datasets: [
      {
        label: "My First Dataset",
        data: [300, 50, 100],
        backgroundColor: [
          "rgb(133, 105, 241)",
          "rgb(164, 101, 241)",
          "rgb(101, 143, 241)",
        ],
        hoverOffset: 4,
      },
    ],
  };

  const configPie = {
    type: "pie",
    data: dataPie,
    options: {},
  };



  var chartBar = new Chart(document.getElementById("chartPie"), configPie);
</script>
   
</x-app-layout>
