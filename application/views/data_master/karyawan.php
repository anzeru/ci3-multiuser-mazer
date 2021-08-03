 <section class="section">
     <div class="card">
         <div class="card-header container-fluid">
             <div class="row">
                 <div class="col-md-10">
                     <h4 class="card-title"><?= ucfirst($title) ?></h4>
                 </div>
                 <div class="col-md-2 float-right">
                     <a href="<?= base_url('datamaster/tambahkaryawan') ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i>Tambah Karyawan</a>
                 </div>
             </div>
         </div>
         <div class="card-body">
             <table class="table table-striped" id="table1">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>Gambar</th>
                         <th>NIK</th>
                         <th>Nama Lengkap</th>
                         <th>Jabatan</th>
                         <th>Status</th>
                         <th>Jenis Kelamin</th>
                         <th>Status Perkawinan</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1;
                        foreach ($alluser as $row) : ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><img src="<?= base_url('assets/img/users/') . $row['picture'] ?>" class="img-thumbnail" height="100" width="100"></td>
                             <td><?= $row['id_card'] ?></td>
                             <td><?= $row['fullname'] ?></td>
                             <td><?= ucfirst($row['status']) ?></td>
                             <td><?= $row['position'] ?></td>
                             <td><?= generateGender($row['gender']) ?></td>
                             <td><?= generateStatusPerkawinan($row['marital_status']) ?></td>
                             <td>
                                 <a><span class="badge bg-success">View</span></a>
                                 <a><span class="badge bg-warning">Edit</span></a>
                                 <a><span class="badge bg-danger">Delete</span></a>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>
 </section>

 <script src="<?= base_url('assets/dist/assets') ?>/vendors/simple-datatables/simple-datatables.js"></script>

 <script>
     // Simple Datatable
     let table1 = document.querySelector('#table1');
     let dataTable = new simpleDatatables.DataTable(table1);
 </script>