<!DOCTYPE html>
<html lang="en">
<?php require_once APPPATH . 'Views\\Template\\head.php'; ?>

<body>
    <?php require_once APPPATH . 'Views\\Template\\nav.php'; ?>

    <div class="d-flex flex-column vh-90 justify-content-center align-items-center">
        <h1 class="text-center">Total Buku Per Penerbit</h1>
        <h3 class="text-center"><?= $title ?></h3>
        <div class="w-75">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const data = <?php print_r(json_encode($penerbit))  ?>;
        const labesl = data.map((item) => item.nama);
        const values = data.map((item) => item.jumlah);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labesl,
                datasets: [{
                    label: '# dari Buku',
                    data: values,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                ticks: {
                    precision: 0
                },
                maintainAspectRatio: true
            }
        });
    </script>
    <?php require_once APPPATH . 'Views\\Template\\footers.php'; ?>
</body>

</html>