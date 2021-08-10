<section class="section">
    <div class="card">
        <div class="card-header container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <h4 class="card-title"><?= ucfirst($title) ?></h4>
                </div>
            </div>
        </div>
        <div class="card-body d-flex">
            <div class="row col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <img id="img_preview" src="<?= base_url('assets/img/users/') ?><?= $karyawan ? $karyawan['picture'] : 'default.jpg' ?>" class="card-img-top img-fluid" alt="singleminded">
                            <div class="card-body">
                                <h5 class="card-title">Be Single Minded</h5>
                                <p class="card-text">
                                    Chocolate sesame snaps apple pie danish cupcake sweet roll jujubes tiramisu.Gummies
                                    bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-md-9">
                <div class="card-content">
                    <div class="card-body">
                        <form id="form" class="form">
                            <div class="row">
                                <!-- NIK -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="nik">NIK</label>
                                        <input type="text" id="nik" name="nik" class="form-control" placeholder="1244125671242212" value="<?= $karyawan ? $karyawan['id_card'] : '' ?>">
                                    </div>
                                </div>
                                <!-- Nama lengkap -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Hermansyah Efendi" value="<?= $karyawan ? $karyawan['fullname'] : '' ?>">
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="href@padaidicorp.com" value="<?= $karyawan ? $karyawan['email'] : '' ?>">
                                    </div>
                                </div>
                                <!-- Phone -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="phone">No Handphone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="082388880000" value="<?= $karyawan ? $karyawan['phone_number'] : '' ?>">
                                    </div>
                                </div>
                                <!-- date birth -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="birth_date">Tanggal Lahir</label>
                                        <input type="date" id="birth_date" name="birth_date" class="form-control" value="<?= $karyawan ? $karyawan['birth_date'] : '' ?>">
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="address">Alamat Lengkap</label>
                                        <textarea type="text" id="address" name="address" class="form-control" placeholder="Jl. xx blok x Dki Jakarta"><?= $karyawan ? $karyawan['address'] : '' ?></textarea>
                                    </div>
                                </div>
                                <!-- Gender -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <fieldset class="form-group error">
                                            <select class="form-select" id="gender" name="gender">
                                                <option selected disabled>-- Pilih Jenis Kelamin --</option>
                                                <?php if ($karyawan) : ?>
                                                    <option value="m" <?= $karyawan['gender'] == 'm' ? 'selected' : '' ?>>Laki - Laki</option>
                                                    <option value="fm" <?= $karyawan['gender'] == 'fm' ? 'selected' : '' ?>>Perempuan</option>
                                                <?php else : ?>
                                                    <option value="m">Laki - Laki</option>
                                                    <option value="fm">Perempuan</option>
                                                <?php endif; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <!-- Marital Status -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="marital_status">Status Perkawinan</label>
                                        <fieldset class="form-group error">
                                            <select class="form-select" id="marital_status" name="marital_status">
                                                <option selected disabled>-- Pilih Status Perkawinan --</option>
                                                <?php if ($karyawan) : ?>
                                                    <option value="nm" <?= $karyawan['marital_status'] == 'nm' ? 'selected' : '' ?>>Belum Menikah</option>
                                                    <option value="m" <?= $karyawan['marital_status'] == 'm' ? 'selected' : '' ?>>Menikah</option>
                                                <?php else : ?>
                                                    <option value="nm">Belum Menikah</option>
                                                    <option value="m">Menikah</option>
                                                <?php endif; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <!-- Child -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="child">Jumlah Anak</label>
                                        <input type="number" id="child" name="child" class="form-control" value="<?= $karyawan ? $karyawan['child'] : '0' ?>">
                                    </div>
                                </div>
                                <!-- Position -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="position">Jabatan</label>
                                        <fieldset class="form-group error">
                                            <select class="form-select" id="position" name="position">
                                                <option selected="true" disabled>-- Pilih Jabatan --</option>
                                                <?php foreach ($position as $row) : ?>
                                                    <?php if ($karyawan) : ?>
                                                        <option value="<?= $row['position_id'] ?>" <?= $row['position_id'] == $karyawan['position_id'] ? 'selected' : '' ?>><?= $row['position'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $row['position_id'] ?>"><?= $row['position'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <!-- status -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="status">Status Pegawai</label>
                                        <fieldset class="form-group error">
                                            <select class="form-select" id="status" name="status">
                                                <option selected="true" disabled>-- Pilih Status Pegawai --</option>
                                                <?php if ($karyawan) : ?>
                                                    <option value="kontrak" <?= $karyawan['status'] == 'kontrak' ? 'selected' : '' ?>>Kontrak</option>
                                                    <option value="tetap" <?= $karyawan['status'] == 'tetap' ? 'selected' : '' ?>>Pegawai Tetap</option>
                                                <?php else : ?>
                                                    <option value="kontrak">Kontrak</option>
                                                    <option value="tetap">Pegawai Tetap</option>
                                                <?php endif; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <!-- date joined -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="date_joined">Tanggal Masuk</label>
                                        <input type="date" id="date_joined" name="date_joined" class="form-control" placeholder="dd/mm/yyyy" value="<?= $karyawan ? $karyawan['date_joined'] : '' ?>">
                                    </div>
                                </div>
                                <!-- picture -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="status">Gambar</label>
                                        <div class="input-group mb-3 error">
                                            <label class="input-group-text picture" for="picture"><i class="bi bi-upload"></i></label>
                                            <input type="file" class="form-control" id="picture" name="picture">
                                        </div>
                                    </div>
                                </div>
                                <!-- LEvel -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <fieldset class="form-group error">
                                            <select class="form-select" id="level" name="level">
                                                <option selected="true" disabled>-- Pilih Level --</option>
                                                <?php foreach ($level as $row) : ?>
                                                    <?php if ($karyawan) : ?>
                                                        <option value="<?= $row['level_id'] ?>" <?= $karyawan['level_id'] == $row['level_id'] ? 'selected' : '' ?>><?= $row['level'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $row['level_id'] ?>"><?= $row['level'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <input name="action" id="action" value="<?= $action ?>" style="display: none;">
                                    <input type="submit" class="btn btn-primary me-1 mb-1 btn-action" value="<?= $btn_value ?>">
                                    <input type="button" class="btn btn-danger me-1 mb-1 btn-cancel" value="Batal" style="display: none;">
                                    <button class="btn btn-primary load" type="button" disabled style="display: none;">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Proses
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

        $('#form').on('submit', function(event) {
            event.preventDefault()
            $('.load').show();
            $('.btn-action').hide();
            var data = $(this).serialize()
            var action = document.getElementById('action').value
            var {
                btn,
                text,
                text_success
            } = confirm(action)
            // console.log(action) addKaryawan|editKaryawan|editProfile
            var formdata = new FormData($('#form')[0]);
            // console.log(formdata)
            Swal.fire({
                title: 'Konfirmasi' + name,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: btn
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url(action),
                        type: 'post',
                        data: formdata,
                        contentType: false,
                        cache: false,
                        processData: false, // wajib
                        dataType: 'json',
                        beforeSend: function() {
                            $('.load').show();
                            $('.btn-action').hide();
                        },
                        success: function(data) {
                            if (data.status) {
                                Swal.fire(
                                    'Berhasil',
                                    text_success,
                                    'success'
                                )
                                $('.load').hide();
                                $('.add').show();
                                if (action == 'addKaryawan') {
                                    $('#form').trigger('reset');
                                }
                            } else {
                                for (let i = 0; i < data.input.length; i++) {
                                    $('#' + data.input[i]).change(function() {
                                        $('#' + data.input[i]).removeClass('is-invalid')
                                    })
                                    $('#' + data.input[i]).addClass('is-invalid');
                                    $('#' + data.input[i]).closest('.error').append('<div></div>');
                                    $('#' + data.input[i]).next().text(data.message[i]).addClass('invalid-feedback')
                                    $('.load').hide();
                                    $('.btn-action').show();
                                }
                            }
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("Status: " + textStatus);
                            alert("Error: " + errorThrown);
                        }
                    })
                } else {
                    $('.load').hide();
                    $('.btn-action').show();
                }
            })
        })

        $("#child, #nik, #phone").on("keypress", function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        checkPicture()

        function checkPicture() {
            $(document).on('change', '#picture', function() {
                // menghapus invalid-feedback saat upload file sudah benar
                var value = document.getElementById('picture').val;
                if (value != '') {
                    $('#picture').removeClass('is-invalid')
                }
                // check tipe file dan size
                var property = document.getElementById('picture').files[0]
                var image_name = property.name;
                var image_extension = image_name.split('.').pop().toLowerCase();
                //console.log(jQuery.inArray(image_extension, ['jpg'])) // cek value file ext yang di upload 0 / -1
                var image_size = property.size;
                if (jQuery.inArray(image_extension, ['gif', 'jpg', 'jpeg', 'png']) == -1) {
                    $('#picture').addClass('is-invalid');
                    $('#picture').closest('.error').append('<div></div>');
                    $('#picture').next().text('File yang diizinkan hanya jpg / jpeg / png').addClass('invalid-feedback');
                    $('#picture').val('');
                } else if (image_size > 1199035) {
                    $('#picture').addClass('is-invalid');
                    $('#picture').closest('.error').append('<div></div>');
                    $('#picture').next().text('Gambar maksimal 1MB / 1024KB').addClass('invalid-feedback');
                    $('#picture').val('');
                } else {
                    // tampilkan gambar
                    var image = URL.createObjectURL(property)
                    var target = document.getElementById('img_preview')
                    target.src = image
                }
            })
        }
        limitDate()

        function limitDate() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd // membuat tanggal yang 1 digit menjadi 2 digit (1-9)
            }
            // console.log(dd)
            if (mm < 10) {
                mm = '0' + mm // membuat bulan yang 1 digit menjadi 2 digit (1-9)
            }
            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("date_joined").setAttribute("max", today);
            document.getElementById("birth_date").setAttribute("max", today);
        }

        function confirm(action) {
            var text = '';
            var btn = '';
            var text_success = '';
            if (action == 'addKaryawan') {
                text = 'Apakah data sudah benar semua ?'
                btn = 'Ya, Simpan'
                text_success = 'Karyawan berhasil ditambah'
            } else if (action == 'editKaryawan') {
                text = 'Yakin mengubah data ini ?'
                btn = 'Ya, ubah'
                text_success = 'Data karyawan berhasil diubah'
            } else if (action == 'editProfile') {
                text = 'Yakin mengubah profile anda ?'
                btn = 'Ya, ubah'
                text_success = 'Profile berhasil diubah'
            }
            return {
                btn,
                text,
                text_success
            }
        }

        function url(action) {
            var url = '';
            if (action == 'addKaryawan') {
                url = '<?= base_url('datamaster/prosesTambahKaryawan') ?>'
            } else if (action == 'editKaryawan') {
                url = '<?= base_url('datamaster/prosesEditKaryawan') ?>'
            } else if (action == 'editProfile') {
                url = '<?= base_url('user/edit') ?>'
            }
            return url
        }

    })
</script>