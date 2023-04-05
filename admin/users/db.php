<?php 

function users_get_data ($redirectOnError) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (!$email) {
        flash('informe os campos de email e password', 'error');
        header ('location' .$redirectOnError);
        die();
    }

    return compact('email', 'password');
};

$users_all = function( ) use ($conn) {
    $data = $conn->prepare('SELECT * FROM users');
    $data->execute();
    return $data->fetchAll(PDO::FETCH_ASSOC);
};

$user_view = function ($id) use ($conn) { 
    $sql = "SELECT * FROM users WHERE id = $id"; 
    $stmt = $conn->prepare($sql); /// PREPARA PARA SER EXECUTADA
    $stmt->execute(); // EXECUTA NO BANCO
    $data = $stmt->fetch(PDO::FETCH_ASSOC); //pega um registro
    return $data;  
};
    

$users_create = function ($dados) use ($conn) {
    $data = users_get_data('/admin/users/create');
     
    //$sql = 'INSERT INTO users (email, password, updated, created) VALUES(?, ?, ?, NOW(), NOW())';
    $sql = "INSERT INTO users (email, password, updated, created) VALUES('".$dados['email']."', '".$dados['password']."', NOW(), NOW())";    

        if(is_null($data['password'])) {
         flash('informe os campo email', 'error');
         header('location: /admin/users/create');
         die();
        }
    
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    flash('criou resgistro com sucesso', 'success');
    return $conn->lastInsertId();
};

$users_edit = function($id) use ($conn) {

    try{

        $data = users_get_data('/admin/users/' . $id . '/edit');

        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }


        // die("UPDATE users SET email = '".$data['email']."', password = '".$data['password']."' WHERE id = $id");

        $stmt = $conn->prepare(" UPDATE users SET email = '".$data['email']."', password = '".$data['password']."' WHERE id = $id");
        

         // PREPARA ATUALIZA PRA MIN ESSE ID NO BANCO
         flash('atualizou resgistro com sucesso', 'success');
         return $stmt->execute(); // EXECUTA PRA MIN

       
         
        }catch(Exception $e) {
            $erro = $e->getMessage() . $e->getTraceAsString();
                die($erro);
        }
};

$users_delete = function ($id) use ($conn) {
     
    $sql = "DELETE FROM users WHERE id = $id" ;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
   flash('removeu resgistro com sucesso', 'success');
   return $stmt->bindParam();

};





