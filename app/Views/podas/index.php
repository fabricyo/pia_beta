<div class="my-4">
    <div class="card animated fadeIn">
        <div class="card-header green darken-4">
            <h5 class="float-left my-2 white-text"><i class="mr-3 fas fa-list-ol"></i> Podas</h5>
        </div>
        <div class="card-body px-2 green lighten-5" id="tPodasCard">
            <a class="btn btn-info mt-4 mb-1"
               href="<?= base_url('podas/create');?>">Cadastrar poda <i class="fas fa-plus"></i></a>
            <p><small>**Clique no tipo para mais informações</small></p>
            <table class="t_paginada_client_processing table table-hover text-center mx-auto table-condensed table-striped w-100" id="table_podas">
                <thead>
                <tr>
                    <th>OS</th>
                    <th>Tipo</th>
                    <th>Data de registro</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ps as $p) { ?>
                    <tr>
                        <td><?= $p->os; ?></td>
                        <td><a class='blue-text' href='<?= base_url("podas/details/$p->id") ?>'>
                                <?= $p->tipo ?></a></td>
                        <td><?= dateSwap(explode(" ", $p->created_at)[0]). " ".explode(" ", $p->created_at)[1]  ;?></td>
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
    window.addEventListener("load", function(){
        containerMaior();
    });
</script>