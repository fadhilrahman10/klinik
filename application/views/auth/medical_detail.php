<!-- Begin Page Content -->
<div class="container-fluid" id="content">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Date : <?=$medical['date'];?></h5>
            <table class="table table-hover">
                <tr>
                    <td>Name</td>
                    <td>: </td>
                    <td><?=$patient['name'];?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>: </td>
                    <td><?=$patient['gender'];?></td>
                </tr>
                <tr>
                    <td>Registered Since</td>
                    <td>: </td>
                    <td><?=date('d M Y', strtotime($patient['date_registered']));?> </td>
                </tr>
                <tr>
                    <td width="50">MRN</td>
                    <td width="50"> : </td>
                    <td > <?=$medical['medical_record_number'];?> </td>
                </tr>
                <tr>
                    <td>Dokter</td>
                    <td> : </td>
                    <td> <?=$medical['dokter'];?> </td>
                </tr>
                <tr>
                    <td>Anamnesa</td>
                    <td>: </td>
                    <td><?=$medical['anamnesa'];?> </td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>: </td>
                    <td><?=$medical['diagnosa'];?> </td>
                </tr>
                <tr>
                    <td>Theraphy</td>
                    <td>: </td>
                    <td><?=$medical['theraphy'];?></td>
                </tr>
            </table>
            <a href="<?=base_url('auth');?>/patient_detail/<?=$medical['medical_record_number'];?>" class="btn btn-secondary float-right d-print-none">Back</a>
            <button type="button" class="btn btn-success mb-3 float-right mr-3 d-print-none" onclick="printContent('content')"><i class="fa fa-print"></i> Print</button>
        </div>
    </div> -->
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

        </div>
    </div>

    <div class="card col-lg-7 float-right">
        <div class="card-header">
            <h5><b>Medical Record</b></h5>
        </div>
        <div class="card-body">
            <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMedicalModal">Add New Medical</a> -->
            <table class="table table-hover responsive">
                <tr>
                    <td>Dokter</td>
                    <td> : </td>
                    <td> <?=$medical['dokter'];?> </td>
                </tr>
                <tr>
                    <td>Anamnesa</td>
                    <td>: </td>
                    <td><?=$medical['anamnesa'];?> </td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>: </td>
                    <td><?=$medical['diagnosa'];?> </td>
                </tr>
                <tr>
                    <td>Theraphy</td>
                    <td>: </td>
                    <td><?=$medical['theraphy'];?></td>
                </tr>
            </table>
        </div>
        <button type="button" class="btn btn-success mb-3 float-right ml-3 d-print-none" onclick="printContent('content')"><i class="fa fa-print"></i> Print</button>
        <a href="<?=base_url('auth');?>/patient_detail/<?=$medical['medical_record_number'];?>" class="btn btn-secondary mb-3 float-right ml-3 d-print-none">Back</a>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->