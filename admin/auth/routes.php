<?php 

require __DIR__ . '/db.php';

if(resolve('/admin/auth/login')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($login()) {
            flash('autenticado com sucesso');
            return header('location: /admin');
        }
        flash('Dados inválidos');
    }
    render('admin/auth/login', 'admin/login');
} elseif (resolve('/admin/auth/logout')) {
    logout();
}