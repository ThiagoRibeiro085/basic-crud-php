<?php 

 function pages_get_data($redirectOnError) {
    $title = filter_input(INPUT_POST, 'title');
    $url = filter_input(INPUT_POST, 'url');
    $body = filter_input(INPUT_POST, 'body');

    if (!$title) {
        flash('informe o campo de título ', 'error');
        header('location' .$redirectOnError);
        die();
    }

    return compact('title', 'body', 'url');
 }

$pages_all = function ( ) use ($conn) {
    $data = $conn->prepare('SELECT * FROM pages');
    $data->execute();
    return $data->fetchAll(PDO::FETCH_ASSOC); /// pega todos os registros
};


$pages_one = function ($id) use ($conn) {    
    $sql = "SELECT * FROM pages WHERE id = $id"; //// SQL
    $stmt = $conn->prepare($sql); /// PREPARA PARA SER EXECUTADA
    $stmt->execute(); // EXECUTA NO BANCO
    $data = $stmt->fetch(PDO::FETCH_ASSOC); //pega um registro
    return $data;  


};

$pages_create = function ($dados) use ($conn) {
     $data = pages_get_data('/admin/pages/create');
     

     $sql = "INSERT INTO pages (title, body, url, updated, created) VALUES('".$dados['title']."', '".$dados['url']."', '".$dados['body']."', NOW(), NOW())";
     //$sql = 'INSERT INTO pages (title, body, url, updated, created) VALUES(?, ?, ?, NOW(), NOW())';


     $stmt = $conn->prepare($sql);
     $stmt->execute();
    flash('criou resgistro com sucesso', 'success');
    return $conn->lastInsertId();
};

$pages_edit = function ($id, $dados ) use ($conn) {

    try{


    $data = pages_get_data('/admin/pages/' . $id . '/edit');

     $stmt = $conn->prepare(" UPDATE pages SET title = '".$dados['title']."', url = '".$dados['url']."', body = '".$dados['body']."'  WHERE id = $id"); // PREPARA ATUALIZA PRA MIN ESSE ID NO BANCO
     flash('atualizou resgistro com sucesso', 'success');
     return $stmt->execute(); // EXECUTA PRA MIN
     
    }catch(Exception $e) {
        $erro = $e->getMessage() . $e->getTraceAsString();
            die($erro);
    }
};

$pages_delete = function ($id) use ($conn) {
     
     $sql = "DELETE FROM pages WHERE id = $id" ;
     $stmt = $conn->prepare($sql);
     $stmt->execute();
    flash('removeu resgistro com sucesso', 'success');
    return $stmt->bindParam();
};

