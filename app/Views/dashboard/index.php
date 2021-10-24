<?= $this->extend('layout_dashboard/template_dashboard') ?>
<?= $this->section('dashboard-content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Aplikasi Kelola Keuangan Sederhana By Subhan F</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pemasukan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $pemasukan ?>,-</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Pengeluaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $pengeluaran ?>,-</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

    <!-- pesan laporan berhasil ditambahkan -->
    <?php if(session()->getFlashdata('laporanberhasil')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('laporanberhasil') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>

    <!-- pesan laporan berhasil dihapus -->
    <?php if(session()->getFlashdata('laporandihapus')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('laporandihapus') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>

    <!-- pesan laporan gagal ditambahkan -->
    <?php if(session()->getFlashdata('laporangagal')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('laporangagal') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>

    <!-- tabel data -->
    <table class="table table-bordered table-responsive-sm" id="tabledata">
        <thead>
            <tr class="text-center">
                <th scope="col">No.</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Pemasukan</th>
                <th scope="col">Pengeluaran</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Dibuat pada</th>
                <th scope="col">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($kas as $dataKas) : ?>
            <tr>
                <th scope="row"><?= $no++ ?>.</th>
                <td><?= $dataKas['tanggal'] ?></td>
                <td>Rp. <?= $dataKas['pemasukan'] ?>,-</td>
                <td>Rp. <?= $dataKas['pengeluaran'] ?>,-</td>
                <td><?= $dataKas['keterangan'] ?></td>
                <td><?= $dataKas['created_at'] ?></td>
                <td class="text-center">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapus">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalLaporan"
        style="margin-top: -6.1% !important;">Tambah Laporan</button>
</div>

<!-- Modal Laporan -->
<div class="modal fade" id="modalLaporan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/home/savelaporan') ?>" method="post">
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date"
                                class="form-control <?= ($validasi->hasError('tanggal')) ? 'is-invalid' : '' ?>"
                                name="tanggal" id="tanggal" autocomplete="off" value="<?= old('tanggal') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pemasukan" class="col-sm-2 col-form-label">Pemasukan</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control <?= ($validasi->hasError('pemasukan')) ? 'is-invalid' : '' ?>"
                                name="pemasukan" id="pemasukan" placeholder="5000" autocomplete="off"
                                value="<?= old('pemasukan') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pengeluaran" class="col-sm-2 col-form-label">Pengeluaran</label>
                        <div class="col-sm-10">
                            <input type=""
                                class="form-control <?= ($validasi->hasError('pengeluaran')) ? 'is-invalid' : '' ?>"
                                name="pengeluaran" id="pengeluaran" placeholder="2000" autocomplete="off"
                                value="<?= old('pengeluaran') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea
                                class="form-control <?= ($validasi->hasError('keterangan')) ? 'is-invalid' : '' ?>"
                                id="keterangan" name="keterangan" placeholder="keterangan" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <button type="submit" class="btn btn-primary d-block float-right">Tambah Laporan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus laporan ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="<?= base_url() ?>/home/<?= (empty($dataKas['id'])) ? '' : $dataKas['id'] ?>"
                    method="post">
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>