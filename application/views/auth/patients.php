<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Patients</h1>

    <?=$this->session->flashdata('message');?>

    <div class="row">
        <div class="col-lg-12">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPatientModal">Add New Patient</a>
            <a href="<?=base_url('auth/print');?>" class="btn btn-success mb-3 ml-5" target="_blank"><i class="fa fa-print"></i> Print</a>
            <?php if (empty($patient)): ?>
                <div class="alert alert-danger" role="alert">
                    Not Found.
                </div>
            <?php endif;?>

            <table class="table table-hover" id="dataTable">
                <thead align="center">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Medical Record Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patient as $p): ?>
                        <tr onclick="document.location.href=('<?=base_url('auth/patient_detail/') . $p['medical_record_number'];?>')">
                            <td><?=$p['name'];?></td>
                            <td align="center"><?=$p['medical_record_number'];?></td>
                            <td><?=$p['address'];?></td>
                            <td align="center">
                                <a href="<?=base_url('auth/patient_detail/') . $p['medical_record_number'];?>" class="badge badge-primary">Detail</a>
                                <a href="<?=base_url('auth/patient_edit/') . $p['medical_record_number'];?>" class="badge badge-warning">Edit</a>
                                <a href="<?=base_url('auth/patient_delete/') . $p['medical_record_number'];?>" class="badge badge-secondary" onclick="return confirm('Are you sure want to delete this patient?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newPatientModal" tabindex="-1" aria-labelledby="newPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPatientModalLabel">Add New Patient</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('auth/patient_add');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="medical_record_number">Medical Record Number</label>
                        <input type="text" class="form-control" id="medical_record_number" name="medical_record_number" value="<?=$patientmrn;?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="place_of_birth">Place Of Birth</label>
                        <input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date Of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                    </div>
                    <div class="form-group">
                        <label for="religion">Religion</label>
                        <select class="form-control" name="religion" id="religion">
                            <option value="Islam">Islam</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profession">Profession</label>
                        <input type="text" class="form-control" id="profession" name="profession">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>