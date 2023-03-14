<script>
    console.log(location.href);
    $.ajax({
        url: location.href,
        success: (res) => {
            const type = res.type;
            const status = res.status;
            const chartLeft = $('.doughnutLeft')
            const chartRigth = $('.doughnutRigth')

            chart(chartLeft, type)
            chart(chartRigth, status)
        }
    })

    function chart(selector, response) {
        const resDatas = response.data;
        const datas = Object.values(resDatas);
        const colors = response.colors;
        const labels = Object.keys(resDatas)

        console.log(resDatas);
        console.log(datas);
        console.log(colors);
        console.log(labels);

        const data = {
            labels: labels,
            dataUnit: 'BTC',
            legend: false,
            datasets: [{
                data: datas,
                borderColor: "#ffff",
                backgroundColor: colors,
            }]
        };

        const config = {
            data,
            type: 'doughnut',
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart Doughnut Aset'
                }
                }
            },
        };

        new Chart(selector, config)
    }
</script>
