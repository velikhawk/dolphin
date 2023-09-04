<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Kamar</h6>
    </div>
    <div class="card-body">

        <form action="/transaksi/update/<?= $transaksi['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $transaksi['id']; ?>">
           

            <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('idpengunjung'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('idpengunjung'); ?>
                </div>
            </div> -->


            <div class="form-group">
                <label for="idpengunjung">Id pengunjung </label>
                <select class="form-control <?= ($validation->hasError('idpengunjung')) ? 'is-invalid' : ''; ?>" id="idpengunjung" name="idpengunjung" autofocus value="<?= $transaksi['idpengunjung']; ?>">
                <?php foreach($pengunjung as $row) : ?>
                    <option><?=$row['idpengunjung'];?></option>
                <?php endforeach; ?>
                </select>    
                <div class="invalid-feedback">
                    <?= $validation->getError('idpengunjung'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="idtiket">Id Tiket </label>
                <select class="form-control <?= ($validation->hasError('idtiket')) ? 'is-invalid' : ''; ?>" id="idtiket" name="idtiket" autofocus value="<?= $transaksi['idtiket']; ?>">
                <?php foreach($tiket as $row) : ?>
                    <option><?=$row['idtiket'];?></option>
                <?php endforeach; ?>
                </select>    
                <div class="invalid-feedback">
                    <?= $validation->getError('idtiket'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="tanggal"> Tanggal </label>
                <input type="text" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" autofocus value="<?= $transaksi['tanggal']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>

            <div class="form-group mb-4">
                <label for="duration">Duration </label>
                <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" autofocus value="<?= $transaksi['harga']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('harga'); ?>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="jumlah">Jumlah </label>
                <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" autofocus value="<?= $transaksi['jumlah']; ?>">
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