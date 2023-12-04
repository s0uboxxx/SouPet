window.addEventListener("load", function () {
    let pieOptionsB = {
        chart: {
            height: "100%",
            maxWidth: "100%",
            type: "pie",
            fontFamily: "Inter, sans-serif",
            toolbar: {
                show: false,
            },
        },
        labels: BRAND_DATA_KEYS,
        series: BRAND_DATA_VALUES,
        colors: ["#1A56DB", "#FF9933", "#00CC66"],
        legend: {
            show: true,
            position: "bottom",
        },
        responsive: [
            {
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                    legend: {
                        position: "bottom",
                    },
                },
            },
        ],
    };

    let pieOptionsC = {
        chart: {
            height: "100%",
            maxWidth: "100%",
            type: "pie",
            fontFamily: "Inter, sans-serif",
            toolbar: {
                show: false,
            },
        },
        labels: CATEGORY_DATA_KEYS,
        series: CATEGORY_DATA_VALUES,
        colors: ["#1A56DB", "#FF9933", "#00CC66"],
        legend: {
            show: true,
            position: "bottom",
        },
        responsive: [
            {
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                    legend: {
                        position: "bottom",
                    },
                },
            },
        ],
    };

    const chartContainerB = document.getElementById("chartpieBrand");
    const chartContainerC = document.getElementById("chartpieCategory");
    const defaultChartHeight = "400px";

    if (chartContainerB && chartContainerC && typeof ApexCharts !== "undefined") {
        pieOptionsB.chart.height = defaultChartHeight;

        pieOptionsC.chart.height = defaultChartHeight;

        const pieChartB = new ApexCharts(
            chartContainerB,
            pieOptionsB
        );

        const pieChartC = new ApexCharts(
            chartContainerC,
            pieOptionsC
        );

        pieChartB.render();
        pieChartC.render();
    }
});
