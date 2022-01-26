<head>
    <meta charset="UTF-8" />
    <title>Ejercicio3Repaso</title>
    <link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend>Pares de números</legend>
            Número 1:<input type="number" name="n1" required>
            <br>
            <br>
            Número 2:<input type="number" name="n2" required>
            <br>
            <br>
            <input type="submit" name="enviar">
        </fieldset>
    </form>
</body>

<?php
if (isset($_POST['enviar'])) {
    $num1=$_POST['n1'];
    $num2=$_POST['n2'];
    $aux=$num2;

    if ($num1>$num2 || $num1==$num2) {
        echo "El número 1 es mayor que el número dos o son iguales.";
    }else{
        for ($i=$num1; $i <=$num2 ; $i++) { 
            echo "($i,$aux)";
            $aux--;
        }
    }


    echo "<br><a href='Ejercicio3.php'>Volver al principio </a>";
}
?>