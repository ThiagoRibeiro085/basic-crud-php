<?php

auth_protection();

require __DIR__ . '/../admin/pages/db.php';

if (resolve('/contato')) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fron = filter_input(INPUT_POST, 'from');
        $subject = filter_input(INPUT_POST, 'subject');
        $massege = filter_input(INPUT_POST, 'massege');
        $headers = 'FROM: ' . $from . "\r\n" . 
        'Reply-to: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();  

        if (mail('rockrinho89@hotmail.com', $subject, $massege,  $headers )){
             flash('E-mail enviado com sucesso');
        } else {
            flash('erro em enviar o E-mail, por favor entrar em contato', 'error');
        }
        return header('location: /contato');
    }
    $pages = $pages_all();
    render('site/contato', 'site', compact('pages'));
}elseif ($params = resolve('/(.*)')) {
    $pages = $pages_all();

    foreach ($pages as $page) {
        if ($page['url'] == $params[1]) {
            break;
        }
    }

    render('site/page', 'site', compact('pages', 'page'));
} 