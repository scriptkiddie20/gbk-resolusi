<?= $this->extend('layout/landing') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<section class="header">
    <!-- Jumbotron -->
    <div class="card card-image">
        <div class=" text-white text-center rgba-stylish-strong py-5 px-4">
            <div class="py-5">

                <!-- Content -->
                <h2 class="card-title h2 my-4 py-2"><?= esc($title); ?></h2>
                <p class="mb-4 pb-2 px-md-5 mx-md-5"><?= esc($description); ?></p>
                <a href="#home" class="btn btn-primary btn-rounded"><i class="fas fa-clone left"></i> Pelajari</a>
                <a href="#product" class="btn btn-success btn-rounded"><i class="fas fa-clone left"></i> Mulai Bisnis</a>

            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>

<section class="home" id="home">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mx-auto">
                <h2 class="h2-responsive font-weight-bold my-4 py-2 text-center">Apakah sekarang anda di posisi ini ?</h2>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <ul class="ml-3">
                            <li>Seorang ibu rumah tangga yang ingin menambah penghasilan ?</li>
                            <li>Mau buka Toko Online tapi bingung cari supplier bajunya ?</li>
                            <li>Ingin berhenti menjadi karyawan dan mempunyai usaha sendiri ?</li>
                            <li>Atau apakah anda ingin mencoba memulai usaha grosir baju murah ?</li>
                        </ul>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <p>Jika anda sekarang diposisi tersebut, berarti anda sangat tepat sekali berada disini.
                            Perkenalkan <strong>grosirbajuku.com pusat grosir baju murah langsung dari pabrik terbaik & terpercaya sejak tahun 2008.</strong> Kami pastikan harga produk yg kami jual lebih murah dari grosiran lainnya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!--Zoom effect-->
                <div class="view overlay zoom d-flex justify-content-center">
                    <img src="/img/banner.jpg" class="img-fluid" alt="grosirbajuku.com">
                    <div class="mask flex-center waves-effect waves-light">
                        <p class="white-text">Grosirbajuku.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="kelebihan" id="kelebihan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="h2-responsive font-weight-bold my-4 py-2 text-center">Kelebihan kami :</h2>
                <div class="card-deck owl-carousel owl-theme">
                    <div class="card item">
                        <div class="card-body">
                            <h5 class="card-title">Harga langsung dari pabrik</h5>
                            <p class="card-text">Anda bisa menjual produk jauh lebih murah dari kompetitor anda.</p>
                        </div>
                    </div>
                    <div class="card item">
                        <div class="card-body">
                            <h5 class="card-title">Berpengalaman sejak 2008</h5>
                            <p class="card-text">Kami lebih paham masalah produk yang diinginkan customer. Setiap minggunya produk kami update menyesuaikan trend.</p>
                        </div>
                    </div>
                    <div class="card item">
                        <div class="card-body">
                            <h5 class="card-title">Banyak bekerja sama dengan ekspedisi.</h5>
                            <p class="card-text">Untuk anda yang diluar pulau, gak usah khawatir masalah ongkir. Karena kami disupport oleh banyak ekspedisi luar pulau. <strong>Harga ongkir bisa dibawah 10rb/kg.</strong></p>
                        </div>
                    </div>
                    <div class="card item">
                        <div class="card-body">
                            <h5 class="card-title">100% Return Product</h5>
                            <p class="card-text">Kami menjamin kualitas dari produk, sehingga kami memberi 100% return ketika ada produk yang cacat produksi. <strong>Selain cacat produksi, kami tidak menerima return</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product" id="product">
    <div class="container justify-content-center">
        <div class="row justify-content-center text-center">
            <div class="col-md-6">
                <h2 class="h2-responsive font-weight-bold my-4 py-2">Berikut produk kami :</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="owl-carousel owl-theme">
                    <?php foreach ($products as $p) : ?>
                        <div class="item">
                            <img src="<?= base_url() ?>/img/<?= ($p['image_product']) ?>" alt="<?= $p['product'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


</section>

<!--Section: Pricing v.2-->
<section class="pb-3 my-5" id="paket">
    <div class="container">
        <div class="row justify-content-center text-center mb-4">
            <div class="col-lg-8">
                <h2 class="h2-responsive font-weight-bold my-4 py-2">Paket Usaha Baju Murah</h2>
                <p>Khusus untuk pengusaha pemula, kami sudah siapkan <strong>paket usaha baju murah</strong> yg siap anda jual dengan harga jauh lebih murah dari pasaran.</p>
            </div>
        </div>
        <!--Grid row-->
        <div class="row justify-content-center">
            <!--Grid column-->
            <?php foreach ($packages as $pkg) : ?>
                <?php $db = db_connect();
                $query = $db->table('products')
                    ->selectSum('qtypackages', 'qty')
                    ->selectCount('product', 'prd')
                    ->where(['packages_id' => $pkg['id_packages']])
                    ->get();
                $calc = $query->getRow();
                ?>
                <div class="col-lg-4 col-md-12 mb-4">
                    <!-- Card -->
                    <div class="card card-image" style="background-image: url('/img/<?= $pkg['image_packages'] ?>');">

                        <!--Pricing card-->
                        <div class="text-white text-center pricing-card d-flex align-items-center <?= ($pkg['rekomend'] == 1 ? 'rgba-indigo-strong' : 'rgba-stylish-strong') ?> py-3 px-3">

                            <!--Content-->
                            <div class="card-body">
                                <h5><?= $pkg['package'] ?></h5>
                                <!--Price-->
                                <div class="price pt-0">
                                    <h1><?= $pkg['harga'] ?></h1>
                                </div>
                                <!--Price-->
                                <ul class="list-unstyled">
                                    <li>
                                        <p><strong><?= $pkg['berat'] ?></strong> Kg</p>
                                    </li>
                                    <li>
                                        <p><strong><?= $calc->qty ?></strong> Pcs</p>
                                    </li>
                                    <li>
                                        <p><strong><?= $calc->prd ?></strong> Model</p>
                                    </li>
                                </ul>
                                <p><?= $pkg['keterangan'] ?></p>
                                <button onclick="belipaket(<?= $pkg['id_packages'] ?> , '<?= $pkg['package'] . ' - ' . $pkg['harga'] ?>')" class="btn btn-deep-orange btn-rounded mb-4 waves-effect waves-light font-weight-bold" data-toggle="modal" data-target="#modalform">Beli Paket</button>
                            </div>

                        </div>
                        <!--Pricing card-->
                    </div>
                </div>
            <?php endforeach; ?>
            <!--Grid column-->
        </div>
        <!--Grid row-->

        <!-- Grid row -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="note note-danger"><strong>Hati-hati penipuan :</strong> Kami hanya menggunakan <span class="text-danger font-weight-bold">Rek Bank Mandiri (1560015885777) a/n : Wahyu Setiawan.</span> Jika mitra melakukan transaksi ke Selain no rekening tersebut, kami sepenuhnya tidak bertanggung jawab atas musibah yang terjadi.</p>
            </div>
        </div>
        <!-- Grid row -->
    </div>
</section>
<!--Section: Pricing v.2-->


<!-- Section: Testimonials v.2 -->
<section class="text-center my-5" id="testimoni">

    <!-- Section heading -->
    <h2 class="h1-responsive font-weight-bold">Masih ragu dengan kami ?</h2>
    <p>Biarkan para pengusaha ini yang menjelaskannya.</p>


    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/GFknDSo0Fho" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="owl-carousel owl-theme">
                    <div>
                        <img src="/img/01.jpg" alt="testimoni1">
                    </div>
                    <div>
                        <img src="/img/02.jpg" alt="testimoni1">
                    </div>
                    <div>
                        <img src="/img/03.jpg" alt="testimoni1">
                    </div>
                    <div>
                        <img src="/img/04~1.jpg" alt="testimoni1">
                    </div>
                    <div>
                        <img src="/img/05.jpg" alt="testimoni1">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="https://api.whatsapp.com/send?phone=<?= $cs['phone'] ?>" class="btn btn-deep-orange"><i class="fab fa-fw fa-whatsapp pr-2" aria-hidden="true"></i>Mulai Bisnis</a>
</section>
<!-- Section: Testimonials v.2 -->
<!-- /.container-fluid -->


<div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-hidden="true">
    <!--Modal: Contact form-->
    <div class="modal-dialog cascading-modal" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header info-color white-text">
                <h4 class="title font-weight-bold">
                    <i class="fas fa-box-open"></i> Form Pembelian Paket</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">

                <form action="/orderpaket" id="orderpaket" method="post">

                    <?= csrf_field() ?>
                    <?php if ($cs) : ?>
                        <input type="hidden" name="idusers" id="idusers" value="<?= $cs['id_karyawan'] ?>">
                        <input type="hidden" name="users" id="users" value="<?= $cs['nama'] ?>">
                        <input type="hidden" name="phonecs" id="phonecs" value="<?= $cs['phone'] ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="nama">Order Paket Apa ?</label>
                        <div class="input-group input-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-box-open"></i>
                                </span>
                            </div>
                            <select class="form-control <?= ($validation->hasError('paket') ? 'is-invalid' : '') ?>" id="paket" name="paket">
                                <option selected>-- Pilih paket --</option>
                                <?php foreach ($packages as $pkg) : ?>
                                    <option value="<?= $pkg['id_packages'] ?>"><?= $pkg['package'] . ' - ' . $pkg['harga'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('paket') ?>
                            </div>
                        </div>
                        <input type="hidden" name="package">
                    </div>

                    <!-- Default input name -->
                    <div class="form-group">
                        <label for="nama">Nama lengkap :</label>
                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('nama') ? 'is-invalid' : '') ?>" id="nama" name="nama" value="<?= old('nama') ?>" placeholder="Aceng gebeka..">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama') ?>
                        </div>
                    </div>
                    <br>

                    <!-- Default input email -->
                    <div class="form-group">
                        <label for="phone">No Hp :</label>
                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('phone') ? 'is-invalid' : '') ?>" id="phone" name="phone" value="<?= old('phone') ?>" placeholder="08211xxxx">
                        <div class="invalid-feedback">
                            <?= $validation->getError('phone') ?>
                        </div>
                    </div>
                    <br>

                    <!-- Default input subject -->
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap :</label>
                        <textarea type="text" id="alamat" name="alamat" value="<?= old('alamat') ?>" class="md-textarea form-control form-control-user <?= ($validation->hasError('alamat') ? 'is-invalid' : '') ?>" placeholder="Jl. Beruang raya blok ..."></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat') ?>
                        </div>
                    </div>
                    <br>

                    <!-- Default textarea message -->
                    <div class="form-group">
                        <label for="catatan">Catatan :</label>
                        <textarea type="text" id="catatan" name="catatan" value="<?= old('catatan') ?>" class="md-textarea form-control form-control-user" placeholder="Jika ada ..."></textarea>
                    </div>

                    <div class="text-center mt-4 mb-2">
                        <button id="btn-orderpaket" class="btn btn-info">Pesan Sekarang
                            <i class="fa fa-send ml-2"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
        <!--/.Content-->
    </div>
    <!--/Modal: Contact form-->
</div>


<?= $this->endSection(); ?>