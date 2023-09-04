<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw  fa-user-circle"></i> Profile</h1>
</div> -->
<!-- <div class="row">
    <div class="col-6">
        <a href="/laporan" class="btn btn-secondary btn-icon-split mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
</div> -->



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw  fa-user-circle"></i> <?= $title; ?></h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-bg-primary mb-3">
                    <div class="card-header">Cetak Struk</div>
                    <div class="card-body">
                        <p class="card-text">
                        <form action="/Struk/cetakPengunjungPeriode" action="POST" class="user" target="_blank">
                            <div class="form-group">
                                <label for="idpengunjung"> Idpengunjung</label>
                                <input type="text" name="idpengunjung" id="idpengungjung" class="form-control" required>
                            </div>
                        
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-dark"><i class="fa fw fa-print"></i> Cetak Laporan</button>
                            </div>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<?= $this->endSection(); ?>