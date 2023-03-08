<!DOCTYPE html>
<html Lang="en">

<head>
    <?php $this->load->view('backend/_partials/header') ?>
</head>
<body> 
    <main class="main">
        <?php $this->load->view('backend/_partials/sidenav') ?>
        
        <div class="content"> 
        <div class="container my-4">
            <h4>Data User</h4>
            <hr>
            <!-- Start kodingan di sini -->
            <table id="users" class="table">
                <thead class="thead-light">
                <?php if ($activeUser->level == "Admin") : ?>
                <a class="btn btn-success mb-2" href="<?= site_url('backend/users/add'); ?>">Tambah Data</a>
                <?php endif ?>
                    <tr> 
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Kontak</th>
                        <th>Username</th>  
                        <th>Level</th>  
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $m) : ?>
                        <tr> 
                            <th><?= $m->nip ?></th>
                            <td><?= $m->nama ?></td>
                            <td><?= $m->email ?></td>
                            <td><?= $m->no_hp ?></td>
                            <td><?= $m->username ?></td> 
                            <td><?= $m->level ?></td> 
                            <td><?= $m->status ?></td>
                            <td>
                            <?php if (($activeUser->level == "Admin" || $activeUser->id_user == $m->id_user) && $m->status <> 0) : ?>
                                    <!-- edit-->
                                <a href="<?= site_url('backend/users/edit/' . $m->id_user) ?>">
                                <button type="button" class="btn btn-warning" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                </a> 
                                <!-- change-->
                                <a href="<?= site_url('backend/users/change/' . $m->id_user) ?>">
                                    <button type="button" class="btn btn-info" title="Change Password">
                                        <i class="fa-solid fa-lock"></i>
                                    </button>
                                </a>
                                <?php endif ?>
                                <?php if ($m->status == 1 && $activeUser->level == "Admin") : ?>
                                <!-- hapus-->
                                <a href="<?= base_url('backend/users/blokir/'. $m->id_user) ?>" data-delete-url="<?= site_url('backend/users/delete/' . $m->id_user) ?>" onclick="deleteConfirm(this)">
                                <button type="button" class="btn btn-danger" title="Hapus">
                                <i class=" fa-solid fa-trash"></i>
                                </button>
                                </a>
                            <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- End -->
            
            <?php $this->load->view('backend/_partials/footer') ?>
        </div>
    </main>
</body>

</html>
<?php if ($this->session->flashdata('message')) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('message') ?>'
        })
    </script>
<?php endif ?> 
<!-- Datatable -->
<script>
    $(document).ready(function() {
        var table = $('#users').DataTable({
            buttons: ['copy', 'excel', 'pdf', 'print'],
            dom: "<'row '<'col-md-4'l> <'col-md-4'B> <'col-md-4'f>>" +
                "<'row '<'col-md-12'tr>>" +
                "<'row '<'col-md-5'i> <'col-md-7'p>>",
            lengthChange: true
        });

        table.buttons().container()
            .appendTo('#users_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Sweatalert JS -->
<script>
    function deleteConfirm(event) {
        Swal.fire({
            title: 'Delete Confirmation!',
            text: 'Yakin hapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya Hapus',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.deleteUrl);
            }
        });
    }
</script>