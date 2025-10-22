<?php
session_start();

$erro = "";

if ($_POST) {
    $_SESSION["nome"]       = $_POST["nome"] ?? "";
    $_SESSION["cpf"]        = $_POST["cpf"] ?? "";
    $_SESSION["email"]      = $_POST["email"] ?? "";
    $_SESSION["telefone"]   = $_POST["telefone"] ?? "";
    $_SESSION["nascimento"] = $_POST["nascimento"] ?? "";
    $_SESSION["sexo"]       = $_POST["sexo"] ?? "";
    $_SESSION["endereco"]   = $_POST["endereco"] ?? "";
    $_SESSION["cep"]        = $_POST["cep"] ?? "";
    $_SESSION["estado"]     = $_POST["estado"] ?? "";
    $_SESSION["cidade"]     = $_POST["cidade"] ?? "";
    
    if (empty($_SESSION["nome"]) || empty($_SESSION["cpf"]) || empty($_SESSION["email"]) || 
        empty($_SESSION["telefone"]) || empty($_SESSION["nascimento"]) || empty($_SESSION["sexo"]) ||
        empty($_SESSION["endereco"]) || empty($_SESSION["cep"]) || empty($_SESSION["estado"]) || 
        empty($_SESSION["cidade"])) {
        $erro = "Por favor, preencha todos os campos!";
    } else {
        header("Location: etapa2.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Div's Burguer - Dados do Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
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
        }
        .signup-form {
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
            width: 400px;
        }
        .signup-form h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
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
        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background: #0077cc;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #005fa3;
        }
        .erro {
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Div's Burguer - Hamburgueria Online</h1>
    </header>
    <main>
        <section class="signup-form">
            <h2>Dados do Cliente</h2>

            <?php if ($erro): ?>
                <p class="erro"><?= $erro ?></p>
            <?php endif; ?>

            <form action="" method="post">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" 
                    value="<?= $_SESSION['nome'] ?? '' ?>"
                    placeholder="Seu Nome" maxlength="50" required>
                
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" 
                    value="<?= $_SESSION['cpf'] ?? '' ?>"
                    placeholder="000.000.000-00" maxlength="14" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"
                    value="<?= $_SESSION['email'] ?? '' ?>"
                    maxlength="60" required>
                
                <label for="tel">Telefone:</label>
                <input type="tel" id="tel" name="telefone" 
                    value="<?= $_SESSION['telefone'] ?? '' ?>"
                    placeholder="00 00000-0000" maxlength="14" required>
                
                <label for="nascimento">Data de Nascimento:</label>
                <input type="text" id="nascimento" name="nascimento" 
                    value="<?= $_SESSION['nascimento'] ?? '' ?>"
                    placeholder="00/00/0000" maxlength="10" required>
                
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option value="">Selecione</option>
                    <option value="M" <?= ($_SESSION['sexo'] ?? '') == 'M' ? 'selected' : '' ?>>Masculino</option>
                    <option value="F" <?= ($_SESSION['sexo'] ?? '') == 'F' ? 'selected' : '' ?>>Feminino</option>
                </select>
                
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" 
                    value="<?= $_SESSION['cidade'] ?? '' ?>"
                    placeholder="Digite sua Cidade" maxlength="40" required>
                
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" 
                    value="<?= $_SESSION['endereco'] ?? '' ?>"
                    placeholder="Rua, número, bairro" maxlength="80" required>
                
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" 
                    value="<?= $_SESSION['estado'] ?? '' ?>"
                    placeholder="UF" maxlength="2" required>
                
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep" 
                    value="<?= $_SESSION['cep'] ?? '' ?>"
                    placeholder="00000-000" maxlength="9" required>
                
                <button type="submit">Próximo</button>
            </form>
        </section>
    </main> 
</body>
</html>