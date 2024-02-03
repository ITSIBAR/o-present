<?= $this->extend('templates/index') ?>

<?= $this->section('pageBody') ?>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <form action="<?= base_url('/lokasi-presensi/update') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $lokasi['id'] ?>">
            <input type="hidden" name="slug" value="<?= $lokasi['slug'] ?>">

            <div class="row row-deck row-cards align-items-stretch">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Lokasi</label>
                                <input name="nama_lokasi" type="text" class="form-control <?= validation_show_error('nama_lokasi') ? 'is-invalid' : '' ?>" placeholder="e.g. Outlet Semarang" value="<?= old('nama_lokasi', $lokasi['nama_lokasi']) ?>">
                                <?php if (validation_show_error('nama_lokasi')) : ?>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('nama_lokasi') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat Lokasi</label>
                                <input name="alamat_lokasi" type="text" class="form-control <?= validation_show_error('alamat_lokasi') ? 'is-invalid' : '' ?>" placeholder="e.g. Jalan Semangka Nomor 5" value="<?= old('alamat_lokasi', $lokasi['alamat_lokasi']) ?>">
                                <?php if (validation_show_error('alamat_lokasi')) : ?>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('alamat_lokasi') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipe Lokasi</label>
                                <select name="tipe_lokasi" type="text" class="form-select <?= validation_show_error('tipe_lokasi') ? 'is-invalid' : '' ?>" id="select-users">
                                    <option value="">---Pilih Tipe Lokasi---</option>
                                    <option value="Pusat" <?= old('tipe_lokasi', $lokasi['tipe_lokasi']) === 'Pusat' ? 'selected' : '' ?>>Pusat</option>
                                    <option value="Cabang" <?= old('tipe_lokasi', $lokasi['tipe_lokasi']) === 'Cabang' ? 'selected' : '' ?>>Cabang</option>
                                </select>
                                <?php if (validation_show_error('tipe_lokasi')) : ?>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('tipe_lokasi') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Latitude</label>
                                <input name="latitude" type="text" class="form-control <?= validation_show_error('latitude') ? 'is-invalid' : '' ?>" placeholder="e.g. -6.1239302" value="<?= old('latitude', $lokasi['latitude']) ?>">
                                <?php if (validation_show_error('latitude')) : ?>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('latitude') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Longitude</label>
                                <input name="longitude" type="text" class="form-control <?= validation_show_error('longitude') ? 'is-invalid' : '' ?>" placeholder="e.g. 102.20384028" value="<?= old('longitude', $lokasi['longitude']) ?>">
                                <?php if (validation_show_error('longitude')) : ?>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('longitude') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Radius (meter)</label>
                                <input name="radius" type="number" class="form-control <?= validation_show_error('radius') ? 'is-invalid' : '' ?>" placeholder="e.g. 100" value="<?= old('radius', $lokasi['radius']) ?>">
                                <?php if (validation_show_error('radius')) : ?>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('radius') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Zona Waktu</label>
                                <select name="zona_waktu" type="text" class="form-select <?= validation_show_error('zona_waktu') ? 'is-invalid' : '' ?>" id="select-users">
                                    <option value="">---Pilih Zona Waktu---</option>
                                    <option value="WIB" <?= old('zona_waktu', $lokasi['zona_waktu']) === 'WIB' ? 'selected' : '' ?>>WIB</option>
                                    <option value="WITA" <?= old('zona_waktu', $lokasi['zona_waktu']) === 'WITA' ? 'selected' : '' ?>>WITA</option>
                                    <option value="WIT" <?= old('zona_waktu', $lokasi['zona_waktu']) === 'WIT' ? 'selected' : '' ?>>WIT</option>
                                </select>
                                <?php if (validation_show_error('zona_waktu')) : ?>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('zona_waktu') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jam Masuk</label>
                                <input name="jam_masuk" type="time" class="form-control <?= validation_show_error('jam_masuk') ? 'is-invalid' : '' ?>" value="<?= old('jam_masuk', date('H:i', strtotime($lokasi['jam_masuk']))) ?>">
                                <?php if (validation_show_error('jam_masuk')) : ?>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('jam_masuk') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jam Pulang</label>
                                <input name="jam_pulang" type="time" class="form-control <?= validation_show_error('jam_pulang') ? 'is-invalid' : '' ?>" value="<?= old('jam_pulang', date('H:i', strtotime($lokasi['jam_pulang']))) ?>">
                                <?php if (validation_show_error('jam_pulang')) : ?>
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('jam_pulang') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="<?= base_url('lokasi-presensi') ?>" class="btn btn-link">Batal</a>
                                <button type="submit" class="btn btn-primary ms-auto">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>