<?php
    require 'kanban.controller.php';

    if(isset($_GET['refresh'])){
        header('location: carregarDashboard.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Dark Style</title>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="./assets/css/stylesDashboard.css" />
  </head>

  <body>
    <div id="wrapper">
      <div class="content-area">
        <div class="container-fluid">
          <div class="text-right mt-3 mb-3 d-fixed">
          </div>
          <div class="main">
            <div class="row sparkboxes mt-4">
              <div class="col-md-3">
                <div class="box box1">
                  <div class="details">
                  <?php $qtdP=0; foreach($projArray as $project){ $qtdP++; } ?>
                    <h3><?php echo $qtdP; ?> </h3>
                    <h4>Totais de Projetos</h4>
                  </div>
                  <div id="spark1"></div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box box2">
                  <div class="details">
                    <?php $qdtTarefa=0; $qdtTarefa02=0; $qdtTarefa03=0;
                        foreach($tasks as $task){ 
                          if($task['task_status'] == 1){
                              $qdtTarefa++;
                          } else if($task['task_status'] == 2){
                              $qdtTarefa02++;
                          } else if($task['task_status'] == 3) {
                              $qdtTarefa03++;
                        } } ?>
                    <h3 id="TarPen"><?php echo $qdtTarefa; ?></h3>
                    <h4>Tarefas Pendentes</h4>
                  </div>
                  <div id="spark2"></div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box box3">
                  <div class="details">
                    <h3 id="TarAnd"><?php echo $qdtTarefa02; ?></h3>
                    <h4>Em andamento</h4>
                  </div>
                  <div id="spark3"></div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box box4">
                  <div class="details">
                    <h3 id="TarCon"><?php echo $qdtTarefa03; ?></h3>
                    <h4>Tarefas Concluídas</h4>
                  </div>
                  <div id="spark4"></div>
                </div>
              </div>
            </div>

             <div class="row mt-4">
              <div class="col-md-5">
                <div class="box shadow mt-4">
                  <div id="chart"></div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="box shadow mt-4">
                  <div id="lineAdwords" class=""></div>
                </div>
              </div>
            </div>

            <!--<div class="row mt-4">
              <div class="col-md-5">
                <div class="box shadow mt-4">
                  <div id="barchart"></div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="box shadow mt-4">
                  <div id="areachart"></div>
                </div>
              </div>
            </div>-->
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
    <script src="./assets/js/apexcharts.js"></script>
    <script src="./assets/js/scriptsDahboard.js"></script>
  </body>
</html>