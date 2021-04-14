<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['employe'])) {
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container-fluid"  >
        <div class="card bg-white">
            <div class="card-header card-color" style="background-color: #004085">
            <p class="h2 text-center text-uppercase font-weight-bold pt-2">Statistiques</p>
        </div>
            <hr class="line-seprate">
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <a href="./index.php?p=classe" class="col-md-6 col-lg-3" style="display: block;margin-left: 250px;">
                            <div class="statistic__item statistic__item--green" >
                                <h2 class="number">...</h2>
                                <span class="desc">classe</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-accounts"></i>
                                </div>
                            </div>
                        </a>
                        <a href="./index.php?p=filiere" class="col-md-6 col-lg-3">

                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number">...</h2>
                                <span class="desc">filiere</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-group-work"></i>
                                </div>
                            </div>
                        </a>


                    </div>
                    <div class="row">


                        <canvas id="myChart" width="50" height="50"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            $.ajax({
                                url: 'http://localhost/PhpPro/controller/gestionClasse.php',
                                data: {op: 'countfiliere'},
                                type: 'POST',
                                success: function (data, textStatus, jqXHR) {
                                    
                                    var x = Array();
                                    var y = Array();
                                    data.forEach(function (e) {
                                        x.push(e.fil);
                                        y.push(e.nbr);
                                    });
                                    showGraph(x, y);
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                }
                            });
                            function showGraph(x, y) {
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: x,
                                        datasets: [{
                                                data: y,
                                                backgroundColor: [
                                                    'rgba(77, 166, 255, 0.5)',
                                                    'rgba(218, 165, 32, 0.5)',
                                                    'rgba(175, 0, 42, 0.5)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(77, 166, 255, 0.5)',
                                                    'rgba(218, 165, 32, 0.5)',
                                                    'rgba(175, 0, 42, 0.5)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 2
                                            }]
                                    },
                                    options: {
                                        
                                        scales: {
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Filière'
                                                }
                                            },
                                            y: {
                                                title: {
                                                    display: true,
                                                    text: 'Nombre de classes'
                                                }
                                            }
                                            
                                        },
                                        plugins: {
                                            title: {
                                                display: true,
                                                text: 'Nombre de classe par filière'
                                            }
                                        }
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="script/statistique.js" type="text/javascript"></script>
    <?php

} else {
    header("Location: ../index.php");
}
?>