<?php

session_start();
include('../php/conn.php');
include('../php/validaLogin.php');

$id_user = $_SESSION['id'];

?>

<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Dados</title>
    <link rel="stylesheet" href="../Styles/meus_dados.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    

</head>
<body>
    <div class="navbar">
        <a id="logo" href="landing page.html">GS</a>
        <div class="nvb">
            <a id="link" href="landing page.html">Inicio</a>
            <a id="link" href="sobre.html">Sobre</a>
            <a id="link" href="sistema.html">Sistema</a>
            <a id="link-p" href="meus_dados.html">Meus dados</a>
            <a id="contato" href="contato.html">Contato</a>
        </div>
    </div>


<div class="container-info">
    <div class="box-info">
        <div style="background-color: linear-gradient(45deg, #FF5370, #ff869a) ;" class="box-info-one">
            <div class="info-text">
                <h3>Dinheiro Total</h3>
                <p>R$ <?php echo $_SESSION['total']; ?></p>
            </div>
            <i class="fa-solid fa-money-check-dollar"></i>
        </div>
        <div class="box-info-two">
            <div class="info-text">
                <h3>Dinheiro Gasto</h3>
                <p>R$ <?php echo $_SESSION['gasto']; ?></p>
            </div>
            <i class="fa-solid fa-money-check-dollar"></i>
        </div>
        <div class="box-info-three">
            <div class="info-text">
                <h3>Objetivo</h3>
                <p>R$ <?php echo $_SESSION['objetivo']; ?></p>
            </div>
            <i class="fa-solid fa-sack-dollar"></i>
        </div>
    </div>
</div>

<!-- Graficos -->

<!-- Grafico Pizza -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Gastos', 'Valor'],
          ['Aluguel', 400],
          ['Cartão', 320],
          ['Alimentação', 500],
          ['Plano de Saúde', 200],
          ['Energia', 200],
          ['Água', 100],
          ['Objetivos Pessoais', 50],


        ]);

        var options = {
          title: 'Gastos em %'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <!-- Gráfico linhas -->

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Data', 'Gasto',{role: 'annotation'} ],
            
            <?php


              $sql1 = "SELECT dia, gastos FROM dados WHERE id_usuario = '$id_user' ";
              $busca1 = mysqli_query($conn,$sql1);

              while ($dados1 = mysqli_fetch_array($busca1)){
                $dia = $dados1['dia'];
                $gastos = $dados1['gastos'];

            ?>
            ['<?php echo $dia ?>', <?php echo $gastos ?>,<?php echo $gastos ?>],
            
                <?php } ?>



          ]);
  
          var options = {
            title: 'Gastos x Dia',
            curveType: 'function',
            legend: { position: 'bottom' }
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  
          chart.draw(data, options);
        }
      </script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['table']});
    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Nome');
      data.addColumn('number', 'Valor');
      data.addColumn('boolean', 'Pago');
      data.addRows([
        ['Aluguel',  {v: 10000, f: 'R$700,00'}, true],
        ['Cartão',   {v:8000,   f: 'R$200,00'},  false],
        ['Alimentação', {v: 12500, f: 'R$500,00'}, true],
        ['Plano de Saúde',   {v: 7000,  f: 'R$300,00'},  true],
        ['Energia',   {v:8000,   f: 'R$120,00'},  false],
        ['Água',   {v:8000,   f: 'R$60,00'},  false],
        ['Objetivos Pessoais',   {v:8000,   f: 'R$100,00'},  false],

      ]);

      var table = new google.visualization.Table(document.getElementById('table_div'));

      table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
    }
  </script>




        <!-- HTML - Gráfico Pizza -->
        <div class="graficos-1">
            <div class="grafico-pizza">
              <form action="" method="post" id="formulario-pizza">
                <a type="submit" value="clique" name="butao-1" href="../Pages/meus_dados2.php"> < </a>
                <h1 id="text-1"> <?php echo $dia ?></h1>
                <a type="submit" value="clique" name="butao-2" href="../Pages/meus_dados.php"> > </a>
              </form>
                <div id="piechart" style="width: 700px; height: 500px;"></div>
            </div>

            <div class="grafico-linha">
                <h1 id="text-1">Gráfico de Linhas</h1>
                <div id="curve_chart" style="width: 700px; height: 500px;"></div>
            </div>
        </div>

            <div class="grafico-coluna">
                <h1 id="text-2">Gráfico Tabela</h1>
                <div class="exel">
                  <div id="table_div" style="width: 700px; height: 500px;"></div>
                </div>
            </div>
        </div>



</body>
</html>