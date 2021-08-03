<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= ucwords($title) ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form id="form" class="form" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <!-- NIK -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="nik">NIK</label>
                                        <input type="text" id="nik" name="nik" class="form-control" placeholder="1244125671242212">
                                    </div>
                                </div>
                                <!-- Nama lengkap -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Hermansyah Efendi">
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="href@padaidicorp.com">
                                    </div>
                                </div>
                                <!-- Phone -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="phone">No Handphone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="082388880000">
                                    </div>
                                </div>
                                <!-- date joined -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="birth_date">Tanggal Lahir</label>
                                        <input type="date" id="birth_date" name="birth_date" class="form-control">
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="address">Alamat Lengkap</label>
                                        <textarea type="text" id="address" name="address" class="form-control" placeholder="Jl. xx blok x Dki Jakarta"></textarea>
                                    </div>
                                </div>
                                <!-- Gender -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <fieldset class="form-group error">
                                            <select class="form-select" id="gender" name="gender">
                                                <option selected="true" disabled>-- Pilih Jenis Kelamin --</option>
                                                <option value="m">Laki - Laki</option>
                                                <option value="fm">Perempuan</option>
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
                                                <option selected="true" disabled>-- Pilih Status Perkawinan --</option>
                                                <option value="nm">Belum Menikah</option>
                                                <option value="m">Menikah</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <!-- Child -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="child">Jumlah Anak</label>
                                        <input type="number" id="child" name="child" value="0" class="form-control">
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
                                                    <option value="<?= $row['position_id'] ?>"><?= $row['position'] ?></option>
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
                                                <option value="kontrak">Kontrak</option>
                                                <option value="tetap">Pegawai Tetap</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <!-- date joined -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="date_joined">Tanggal Masuk</label>
                                        <input type="date" id="date_joined" name="date_joined" class="form-control" placeholder="dd/mm/yyyy">
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
                                                    <option value="<?= $row['level_id'] ?>"><?= $row['level'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button id="add" type="submit" class="btn btn-primary me-1 mb-1 add"><?= $action ?></button>
                                    <button class="btn btn-primary load" type="button" disabled style="display: none;">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Loading
                                    </button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
        $("#child").on("keypress", function(event) {
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
                }
            })
        }

        $('#form').on('submit', function(event) {
            event.preventDefault()
            var data = $(this).serialize()
            var formdata = new FormData($('#form')[0]);
            console.log(formdata)
            $.ajax({
                url: '<?= base_url('datamaster/prosesTambahKaryawan') ?>',
                type: 'post',
                data: formdata,
                contentType: false,
                cache: false,
                processData: false, // wajib
                dataType: 'json',
                beforeSend: function() {
                    $('.load').show();
                    $('.add').hide();
                },
                success: function(data) {
                    if (data.status) {
                        Swal.fire(
                            'Berhasil',
                            'Karyawan telah ditambahkan',
                            'success'
                        )
                        $('.load').hide();
                        $('.add').show();
                        $('#form').trigger('reset');
                    } else {
                        for (let i = 0; i < data.input.length; i++) {
                            $('#' + data.input[i]).change(function() {
                                $('#' + data.input[i]).removeClass('is-invalid')
                            })
                            $('#' + data.input[i]).addClass('is-invalid');
                            $('#' + data.input[i]).closest('.error').append('<div></div>');
                            $('#' + data.input[i]).next().text(data.message[i]).addClass('invalid-feedback')
                            $('.load').hide();
                            $('.add').show();
                        }
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            })
        })


    })
</script>