<?php $v->layout("_theme"); ?>



<div class="card">
    <div class="card-header">
        <h4 class="card-title">Avisos</h4>
    </div>
    <div class="card-body">

        <div class="row gy-2">

            <?php foreach ($warnings as $warning) : ?>
                <div class="col-12">
                    <div class="bg-light-secondary position-relative rounded p-2">
                        <h6 class="d-flex align-items-center fw-bolder">
                            <span class="me-50"><?= $warning->warning ?> </span>
                        </h6>
                        <span>Publicado em: <?= date_fmt($warning->created_at); ?></span>

                    </div>
                </div>

            <?php endforeach; ?>

            <br />
            <a href="<?= url("/warnings"); ?>" class="role-edit-modal">
                <small class="fw-bolder">Saber Mais <i class="fas fa-arrow-right"></i></small>
            </a>

        </div>
    </div>
</div>

<section id="chartjs-chart">
    <div class="row">

        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                    <div class="header-left">
                        <h4 class="card-title">Dias da semana que você mais se exercita.</h4>
                    </div>

                </div>
                <div class="card-body">
                    <canvas class="bar-chart-ex chartjs" data-height="400"></canvas>
                </div>
            </div>
        </div>

    </div>
</section>

<?php $v->start("scripts"); ?>

<script>
    $(window).on("load", (function() {
        "use strict";
        var o = $(".chartjs"),
            r = $(".flat-picker"),
            t = $(".bar-chart-ex"),
            a = $(".horizontal-bar-chart-ex"),
            e = $(".line-chart-ex"),
            i = $(".radar-chart-ex"),
            l = $(".polar-area-chart-ex"),
            n = $(".bubble-chart-ex"),
            d = $(".doughnut-chart-ex"),
            s = $(".scatter-chart-ex"),
            c = $(".line-area-chart-ex"),
            p = "#836AF9",
            b = "#28dac6",
            C = "#ffe802",
            u = "#2c9aff",
            h = "#84D0FF",
            y = "#EDF1F4",
            g = "rgba(0, 0, 0, 0.25)",
            w = "#666ee8",
            f = "#ff4961",
            x = "#6e6b7b",
            k = "rgba(200, 200, 200, 0.2)";
        if ($("html").hasClass("dark-layout") && (x = "#b4b7bd"), o.length && o.each((function() {
                $(this).wrap($('<div style="height:' + this.getAttribute("data-height") + 'px"></div>'))
            })), r.length) {
            new Date;
            r.each((function() {
                $(this).flatpickr({
                    mode: "range",
                    defaultDate: ["2019-05-01", "2019-05-10"]
                })
            }))
        }
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

                    }]
                }
            },
            data: {
                labels: ["SEG", "TER", "QUA", "QUI", "SEX", "SAB", "DOM"],
                datasets: [{
                    data: [<?= $segunda ?>, <?= $terca ?>, <?= $quarta ?>, <?= $quinta ?>, <?= $sexta ?>, <?= $sabado ?>, <?= $domingo ?>],
                    barThickness: 15,
                    backgroundColor: b,
                    borderColor: "transparent"
                }]
            }
        });
        if (Chart.elements.Rectangle.prototype.draw = function() {
                var o, r, t, a, e, i, l, n = this._chart.ctx,
                    d = this._view,
                    s = d.borderWidth;
                if (d.horizontal ? (o = d.base, r = d.x, t = d.y - d.height / 2, a = d.y + d.height / 2, e = r > o ? 1 : -1, i = 1, l = d.borderSkipped || "left") : (o = d.x - d.width / 2, r = d.x + d.width / 2, e = 1, i = (t = d.y) > (a = d.base) ? 1 : -1, l = d.borderSkipped || "bottom"), s) {
                    var c = Math.min(Math.abs(o - r), Math.abs(t - a)),
                        p = (s = s > c ? c : s) / 2,
                        b = o + ("left" !== l ? p * e : 0),
                        C = r + ("right" !== l ? -p * e : 0),
                        u = t + ("top" !== l ? p * i : 0),
                        h = a + ("bottom" !== l ? -p * i : 0);
                    b !== C && (t = u, a = h), u !== h && (o = b, r = C)
                }
                n.beginPath(), n.fillStyle = d.backgroundColor, n.strokeStyle = d.borderColor, n.lineWidth = s;
                var y = [
                        [o, a],
                        [o, t],
                        [r, t],
                        [r, a]
                    ],
                    g = ["bottom", "left", "top", "right"].indexOf(l, 0);

                function w(o) {
                    return y[(g + o) % 4]
                } - 1 === g && (g = 0);
                var f = w(0);
                n.moveTo(f[0], f[1]);
                for (var x = 1; x < 4; x++) {
                    f = w(x);
                    var k = x + 1;
                    4 == k && (k = 0);
                    w(k);
                    var v, m = y[2][0] - y[1][0],
                        S = y[0][1] - y[1][1],
                        B = y[1][0],
                        A = y[1][1];
                    (v = 20) > S / 2 && (v = S / 2), v > m / 2 && (v = m / 2), d.horizontal ? (n.moveTo(B + v, A), n.lineTo(B + m - v, A), n.quadraticCurveTo(B + m, A, B + m, A + v), n.lineTo(B + m, A + S - v), n.quadraticCurveTo(B + m, A + S, B + m - v, A + S), n.lineTo(B + v, A + S), n.quadraticCurveTo(B, A + S, B, A + S), n.lineTo(B, A + v), n.quadraticCurveTo(B, A, B, A)) : (n.moveTo(B + v, A), n.lineTo(B + m - v, A), n.quadraticCurveTo(B + m, A, B + m, A + v), n.lineTo(B + m, A + S - v), n.quadraticCurveTo(B + m, A + S, B + m, A + S), n.lineTo(B + v, A + S), n.quadraticCurveTo(B, A + S, B, A + S), n.lineTo(B, A + v), n.quadraticCurveTo(B, A, B + v, A))
                }
                n.fill(), s && n.stroke()
            }, a.length && new Chart(a, {
                type: "horizontalBar",
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderSkipped: "right"
                        }
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
                    responsive: !0,
                    maintainAspectRatio: !1,
                    responsiveAnimationDuration: 500,
                    legend: {
                        display: !1
                    },
                    layout: {
                        padding: {
                            bottom: -30,
                            left: -25
                        }
                    },
                    scales: {
                        xAxes: [{
                            display: !0,
                            gridLines: {
                                zeroLineColor: k,
                                borderColor: "transparent",
                                color: k
                            },
                            scaleLabel: {
                                display: !0
                            },
                            ticks: {
                                min: 0,
                                fontColor: x
                            }
                        }],
                        yAxes: [{
                            display: !0,
                            gridLines: {
                                display: !1
                            },
                            scaleLabel: {
                                display: !0
                            },
                            ticks: {
                                fontColor: x
                            }
                        }]
                    }
                },
                data: {
                    labels: ["MON", "TUE", "WED ", "THU", "FRI", "SAT", "SUN"],
                    datasets: [{
                        data: [710, 350, 470, 580, 230, 460, 120],
                        barThickness: 15,
                        backgroundColor: window.colors.solid.info,
                        borderColor: "transparent"
                    }]
                }
            }), e.length) new Chart(e, {
            type: "line",
            plugins: [{
                beforeInit: function(o) {
                    o.legend.afterFit = function() {
                        this.height += 20
                    }
                }
            }],
            options: {
                responsive: !0,
                maintainAspectRatio: !1,
                backgroundColor: !1,
                hover: {
                    mode: "label"
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
                layout: {
                    padding: {
                        top: -15,
                        bottom: -25,
                        left: -15
                    }
                },
                scales: {
                    xAxes: [{
                        display: !0,
                        scaleLabel: {
                            display: !0
                        },
                        gridLines: {
                            display: !0,
                            color: k,
                            zeroLineColor: k
                        },
                        ticks: {
                            fontColor: x
                        }
                    }],
                    yAxes: [{
                        display: !0,
                        scaleLabel: {
                            display: !0
                        },
                        ticks: {
                            stepSize: 100,
                            min: 0,
                            max: 400,
                            fontColor: x
                        },
                        gridLines: {
                            display: !0,
                            color: k,
                            zeroLineColor: k
                        }
                    }]
                },
                legend: {
                    position: "top",
                    align: "start",
                    labels: {
                        usePointStyle: !0,
                        padding: 25,
                        boxWidth: 9
                    }
                }
            },
            data: {
                labels: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140],
                datasets: [{
                    data: [80, 150, 180, 270, 210, 160, 160, 202, 265, 210, 270, 255, 290, 360, 375],
                    label: "Europe",
                    borderColor: f,
                    lineTension: .5,
                    pointStyle: "circle",
                    backgroundColor: f,
                    fill: !1,
                    pointRadius: 1,
                    pointHoverRadius: 5,
                    pointHoverBorderWidth: 5,
                    pointBorderColor: "transparent",
                    pointHoverBorderColor: window.colors.solid.white,
                    pointHoverBackgroundColor: f,
                    pointShadowOffsetX: 1,
                    pointShadowOffsetY: 1,
                    pointShadowBlur: 5,
                    pointShadowColor: g
                }, {
                    data: [80, 125, 105, 130, 215, 195, 140, 160, 230, 300, 220, 170, 210, 200, 280],
                    label: "Asia",
                    borderColor: w,
                    lineTension: .5,
                    pointStyle: "circle",
                    backgroundColor: w,
                    fill: !1,
                    pointRadius: 1,
                    pointHoverRadius: 5,
                    pointHoverBorderWidth: 5,
                    pointBorderColor: "transparent",
                    pointHoverBorderColor: window.colors.solid.white,
                    pointHoverBackgroundColor: w,
                    pointShadowOffsetX: 1,
                    pointShadowOffsetY: 1,
                    pointShadowBlur: 5,
                    pointShadowColor: g
                }, {
                    data: [80, 99, 82, 90, 115, 115, 74, 75, 130, 155, 125, 90, 140, 130, 180],
                    label: "Africa",
                    borderColor: C,
                    lineTension: .5,
                    pointStyle: "circle",
                    backgroundColor: C,
                    fill: !1,
                    pointRadius: 1,
                    pointHoverRadius: 5,
                    pointHoverBorderWidth: 5,
                    pointBorderColor: "transparent",
                    pointHoverBorderColor: window.colors.solid.white,
                    pointHoverBackgroundColor: C,
                    pointShadowOffsetX: 1,
                    pointShadowOffsetY: 1,
                    pointShadowBlur: 5,
                    pointShadowColor: g
                }]
            }
        });
        if (i.length) {
            var v = document.getElementById("canvas"),
                m = v.getContext("2d").createLinearGradient(0, 0, 0, 150);
            m.addColorStop(0, "rgba(155,136,250, 0.9)"), m.addColorStop(1, "rgba(155,136,250, 0.8)");
            var S = v.getContext("2d").createLinearGradient(0, 0, 0, 150);
            S.addColorStop(0, "rgba(255,161,161, 0.9)"), S.addColorStop(1, "rgba(255,161,161, 0.8)");
            new Chart(i, {
                type: "radar",
                plugins: [{
                    beforeInit: function(o) {
                        o.legend.afterFit = function() {
                            this.height += 20
                        }
                    }
                }],
                data: {
                    labels: ["STA", "STR", "AGI", "VIT", "CHA", "INT"],
                    datasets: [{
                        label: "Donté Panlin",
                        data: [25, 59, 90, 81, 60, 82],
                        fill: !0,
                        backgroundColor: S,
                        borderColor: "transparent",
                        pointBackgroundColor: "transparent",
                        pointBorderColor: "transparent"
                    }, {
                        label: "Mireska Sunbreeze",
                        data: [40, 100, 40, 90, 40, 90],
                        fill: !0,
                        backgroundColor: m,
                        borderColor: "transparent",
                        pointBackgroundColor: "transparent",
                        pointBorderColor: "transparent"
                    }]
                },
                options: {
                    responsive: !0,
                    maintainAspectRatio: !1,
                    responsiveAnimationDuration: 500,
                    legend: {
                        position: "top",
                        labels: {
                            padding: 25,
                            fontColor: x
                        }
                    },
                    layout: {
                        padding: {
                            top: -20
                        }
                    },
                    tooltips: {
                        enabled: !1,
                        custom: function(o) {
                            var r = document.getElementById("tooltip");
                            o.body ? (r.style.display = "block", o.body[0].lines && o.body[0].lines[0] && (r.innerHTML = o.body[0].lines[0])) : setTimeout((function() {
                                r.style.display = "none"
                            }), 500)
                        }
                    },
                    gridLines: {
                        display: !1
                    },
                    scale: {
                        ticks: {
                            maxTicksLimit: 1,
                            display: !1,
                            fontColor: x
                        },
                        gridLines: {
                            color: k
                        },
                        angleLines: {
                            color: k
                        }
                    }
                }
            })
        }
        if (l.length) new Chart(l, {
            type: "polarArea",
            options: {
                responsive: !0,
                maintainAspectRatio: !1,
                responsiveAnimationDuration: 500,
                legend: {
                    position: "right",
                    labels: {
                        usePointStyle: !0,
                        padding: 25,
                        boxWidth: 9,
                        fontColor: x
                    }
                },
                layout: {
                    padding: {
                        top: -5,
                        bottom: -45
                    }
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
                scale: {
                    scaleShowLine: !0,
                    scaleLineWidth: 1,
                    ticks: {
                        display: !1,
                        fontColor: x
                    },
                    reverse: !1,
                    gridLines: {
                        display: !1
                    }
                },
                animation: {
                    animateRotate: !1
                }
            },
            data: {
                labels: ["Africa", "Asia", "Europe", "America", "Antarctica", "Australia"],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: [p, C, window.colors.solid.primary, "#299AFF", "#4F5D70", b],
                    data: [19, 17.5, 15, 13.5, 11, 9],
                    borderWidth: 0
                }]
            }
        });
        if (n.length) new Chart(n, {
            type: "bubble",
            options: {
                responsive: !0,
                maintainAspectRatio: !1,
                scales: {
                    xAxes: [{
                        display: !0,
                        gridLines: {
                            color: k,
                            zeroLineColor: k
                        },
                        ticks: {
                            stepSize: 10,
                            min: 0,
                            max: 140,
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
                },
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
                }
            },
            data: {
                animation: {
                    duration: 1e4
                },
                datasets: [{
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 20,
                        y: 74,
                        r: 10
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 30,
                        y: 72,
                        r: 5
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 10,
                        y: 110,
                        r: 5
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 40,
                        y: 110,
                        r: 7
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 20,
                        y: 135,
                        r: 6
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 10,
                        y: 160,
                        r: 12
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 30,
                        y: 165,
                        r: 7
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 40,
                        y: 200,
                        r: 20
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 90,
                        y: 185,
                        r: 7
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 50,
                        y: 240,
                        r: 7
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 60,
                        y: 275,
                        r: 10
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 70,
                        y: 305,
                        r: 5
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 80,
                        y: 325,
                        r: 4
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 50,
                        y: 285,
                        r: 5
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 60,
                        y: 235,
                        r: 5
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 70,
                        y: 275,
                        r: 7
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 80,
                        y: 290,
                        r: 4
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 90,
                        y: 250,
                        r: 10
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 100,
                        y: 220,
                        r: 7
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 120,
                        y: 230,
                        r: 4
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 110,
                        y: 320,
                        r: 15
                    }]
                }, {
                    backgroundColor: C,
                    borderColor: C,
                    data: [{
                        x: 130,
                        y: 330,
                        r: 7
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 100,
                        y: 310,
                        r: 5
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 110,
                        y: 240,
                        r: 5
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 120,
                        y: 270,
                        r: 7
                    }]
                }, {
                    backgroundColor: p,
                    borderColor: p,
                    data: [{
                        x: 130,
                        y: 300,
                        r: 6
                    }]
                }]
            }
        });
        if (d.length) new Chart(d, {
            type: "doughnut",
            options: {
                responsive: !0,
                maintainAspectRatio: !1,
                responsiveAnimationDuration: 500,
                cutoutPercentage: 60,
                legend: {
                    display: !1
                },
                tooltips: {
                    callbacks: {
                        label: function(o, r) {
                            return " " + (r.datasets[0].labels[o.index] || "") + " : " + r.datasets[0].data[o.index] + " %"
                        }
                    },
                    shadowOffsetX: 1,
                    shadowOffsetY: 1,
                    shadowBlur: 8,
                    shadowColor: g,
                    backgroundColor: window.colors.solid.white,
                    titleFontColor: window.colors.solid.black,
                    bodyFontColor: window.colors.solid.black
                }
            },
            data: {
                datasets: [{
                    labels: ["Tablet", "Mobile", "Desktop"],
                    data: [10, 10, 80],
                    backgroundColor: [b, "#FDAC34", window.colors.solid.primary],
                    borderWidth: 0,
                    pointStyle: "rectRounded"
                }]
            }
        });
        if (s.length) new Chart(s, {
            type: "scatter",
            plugins: [{
                beforeInit: function(o) {
                    o.legend.afterFit = function() {
                        this.height += 20
                    }
                }
            }],
            options: {
                responsive: !0,
                maintainAspectRatio: !1,
                responsiveAnimationDuration: 800,
                title: {
                    display: !1,
                    text: "Chart.js Scatter Chart"
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
                        gridLines: {
                            color: k,
                            zeroLineColor: k
                        },
                        ticks: {
                            stepSize: 10,
                            min: 0,
                            max: 140,
                            fontColor: x
                        }
                    }],
                    yAxes: [{
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
                },
                legend: {
                    position: "top",
                    align: "start",
                    labels: {
                        usePointStyle: !0,
                        padding: 25,
                        boxWidth: 9
                    }
                },
                layout: {
                    padding: {
                        top: -20
                    }
                }
            },
            data: {
                datasets: [{
                    label: "iPhone",
                    data: [{
                        x: 72,
                        y: 225
                    }, {
                        x: 81,
                        y: 270
                    }, {
                        x: 90,
                        y: 230
                    }, {
                        x: 103,
                        y: 305
                    }, {
                        x: 103,
                        y: 245
                    }, {
                        x: 108,
                        y: 275
                    }, {
                        x: 110,
                        y: 290
                    }, {
                        x: 111,
                        y: 315
                    }, {
                        x: 109,
                        y: 350
                    }, {
                        x: 116,
                        y: 340
                    }, {
                        x: 113,
                        y: 260
                    }, {
                        x: 117,
                        y: 275
                    }, {
                        x: 117,
                        y: 295
                    }, {
                        x: 126,
                        y: 280
                    }, {
                        x: 127,
                        y: 340
                    }, {
                        x: 133,
                        y: 330
                    }],
                    backgroundColor: window.colors.solid.primary,
                    borderColor: "transparent",
                    pointBorderWidth: 2,
                    pointHoverBorderWidth: 2,
                    pointRadius: 5
                }, {
                    label: "Samsung Note",
                    data: [{
                        x: 13,
                        y: 95
                    }, {
                        x: 22,
                        y: 105
                    }, {
                        x: 17,
                        y: 115
                    }, {
                        x: 19,
                        y: 130
                    }, {
                        x: 21,
                        y: 125
                    }, {
                        x: 35,
                        y: 125
                    }, {
                        x: 13,
                        y: 155
                    }, {
                        x: 21,
                        y: 165
                    }, {
                        x: 25,
                        y: 155
                    }, {
                        x: 18,
                        y: 190
                    }, {
                        x: 26,
                        y: 180
                    }, {
                        x: 43,
                        y: 180
                    }, {
                        x: 53,
                        y: 202
                    }, {
                        x: 61,
                        y: 165
                    }, {
                        x: 67,
                        y: 225
                    }],
                    backgroundColor: "#ffe800",
                    borderColor: "transparent",
                    pointRadius: 5
                }, {
                    label: "OnePlus",
                    data: [{
                        x: 70,
                        y: 195
                    }, {
                        x: 72,
                        y: 270
                    }, {
                        x: 98,
                        y: 255
                    }, {
                        x: 100,
                        y: 215
                    }, {
                        x: 87,
                        y: 240
                    }, {
                        x: 94,
                        y: 280
                    }, {
                        x: 99,
                        y: 300
                    }, {
                        x: 102,
                        y: 290
                    }, {
                        x: 110,
                        y: 275
                    }, {
                        x: 111,
                        y: 250
                    }, {
                        x: 94,
                        y: 280
                    }, {
                        x: 92,
                        y: 340
                    }, {
                        x: 100,
                        y: 335
                    }, {
                        x: 108,
                        y: 330
                    }],
                    backgroundColor: b,
                    borderColor: "transparent",
                    pointBorderWidth: 2,
                    pointHoverBorderWidth: 2,
                    pointRadius: 5
                }]
            }
        });
        c.length && new Chart(c, {
            type: "line",
            plugins: [{
                beforeInit: function(o) {
                    o.legend.afterFit = function() {
                        this.height += 20
                    }
                }
            }],
            options: {
                responsive: !0,
                maintainAspectRatio: !1,
                legend: {
                    position: "top",
                    align: "start",
                    labels: {
                        usePointStyle: !0,
                        padding: 25,
                        boxWidth: 9
                    }
                },
                layout: {
                    padding: {
                        top: -20,
                        bottom: -20,
                        left: -20
                    }
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
                            color: "transparent",
                            zeroLineColor: k
                        },
                        scaleLabel: {
                            display: !0
                        },
                        ticks: {
                            fontColor: x
                        }
                    }],
                    yAxes: [{
                        display: !0,
                        gridLines: {
                            color: "transparent",
                            zeroLineColor: k
                        },
                        ticks: {
                            stepSize: 100,
                            min: 0,
                            max: 400,
                            fontColor: x
                        },
                        scaleLabel: {
                            display: !0
                        }
                    }]
                }
            },
            data: {
                labels: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12", "16/12", "17/12", "18/12", "19/12", "20/12", ""],
                datasets: [{
                    label: "Africa",
                    data: [40, 55, 45, 75, 65, 55, 70, 60, 100, 98, 90, 120, 125, 140, 155],
                    lineTension: 0,
                    backgroundColor: u,
                    pointStyle: "circle",
                    borderColor: "transparent",
                    pointRadius: .5,
                    pointHoverRadius: 5,
                    pointHoverBorderWidth: 5,
                    pointBorderColor: "transparent",
                    pointHoverBackgroundColor: u,
                    pointHoverBorderColor: window.colors.solid.white
                }, {
                    label: "Asia",
                    data: [70, 85, 75, 150, 100, 140, 110, 105, 160, 150, 125, 190, 200, 240, 275],
                    lineTension: 0,
                    backgroundColor: h,
                    pointStyle: "circle",
                    borderColor: "transparent",
                    pointRadius: .5,
                    pointHoverRadius: 5,
                    pointHoverBorderWidth: 5,
                    pointBorderColor: "transparent",
                    pointHoverBackgroundColor: h,
                    pointHoverBorderColor: window.colors.solid.white
                }, {
                    label: "Europe",
                    data: [240, 195, 160, 215, 185, 215, 185, 200, 250, 210, 195, 250, 235, 300, 315],
                    lineTension: 0,
                    backgroundColor: y,
                    pointStyle: "circle",
                    borderColor: "transparent",
                    pointRadius: .5,
                    pointHoverRadius: 5,
                    pointHoverBorderWidth: 5,
                    pointBorderColor: "transparent",
                    pointHoverBackgroundColor: y,
                    pointHoverBorderColor: window.colors.solid.white
                }]
            }
        })
    }));
</script>

<?php $v->end(); ?>