<!DOCTYPE html>
<html lang="pt -BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https/admin/users://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">

    <title>Painel administrativo</title>
</head>
<body class="d-flex flex-column bg-primary">    
        <div id="header">
            <nav class="navbar navbar-dark bg-dark">
                <span>
                    <a href="/admin" class="navbar-brand">Admin_Thiago</a>
                    <span class="navbar-text">
                        Painel Administrativo
                    </span>
                </span>
            </nav>
        </div>
        <div id="main">
            <div class="row justify-content-center">
                    <div id="content" class="col-4 align-self-center">
                        <?php include $content ?>
                    </div>
            </div>
        </div>

        <script>
            <?php flash(); ?>
        </script>
</body>
</html>