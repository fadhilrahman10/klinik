<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.css">

    <title> <?= $title; ?> </title>
</head>

<body>
    <h2 class="mb-auto align-center"><b>Klinik Dr. Ria</b></h2>
    <h3>Data Rekam Medis Pasien</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">No Rekam Medis</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Dokter</th>
                <th scope="col">Anamnesa</th>
                <th scope="col">Diagnosa</th>
                <th scope="col">Terapi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($medical as $m) :  ?>
                <tr>
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $m['medical_record_number']; ?></td>
                    <td><?= $m['date']; ?></td>
                    <td><?= $m['dokter']; ?></td>
                    <td><?= $m['anamnesa']; ?></td>
                    <td><?= $m['diagnosa']; ?></td>
                    <td><?= $m['theraphy']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>




<br><br><br><br><br><br>
<?= date("d M Y"); ?>
<br><br><br><br><br><br>
Kepala Klinik

<script type="text/javascript">
    window.print();
</script>