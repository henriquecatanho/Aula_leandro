<?php
session_start();


$cpf        = $_SESSION["cpf"] ?? "";
$nome       = $_SESSION["nome"] ?? "";
$email      = $_SESSION["email"] ?? "";
$telefone   = $_SESSION["telefone"] ?? "";
$nascimento = $_SESSION["nascimento"] ?? "";
$sexo       = $_SESSION["sexo"] ?? "";
$endereco   = $_SESSION["endereco"] ?? "";
$cep        = $_SESSION["cep"] ?? "";
$estado     = $_SESSION["estado"] ?? "";
$cidade     = $_SESSION["cidade"] ?? "";

$prod1 = $_SESSION["prod1"] ?? "";
$qtd1  = $_SESSION["qtd1"] ?? 0;

$prod2 = $_SESSION["prod2"] ?? "";
$qtd2  = $_SESSION["qtd2"] ?? 0;

$prod3 = $_SESSION["prod3"] ?? "";
$qtd3  = $_SESSION["qtd3"] ?? 0;

$prod4 = $_SESSION["prod4"] ?? "";
$qtd4  = $_SESSION["qtd4"] ?? 0;

$fpagto = $_POST["fpagto"] ?? "";
$frete  = $_POST["frete"] ?? "";

$listaProdutos = [
    "1" => ["nome" => "Chicken Burger", "preco" => 25.00],
    "2" => ["nome" => "Classic Burguer", "preco" => 30.00],
    "3" => ["nome" => "Bacon Burger", "preco" => 35.00],
    "4" => ["nome" => "Batata Frita Média", "preco" => 12.00],
    "5" => ["nome" => "Refrigerante Lata", "preco" => 8.00],
];

$formasPagamento = [
    "1" => "Boleto - 5% Desconto",
    "2" => "Pix - 10% Desconto",
    "3" => "Cartão - 6x Sem Juros",
    "4" => "Cartão - 12x Com Juros (12%)",
    "5" => "Transferência Bancária",
    "6" => "Carteira Digital - 3% Desconto"
];

$opcoesFrete = [
    "1" => ["desc" => "Sedex - 1 a 3 dias", "valor" => 20.00],
    "2" => ["desc" => "PAC - 5 a 8 dias", "valor" => 10.00],
    "3" => ["desc" => "Retirada na Loja", "valor" => 0.00],
    "4" => ["desc" => "Motoboy", "valor" => 15.00]
];

$subtotal = 0;

if ($prod1 && $qtd1 > 0) {
    $subtotal += $listaProdutos[$prod1]["preco"] * $qtd1;
}
if ($prod2 && $qtd2 > 0) {
    $subtotal += $listaProdutos[$prod2]["preco"] * $qtd2;
}
if ($prod3 && $qtd3 > 0) {
    $subtotal += $listaProdutos[$prod3]["preco"] * $qtd3;
}
if ($prod4 && $qtd4 > 0) {
    $subtotal += $listaProdutos[$prod4]["preco"] * $qtd4;
}

$valorFrete = $opcoesFrete[$frete]["valor"] ?? 0;
$total = $subtotal + $valorFrete;

$desconto = 0;
$juros = 0;
$parcelas = "";
$totalFinal = $total;

if ($fpagto == "1") {
    $desconto = $total * 0.05;
    $totalFinal = $total - $desconto;
} 
else if ($fpagto == "2") {
    $desconto = $total * 0.10;
    $totalFinal = $total - $desconto;
} 
else if ($fpagto == "3") {
    $parcelas = "6x de R$ " . number_format($total/6, 2, ',', '.');
} 
else if ($fpagto == "4") {
    $juros = $total * 0.12;
    $totalFinal = $total + $juros;
    $parcelas = "12x de R$ " . number_format($totalFinal/12, 2, ',', '.');
} 
else if ($fpagto == "6") {
    $desconto = $total * 0.03;
    $totalFinal = $total - $desconto;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        header {
            background: #0077cc;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        main {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .signup-form {
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
            width: 500px;
        }
        .signup-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #0077cc;
            padding-bottom: 10px;
        }
        p {
            margin: 8px 0;
            padding: 5px;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin: 5px 0;
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #0077cc;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #005fa3;
        }
    </style>
    <title>Div's Burguer - Confirmação do Pedido</title>
</head>
<body>
    <header>
        <h1>Div's Burguer - Confirmação do Pedido</h1>
    </header>
    <main>
        <section class="signup-form">
            <h2>Dados do Cliente</h2>
            <p><b>Nome:</b> <?= $nome ?></p>
            <p><b>CPF:</b> <?= $cpf ?></p>
            <p><b>Email:</b> <?= $email ?></p>
            <p><b>Telefone:</b> <?= $telefone ?></p>
            <p><b>Nascimento:</b> <?= $nascimento ?></p>
            <p><b>Sexo:</b> <?= $sexo == 'M' ? 'Masculino' : 'Feminino' ?></p>
            <p><b>Endereço:</b> <?= $endereco . " - " . $cidade . "/" . $estado . " - CEP: " . $cep ?></p>

            <h2>Produtos Escolhidos</h2>
            <ul>
                <?php if($prod1 && $qtd1 > 0): ?>
                    <li><?= $listaProdutos[$prod1]["nome"] ?> - R$ <?= number_format($listaProdutos[$prod1]["preco"], 2, ',', '.') ?> x <?= $qtd1 ?></li>
                <?php endif; ?>
                <?php if($prod2 && $qtd2 > 0): ?>
                    <li><?= $listaProdutos[$prod2]["nome"] ?> - R$ <?= number_format($listaProdutos[$prod2]["preco"], 2, ',', '.') ?> x <?= $qtd2 ?></li>
                <?php endif; ?>
                <?php if($prod3 && $qtd3 > 0): ?>
                    <li><?= $listaProdutos[$prod3]["nome"] ?> - R$ <?= number_format($listaProdutos[$prod3]["preco"], 2, ',', '.') ?> x <?= $qtd3 ?></li>
                <?php endif; ?>
                <?php if($prod4 && $qtd4 > 0): ?>
                    <li><?= $listaProdutos[$prod4]["nome"] ?> - R$ <?= number_format($listaProdutos[$prod4]["preco"], 2, ',', '.') ?> x <?= $qtd4 ?></li>
                <?php endif; ?>
            </ul>

            <h2>Pagamento e Frete</h2>
            <p><b>Forma de Pagamento:</b> <?= $formasPagamento[$fpagto] ?? "Não informado" ?></p>
            <p><b>Frete:</b> <?= $opcoesFrete[$frete]["desc"] ?? "Não informado" ?> - R$ <?= number_format($valorFrete, 2, ',', '.') ?></p>

            <h2>Resumo Financeiro</h2>
            <p><b>Subtotal Produtos:</b> R$ <?= number_format($subtotal, 2, ',', '.') ?></p>
            <p><b>Frete:</b> R$ <?= number_format($valorFrete, 2, ',', '.') ?></p>
            <?php if($desconto > 0): ?>
                <p><b>Desconto:</b> - R$ <?= number_format($desconto, 2, ',', '.') ?></p>
            <?php endif; ?>
            <?php if($juros > 0): ?>
                <p><b>Juros:</b> + R$ <?= number_format($juros, 2, ',', '.') ?></p>
            <?php endif; ?>
            <p><b>Total Final:</b> R$ <?= number_format($totalFinal, 2, ',', '.') ?></p>
            <?php if($parcelas): ?>
                <p><b>Parcelamento:</b> <?= $parcelas ?></p>
            <?php endif; ?>

            <form action="index.php" method="post">
                <button type="submit">Nova Compra</button>
            </form>
        </section>
    </main>
</body>
</html>