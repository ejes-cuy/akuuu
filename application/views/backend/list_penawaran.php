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
            <h4>Data Penawaran</h4>
            <hr>
            <!-- Start kodingan di sini -->
            <table id="penawaran" class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Tanggal Penawaran</th>
                        <th>Nama Barang</th>
                        <th>Nama Penawar</th>
                        <th>No Hp</th>
                        <th>Email</th>
                        <th>Status Penawar</th>
                        <th>Harga Awal</th>
                        <th>Harga Penawaran</th>
                          
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penawaran as $p) : ?>
                        <tr> 
                            <td><?= $p->tgl_penawaran ?></td>
                            <td><?= $p->nama_barang ?></td>
                            <td><?= $p->nama_penawar ?></td>
                            <td><?= $p->no_hp ?></td>
                            <td><?= $p->email_penawar ?></td>
                            <td><?= $p->status_penawar ?></td>
                            <td><?= $p->harga_awal ?></td>
                            <td><?= $p->harga_penawaran ?></td>
                             
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
<!-- Datatable -->
<script>
    $(document).ready(function() {
        var table = $('#penawaran').DataTable({
            buttons: ['copy', 'excel', 'pdf', 'print'],
            dom: "<'row '<'col-md-4'l> <'col-md-4'B> <'col-md-4'f>>" +
                "<'row '<'col-md-12'tr>>" +
                "<'row '<'col-md-5'i> <'col-md-7'p>>",
            lengthChange: true
        });

        table.buttons().container()
            .appendTo('#masyarakat_wrapper .col-md-6:eq(0)');
    });
</script>