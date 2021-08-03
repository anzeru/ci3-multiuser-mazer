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
                            <img src="<?= base_url('assets/img/users/') . $user['picture'] ?>" class="card-img-top img-fluid" alt="singleminded">
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
                        <form class="form">
                            <div class="row">
                                <!-- NIK -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="nik">NIK</label>
                                        <input type="text" id="nik" name="nik" class="form-control" placeholder="1244125671242212" value="<?= $user['id_card'] ?>">
                                    </div>
                                </div>
                                <!-- Nama lengkap -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Hermansyah Efendi" value="<?= $user['fullname'] ?>">
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="href@padaidicorp.com" value="<?= $user['email'] ?>">
                                    </div>
                                </div>
                                <!-- Phone -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="phone">No Handphone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="082388880000" value="<?= $user['phone_number'] ?>">
                                    </div>
                                </div>
                                <!-- date birth -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="birth_date">Tanggal Lahir</label>
                                        <input type="date" id="birth_date" name="birth_date" class="form-control" value="<?= $user['birth_date'] ?>">
                                    </div>
                                </div>
                                <!-- Address -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="address">Alamat Lengkap</label>
                                        <textarea type="text" id="address" name="address" class="form-control" placeholder="Jl. xx blok x Dki Jakarta"><?= $user['address'] ?></textarea>
                                    </div>
                                </div>
                                <!-- Gender -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <fieldset class="form-group error">
                                            <select class="form-select" id="gender" name="gender">
                                                <option disabled>-- Pilih Jenis Kelamin --</option>
                                                <option value="m" <?= $user['gender'] == 'm' ? 'selected' : '' ?>>Laki - Laki</option>
                                                <option value="fm" <?= $user['gender'] == 'fm' ? 'selected' : '' ?>>Perempuan</option>
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
                                                <option disabled>-- Pilih Status Perkawinan --</option>
                                                <option value="nm" <?= $user['marital_status'] == 'nm' ? 'selected' : '' ?>>Belum Menikah</option>
                                                <option value="m" <?= $user['marital_status'] == 'm' ? 'selected' : '' ?>>Menikah</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <!-- Child -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="child">Jumlah Anak</label>
                                        <input type="number" id="child" name="child" class="form-control" value="<?= $user['child'] ?>">
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
                                                    <option value="<?= $row['position_id'] ?>" <?= $row['position_id'] == $user['position_id'] ? 'selected' : '' ?>><?= $row['position'] ?></option>
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
                                                <option value="kontrak" <?= $user['status'] == 'kontrak' ? 'selected' : '' ?>>Kontrak</option>
                                                <option value="tetap" <?= $user['status'] == 'tetap' ? 'selected' : '' ?>>Pegawai Tetap</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <!-- date joined -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group error">
                                        <label for="date_joined">Tanggal Masuk</label>
                                        <input type="date" id="date_joined" name="date_joined" class="form-control" placeholder="dd/mm/yyyy" value="<?= $user['date_joined'] ?>">
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
                                                    <option value="<?= $row['level_id'] ?>" <?= $user['level_id'] == $row['level_id'] ? 'selected' : '' ?>><?= $row['level'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button id="add" type="submit" class="btn btn-primary me-1 mb-1 add">Simpan</button>
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