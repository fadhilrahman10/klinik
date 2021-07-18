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
    <h3>Data Pasien</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Profesi</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor HP</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($patient as $p) :  ?>
                <tr>
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $p['name']; ?></td>
                    <td><?= $p['place_of_birth']; ?></td>
                    <td><?= $p['date_of_birth']; ?></td>
                    <td><?= $p['gender']; ?></td>
                    <td><?= $p['profession']; ?></td>
                    <td><?= $p['address']; ?></td>
                    <td><?= $p['phone_number']; ?></td>
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