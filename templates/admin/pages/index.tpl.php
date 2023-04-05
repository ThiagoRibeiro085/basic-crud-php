<h3 class="mb-5">Administração  de páginas</h3>


<table class="table table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>título</th>
            <th>url</th>
            <th>body</th>
            <th>botões</th>            
        </tr>
    </thead>
    <tboody>
    <?php foreach($data['pages'] as $page) { ?>
            <tr>
                <td><?php echo $page['id'] ?></td>
                <td><?php echo $page['title'] ?></td>
                <td><?php echo $page['url'] ?></td>
                <td><?php echo $page['body'] ?></td>        
                <td class="text-right">
                    <a href="<?php echo "/admin/pages/".$page['id'] ?>" class="btn btn-primary btn-sm">listar</a>
                </td>
            </tr>  
        <?php } ?>
    </tboody>
</table>


<a href="/admin/pages/create" class="btn btn-secondary">novo registro</a>

