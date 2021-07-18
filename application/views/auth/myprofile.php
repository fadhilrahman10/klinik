                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-6">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>

                    <div class="card mb-3 col-lg-6">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="<?= base_url('assets/img/profile/') . $admin['image']; ?>" height="200px" width="180px">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $admin['name']; ?></h5>
                                <p class="card-text"><?= $admin['email']; ?></p>
                                <br><br>
                                <p class="card-text">Admin since <?= date('d F Y', strtotime($admin['date_created'])); ?></p>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->