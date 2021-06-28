<ul class="list-group justify-content-center">
    <li class="list-group-item text-center"><h3>Informações da Supressão</h3></li>
    <li class="list-group-item">OS - <a href="<?=base_url('oss/details/'.$s->os_id);?>"><?= $s->os;?></a></li>
    <li class="list-group-item">Tipo: <?= $s->tipo; ?></li>
    <li class="list-group-item">Nome popular - Nome Científico: <?= $s->especie?></li>
    <li class="list-group-item">Quantidade: <?= $s->quantidade; ?></li>
    <li class="list-group-item"><?= "Altura da árvore: $s->alt_arv - Altura da copa: $s->alt_copa -".
        "Diâmetro da copa: $s->diametro"; ?></li>
    <li class="list-group-item">Perímetro: <?= $s->perimetro;?></li>
    <li class="list-group-item">Local: <?= $s->local; ?></li>
    <li class="list-group-item">
        Criado em: <?= dateSwap($s->created_at); ?>, atualizado em: <?= dateSwap($s->updated_at); ?></li>
    <li class="list-group-item">
        <a href="<?= base_url('supressoes/edit/' . $s->id); ?>" class="btn btn-info">Editar as informações <i
                    class="fas fa-edit"></i></a>
        <a href="<?= base_url('supressoes/delete/' . $s->id); ?>" class="btn btn-danger">Excluir supressão <i
                    class="fas fa-times"></i></a>
    </li>
</ul>