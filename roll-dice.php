<h1>Dice Roller</h1>

<?php

$separator = '<br>';
$timesDiceRolls = 10000000;
if (php_sapi_name() == "cli") {
    $separator = PHP_EOL;
}
$i = 0;

$dado = array_fill(1, 6, 0);

while ($timesDiceRolls > $i) {
    $result = mt_rand(1,6);
    $dado[$result]++;
    $i++;
}

foreach ($dado as $face => $value) {
    echo "Face $face: $value".$separator;
}

$formatedRolledTImes = number_format($timesDiceRolls, 0, ',','.');

echo 'Dice rolled ' . $formatedRolledTImes . ' times';

if (php_sapi_name() == "cli") exit();
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php echo  implode(', ', array_keys($dado));?>],
            datasets: [{
                label: '# times rolled',
                data: [<?php echo  implode(', ', $dado);?>],
                backgroundColor: 'tomato',
                borderWidth: 1,
            }],
        },
        options: {
            responsive: false,
            //maintainAspectRatio: false,
            scales: {y: {beginAtZero: true}},
            ticks: { min: 0 }
        }
    });

</script>
