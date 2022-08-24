<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>


<div class="row">

    <div class="col">
        <div class="card shadow-sm">

            <iframe src="https://www.youtube.com/embed/kbSb-4hPK6A"
                    frameborder="0" height="500px"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>

            <div class="card-body" style="text-align: center">
                <h5 class="card-title mb-3 mt-2">Entenda como a plataforma funciona.</h5>

                <a class="btn btn-primary" style="color: #FFFFFF" onclick="proseeguirVideo1()">Prosseguir </a>
            </div>
        </div>
    </div>


    <!---->
    <!---->
    <!--<div class="col-10 mt-2">-->
    <!--    <div class="card">-->
    <!--        <div class="card-content">-->
    <!---->
    <!---->
    <!--            <div class="card-image business-card" style="width: 295px; margin-left: 40px">-->
    <!--                <div class="holder-image">-->
    <!---->
    <!--                    <iframe src="https://www.youtube.com/embed/d5xdp8aQJbw"-->
    <!--                            frameborder="0" width="298px" height="500px"-->
    <!--                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"-->
    <!--                            allowfullscreen>-->
    <!--                    </iframe>-->
    <!---->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="card-body" style="text-align: center">-->
    <!--                <h5 class="card-title mb-3 mt-2">Seja Bem-vindo!</h5>-->
    <!---->
    <!--                <a class="btn btn-primary" style="color: #FFFFFF" onclick="proseeguirVideo1()">Prosseguir </a>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!---->

    <script src="<?= url("shared/scripts/jquery.min.js") ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>

    <script>

        function proseeguirVideo1() {
            $.ajax({
                url: "/videoupdate2/<?= $user_id ?>",
                type: "POST",
                data: {action: 'update'},
                success: function (obj) {
                    console.log(obj);
                    window.location.href = "<?= url("/home") ?>";
                }
            });
        }

    </script>

    <!-- END: Template JS-->

    <!-- START: APP JS-->
    <!--<script src="--><? //= url("shared/app/js/app.js") ?><!--"></script>-->
    <!-- END: APP JS-->
</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/ui-cards.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 19:40:27 GMT -->
</html>
