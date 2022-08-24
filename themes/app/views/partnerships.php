<?php $v->layout("_theme"); ?>

<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0" style="margin-right: 15px;">Parcerias</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= url("/"); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Parcerias
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content-body">
    <section id="card-text-alignment">
<!--        <h5 class="mt-3 mb-2">Text Alignment</h5>-->
        <div class="row">

            <?php foreach ($partnerships as $partnership) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-developer-meetup">
                        <div class="meetup-img-wrapper rounded-top text-center">
                            <img src="<?= urlExterna("/storage/{$partnership->image}") ?>" alt="Meeting Pic" height="170" />
                        </div>
                        <div class="card-body">
                            <div class="meetup-header d-flex align-items-center">

                                <div class="my-auto">
                                    <h4 class="card-title mb-25"><?= $partnership->name ?></h4>
                                    <p class="card-text mb-0"><?= $partnership->description ?></p>
                                </div>
                            </div>
                            <div class="mt-0">
                                <div class="avatar float-start bg-light-primary rounded me-1">
                                    <div class="avatar-content">
                                        <i data-feather="phone" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="more-info">
                                    <h6 class="mb-0">Contato</h6>
                                    <small class="mask-phone"><?= $partnership->phone ?></small>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="avatar float-start bg-light-primary rounded me-1">
                                    <div class="avatar-content">
                                        <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="more-info">
                                    <h6 class="mb-0">Endereço</h6>
                                    <small><?= $partnership->address ?></small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>
</div>