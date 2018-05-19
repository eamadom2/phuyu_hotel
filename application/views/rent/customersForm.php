<div class="modal" id="modalCustomersForm" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="titleFormEntity"></h4>
            </div>
            <div class="modal-body">
                <div>
                    <div class="separator"></div>
                    <div class="form-horizontal" id="ent_gen_frm_">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Documento</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" id="ent_doc"
                                       onkeypress="return soloNumeros(event)" maxlength="8">
                            </div>
                        </div>
                        <div class="form-group show_tp_1">
                            <label class="col-sm-3 control-label">Apellido Paterno</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" id="ent_ap_pat"
                                       onkeypress="return soloLetras(event)">
                            </div>
                        </div>
                        <div class="form-group show_tp_1">
                            <label class="col-sm-3 control-label">Apellido Materno</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" id="ent_ap_mat"
                                       onkeypress="return soloLetras(event)">
                            </div>
                        </div>
                        <div class="form-group show_tp_1">
                            <label class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" id="ent_name"
                                       onkeypress="return soloLetras(event)">
                            </div>
                        </div>
                        <div class="form-group hide show_tp_2">
                            <label class="col-sm-3 control-label">Razón Social</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" id="ent_rs"
                                       onkeypress="return soloLetras(event)">
                            </div>
                        </div>
                        <div class="form-group hide show_tp_2">
                            <label class="col-sm-3 control-label">Dirección Legal</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" id="ent_address">
                            </div>
                        </div>
                        <div class="form-group show_prov">
                            <label class="col-sm-3 control-label">Telefono</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" id="ent_contact_phone">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" ng-click="saveEntity()">
                    <span class="fa fa-plus"></span> Guardar
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <span class="fa fa-times"></span> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>