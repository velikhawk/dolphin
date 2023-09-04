<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Tambah Data Transaksi</h6>
    </div>
    <div class="card-body">

        <form action="/transaksi/simpan" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
 <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('idpengunjung'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('idpengunjung'); ?>
                </div>
            </div> -->


            < <div class="form-group">
                <label for="idpengunjung">Id Pengunjung </label>
                    <select class="form-control <?= ($validation->hasError('idpengunjung')) ? 'is-invalid' : ''; ?>" name="idpengunjung" id="idpengunjung" autofocus value="<?= old('idpengunjung'); ?>">
                    <?php foreach ($pengunjung as $row) : ?>
                        <option><?= $row['idpengunjung'];?></option>
                    <?php endforeach; ?>
                    </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('idpengunjung'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="idtiket">Id Tiket </label>
                    <select class="form-control <?= ($validation->hasError('idtiket')) ? 'is-invalid' : ''; ?>" name="idtiket" id="idtiket" autofocus value="<?= old('idtiket'); ?>">
                    <?php foreach ($tiket as $row) : ?>
                        <option><?= $row['idtiket'];?></option>
                    <?php endforeach; ?>
                    </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('idtiket'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal </label>
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" autofocus value="<?= old('tanggal'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="harga">Harga </label>
                <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" autofocus value="<?= old('harga'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('harga'); ?>
                </div>
            </div>
           
            <div class="form-group mb-4">
                <label for="jumlah">Jumlah </label>
                <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" autofocus value="<?= old('jumlah'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jumlah'); ?>
                </div>
            </div>
           
           

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/transaksi" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>