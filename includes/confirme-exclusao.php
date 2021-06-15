<main>
    <h2 class="mt-3">Confirmar exclusao</h2>

    <form method="post">

        <div class="form-group">
            <p>Tem certeza que deseja excluir a vaga <strong><?=$objVaga->titulo?></strong></p>
        </div>

        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>