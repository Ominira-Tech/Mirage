<?php 
include_once('mirage.php');
for ($i = 0; $i < 2; $i++) {
    $availableAmount = number_format($accounts['data'][$i]['availableAmount']['amount'], 2, ',', '.');
    $billTotalAmount = number_format($getCreditCardBills['data'][$i]['billTotalAmount']['amount'], 2, ',', '.');
   }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Protótipo Mirage</title>

    <!-- Stylesheet File -->
    <link rel="stylesheet" href="assets/css/vendor.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- header start -->
    <div class="header-area" style="background-image: url(assets/img/bg/1.png);">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-7 text-right">
                    <a href="home.html" class="logo">
                        <img src="assets/img/logo.png" alt="logo">
                    </a>
                </div>
                <div class="col-sm-5 col-5 text-right">
                    <ul class="header-right">
                        <li>
                            <a href="#">
                                <i class="fa fa-bell animated infinite swing"></i>
                                <span class="badge">6</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="goal-area pd-top-40">
        <div class="container">
            <div class="section-title">
                <h3 class="title">Balanço Geral</h3>
            </div>
            <div class="single-goal single-goal-one">
                <div class="row">
                    <div class="col-7 pr-0">
                        <div class="details">
                            <h6>Limite disponível</h6>
                            <p>Total</p>
                        </div>
                    </div>
                    <div class="col-5 pl-0">
                        <div class="circle-inner circle-inner-one">
                            <h6 class="goal-amount">R$130</h6>
                            <div class="chart-circle" data-value="0.30"><canvas width="58" height="58"></canvas>
                                <canvas width="52" height="52"></canvas>
                                <div class="chart-circle-value text-center">30%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-goal single-goal-two">
                <div class="row">
                    <div class="col-7 pr-0">
                        <div class="details">
                            <h6>Fatura</h6>
                            <p>Total</p>
                        </div>
                    </div>
                    <div class="col-5 pl-0">
                        <div class="circle-inner circle-inner-two">
                            <h6 class="goal-amount">R$1065</h6>
                            <div class="chart-circle" data-value="0.90"><canvas width="58" height="58"></canvas>
                                <canvas width="52" height="52"></canvas>
                                <div class="chart-circle-value text-center">90%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div> 

  <!--Começo da area de cartão -->
 <div class="cart-area pd-top-15">
        <div class="container">
            <div class="section-title">
                <br>
                <h3 class="title">Meus Cartões</h3>      
            </div>
            <div class="col-sm-12 col-12 text-right">
                <select id="dropdown">
                    <option value="">Ordenar por</option>
                    <option value="opcao1">Maior Limite</option>
                    <option value="opcao2">Maior Limite</option>
                    <option value="opcao3">Vencimento</option>
                </select>
            </div>
            <?php 
            for ($i = 0; $i < 2; $i++) {

                $availableAmount = number_format($accounts['data'][$i]['availableAmount']['amount'], 2, ',', '.');
                $dueDate = date('d/m', strtotime($getCreditCardBills['data'][$i]['dueDate']));
                $billTotalAmount = number_format($getCreditCardBills['data'][$i]['billTotalAmount']['amount'], 2, ',', '.');
                $identificationNumber = $getCreditCardAccount['data']['paymentMethod'][$i]['identificationNumber'];

            ?>  
            <div class="ba-cart-inner" style="background-image: url(assets/img/bg/<?=$i + 11?>.png);">
                <p>Limite disponível</p>
                <h4>R$  <?= $availableAmount?></h4>
                <p>Número do Cartão</p>
                <h5>0000 0000 0000 <?= $identificationNumber?></h5>
                <p>Fatura atual</p>
                <h5><?= $billTotalAmount?></h5>
                <p>Vencimento da Fatura</p>
                <h5><?= $dueDate?></h5>
                </div>
            <br>
            <?php } ?>
            <br>
            </div>      
    </div>
<!--End da area de cartão -->
    <!-- Footer Area -->
    <div class="footer-area">
        <div class="footer-top text-center" style="background-image: url(assets/img/bg/1.png);">    
        </div>
    </div>

    <!-- All Js File here -->
    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/main.js"></script>
    
</body>

</html>