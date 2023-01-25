<?php 

$pages_all = function ( ) {
    // buscar todas as páginas
};

$pages_one = function ($id) {
    // buscar uma unica página
};

$pages_create = function ( ) {
    // cadastra uma página
    flash('criou resgistro com sucesso', 'success');
};

$pages_edit = function ($id) {
    // atualiza uma página
    flash('atualizou resgistro com sucesso', 'success');
};

$pages_delete = function ($id ) {
    // remove uma página
    flash('removeu resgistro com sucesso', 'success');
};

