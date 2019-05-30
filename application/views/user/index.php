<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

      <div class="row">
        <div class="col-lg-8">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>

      <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <!-- <img src="https://previews.123rf.com/images/tuktukdesign/tuktukdesign1606/tuktukdesign160600105/59070189-user-icon-man-profile-businessman-avatar-person-icon-in-vector-illustration.jpg" class="card-img"> -->
            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            <!--- < base_url('assets/img/profile/'); ?>  --->
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $user['name']; ?></h5>
              <p class="card-text"><?= $user['email']; ?></p>
              <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->