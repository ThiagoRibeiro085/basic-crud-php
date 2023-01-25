<h3 class="mb-5">Nova página</h3>

<form action="" method="POST">
    <div class="form-group">
        <label for="pagesTitle">Título</label>
        <input name="title" id="pagesTitle" type="text" class="form-control" placeholder="aqui vai o título da página ...">
    </div>

    <div class="form-group">
        <label for="pagesUrl">URL</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input name="url" id="pagesUrl" type="text" class="form-control" placeholder="URL amigavel, deixe em branco para informa a página inicial..." required> 
        </div>
    </div>

    <div class="form-group"><label for=""></label>
        <textarea type="hidden" name="body" required id="pagesBody" input="pagesBody" cols="30" rows="10" maxlength="300" minlength="10"></textarea>
    </div>   
    
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
<hr>

<a href="/admin/pages" class="btn btn-secondary">Voltar</a>