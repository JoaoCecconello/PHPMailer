<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testes CS - PHPMailer</title>
</head>
<body>
    <div>
    <!-- host -->
    <!-- port -->
    <!-- tls -->
    <!-- uernamet -->
    <!-- password -->

    <!-- from -->
    <!-- to -->
    <!-- cc -->
    <!-- reply -->

    <!-- subject -->
    <!-- altbody -->
    <!-- attachment -->

    </div>
    <script>
        function criaObjetoAjax() {
            if(window.XMLHttpRequest) {
                try {
                    objeto = new XMLHttpRequest();
                } catch(e) {
                    objeto = false;
                }
            } else if(window.ActiveXObject) {
                try {
                    objeto = new ActiveXObject("Msxml2.XMLHTTP");
                } catch(e) {
                    try {
                        objeto = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch(e) {
                    objeto = false;
                    }
                }
            }
            return objeto;
        }

        function lerProdutos() {
            objAjax = criaObjetoAjax();
            url = "backend/productCRUD.php";
            objAjax.open("POST",url,true);
            objAjax.onreadystatechange=verificaStatusProdutoLeitura;
            var data = new FormData();
            data.append('op', 'listarTodos');
            objAjax.send(data);
        }

        function verificaStatusProdutoLeitura() {
            if (objAjax.readyState == 4) {
                if(objAjax.status == 200) {
                    document.getElementById('container').innerHTML = objAjax.responseText;
                } else {
                    document.getElementById('container').innerHTML = "Houve um erro ao recuperar os dados: "+objAjax.statusText;
                }
            }
        }
    </script>
</body>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</html>