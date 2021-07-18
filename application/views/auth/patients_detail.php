<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>

    <div class="card col-lg-5 float-left" >
        <div class="card-header" id="content">
            <h5><b><?=$patient['name'];?> (<?=timespan(strtotime($patient['date_of_birth']), time(), 1);?> Old) </b></h5>
        </div>
        <div class="card-body" id="content">
            <h5 class="card-title">NO : <?=$patient['medical_record_number'];?></h5>
            <table class="table table-hover">
                <tr>
                    <td>Place/Date Of Birth</td>
                    <td> : <?=$patient['place_of_birth'];?>, <?=date('d M Y', strtotime($patient['date_of_birth']));?></td>
                </tr>
                <tr>
                    <td>Religion</td>
                    <td>: <?=$patient['religion'];?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>: <?=$patient['gender'];?></td>
                </tr>
                <tr>
                    <td>Profession</td>
                    <td>: <?=$patient['profession'];?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>: <?=$patient['phone_number'];?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>: <?=$patient['address'];?></td>
                </tr>
                <tr>
                    <td>Registered Since</td>
                    <td>: <?=date('d M Y', strtotime($patient['date_registered']));?></td>
                </tr>
            </table>
            <a href="<?=base_url('auth/patient');?>" class="btn btn-secondary float-right">Back</a>
        </div>
    </div>

    <div class="card col-lg-7 float-right">
        <div class="card-header">
            <h5><b>Medical Record</b></h5>
        </div>
        <div class="card-body">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMedicalModal">Add New Medical</a>
            <table class="table table-hover responsive" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col" class="text-center">Dokter</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($medical as $m): ?>
                        <tr onclick="document.location.href=('<?=base_url('auth/medical_detail/') . $m['id'];?>')">
                            <td><?=$m['date'];?></td>
                            <td><?=$m['dokter'];?></td>
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


<!-- Modal Add Medical -->
<div class="modal fade" id="newMedicalModal" tabindex="-1" aria-labelledby="newMedicalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMedicalModalLabel">Add New Medical</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url('auth/add_medical');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="medical_record_number">Medical Record Number</label>
                        <input type="text" class="form-control" id="medical_record_number" name="medical_record_number" value="<?=$patient['medical_record_number'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="dokter">Dokter</label>
                        <select class="form-control" name="dokter" id="dokter">
                            <option value="Dr. Ria">Dr. Ria</option>
                            <option value="Dr. Annajmi">Dr. Annajmi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="anamnesa">Anamnesa</label>
                        <textarea name="anamnesa" id="anamnesa" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <textarea name="diagnosa" id="diagnosa" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="theraphy">Theraphy</label>
                        <textarea name="theraphy" id="theraphy" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Medical</button>
                </div>
            </form>
        </div>
    </div>
</div>