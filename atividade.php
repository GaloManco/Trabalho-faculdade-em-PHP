<?php
session_start();
if (isset($_SESSION['valores'])){
    $valores = $_SESSION['valores'];
}else{
    $valores = array();
}

?>

<html>
    <form method="post">
        Numero:<input type="number" name="num" placeholder="Digite seu número">
        <input type="submit" value="add" name="oper">
        <input type="submit" value="del" name="oper">
        <input type="submit" value="sort" name="oper">
        <input type="submit" value="clear" name="oper">
    </form>
    <ul>
        <?php
            if (isset($_POST['num'])){
                switch($_POST['oper']){
                    case 'add':
                        $valores[] = $_POST['num'];
                        break;
                    case 'del':
                        $indece = array_search($_POST['num'], $valores );
                        if ($indece != '')
                            array_splice($valores, $indece, 1);
                            break;
                    case 'sort':
                        sort($valores);
                        break;
                    case 'clear':
                        $valores = array();
                        unset($_SESSION['valores']);
                        session_destroy();
                        break;                   
                }
            }
            // Imprimir a imagem na tela
            if (count($valores)>0){
                for ($i=0; $i<count($valores); $i++){
                    echo ('<li>'. $valores[$i].'</li>');

                }
            $_SESSION['valores'] = $valores;
            }
        ?>
    </ul>
</html>