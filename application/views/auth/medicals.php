<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Medicals</h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
        <div class="col-lg-12">
            <a href="<?= base_url('auth/print_medical'); ?>" class="btn btn-success mb-3 float-right" target="_blank"><i class="fa fa-print"></i> Print</a>

            <table class="table table-hover" id="dataTable">
                <thead align="center">
                    <tr>
                        <th scope="col">Medical Record Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Doktor</th>
                        <th scope="col">Anamnesa</th>
                        <th scope="col">Diagnosa</th>
                        <th scope="col">Theraphy</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($medical as $m) : ?>
                        <tr>
                            <td><?= $m['medical_record_number']; ?></td>
                            <td align="center"><?= $m['date']; ?></td>
                            <td><?= $m['dokter']; ?></td>
                            <td align="center"><?= $m['anamnesa']; ?> </td>
                            <td><?= $m['diagnosa']; ?></td>
                            <td><?= $m['theraphy']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->