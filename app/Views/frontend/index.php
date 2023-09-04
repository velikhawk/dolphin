<?= $this->extend('layout/template_login'); ?>
<?= $this->section('content_login'); ?>

<!-- Page Heading -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">

        <div class="container">
            <a class="navbar-brand" href="/login">Login</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </div>
            </div>
        </div>
    </nav>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw fa-file-alt"></i> Portofolio</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <img src="/img/gambar2.jpg" width="500" >
          <h1 class="display-4">Jateng safari Beach</h1>
          <p class="lead">Safari Beach Jateng adalah wajah baru dari wisata Batang yang populer, yang bernama Batang Dolphin Center. Beda nama tentu saja beda konsep wisatanya, meskipun tidak menghilangkan konsep lama.

          Safari Beach Jateng sebagai bentuk pengembangan Dolphin Center. Jadi bukan hanya sekedar tentang lumba – lumba saja, atau hewan-hewan lainya.

Bahkan kondisi saat ini dari Safari Beach Jawa Tengah tertata lebih instagramable dengan latar pantai yang cantik. Dengan demikian Safari Beach sangat cocok menjadi destinasi wisata untuk semua usia di Batang.</p>
        </div>
      </div>

      
<div class="row ">
                <div class="col-lg-4">

                    <div class="card text-white bg-primary mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Location</h5>
                        </div>
                      </div>
                      <ul class="list-group">
                        <li class="list-group-item">Kantor</li>
                        <li class="list-group-item">Jalan Merdeka No 20</li>
                        <li class="list-group-item">Kota Pekalongan</li>
                        <li class="list-group-item">Jawa Tengah, Indonesia</li>
                      </ul>
                </div>

                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.057504834999!2d109.75444461477267!3d-6.883715295025752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70252a7455a203%3A0xd60d5eda9c5b9c46!2sSafari%20Beach%20Jateng!5e0!3m2!1sen!2sid!4v1672924834699!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        


<?= $this->endSection(); ?>