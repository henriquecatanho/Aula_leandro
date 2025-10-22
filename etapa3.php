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
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Div's Burguer - Pagamento e Frete</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            color: #333;
        }

        header {
            background: #0077cc;
            color: white;
            padding: 15px;
            text-align: center;
        }

        main {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            padding: 20px;
        }

        .signup-form {
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
            width: 450px;
        }

        .signup-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        fieldset {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 12px;
            margin-top: 15px;
        }

        legend {
            font-weight: bold;
            color: #0077cc;
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
            transition: 0.3s;
        }

        button:hover {
            background: #005fa3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Div's Burguer - Hamburgueria Online</h1>
    </header>
    <main>
        <section class="signup-form">
            <h2>Forma de Pagamento e Frete</h2>
            <form action="confirma.php" method="post">
                

                <input type="hidden" name="cpf" value="<?= $cpf ?>">
                <input type="hidden" name="nome" value="<?= $nome ?>">
                <input type="hidden" name="email" value="<?= $email ?>">
                <input type="hidden" name="telefone" value="<?= $telefone ?>">
                <input type="hidden" name="nascimento" value="<?= $nascimento ?>">
                <input type="hidden" name="sexo" value="<?= $sexo ?>">
                <input type="hidden" name="endereco" value="<?= $endereco ?>">
                <input type="hidden" name="cep" value="<?= $cep ?>">
                <input type="hidden" name="estado" value="<?= $estado ?>">
                <input type="hidden" name="cidade" value="<?= $cidade ?>">


                <input type="hidden" name="prod1" value="<?= $prod1 ?>">
                <input type="hidden" name="qtd1" value="<?= $qtd1 ?>">
                <input type="hidden" name="prod2" value="<?= $prod2 ?>">
                <input type="hidden" name="qtd2" value="<?= $qtd2 ?>">
                <input type="hidden" name="prod3" value="<?= $prod3 ?>">
                <input type="hidden" name="qtd3" value="<?= $qtd3 ?>">
                <input type="hidden" name="prod4" value="<?= $prod4 ?>">
                <input type="hidden" name="qtd4" value="<?= $qtd4 ?>">


                <label for="fpagto">Forma de Pagamento:</label>
                <select name="fpagto" required>
                    <option value="">-- Selecione --</option>
                    <option value="1">Boleto - 5% de Desconto</option>
                    <option value="2">Pix - 10% de Desconto</option>
                    <option value="3">Cartão - 6x sem Juros</option>
                    <option value="4">Cartão - 12x com Juros</option>
                    <option value="5">Transferência Bancária</option>
                    <option value="6">Carteira Digital (PayPal, PicPay, etc.)</option>
                </select>


                <fieldset>
                    <legend>Escolha o Frete:</legend>
                    <label>
                        <input type="radio" name="frete" value="1" required> Sedex - R$ 20,00 (1-3 dias)
                    </label><br>
                    <label>
                        <input type="radio" name="frete" value="2"> PAC - R$ 10,00 (5-8 dias)
                    </label><br>
                    <label>
                        <input type="radio" name="frete" value="3"> Retirada na Loja - Grátis
                    </label><br>
                    <label>
                        <input type="radio" name="frete" value="4"> Motoboy - R$ 15,00
                    </label>
                </fieldset>

                <button type="submit">Próxima</button>
            </form>
        </section>
    </main>
</body>
</html>