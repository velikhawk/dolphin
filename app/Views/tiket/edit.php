<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Tiket</h6>
    </div>
    <div class="card-body">

        <form action="/tiket/update/<?= $tiket['idtiket']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="idtiket" value="<?= $tiket['idtiket']; ?>">
            
            <!-- <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                <div class=" invalid-feedback">
                <?= $validation->getError('nama'); ?>
                </div>
            </div> -->
            <div class="form-group">
                <label for="idwisata">Id Wisata </label>
                <select class="form-control <?= ($validation->hasError('idwisata')) ? 'is-invalid' : ''; ?>" id="idwisata" name="idwisata" autofocus value="<?= $tiket['idwisata']; ?>">
                <?php foreach($wisata as $row) : ?>
                    <option><?=$row['idwisata'];?></option>
                <?php endforeach; ?>
                </select>    
                <div class="invalid-feedback">
                    <?= $validation->getError('idwisata'); ?>
                </div>
            </div>


            <label class="">Jenis Tiket</label> 
                  <div class="">
                    <select class="form-select" name="jenistiket" aria-label="Default select example">
                      <option selected>-Pilih-</option>
                      <option value="weekend">Weekend</option>
                      <option value="weekday">Weekday</option>
                    </select>
                </div>
                    </div>

           

            <div class="form-group">
                <label for="harga"> Harga </label>
                <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" autofocus value="<?= $tiket['harga']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('harga'); ?>
                </div>
            </div>
                </div>
            
            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

            <a href="/tiket" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>