<?php
session_start();

$erro = "";

if ($_POST) {
    $_SESSION["prod1"] = $_POST["prod1"] ?? "";
    $_SESSION["qtd1"]  = $_POST["qtd1"] ?? 0;
    $_SESSION["prod2"] = $_POST["prod2"] ?? "";
    $_SESSION["qtd2"]  = $_POST["qtd2"] ?? 0;
    $_SESSION["prod3"] = $_POST["prod3"] ?? "";
    $_SESSION["qtd3"]  = $_POST["qtd3"] ?? 0;
    $_SESSION["prod4"] = $_POST["prod4"] ?? "";
    $_SESSION["qtd4"]  = $_POST["qtd4"] ?? 0;
    

    header("Location: etapa3.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Div's Burguer - Faça seu Pedido</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; color: #333; }
        header { background: #0077cc; color: white; padding: 15px; text-align: center; }
        main { display: flex; justify-content: center; margin-top: 20px; padding: 20px; }
        .signup-form { background: white; padding: 25px 30px; border-radius: 10px; box-shadow: 0 0 10px #aaa; width: 450px; }
        .signup-form h2 { text-align: center; margin-bottom: 20px; color: #333; }
        label { display: block; margin-top: 12px; font-weight: bold; color: #555; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
        fieldset { border: 1px solid #ccc; border-radius: 8px; padding: 12px; margin-top: 15px; }
        legend { font-weight: bold; color: #0077cc; }
        button { width: 100%; padding: 12px; margin-top: 20px; background: #0077cc; border: none; border-radius: 6px; color: white; font-size: 16px; cursor: pointer; transition: 0.3s; }
        button:hover { background: #005fa3; }
        .erro { color: red; font-weight: bold; text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
    <header>
        <h1>Div's Burguer - Hamburgueria Online</h1>
    </header>
    <main>
        <section class="signup-form">
            <h2>Faça seu Pedido</h2>

            <?php if ($erro): ?>
                <p class="erro"><?= $erro ?></p>
            <?php endif; ?>

            <form action="" method="post">
                <label for="prod1">Hambúrguer de Frango:</label>
                <select name="prod1">
                    <option value="0" <?= ($_SESSION['prod1'] ?? '0') == "0" ? 'selected' : '' ?>>-- Não desejo --</option>
                    <option value="1" <?= ($_SESSION['prod1'] ?? '') == "1" ? 'selected' : '' ?>>Chicken Burger - R$ 25,00</option>
                </select>
                <br>
                <label>Quantidade:</label>
                <select name="qtd1">
                    <option value="0" <?= ($_SESSION['qtd1'] ?? '0') == "0" ? 'selected' : '' ?>>0</option>
                    <option value="1" <?= ($_SESSION['qtd1'] ?? '0') == "1" ? 'selected' : '' ?>>1</option>
                    <option value="2" <?= ($_SESSION['qtd1'] ?? '0') == "2" ? 'selected' : '' ?>>2</option>            
                </select>
                <br><br>

                <fieldset>
                    <legend>Escolha de Hambúrguer de Carne:</legend>
                    <label><input type="radio" name="prod2" value="2" <?= ($_SESSION['prod2'] ?? '') == "2" ? 'checked' : '' ?>> Classic Burguer - R$ 30,00</label><br>
                    <label><input type="radio" name="prod2" value="3" <?= ($_SESSION['prod2'] ?? '') == "3" ? 'checked' : '' ?>> Bacon Burger - R$ 35,00</label><br>
                    <label>Quantidade:</label>
                    <select name="qtd2">
                        <option value="0" <?= ($_SESSION['qtd2'] ?? '0') == "0" ? 'selected' : '' ?>>0</option>
                        <option value="1" <?= ($_SESSION['qtd2'] ?? '0') == "1" ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= ($_SESSION['qtd2'] ?? '0') == "2" ? 'selected' : '' ?>>2</option>            
                    </select>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Acompanhamentos e Bebidas:</legend>
                    <label>
                        <input type="checkbox" name="prod3" value="4" <?= ($_SESSION['prod3'] ?? '') == "4" ? 'checked' : '' ?>> Batata Frita Média - R$ 12,00
                        <br>Quantidade:
                        <select name="qtd3">
                            <option value="0" <?= ($_SESSION['qtd3'] ?? '0') == "0" ? 'selected' : '' ?>>0</option>
                            <option value="1" <?= ($_SESSION['qtd3'] ?? '0') == "1" ? 'selected' : '' ?>>1</option>
                            <option value="2" <?= ($_SESSION['qtd3'] ?? '0') == "2" ? 'selected' : '' ?>>2</option>
                        </select>
                    </label>
                    <br><br>
                    <label>
                        <input type="checkbox" name="prod4" value="5" <?= ($_SESSION['prod4'] ?? '') == "5" ? 'checked' : '' ?>> Refrigerante Lata - R$ 8,00
                        <br>Quantidade:
                        <select name="qtd4">
                            <option value="0" <?= ($_SESSION['qtd4'] ?? '0') == "0" ? 'selected' : '' ?>>0</option>
                            <option value="1" <?= ($_SESSION['qtd4'] ?? '0') == "1" ? 'selected' : '' ?>>1</option>
                            <option value="2" <?= ($_SESSION['qtd4'] ?? '0') == "2" ? 'selected' : '' ?>>2</option>
                        </select>
                    </label>
                </fieldset>

                <button type="submit">Próxima</button>
            </form>
        </section>
    </main>
</body>
</html>