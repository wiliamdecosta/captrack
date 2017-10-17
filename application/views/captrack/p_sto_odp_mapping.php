<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>STO - ODP Mapping</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <table id="grid-table"></table>
        <div id="grid-pager"></div>
    </div>
</div>
<?php $this->load->view('lov/lov_param_master_sto'); ?>
<?php $this->load->view('lov/lov_param_master_witel'); ?>
<?php $this->load->view('lov/lov_param_master_no_kontrak'); ?>
<?php $this->load->view('lov/lov_param_master_nm_tematik'); ?>
<?php $this->load->view('lov/lov_param_master_odp'); ?>
<?php $this->load->view('lov/lov_param_master_wbs'); ?>

<script>
function showLOVSTO(id, code) {
    modal_lov_param_master_sto_show(id, code);
}

function showLOVWITEL(id, code) {
    modal_lov_param_master_witel_show(id, code);
}

function showLOVNoKontrak(id, code) {
    modal_lov_param_master_no_kontrak_show(id, code);
}

function showLOVNmTematik(id, code) {
    modal_lov_param_master_nm_tematik_show(id, code);
}

function showLOVODP(id, code) {
    modal_lov_param_master_odp_show(id, code);
}

function showLOVWBS(id, code) {
    modal_lov_param_master_wbs_show(id, code);
}

function clearLovInput() {
    $('#form_wbs').val('');
    $('#form_wbs_id').val('');
    $('#form_odp').val('');
    $('#form_odp_id').val('');
    $('#form_sto').val('');
    $('#form_sto_id').val('');
    $('#form_nm_tematik').val('');
    $('#form_nm_tematik_id').val('');
    $('#form_no_kontrak').val('');
    $('#form_no_kontrak_id').val('');
    $('#form_witel').val('');
    $('#form_witel_id').val('');
}

</script>
<script>

    jQuery(function($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        jQuery("#grid-table").jqGrid({
            url: '<?php echo WS_JQGRID."captrack.p_sto_odp_mapping_controller/crud"; ?>',
            datatype: "json",
            mtype: "POST",
            colModel: [
                {label: 'ID', name: 'p_sto_odp_mapping_id', key: true, width: 5, sorttype: 'number', editable: true, hidden: true},

                {label: 'Divre',name: 'param_master_divre_id',width: 100, align: "left", hidden:true, editable: true,
                    edittype: 'select',
                    editrules: {edithidden: true, required:true},
                    editoptions: {
                        style: "width: 200px",
                        dataUrl: '<?php echo WS_JQGRID."captrack.p_sto_odp_mapping_controller/combo"; ?>'
                    }
                },
                {label: 'Divre',name: 'divre',width: 100, align: "left", hidden:false, editable: false},

                {label: 'Witel',name: 'param_master_witel_id',width: 100, align: "left", hidden:true, editable: true,
                    editrules: {edithidden: true, required:true},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_witel_id" readonly type="hidden" class="FormElement form-control">'+
                                    '<input id="form_witel" readonly type="text" class="FormElement form-control" placeholder="Pilih witel">'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVWITEL(\'form_witel_id\',\'form_witel\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_witel_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_witel_id").val();
                            } else if( oper === 'set') {
                                $("#form_witel_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'witel');
                                        $("#form_witel").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'Witel',name: 'witel',width: 150, align: "left",editable: false},

                {label: 'No Kontrak',name: 'param_master_no_kontrak_id',width: 200, align: "left", hidden:true, editable: true,
                    edittype: 'custom',
                    editrules: {edithidden: true, required:true},
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_no_kontrak_id" readonly type="hidden" class="FormElement form-control">'+
                                    '<input id="form_no_kontrak" readonly type="text" class="FormElement form-control" placeholder="Pilih No Kontrak">'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVNoKontrak(\'form_no_kontrak_id\',\'form_no_kontrak\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_no_kontrak_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_no_kontrak_id").val();
                            } else if( oper === 'set') {
                                $("#form_no_kontrak_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'no_kontrak');
                                        $("#form_no_kontrak").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'No Kontrak',name: 'no_kontrak',width: 250, align: "left",editable: false},


                {label: 'Nama Tematik',name: 'param_master_tematik_id',width: 100, align: "left", hidden:true, editable: true,
                    edittype: 'custom',
                    editrules: {edithidden: true, required:true},
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_nm_tematik_id" readonly type="hidden" class="FormElement form-control">'+
                                    '<input id="form_nm_tematik" readonly type="text" class="FormElement form-control" placeholder="Pilih Nama Tematik">'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVNmTematik(\'form_nm_tematik_id\',\'form_nm_tematik\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_nm_tematik_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_nm_tematik_id").val();
                            } else if( oper === 'set') {
                                $("#form_nm_tematik_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'nm_tematik');
                                        $("#form_nm_tematik").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'Nama Tematik',name: 'nm_tematik',width: 180, align: "left",editable: false},


                {label: 'STO',name: 'param_master_sto_id',width: 100, align: "left", hidden:true, editable: true,
                    edittype: 'custom',
                    editrules: {edithidden: true, required:true},
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_sto_id" readonly type="hidden" class="FormElement form-control">'+
                                    '<input id="form_sto" readonly type="text" class="FormElement form-control" placeholder="Pilih STO">'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVSTO(\'form_sto_id\',\'form_sto\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_sto_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_sto_id").val();
                            } else if( oper === 'set') {
                                $("#form_sto_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'sto');
                                        $("#form_sto").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'STO',name: 'sto',width: 100, align: "left",editable: false},

                {label: 'ODP',name: 'param_master_odp_id',width: 100, align: "left", hidden:true, editable: true,
                    edittype: 'custom',
                    editrules: {edithidden: true, required:true},
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_odp_id" readonly type="hidden" class="FormElement form-control">'+
                                    '<input id="form_odp" readonly type="text" class="FormElement form-control" placeholder="Pilih Nama ODP">'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVODP(\'form_odp_id\',\'form_odp\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_odp_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_odp_id").val();
                            } else if( oper === 'set') {
                                $("#form_odp_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'odp_name');
                                        $("#form_odp").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'ODP',name: 'odp_name',width: 150, align: "left",editable: false},

                {label: 'WBS',name: 'param_master_wbs_id',width: 100, align: "left", hidden:true, editable: true,
                    editrules: {edithidden: true, required:true},
                    edittype: 'custom',
                    editoptions: {
                        "custom_element":function( value  , options) {
                            var elm = $('<span></span>');

                            // give the editor time to initialize
                            setTimeout( function() {
                                elm.append('<input id="form_wbs_id" readonly type="hidden" class="FormElement form-control">'+
                                    '<input id="form_wbs" readonly type="text" class="FormElement form-control" placeholder="Pilih Nama WBS">'+
                                        '<button class="btn btn-success" type="button" onclick="showLOVWBS(\'form_wbs_id\',\'form_wbs\')">'+
                                        '   <span class="fa fa-search bigger-110"></span>'+
                                        '</button>');
                                $("#form_wbs_id").val(value);
                                elm.parent().removeClass('jqgrid-required');
                            }, 100);

                            return elm;
                        },
                        "custom_value":function( element, oper, gridval) {

                            if(oper === 'get') {
                                return $("#form_wbs_id").val();
                            } else if( oper === 'set') {
                                $("#form_wbs_id").val(gridval);
                                var gridId = this.id;
                                // give the editor time to set display
                                setTimeout(function(){
                                    var selectedRowId = $("#"+gridId).jqGrid ('getGridParam', 'selrow');
                                    if(selectedRowId != null) {
                                        var code_display = $("#"+gridId).jqGrid('getCell', selectedRowId, 'wbs_name');
                                        $("#form_wbs").val( code_display );
                                    }
                                },100);
                            }
                        }
                    }
                },
                {label: 'WBS',name: 'wbs_name',width: 150, align: "left",editable: false},
                {label: 'Created Date',name: 'created_date',width: 100, align: "left",editable: false},
                {label: 'Created By',name: 'created_by',width: 100, align: "left",editable: false},
                {label: 'Updated Date',name: 'updated_date',width: 100, align: "left",editable: false},
                {label: 'Updated By',name: 'updated_by',width: 100, align: "left",editable: false},

            ],
            height: '100%',
            autowidth: true,
            viewrecords: true,
            rowNum: 10,
            rowList: [10,20,50],
            rownumbers: true, // show row numbers
            rownumWidth: 35, // the width of the row numbers columns
            altRows: true,
            shrinkToFit: false,
            multiboxonly: true,
            onSelectRow: function (rowid) {
                /*do something when selected*/

            },
            sortorder:'',
            pager: '#grid-pager',
            jsonReader: {
                root: 'rows',
                id: 'id',
                repeatitems: false
            },
            loadComplete: function (response) {
                if(response.success == false) {
                    swal({title: 'Attention', text: response.message, html: true, type: "warning"});
                }

            },
            //memanggil controller jqgrid yang ada di controller crud
            editurl: '<?php echo WS_JQGRID."captrack.p_sto_odp_mapping_controller/crud"; ?>',
            caption: "STO-ODP Mapping"

        });

        jQuery('#grid-table').jqGrid('navGrid', '#grid-pager',
            {   //navbar options
                edit: true,
                editicon: 'fa fa-pencil blue bigger-120',
                add: true,
                addicon: 'fa fa-plus-circle purple bigger-120',
                del: true,
                delicon: 'fa fa-trash-o red bigger-120',
                search: true,
                searchicon: 'fa fa-search orange bigger-120',
                refresh: true,
                afterRefresh: function () {
                    // some code here
                    jQuery("#detailsPlaceholder").hide();
                },

                refreshicon: 'fa fa-refresh green bigger-120',
                view: false,
                viewicon: 'fa fa-search-plus grey bigger-120'
            },

            {
                // options for the Edit Dialog
                closeAfterEdit: true,
                closeOnEscape:true,
                recreateForm: true,
                serializeEditData: serializeJSON,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);

                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
                }
            },
            {
                //new record form
                closeAfterAdd: false,
                clearAfterAdd : true,
                closeOnEscape:true,
                recreateForm: true,
                width: 'auto',
                errorTextFormat: function (data) {
                    return 'Error: ' + data.responseText
                },
                serializeEditData: serializeJSON,
                viewPagerButtons: false,
                beforeShowForm: function (e, form) {
                    var form = $(e[0]);
                    style_edit_form(form);

                    setTimeout(function() {
                        clearLovInput();
                    },100);
                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }

                    $(".tinfo").html('<div class="ui-state-success">' + response.message + '</div>');
                    var tinfoel = $(".tinfo").show();
                    tinfoel.delay(3000).fadeOut();


                    return [true,"",response.responseText];
                }
            },
            {
                //delete record form
                serializeDelData: serializeJSON,
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                    style_delete_form(form);

                },
                afterShowForm: function(form) {
                    form.closest('.ui-jqdialog').center();
                },
                onClick: function (e) {
                    //alert(1);
                },
                afterSubmit:function(response,postdata) {
                    var response = jQuery.parseJSON(response.responseText);
                    if(response.success == false) {
                        return [false,response.message,response.responseText];
                    }
                    return [true,"",response.responseText];
                }
            },
            {
                //search form
                closeAfterSearch: false,
                recreateForm: true,
                afterShowSearch: function (e) {
                    var form = $(e[0]);
                    style_search_form(form);
                    form.closest('.ui-jqdialog').center();
                },
                afterRedraw: function () {
                    style_search_filters($(this));
                }
            },
            {
                //view record form
                recreateForm: true,
                beforeShowForm: function (e) {
                    var form = $(e[0]);
                }
            }
        );

    });

    function responsive_jqgrid(grid_selector, pager_selector) {

        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(grid_selector).jqGrid( 'setGridWidth', $(".page-content").width() );
        $(pager_selector).jqGrid( 'setGridWidth', parent_column.width() );

    }

</script>
