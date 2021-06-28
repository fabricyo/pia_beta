<div class="my-4">
    <div class="card animated fadeIn">
        <div class="card-header green darken-4">
            <h5 class="float-left my-2 white-text"><i class="mr-3 fas fa-list-ol"></i> Ordens de Serviço</h5>
        </div>
        <div class="card-body px-2 green lighten-5" id="tVtrCard">
            <a class="btn btn-info mt-4 mb-1"
               href="<?= base_url('oss/create'); ?>">Cadastrar OS <i class="fas fa-plus"></i></a>
            <p><small>**Clique no número da OS para mais informações</small></p>
            <a id="gerar" class="btn btn-success" target="_blank">Gerar relatório em Excel <i
                        class="fas fa-file-excel"></i></a>
            <span id="alert"></span>
            <p><small>***Clique nas OSs que irão para o relatório</small></p>
            <table class="table table-hover text-center mx-auto table-condensed table-striped w-100"
                   id="table_oss">
                <thead>
                <tr>
                    <th>id</th>
                    <th>OS</th>
                    <th>Data da Vistoria</th>
                    <th>Vistoriador</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($oss as $o) { ?>
                    <tr>
                        <td><?= $o->id ?></td>
                        <td><a class='cyan-text' href='<?= base_url("oss/details/$o->id") ?>'>
                                <?= $o->numero ?></a></td>
                        <td><?= dateSwap($o->dt_vistoria); ?></td>
                        <td><?= $o->nome_vistoriador; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>OS</th>
                    <th>Data da Vistoria</th>
                    <th>Vistoriador</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.addEventListener("load", function () {
        var table_oss = $('#table_oss').DataTable({
            language: dataTableLang,
            "searching": true,
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 linhas', '25 linhas', '50 linhas', 'Todos']
            ],
            dom: 'frtip',
            'columnDefs': [
                //hide the second & fourth column
                {'visible': false, 'targets': [0]}
            ]
        });
        $('#table_oss tbody').on('click', 'tr', function () {
            $(this).toggleClass('selected blue lighten-5');
        });
        $('#gerar').click(function () {
            let rows = table_oss.rows('.selected').data();
            if (rows.length > 0) {
                let url = '<?=base_url("oss/gerar-excel")?>/';
                $.each(rows, function (key, entry) {
                    console.info(entry[0]);
                    url = url + entry[0] + "|";
                });
                url = url.slice(0,-1);
                $(this).attr('href', url);
            }else{
                $("#alert").html(alert('danger', 'Erro', "Você deve selecionar pelo menos uma OS para gerar o relatório"));
            }
        });
    });
</script>