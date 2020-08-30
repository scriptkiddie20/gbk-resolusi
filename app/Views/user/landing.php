<?= $this->extend('layout/landing') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<section class="header">
    <!-- Jumbotron -->
    <div class="card card-image">
        <div class=" text-white text-center rgba-stylish-strong py-5 px-4">
            <div class="py-5">

                <!-- Content -->
                <h5 class="h5 orange-text"><i class="fas fa-camera-retro"></i> Photography</h5>
                <h2 class="card-title h2 my-4 py-2">Jumbotron with image overlay</h2>
                <p class="mb-4 pb-2 px-md-5 mx-md-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur obcaecati vero aliquid libero doloribus ad, unde tempora maiores, ullam, modi qui quidem minima debitis perferendis vitae cumque et quo impedit.</p>
                <a class="btn peach-gradient"><i class="fas fa-clone left"></i> View project</a>

            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>

<section class="products">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="h2 my-4 py-2 text-center">Jumbotron with image overlay</h2>

        </div>
    </div>

    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-10">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($product as $p) : ?>
                        <div class="item">
                            <img src="/img/<?= $p['image_product'] ?>" alt="<?= $p['product'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


</section>

<!--Section: Pricing v.2-->
<section class="pb-3 my-5">
    <div class="container">
        <!--Grid row-->
        <div class="row justify-content-center">
            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">
                <!-- Card -->
                <div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(6).jpg');">

                    <!--Pricing card-->
                    <div class="text-white text-center pricing-card d-flex align-items-center rgba-stylish-strong py-3 px-3">

                        <!--Content-->
                        <div class="card-body">
                            <h5>Basic</h5>
                            <!--Price-->
                            <div class="price pt-0">
                                <h1>10</h1>
                            </div>
                            <!--Price-->
                            <ul class="striped">
                                <li>
                                    <p><strong>1</strong> project</p>
                                </li>
                                <li>
                                    <p><strong>100</strong> components</p>
                                </li>
                                <li>
                                    <p><strong>150</strong> features</p>
                                </li>
                                <li>
                                    <p><strong>200</strong> members</p>
                                </li>
                                <li>
                                    <p><strong>250</strong> messages</p>
                                </li>
                            </ul>
                            <a class="btn btn-outline-white"> Buy now</a>
                        </div>

                    </div>
                    <!--Pricing card-->
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

                <!-- Card -->
                <div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(4).jpg');">

                    <!--Pricing card-->
                    <div class="text-white text-center pricing-card d-flex align-items-center rgba-indigo-strong py-3 px-3">

                        <!--Content-->
                        <div class="card-body">
                            <h5>Pro</h5>
                            <!--Price-->
                            <div class="price pt-0">
                                <h1>20</h1>
                            </div>
                            <!--Price-->
                            <ul class="striped">
                                <li>
                                    <p><strong>3</strong> projects</p>
                                </li>
                                <li>
                                    <p><strong>200</strong> components</p>
                                </li>
                                <li>
                                    <p><strong>250</strong> features</p>
                                </li>
                                <li>
                                    <p><strong>300</strong> members</p>
                                </li>
                                <li>
                                    <p><strong>350</strong> messages</p>
                                </li>
                            </ul>
                            <a class="btn btn-outline-white"> Buy now</a>
                        </div>

                    </div>
                    <!--Pricing card-->
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

                <!-- Card -->
                <div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(6).jpg');">

                    <!--Pricing card-->
                    <div class="text-white text-center pricing-card d-flex align-items-center rgba-stylish-strong py-3 px-3">

                        <!--Content-->
                        <div class="card-body">
                            <h5>Enterprise</h5>
                            <!--Price-->
                            <div class="price pt-0">
                                <h1>30</h1>
                            </div>
                            <!--Price-->
                            <ul class="striped">
                                <li>
                                    <p><strong>5</strong> projects</p>
                                </li>
                                <li>
                                    <p><strong>300</strong> components</p>
                                </li>
                                <li>
                                    <p><strong>350</strong> features</p>
                                </li>
                                <li>
                                    <p><strong>400</strong> members</p>
                                </li>
                                <li>
                                    <p><strong>450</strong> messages</p>
                                </li>
                            </ul>
                            <a class="btn btn-outline-white"> Buy now</a>
                        </div>

                    </div>
                    <!--Pricing card-->
                </div>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
</section>
<!--Section: Pricing v.2-->
<!-- /.container-fluid -->






<div class="text-center">
    <a href="" class="btn btn-default btn-rounded mb-4 waves-effect waves-light" data-toggle="modal" data-target="#modalDefaultContactForm">Launch Modal Contact Form</a>
</div>



<div class="modal fade" id="modalDefaultContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--Modal: Contact form-->
    <div class="modal-dialog cascading-modal" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header info-color white-text">
                <h4 class="title">
                    <i class="fa fa-pencil-alt"></i> Contact form</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">


                <div class="input-group input-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-box-open"></i>
                        </span>
                    </div>
                    <select class="form-control" id="paket" name="paket">
                        <option selected>-- Pilih paket --</option>
                        <option>-- Pilih paket --</option>
                        <option>-- Pilih paket --</option>
                    </select>
                </div>

                <!-- Default input name -->
                <label for="defaultFormNameModalEx">Nama Lengkap :</label>
                <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm">

                <br>

                <!-- Default input email -->
                <label for="defaultFormEmailModalEx">No Hp :</label>
                <input type="password" id="defaultFormEmailModalEx" class="form-control form-control-sm">

                <br>

                <!-- Default input subject -->
                <label for="defaultFormSubjectModalEx">Alamat :</label>
                <input type="text" id="defaultFormSubjectModalEx" class="form-control form-control-sm">

                <br>

                <!-- Default textarea message -->
                <label for="defaultFormMessageModalEx">Catatan :</label>
                <textarea type="text" id="defaultFormMessageModalEx" class="md-textarea form-control"></textarea>

                <div class="text-center mt-4 mb-2">
                    <button class="btn btn-info">Send
                        <i class="fa fa-send ml-2"></i>
                    </button>
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
    <!--/Modal: Contact form-->
</div>


<?= $this->endSection(); ?>