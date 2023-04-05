<h3 class="mb-5">Edição de página</h3>

<form action="" method="POST">
    <div class="form-group">
        <label for="pagesTitle">Título</label>
        <input name="title" id="pagesTitle" type="text" class="form-control" placeholder="aqui vai o título da página ..." value="<?php echo $data['page']['title']; ?>">
    </div>

    <div class="form-group">
        <label for="pagesUrl">URL</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input name="url" id="pagesUrl" type="text" class="form-control" placeholder="URL amigavel, deixe em branco para informa a página inicial..." required value="<?php echo $data['page']['url']; ?>"> 
        </div>
    </div>

    <div class="form-group"><label for=""></label>
        <textarea type="hidden" name="body" required id="pagesBody" input="pagesBody" cols="30" rows="10" maxlength="300" minlength="10" ><?php echo htmlentities( $data['page']['body']); ?></textarea>
    </div>   
    
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
<hr>

<a href="/admin/pages/<?php echo $data['page']['id'];?>" class="btn btn-secondary">Voltar</a>