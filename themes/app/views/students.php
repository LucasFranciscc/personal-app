<?php $v->layout("_theme"); ?>

<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
        cursor: default;
        color: #ffffff !important;
        border: 1px solid transparent;
        background: #a5151500;
        box-shadow: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        box-sizing: border-box;
        display: inline-block;
        min-width: 1.5em;
        padding: 0.5em 1em;
        margin-left: 2px;
        text-align: center;
        text-decoration: none !important;
        cursor: pointer;
        *cursor: hand;
        color: #fff !important;
        border: 1px solid transparent;
        border-radius: 2px;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #aaa;
        border-radius: 3px;
        padding: 5px;
        background-color: #ffffff;
        margin-left: 3px;
    }

    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #aaa;
        border-radius: 3px;
        padding: 5px;
        background-color: white;
        padding: 4px;
    }
</style>

<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0" style="margin-right: 15px;">Alunos</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= url("/"); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Alunos
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section id="multilingual-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-datatable">
                    <table class="dt-multilingual table" id="example">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Chat</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($students as $student) : ?>
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <img src="<?= urlExterna("/storage/$student->photo"); ?>" class="uploadedAvatar rounded me-50" width="50" alt="profile image" width="100" />
                                        </div>
                                    </td>
                                    <td><?= $student->name ?></td>
                                    <td><?= $student->access_level_id() ?></td>
                                    <td>
                                        <a href="<?= url("/chat/$student->id") ?>" class="btn btn-outline-info">
                                            <i class="fab fa-rocketchat"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $v->start("scripts"); ?>

<script>
    $(window).on("load", (function() {
        "use strict";
        var t = $(".bar-chart-ex"),


            if (t.length) new Chart(t, {
                type: "bar",
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderSkipped: "bottom"
                        }
                    },
                    responsive: !0,
                    maintainAspectRatio: !1,
                    responsiveAnimationDuration: 500,
                    legend: {
                        display: !1
                    },
                    tooltips: {
                        shadowOffsetX: 1,
                        shadowOffsetY: 1,
                        shadowBlur: 8,
                        shadowColor: g,
                        backgroundColor: window.colors.solid.white,
                        titleFontColor: window.colors.solid.black,
                        bodyFontColor: window.colors.solid.black
                    },
                    scales: {
                        xAxes: [{
                            display: !0,
                            gridLines: {
                                display: !0,
                                color: k,
                                zeroLineColor: k
                            },
                            scaleLabel: {
                                display: !1
                            },
                            ticks: {
                                fontColor: x
                            }
                        }],
                        yAxes: [{
                            display: !0,
                            gridLines: {
                                color: k,
                                zeroLineColor: k
                            },
                            ticks: {
                                stepSize: 100,
                                min: 0,
                                max: 400,
                                fontColor: x
                            }
                        }]
                    }
                },
                data: {
                    labels: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12", "16/12", "17/12"],
                    datasets: [{
                        data: [275, 90, 190, 205, 125, 85, 55, 87, 127, 150, 230, 280, 190],
                        barThickness: 15,
                        backgroundColor: b,
                        borderColor: "transparent"
                    }]
                }
            });






    }));
</script>

<?php $v->end(); ?>