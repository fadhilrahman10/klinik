<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <form action="" method="post">
        <input type="hidden" name="medical_record_number" id="medical_record_number" value="<?= $patient['medical_record_number']; ?>">

        <div class="form-group row">
            <label for="medical_record_number" class="col-sm-2 col-form-label">Medical Record Number</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="medical_record_number" name="medical_record_number" value="<?= $patient['medical_record_number']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="<?= $patient['name']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="place_of_birth" class="col-sm-2 col-form-label">Place Of Birth</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="<?= $patient['place_of_birth']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="date_of_birth" class="col-sm-2 col-form-label">Date Of Birth</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?= $patient['date_of_birth']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="religion" class="col-sm-2 col-form-label">Religion</label>
            <div class="col-sm-10">
                <select class="form-control" name="religion" id="religion">
                    <?php foreach ($religion as $r) : ?>
                        <?php if ($r == $patient['religion']) : ?>
                            <option value="<?= $r; ?>" selected><?= $r; ?></option>
                        <?php else : ?>
                            <option value="<?= $r; ?>"><?= $r; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select class="form-control" name="gender" id="gender">
                    <?php foreach ($gender as $g) : ?>
                        <?php if ($g == $patient['gender']) : ?>
                            <option value="<?= $g; ?>" selected><?= $g; ?></option>
                        <?php else : ?>
                            <option value="<?= $g; ?>"><?= $g; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="profession" class="col-sm-2 col-form-label">Profession</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="profession" name="profession" value="<?= $patient['profession']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone_number" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $patient['phone_number']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address" value="<?= $patient['address']; ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right">Edit Patient</button>
        <a href="<?= base_url('auth/patient'); ?>" class="btn btn-secondary float-right mr-3">Close</a>
    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->