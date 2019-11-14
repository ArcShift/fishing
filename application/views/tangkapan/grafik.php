<?php
$berat= array(0,0,0,0,0,0,0,0,0,0,0,0);
foreach ($data as $d) {
    $berat[$d['bulan_id']-1]= $d['jumlah_berat'];
}
?>
<div class="panel no-rounded-corner bg-inverse text-white wrapper m-b-0">
    <canvas id="mainGraph" height="100"></canvas>
</div>
<script>
    var bulan = ['Januari', 'Februari', 'Maret', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var ctx = document.getElementById('mainGraph').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: bulan,
            datasets: [{
                    label: 'Jumlah Tangkapan',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: <?php echo json_encode($berat);?>
                }]
        },
        options: {}
    });
</script>
<div class="panel pagination-inverse bg-white clearfix no-rounded-corner m-b-0">
    <table id="data-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="width-100">Bulan</th>
                <th>Tangkapan (Kg)</th>
                <th>Postingan</th>
                <th>Nelayan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $d) { ?>
                <tr>
                    <td><?php echo $d['bulan'] ?></td>
                    <td><?php echo $d['jumlah_berat'] ?></td>
                    <td><?php echo $d['jumlah_postingan'] ?></td>
                    <td><?php echo $d['jumlah_nelayan'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>