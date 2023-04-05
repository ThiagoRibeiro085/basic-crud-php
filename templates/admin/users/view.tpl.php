
<h3 class="mb-5">Administração de usuários</h3>

<dl class="rol">
    <dt class="col-sm-3">Email</dt>
    <dd class="col-sm-9"><?php echo $data['use']['email'];?></dd>

    <dt class="col-sm-3">Criado em</dt>
    <dd class="col-sm-9"><?php echo $data['use']['created'];?></dd>

    <dt class="col-sm-3">Atualizado em</dt>
    <dd class="col-sm-9"><?php echo $data['use']['updated'];?></dd>

</dl>

<p>
    <a href="/admin/users/<?php echo $data['use']['id']; ?>/edit" class="btn btn-primary">Editar</a>
    <a href="/admin/users/<?php echo $data['use']['id']; ?>/delete" class="btn btn-danger confirm">Deletar</a>
</p>



<a href="/admin/users" class="btn btn-secondary">voltar</a>

