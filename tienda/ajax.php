<?php
include "../conexion.php";

if (!empty($_POST)) {

    //Extraer datos del producto
    if ($_POST['action'] == 'infoProducto') {

        $producto_id = $_POST['producto'];
        $query = mysqli_query($conection, "SELECT cod_producto, descripcion FROM producto WHERE cod_producto = $producto_id AND estatus = 1");
        mysqli_close($conection);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            $data = mysqli_fetch_assoc($query);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            exit;
        }
        echo 'error';
        exit;
    }

    //Agregar producto a entrada
    if ($_POST['action'] == 'addProduct') {

        if (!empty($_POST['cantidad']) || !empty($_POST['precio']) || !empty($_POST['producto_id'])) {
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $producto_id = $_POST['producto_id'];
        }
    }
}

exit;
