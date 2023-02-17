//Sidebar Toggle

var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar(){
    if(!sidebarOpen){
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen=true;
    }
}

function closeSidebar(){
    if(sidebarOpen){
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen=false;
    }
}

//Bar Chart

var barChartOptions = {
    series: [{
    data: [12, 18, 5, 8]
  }],
    chart: {
    type: 'bar',
    height: 350,
    toolbar: {
        show:false
    },
  },
  colors: [
    "#246dec",
    "#006B38FF",
    "#F2AA4CFF",
    "#B1624EFF",   
  ],
  plotOptions: {
    bar: {
        distributed:true,
      borderRadius: 4,
      horizontal: false,
      columnwidth: '40%'
    }
  },
  dataLabels: {
    enabled: false
  },
  legend:{
    show:false
  },
  xaxis: {
    categories: [
        "Floor", "Wall", "Bath","Outdoor",

    ],
  },
  yaxis:{
    title:{
        text:"Count"
    }
  }
  };

  var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
  barChart.render();


//Area Chart 

  var areaChartOptions = {
          series: [{
          name: 'Purchase Orders',          
          data: [47, 31, 43, 26, ]
        }, {
          name: 'Sale Orders',          
          data: [61, 43, 54, 37, ]
        }],
          chart: {
          height: 350,
          type: 'area',
          toolbar:{
            show:false
          },
        },
        stroke: {
          curve: 'smooth'
        },
        color:[
          "#006B38FF",
    "#F2AA4CFF",
        ], 
        dataLabels:{
          enabled:false
        },
       
        labels: ["Jan","Feb","Mar","Apr"],
        markers: {
          size: 0
        },
        yaxis: [
          {
            title: {
              text: 'Purchase Orders',
            },
          },
          {
            opposite: true,
            title: {
              text: 'Sale Orders',
            },
          },
        ],
        tooltip: {
          shared: true,
          intersect: false,
          y: {
            formatter: function (y) {
              if(typeof y !== "undefined") {
                return  y.toFixed(0) + " points";
              }
              return y;
            }
          }
        }
        };

        var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
        areaChart.render();      

