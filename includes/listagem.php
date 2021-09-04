<<<<<<< HEAD
<?php

date_default_timezone_set('America/Sao_Paulo');
$resultados = '';
foreach($vagas as $vaga){
    $resultados .= '<tr>
                        <td>'.$vaga->titulo.'</td>
                        <td>'.$vaga->descricao.'</td>
                        <td>'.($vaga->ativo == 's' ? 'Ativo' : 'Inativo').'</td>
                        <td>'.date("d/m/Y",strtotime($vaga->data)).'</td>
                        <td>
                            <a href="editar.php?id='.$vaga->id.'">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a>
                            <a href="excluir.php?id='.$vaga->id.'">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                </tr>';
}
?>
<main>
    <section>
        <a href="cadastrar.php">
            <button type="submit" class="btn btn-success">Nova Vaga</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
    </section>

<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">
                Voltar
            </button>
        </a>
    </section>

    <h2 class="mt-3">Cadastrar Vaga</h2>

    <form action="cadastrar.php" method="post">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name="titulo">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea type="text" class="form-control" name="descricao" rows="6"></textarea>
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
                        <input type="radio" name="ativo" value="n"> Inativo
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </form>
</main>