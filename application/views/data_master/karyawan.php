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
                         <th>Status</th>
                         <th>Jabatan</th>
                         <th>Jenis Kelamin</th>
                         <th>Status Perkawinan</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody id="tbody">
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
                                 <a href=""><span class="badge bg-success">View</span></a>
                                 <a href="<?= base_url('datamaster/editkaryawan/') . $row['user_id'] ?>"><span class="badge bg-warning">Edit</span></a>
                                 <a href="" onclick="deleteKaryawan(<?= $row['user_id'] ?>)" data-user_id="<?= $row['user_id'] ?>"><span class="badge bg-danger">Delete</span></a>
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

     function deleteKaryawan(user_id) {
         event.preventDefault()
         Swal.fire({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.isConfirmed) {
                 $.ajax({
                     url: '<?= base_url('datamaster/deleteKaryawan') ?>',
                     type: 'post',
                     data: {
                         user_id
                     },
                     success: function(result) {
                         fetchKaryawan()
                         Swal.fire(
                             'Deleted!',
                             'Your file has been deleted.',
                             'success'
                         )
                     }
                 })
             }
         })
     }
     fetchKaryawan()

     function fetchKaryawan() {
         $.ajax({
             url: '<?= base_url('datamaster/fetchKaryawan') ?>',
             type: 'post',
             dataType: 'json',
             success: function(result) {
                 var tbody = '';
                 var marital_status;
                 var gender;
                 var no = 1;
                 for (let i = 0; i < result.length; i++) {
                     if (result[i].marital_status == 'm') {
                         marital_status = 'Menikah'
                     } else if (result[i].marital_status == 'nm') {
                         marital_status = 'Belum Nikah'
                     } else {
                         marital_status = 'ERROR'
                     }
                     if (result[i].gender == 'm') {
                         gender = 'Laki - Laki'
                     } else if (result[i].gender == 'fm') {
                         gender = 'Perempuan'
                     } else {
                         gender = 'ERROR'
                     }
                     tbody += '<tr>' +
                         '<td>' + no++ + '</td>' +
                         '<td><img src="<?= base_url('assets/img/users/') ?>' + result[i].picture + '" class="img-thumbnail" height="100" width="100"></td>' +
                         '<td>' + result[i].id_card + '</td>' +
                         '<td>' + result[i].fullname + '</td>' +
                         '<td>' + result[i].status.charAt(0).toUpperCase() + result[i].status.slice(1) + '</td>' + // mengambil huruf pertama(index 0) dan tambahkan dengan result potong huruf pertamanya
                         '<td>' + result[i].position + '</td>' +
                         '<td>' + gender + '</td>' +
                         '<td>' + marital_status + '</td>' +
                         '<td>' +
                         '<a href=""><span class="badge bg-success">View</span></a>' +
                         '<a class="px-1" href="<?= base_url('datamaster/editkaryawan/') ?>' + result[i].user_id + '"><span class="badge bg-warning">Edit</span></a>' +
                         '<a href="" onclick="deleteKaryawan(' + result[i].user_id + ')"><span class="badge bg-danger">Delete</span></a>' +
                         '</td>' +
                         '</tr>';
                     $('#tbody').html(tbody);
                 }

             }
         })
     }
 </script>