<ul class="list-group justify-content-center">
    <li class="list-group-item text-center"><h3>Informações da OS <span id="numero_os"><?= $o->numero; ?></span></h3></li>
    <li class="list-group-item">Data da Vistoria: <?= dateSwap($o->dt_vistoria); ?></li>
    <li class="list-group-item">Vistoriador: <?= $o->nome_vistoriador; ?></li>
    <li class="list-group-item">
        Criado em: <?= dateSwap($o->created_at); ?>, atualizado em: <?= dateSwap($o->updated_at); ?></li>
    <li class="list-group-item">
        <a href="<?= base_url('oss/gerar-excel/' . $o->id); ?>" class="btn btn-success" target="_blank">Gerar relatório em Excel <i
                    class="fas fa-file-excel"></i></a>
        <a href="<?= base_url('oss/edit/' . $o->id); ?>" class="btn btn-info">Editar as informações <i
                    class="fas fa-edit"></i></a>
        <a href="<?= base_url('oss/delete/' . $o->id); ?>" class="btn btn-danger">Excluir OS <i
                    class="fas fa-times"></i></a>
    </li>
</ul>
<div class="my-4">
    <div class="card animated fadeIn">
        <div class="card-header green darken-4">
            <h5 class="float-left my-2 white-text"><i class="mr-3 fas fa-list-ol"></i>Podas e Supressões</h5>
        </div>
        <div class="card-body px-2 green lighten-4" id="tVtrCard">
            <a class="btn btn-info mt-4 mb-1"
               href="<?= base_url('podas/create?os_id=' . $o->id); ?>">Cadastrar poda <i class="fas fa-plus"></i></a>
            <a class="btn btn-info mt-4 mb-1"
               href="<?= base_url('supressoes/create?os_id=' . $o->id); ?>">Cadastrar supressão <i
                        class="fas fa-plus"></i></a>
            <p><small>**Clique no tipo para mais informações</small></p>
            <table class="table table-hover text-center mx-auto table-condensed table-striped w-100" id="table_os_svs">
                <thead>
                <tr>
                    <th>Serviço</th>
                    <th>Tipo</th>
                    <th>Data de registro</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($o->svs as $sv) { ?>
                    <tr>
                        <td><?= $sv->sv; ?></td>
                        <td><a class='blue-text' href='<?= $sv->link ?>'><?= $sv->tipo ?></a></td>
                        <td><?= $sv->created_at; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>OS</th>
                    <th>Tipo</th>
                    <th>Data de registro</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.addEventListener("load", function () {
        containerMaior();
        $('#table_os_svs').DataTable({
            language: dataTableLang,
            "searching": true,
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 linhas', '25 linhas', '50 linhas', 'Todos']
            ],
            dom: 'frtip'
        });
    });
</script>

