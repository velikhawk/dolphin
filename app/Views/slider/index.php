<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw fa-image"></i> Slider</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/img/gambar1.jpg" class="d-block w-100" alt="gambar">
          </div>
          <div class="carousel-item">
            <img src="/img/gambar2.jpg" class="d-block w-100" alt="gambar">
          </div>
        </div>
       <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>

      <div class="row ">
                <div class="col-lg-4">

                    <div class="card text-white bg-primary mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Location</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                      <ul class="list-group">
                        <li class="list-group-item">Kantor</li>
                        <li class="list-group-item">Jalan Merdeka No 20</li>
                        <li class="list-group-item">Kota Pekalongan</li>
                        <li class="list-group-item">Jawa Tengah, Indonesia</li>
                      </ul>
                </div>

                
                





<?= $this->endSection(); ?>