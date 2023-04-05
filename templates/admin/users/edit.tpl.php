 
<h3 class="mb-5">Administração de usuários</h3>

<form method="post">
   <div class="form-group">
       <label for="usersEmail"></label>
       <input id="usersEmail" type="email" name="email" class="form-control" placeholder="Digite seu e-mail" value="<?php echo $data['use']['email'];?>">
   </div>
   <div class="form-group">
       <label for="usersPassword">Senha</label>
       <input id="usersPassword" type="password" name="password"  class="form-control" placeholder="Digite sua senha">
   </div>

   <button type="submit" class="btn btn-primary">Salvar</button>
</form> 
<hr>  

<a href="/admin/users/<?php echo $data['use']['id'];?>" class="btn btn-secondary">voltar</a>

