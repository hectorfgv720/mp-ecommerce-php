<?php 
    header('Content-Type: application/json');

    $json = json_decode(file_get_contents('php://input'), true);
    $json_encode = json_encode($json);

    $_COOKIE["json"] = $json_encode;

    if (isset($_COOKIE["json"])){
        echo "
            <script>
                window.location.reload(true);
            </script>
        ";
        echo $json_encode;
    }else{
        echo "no se ha definido la cookie";
    }
?>