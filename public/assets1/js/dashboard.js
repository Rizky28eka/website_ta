$(function () {
    console.log("Dashboard.js loaded");

    // Fungsi untuk memastikan elemen ada sebelum membuat chart
    function createChart(selector, options) {
      var element = document.querySelector(selector);
      if (element) {
        var chart = new ApexCharts(element, options);
        chart.render();
      } else {
      }
    }

    // =====================================
    // Profit Chart
    // =====================================
    var profitOptions = {
      series: [
        { name: "Pixel ", data: [9, 5, 3, 7, 5, 10, 3] },
        { name: "Ample ", data: [6, 3, 9, 5, 4, 6, 4] },
      ],
      chart: {
        fontFamily: "Poppins,sans-serif",
        type: "bar",
        height: 360,
        offsetY: 10,
        toolbar: { show: false },
      },
      grid: { show: true, strokeDashArray: 3, borderColor: "rgba(0,0,0,.1)" },
      colors: ["#1e88e5", "#21c1d6"],
      plotOptions: { bar: { horizontal: false, columnWidth: "30%", endingShape: "flat" } },
      dataLabels: { enabled: false },
      stroke: { show: true, width: 5, colors: ["transparent"] },
      xaxis: { categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"] },
      fill: { opacity: 1, colors: ["var(--bs-primary)", "var(--bs-danger)"] },
      tooltip: { theme: "dark" },
    };
    createChart("#profit", profitOptions);

    // =====================================
    // Breakup Chart
    // =====================================
    var gradeOptions = {
      series: [5368, 3500, 4106],
      labels: ["5368", "Referral Traffic", "Organic Traffic"],
      chart: { height: 170, type: "donut" },
      colors: ["#e7ecf0", "#fb977d", "var(--bs-primary)"],
      dataLabels: { enabled: false },
      stroke: { show: false },
    };
    createChart("#grade", gradeOptions);

    // =====================================
    // Earning Chart
    // =====================================
    var earningOptions = {
      chart: { id: "sparkline3", type: "area", height: 60, sparkline: { enabled: true } },
      series: [{ name: "Earnings", color: "#8763da", data: [25, 66, 20, 40, 12, 58, 20] }],
      stroke: { curve: "smooth", width: 2 },
      fill: { colors: ["#f3feff"], type: "solid", opacity: 0.05 },
    };
    createChart("#earning", earningOptions);
  });
