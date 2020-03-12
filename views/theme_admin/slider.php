<?php $v->layout("theme_admin/_themeAdmin"); ?>


<section class="content">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                            <h3 class="card-title">Slider</h3>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-lg">
                                <i class="fas fa-plus-square"></i> Novo
                            </button>
                        </div>
                    </div>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Título</th>
                            <th>Ativo</th>
                            <th>Link</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                            <td>
                               <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                            </td>
                            <td> 4</td>
                            <td class="text-center py-0 align-middle">
                                <div class="btn-group-sm">
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <a href="#" class="btn btn-info"><i class="far fa-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>


<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novo Slider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="txtTitulo">Titulo</label>
                                    <input type="email" class="form-control" id="txtTitulo" placeholder="Titulo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Imagem</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fileImage">
                                            <label class="custom-file-label" for="fileImage">Selecione a imagen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="txtLink">Link</label>
                                    <input type="text" class="form-control" id="txtLink" placeholder="Link">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Tamanho</label>
                                    <select class="custom-select">
                                        <option>Pequeno</option>
                                        <option>Médio</option>
                                        <option>Grande</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label>Status</label>
                                <div class="form-group">
                                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Fechar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php $v->start("scripts"); ?>
<!-- DataTables -->
<script src="<?= asset("plugins/datatables/jquery.dataTables.js"); ?>"></script>
<script src="<?= asset("plugins/datatables-bs4/js/dataTables.bootstrap4.js"); ?>"></script>
<script src="<?= asset("plugins/bootstrap-switch/js/bootstrap-switch.min.js"); ?>"></script>
<script>

    $(function () {
        $("#example1").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    });
</script>
<?php $v->end(); ?>





