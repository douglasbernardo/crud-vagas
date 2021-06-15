
    <section>
        <a href="index.php">
            <button class="btn btn-success">
                Voltar
            </button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="<?=$objVaga->titulo ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea type="text" class="form-control" name="descricao" rows="6"><?=$objVaga->descricao ?></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s" checked> Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="n" <?= $objVaga->ativo == "n" ? "checked" : "" ?>> Inativo
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success mt-4"><?=BUTTON?></button>
        </div>
    </form>
</main>