<h3 class="mb-5">Administração de usuários</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>e-mail<th>
            <th>botões</th>  
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['users'] as $use) { ?>
        <tr>
                <td><?php echo $use['id'] ?></td>
                <td><?php echo $use['email'] ?></td> 
                <td class="text-right">
                    <a href="<?php echo "/admin/users/".$use['id'] ?>" class="btn btn-primary btn-sm">ver</a>
                </td>
        </tr>
        <?php } ?>
    </tbody>
</table>   
    

<a href="/admin/users/create" class="btn btn-secondary">novo</a>

