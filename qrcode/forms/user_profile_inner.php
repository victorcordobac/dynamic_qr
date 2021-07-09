<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <?php
          $img = 'upload/images/dummy-profile-pic.png';
          $path_info = pathinfo($profile->profile_pic);
          $path = 'upload/images/' . $profile->profile_pic;
          if (file_exists($path) && key_exists('extension', $path_info)) {
              $img = $path;
          }

          ?>
          <img class="profile-user-img img-fluid img-circle" src="<?= $img ?>" alt="<?= $profile->first_name ?>">
        </div>

        <h3 class="profile-username text-center">
          <?= $profile->first_name, ' ', $profile->last_name ?>
        </h3>

        <p class="text-muted text-center mb-1"><?= $profile->user_name ?></p>
        <p class="text-muted text-center"><?= $profile->email ?></p>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Dynamic QR codes</b> <a class="float-right"><?= count($dynamic_qrcodes) ?></a>
          </li>
          <li class="list-group-item">
            <b>Static QR codes</b> <a class="float-right"><?= count($static_qrcodes) ?></a>
          </li>
          <?php if (strlen($profile->facebook)) : ?>
            <li class="list-group-item">
              <a href="<?= $profile->facebook ?>" target="_blank">
                <b>Facebook</b>
              </a>
            </li>
          <?php endif ?>
          <?php if (strlen($profile->twitter)) : ?>
            <li class="list-group-item">
              <a href="<?= $profile->twitter ?>" target="_blank">
                <b>Twitter</b>
              </a>
            </li>
          <?php endif ?>
          <?php if (strlen($profile->instagram)) : ?>
            <li class="list-group-item">
              <a href="<?= $profile->instagram ?>" target="_blank">
                <b>Instagram</b>
              </a>
            </li>
          <?php endif ?>
        </ul>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">

      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <h3>Dynamic QR Codes</h3>
          </div>
          <?php foreach ($dynamic_qrcodes as $dcode) : ?>
            <div class="col-md-2">
              <div class="card">
                <img src="<?= PATH . htmlspecialchars($dcode->qrcode) ?>" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?= $dcode->filename ?></h5>
                  <p class="card-text"><strong>Scans:</strong> <?= $dcode->scan ?></p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <?php if (count($dynamic_qrcodes) == 0): ?>
            <div class="col-md-12">
              <div class="alert alert-info" role="alert">
                No dynamic qr found.
              </div>  
            </div>
          <?php endif ?>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h3>Static QR Codes</h3>
          </div>
          <?php foreach ($static_qrcodes as $dcode) : ?>
            <div class="col-md-2">
              <div class="card">
                <img src="<?= PATH . htmlspecialchars($dcode->qrcode) ?>" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title"><?= $dcode->filename ?></h5>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <?php if (count($static_qrcodes) == 0): ?>
            <div class="col-md-12">
              <div class="alert alert-info" role="alert">
                No static qr found
              </div>  
            </div>
          <?php endif ?>
        </div>
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>