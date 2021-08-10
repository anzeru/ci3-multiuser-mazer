<section class="section">
    <div class="card">
        <div class="card-header container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <h4 class="card-title"><?= ucfirst($title) ?></h4>
                </div>
                <div class="col-lg-2">
                    <button id="add" type="button" onclick="add()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#default">Tambah Jabatan</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jabatan</th>
                        <th>Tanggal Ditambahkan</th>
                        <th>Tanggal Diubah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php $no = 1;
                    foreach ($table as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['position'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['updated_at'] ?></td>
                            <td>
                                <a type="button" id="edit<?= $row['position_id'] ?>" onclick="edit(<?= $row['position_id'] ?>)" href="" data-bs-toggle="modal" data-bs-target="#default"><span class="badge bg-success">Edit</span></a>
                                <a href="" id="delete<?= $row['position_id'] ?>" data-name="<?= $row['position'] ?>" onclick="deleteKaryawan(<?= $row['position_id'] ?>)"><span class="badge bg-danger">Delete</span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    var action = '';
    var position_id = '';

    function edit(id) {
        action = 'edit';
        position_id = id;
    }

    function add() {
        action = 'add';
    }
</script>
<script src="<?= base_url('assets/dist/assets') ?>/vendors/simple-datatables/simple-datatables.js"></script>

<script>
    $(document).ready(function() {
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);

        $('#form').on('submit', function(event) {
            event.preventDefault()
            var position = $('#position').val() // tidak bisa pkai serialize 
            var url = '';
            if (action == 'add') {
                url = '<?= base_url('position/add') ?>'
            } else if (action == 'edit') {
                url = '<?= base_url('position/edit/') ?>'
            }
            $.ajax({
                url: url,
                data: {
                    position,
                    position_id
                },
                type: 'post',
                success: function(result) {
                    console.log(result)
                    $('#default').modal('hide')
                    $('#form')[0].reset()
                }
            })
        })
    })
</script>




<!-- MODAL -->
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Tambah Jabatan</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>

            <div class="modal-body">
                <div class="card-content">
                    <div class="card-body">
                        <form id="form" class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="position" name="position" class="form-control" placeholder="Masukkan jabatan...">
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-sm-12 d-flex justify-content-end">

                                            <button id="cancel" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>