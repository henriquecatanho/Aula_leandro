<?php
$pageTitle = "Div's Burguer - Hamburgueria Online";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        
        .container {
            padding: 20px;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        
        .btn-comprar {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
        }
        
        .btn-comprar:hover {
            background-color: #0d0c0cff;
        }
    </style>
</head> 
<body>
    <div class="container">
        <div class="logo">Div's Burguer - Hamburgueria Online</div>
        <a href="etapa1.php" class="btn-comprar">FAZER PEDIDO</a>
    </div>
</body>
</html>