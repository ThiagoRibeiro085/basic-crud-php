<?php

auth_protection();

 if (resolve('/admin')) {
    render('admin/home', 'admin');
 }elseif (resolve('/admin/auth.*')) {
    include __DIR__ . '/auth/routes.php';   
} elseif (resolve('/admin/pages.*')) {
    include __DIR__ . '/pages/routes.php'; 
} elseif (resolve('/admin/users.*')) {
    include __DIR__ . '/users/routes.php'; 
}elseif (resolve('/admin/upload/image')) {
    $file = $FELIS['file'] ?? null;

    if(!$file) {
        http_response_code(422);
        echo 'nenhum arquivo enviado';
        exit;
    }

    $allowedTypes = [
        'imagen/gif',
        'imagen/jpg',
        'imagen/jpeg',
        'imagen/png',
    ];

    if (!in_array($file['type'],$allowedTypes)) {
        http_response_code(422);
        echo json_encode(['status' => 'arquivo não permitido']);
        exit;
   } 

   $name = uniqid(rand(), true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

   move_uploaded_file($file['tmp_name'], __DIR__ . '/../public/upload/' . $name);

   echo '/upload/' . $name;

   }else {
       http_response_code(404);
       echo 'página não encontrada';
   }

