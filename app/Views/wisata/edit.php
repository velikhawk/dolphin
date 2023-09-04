<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>



<!-- Form tambah data -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-fw  fa-user-circle"></i> Form Edit Data Wisata</h6>
    </div>
    <div class="card-body">

        <form action="/wisata/update/<?= $wisata['idwisata']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="idwisata" value="<?= $wisata['idwisata']; ?>">

            <div class="form-group">
                <label for="nama">Nama Wisata</label>
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= $wisata['nama']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
            

            <div class="form-group">
                <label for="jeniswisata">Jenis Wisata </label>
                <input type="text" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="jeniswisata" name="jeniswisata" autofocus value="<?= $wisata['jeniswisata']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('price'); ?>
                </div>
            </div>

           
            <div class="form-group">
                <div class="col-sm-5">
                    <img class="img-thumbnail" src="/img/wisata/<?= $wisata['gambar']; ?>" height="20px">
                </div>
            </div>

            <div class="custom-file mb-3">
                <div class="col-sm-6">
                    <input type="file" class="form-control custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" autofocus value="<?= old('gambar'); ?>" id="gambar" name="gambar">
                    <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar...</label>
                    <div class="invalid-feedback"> <?= $validation->getError('gambar'); ?></div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit</button>

<a href="/wisata" class="btn btn-success"><i class="fas fa-undo"></i> Back</a>

        </form>
    </div>
</div>





<?= $this->endSection(); ?>