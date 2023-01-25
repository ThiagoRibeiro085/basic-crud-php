<?php

include __DIR__ . '/db.php';


if (resolve('/admin/pages')) {
    $pages = $pages_all();
    render('admin/pages/index', 'admin', ['pages' => $pages]);
} elseif (resolve('/admin/pages/create')) {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $pages_create();
        return header('location: /admin/pages');
    }
    render('admin/pages/create', 'admin');
} elseif ($params = resolve('/admin/pages/(\d+)')) {
    $page = $pages_one($params[1]);
    render('admin/pages/view', 'admin', ['page' => $page]);

} elseif ($params = resolve('/admin/pages/(\d+)/edit')) {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $pages_edit($params[1]);
        return header('location: /admin/pages' . $params[1]);
    }
    render('admin/pages/edit', 'admin');

} elseif ($params = resolve('/admin/pages/(\d+)/delete')) {
    $pages_delete($params[1]);
    return header('location: /admin/pages');

}

    