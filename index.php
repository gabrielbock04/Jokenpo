<?php
$resultado = "Faça sua jogada!";
$status = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jogada'])) {
    $jogada = $_POST["jogada"];
    $jokenpo = ["pedra", "papel", "tesoura"];
    $computador = $jokenpo[rand(0, 2)];
    $resultado = "";
    if ($jogada === $computador) {
        $resultado = "Empate! Você e o computador jogaram $jogada.";
        $status = "empate";
    } elseif (
        ($jogada === "pedra" && $computador === "tesoura") ||
        ($jogada === "papel" && $computador === "pedra") ||
        ($jogada === "tesoura" && $computador === "papel")
    ) {
        $resultado = "Você ganhou! Você jogou $jogada e o computador jogou $computador.";
        $status = "vitoria";
    } else {
        $resultado = "Você perdeu! Você jogou $jogada e o computador jogou $computador.";
        $status = "derrota";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <title>Jo-Ken-Pô</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="fundo">
    <div class="conteudo">
        <h1 class="led-text"> Jo-Ken-Pô</h1>
        <form method="post">
            <button class="btnJokenpo pedra" type="submit" name="jogada" value="pedra" title="Pedra"></button>

            <button class="btnJokenpo papel" type="submit" name="jogada" value="papel" title="Papel"></button>

            <button class="btnJokenpo tesoura" type="submit" name="jogada" value="tesoura" title="Tesoura"></button>


            <div class="resultado">
                <h2>Resultado: </h2>
                <p class="<?php
                            if ($status === 'vitoria') echo 'texto-vitoria';
                            elseif ($status === 'derrota') echo 'texto-derrota';
                            else echo 'texto-empate';
                            ?>"><?= $resultado ?></p>

                <?php if (isset($status) && $status === "vitoria"): ?>
                    <img src="assets/img/vitoria.gif" alt="Vitória" class="gif-resultado">
                <?php elseif (isset($status) && $status === "derrota"): ?>
                    <img src="assets/img/derrota.gif" alt="Derrota" class="gif-resultado">
                <?php endif; ?>
            </div>


        </form>



</body>

</html>