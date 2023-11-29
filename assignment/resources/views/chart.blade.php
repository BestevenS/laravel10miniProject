<!DOCTYPE html>
<html>

<head>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <title>Chart Page</title>
</head>

<body>
    <h1>Αυτή είναι η σελίδα του γραφήματος</h1>
    <div id="chartContainer" style="width:100%; height:400px;"></div>

    <!-- εδώ θα μπει ο κώδικας του γραφήματος Highcharts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/chart-data')
                .then(response => response.json())
                .then(data => {
                    Highcharts.chart('chartContainer', {
                        chart: {
                            type: 'line' // ή οποιοσδήποτε άλλος τύπος γραφήματος που προτιμάτε
                        },
                        title: {
                            text: 'Δεδομένα Γραφήματος'
                        },
                        series: data
                    });
                })
                .catch(error => console.error(error));
        });
    </script>

</body>

</html>
