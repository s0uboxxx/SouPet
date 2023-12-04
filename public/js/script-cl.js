window.addEventListener("load", function () {
    function formatCurrency(value) {
        return new Intl.NumberFormat("vi-VN", {
            style: "currency",
            currency: "VND",
        }).format(value);
    }

    let options = {
        chart: {
            height: "100%",
            width: "100%",
            maxWidth: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        tooltip: {
            enabled: true,
            x: {
                show: false,
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#1C64F2",
                gradientToColors: ["#1C64F2"],
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 6,
        },
        grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: 0,
            },
        },
        series: [
            {
                name: "Doanh thu",
                data: ORDER_DATA_VALUES,
                color: "#1A56DB",
            },
        ],
        xaxis: {
            categories: ORDER_DATA_KEYS,
            labels: {
                show: true,
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            show: false,
            labels: {
                formatter: function (value) {
                    return formatCurrency(value);
                },
            },
        },
    };

    if (
        document.getElementById("chartline") &&
        typeof ApexCharts !== "undefined"
    ) {
        const chart = new ApexCharts(
            document.getElementById("chartline"),
            options
        );
        chart.render();
    }
});
