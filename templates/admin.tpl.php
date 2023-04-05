<!DOCTYPE html>
<html lang="pt -BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" ></script>
    <script src="https/admin/users://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">

    <title>Painel administrativo</title>
</head>
<body class="d-flex flex-column">    
        <div id="header">
            <nav class="navbar navbar-dark bg-dark">
                <span>
                    <a href="/admin" class="navbar-brand">Admin_Thiago</a>
                    <span class="navbar-text">
                        Painel Administrativo
                    </span>
                </span>
                <a href="/admin/auth/logout" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> sair</a>
            </nav>
        </div>
        <div id="main">
            <div class="row">
                <div class="col">
                    <ul id="main-menu" class="nav flex-column nav-pills bg-secondary text-white p-2">
                        <li class="nav-item">
                            <span class="nav-link text-white-50"><small>MENU</small></span>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pages" class="nav-link<?php if (resolve('/admin/pages.*')):?> active<?php endif;?>"><i class="fa-solid fa-book"></i> Páginas</a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/users" class="nav-link<?php if (resolve('/admin/users.*')):?> active<?php endif;?>"><i class="fa-regular fa-user"></i> Usuários</a>
                        </li>
                    </ul>
                </div>
                    <div id="content" class="col-10">
                        <?php include $content ?>
                    </div>
            </div>
    
        </div>

        <script>

        document.addEventListener('trix-attachment-add', function() {
            const attachment = event.attachment;
            if(!attachment.file) {
                return;
            }
            const form = new FormData();
            form.append('file', attachment.file);

            $.ajax({
                url: '/admin/upload/image', 
                method: 'POST',
                data: form,
                contentType: false,
                processData: false,
                xhr: function () {
                    const xhr = $.ajaxSettings.xhr();
                    xhr.upload.addEventListener('progress', function(e){
                        let progress = e.loaded / e.total * 100;
                        attachment.setuploadProgress(progress);
                    }) 

                    return xhr;
                }
            }).done(function(response){
                console.log(response);
                attachment.setAttributes({
                    url: response,
                    href: response
                })
            }).fail(function(){
                console.log('deu errado');
            });
        });
             
            <?php flash(); ?>

            const confirmEl = document.querySelector('.confirm');

            if (confirmEl) {
                confirmEl.addEventListener('click', function(e) {
                    e.preventDefault();
                     if(confirm('Tem certeza que quer fazer isso?')) {
                        Window.location = e.target.getAttribute('href');
                     }
                });
            }
        </script>
</body>
</html>