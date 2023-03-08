 
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div id="logo">
        <a href="<?= site_url() ?>"><img src="<?=base_url ('assets/img/diamond.png'); ?>" width="50px"></a> 
      </div>
      <div class="col-5 d-md-flex align-items-center">
            <form method="post" action="<?= site_url('page/cari') ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari" aria-label="Cari" id="cari" name="cari" aria-describedby="button-addon2">
                    <div class="input-group-append " >
                        <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                        <input type="submit" class="btn btn-secondary" id="search" value="Cari">
                    </div>
                </div>
            </form>
        </div>
      <nav id="navbar" class="navbar"> 
        <ul>
          <li><a class="nav-link scrollto active" href="<?= site_url() ?>">Home</a></li>
          <?php if ($activeUser) : ?> 
          <li><a class="nav-link scrollto" href="<?= site_url('page/penawaran') ?>">Riwayat Penawaran</a></li>
          <li><a class="nav-link scrollto" href="<?= site_url('page/lelang') ?>">lelang</a></li> 
          <li><a class="nav-link scrollto" href="<?= site_url('page/change') ?>">Ganti Password</a></li> 
          <li><a class="nav-link scrollto" href="<?= site_url('page/edit') ?>">Hi, <?= $activeUser->nama; ?></a></li> 
          <li><a class="nav-link scrollto" href="<?= site_url('page/logout')?>">Logout</a></li>
          <?php endif ?>
          <?php if (!$activeUser) : ?>
            <li><a class="nav-link scrollto" href="<?= site_url('page/register') ?>">Register</a></li> 
            <li><a class="nav-link scrollto" href="<?= site_url('page/login')?>">Login</a></li>
          <?php endif ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->