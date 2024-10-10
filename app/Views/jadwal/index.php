<?= $this->extend('templates/index') ?>

<?= $this->section('pageBody') ?>
<!-- Page body -->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-20">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="mb-0">Jadwal Shift</h3>
                    </div>
                    <div class="card-body">
                        <form method="get">
                            <div class="row justify-content-between g-3 flex-lg-row">
                                <div class="col-lg-7 col-md-12">
                                    <div class="row flex-nowrap">
                                        <div class="col">
                                            <div class="input-icon">
                                                <select class="form-select" id="unit" name="unit">
                                                    <option value="" disabled selected>Pilih Instalasi</option>
                                                    <?php foreach ($unit as $u) : ?>
                                                        <option value="<?= $u['id_unit'] ?>"><?= $u['nama'] ?>
                                                        <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12 text-start text-lg-end">
                                            <select class="form-select" id="bulan" name="bulan">
                                                <option value="" disabled selected>Pilih Bulan</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-12 text-start text-lg-end">
                                            <select class="form-select" id="tahun" name="tahun">
                                                <option value="" disabled selected>Pilih Tahun</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <button type="submit" name="filter" class="btn btn-green" data-bs-toggle="modal" data-bs-target="#exportModal"> <!-- Add name attribute with value "filter" -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                            <path d="M8 11h8v7h-8z" />
                                            <path d="M8 15h8" />
                                            <path d="M11 11v7" />
                                        </svg>
                                        <span>Filter</span>
                                    </button>
                                    <button href="<?= base_url('jadwal-shift') ?>" type="submit" name="filter" class="btn btn-red"> <!-- Add name attribute with value "filter" -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                        <span>Hapus Filter</span>
                                    </button>
                                </div>
                                <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <div class="modal-status bg-danger"></div>
                                            <div class="modal-body text-center py-4">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                    <path d="M12 9v4" />
                                                    <path d="M12 17h.01" />
                                                </svg>
                                                <h3>Hapus?</h3>
                                                <div class="text-muted">Apakah Anda yakin ingin menghapus pengajuan ketidakhadiran pada tanggal ____ Pengajuan yang sudah dihapus tidak dapat dikembalikan.</div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="w-100">
                                                    <div class="row">
                                                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                                                Batal
                                                            </a></div>
                                                        <div class="col">
                                                            <form action="/ketidakhadiran/" method="post" class="d-inline">
                                                                <?= csrf_field() ?>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="btn btn-danger w-100">
                                                                    Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if (isset($_GET['unit']) && isset($_GET['bulan']) && isset($_GET['tahun'])) : ?>
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            <h3 class="mb-0">Masukkan Shift</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered overflow-scroll" width="100%">
                                <thead>
                                    <tr>
                                        <th style="padding: 10px;">Nama</th>
                                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                                            <th style="padding: 10px;" class="text-center"><?php echo $i; ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($nama as $n) : ?>
                                        <tr>
                                            <td>
                                                <strong><?php echo $n['nama']; ?></strong>
                                            </td>
                                            <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                <td>
                                                    <select class="form-select text-center" style="width: 110px;" name="shift">
                                                        <option value="" class="text-center" disabled selected>Pilih Shift</option>
                                                        <option value="01" class="text-center">Non-Shift</option>
                                                        <option value="02" class="text-center">Shift Pagi</option>
                                                        <option value="03" class="text-center">Shift Siang</option>
                                                        <option value="04" class="text-center">Shift Malam</option>
                                                        <option value="05" class="text-center">Kosong</option>
                                                    </select>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class=" col-lg-10 mt-3">
                        <button type="button" class="btn btn-blue" data-bs-toggle="modal" data-bs-target="#exportModal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                <path d="M8 11h8v7h-8z" />
                                <path d="M8 15h8" />
                                <path d="M11 11v7" />
                            </svg>
                            <span>Simpan</span>
                        </button>
                    </div>
                <?php else : ?>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h3 class="text-center">Silakan pilih filter terlebih dahulu</h3>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>