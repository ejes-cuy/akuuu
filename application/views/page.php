<!DOCTYPE html>
 <html lang="en">
    <?php $this->load->view('_partials/header') ?>
    <?php $this->load->view('_partials/sidenav') ?>
   
  <!-- ======= hero Section ======= -->
  <section id="hero">

    <div class="hero-content" data-aos="fade-up">
      <h2>Selamat Datang di <br><span>Lelang Perhiasan</span><br>Online</h2>
      
    </div> 
     

  </section><!-- End Hero Section -->

  <main id="main"> 
     
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Barang Yang Di Lelangkan</h2> 
        </div>

         
<?php foreach ($lelang as $p):?> 
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img style="width:100%;height:100%;height: 35rem;" src="<?= base_url('upload/barang/'.$p->gambar)?>";>
            <div class="portfolio-info">
              <h4><?= $p->nama_barang?></h4>
              <p>IDR <?= number_format ($p->harga_awal, 2) ?></p>
              <a href="<?= base_url('upload/barang/'.$p->gambar)?>"; data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $p->deskripsi ?>"><i class="bx bx-plus"></i></a>
              <a href="<?= site_url('page/detail_lelang/' . $p->id_lelang) ?>" class="details-link" title="Ajukan Penawaran"><i class="bx bx-link"></i></a>
            </div>
          </div> 
<?php endforeach?>
                   </div>

      </div>
    </section><!-- End Portfolio Section --> 
     
  </main><!-- End #main -->
  <?php $this->load->view('_partials/footer') ?>
 </html>