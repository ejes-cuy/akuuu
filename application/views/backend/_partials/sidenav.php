<aside class="side-nav" style="height:auto; min-height:100vh;">
    <div class="brand">
        <img src="<?=base_url ('assets/images/diamons.png'); ?>"  width="50%"  style="margin-left : 40px;">
        <h5>Lelang Perhiasan</h5>
    </div>
    <nav>
        <a href="<?= site_url('backend')?>">Dashboard</a>
        
        <?php if ($activeUser->level == "Admin") : ?>
            <a href="<?= site_url('backend/masyarakat')?>">Data Masyarakat</a>
            <?php endif ?>
            
            <a href="<?= site_url('backend/users')?>">Kelola User</a>
        <?php if ($activeUser->level == "Petugas") : ?>
            <a href="<?= site_url('backend/barang')?>">Kelola Barang</a>
            <a href="<?= site_url('backend/lelang')?>">Kelola Lelang</a>
            <a href="<?= site_url('backend/penawaran')?>">Riwayat Penawaran</a>
            <a href="<?= site_url('backend/laporan')?>">Laporan Pemenang Lelang</a>
        <?php endif ?>

        <a href="<?= site_url('backend/auth/logout') ?>">Logout</a>
    </nav>
</aside>