<div class="modal" id="modalCustomers" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Seleccione Clientes</h4>
            </div>
            <div class="modal-body">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4">
                                    <div id="filter-form-container"></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="footable_c table table-stripped"
                                       data-filter-container="#filter-form-container" data-sorting="true"
                                       data-page-size="10" data-filtering="true">
                                    <thead>
                                    <tr>
                                        <th>Códico</th>
                                        <th>Descripción</th>
                                        <th data-type="html" data-sortable="false" data-filterable="false">
                                            Acciones
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="fa fa-times"></span> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>