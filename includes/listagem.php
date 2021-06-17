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
</main>