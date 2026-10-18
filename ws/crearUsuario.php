<?php

require_once "models/User.php";

$nombre = "";
$apellidos = "";
$contrasena = "";
$telefono = "";
$mail = "";
$sexo = "";

try {
    $nombre = $_POST["name"];
    
    if ($nombre == ""){
        echo json_encode([
            "success" => false,
            "message" => "Nombre no valido"
        ]);

        exit;
    }

    $apellidos = $_POST["surname"];

    if ($apellidos == ""){
        echo json_encode([
            "success" => false,
            "message" => "Apellidos no valido"
        ]);

        exit;
    }

    $contrasena = $_POST["contrasena"];

    if ($contrasena == ""){
        echo json_encode([
            "success" => false,
            "message" => "Contrasena no valido"
        ]),

        exit;
    }

    $telefono = $_POST["phone"];

    if (strlen($telefono) < 9){
        echo json_encode([
            "success" => false,
            "message" => "telefono no valido"
        ]);

        exit;
    }

    $mail = $_POST["mail"];

    if ($mail == ""){
        echo json_encode([
            "success" => false,
            "message" => "Mail no valido"
        ]);

        exit;
    }

    $sexo = $_POST["sex"] ?? "";

} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "message" => "No se puedo recoger bien los valores, error: ". $e
    ]);
}

try {
    $user = new User($nombre, $apellidos, $contrasena, $telefono, $mail, $sexo);

    $userToJson = $user->toJson();

    file_put_contents('usuarios.txt', $userToJson . PHP_EOL, FILE_APPEND | LOCK_EX);

    echo json_encode([
    "success" => true,
    "message" => "Usuario guardado correctamente",
    "data" => [
        "nombre" => $user->getNombre(),
        "apellidos" => $user->getApellidos(),
        "contrasena" => $user->getContrasena(),
        "telefono" => $user->getTelefono(),
        "mail" => $user->getMail(),
        "sexo" => $user->getSexo()
    ]
]);
} catch (Exception $e){
    echo json_encode([
        "success" => false,
        "message" => "No se ha podido hacer el usuario, error: ". $e
    ]);
}