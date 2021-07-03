<ul class="list-group justify-content-center">
    <li class="list-group-item text-center"><h3>Informações da Poda</h3></li>
    <li class="list-group-item">OS - <a href="<?= base_url('oss/details/' . $p->os_id); ?>"><?= $p->os; ?></a></li>
    <li class="list-group-item">Tipo: <?= $p->tipo; ?></li>
    <li class="list-group-item">Nome popular - Nome Científico: <?= $p->especie ?></li>
    <li class="list-group-item">Quantidade: <?= $p->quantidade; ?></li>
    <li class="list-group-item"><?= "Altura da árvore: $p->alt_arv - Altura da poda: $p->alt_poda - " .
        "Diâmetro da copa: $p->diametro"; ?></li>
    <li class="list-group-item">Intensidade da Poda: <?= $p->intensidade; ?></li>
    <li class="list-group-item">Local: <?= $p->local; ?></li>
    <li class="list-group-item">Criado em: <?= dateSwap($p->created_at); ?>, atualizado em: <?= dateSwap($p->updated_at); ?></li>
    <?php if (isset($p->image)) { ?>
        <li class="list-group-item">
            <img src="<?=$p->file_path."?a=".date("d-m-YH:i:s.u")?>" alt="Foto" width="100%" height="auto">
        </li>
    <?php } ?>
    <li class="list-group-item">
        <a href="<?= base_url('podas/edit/' . $p->id); ?>" class="btn btn-info">Editar as informações <i
                    class="fas fa-edit"></i></a>
        <a href="<?= base_url('podas/delete/' . $p->id); ?>" class="btn btn-danger">Excluir poda <i
                    class="fas fa-times"></i></a>
    </li>
</ul>