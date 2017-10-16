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
                    edittype: 'text',
                    editrules: {edithidden: true, required:true}
                },
                {label: 'Divre',name: 'divre',width: 100, align: "left", hidden:false, editable: false},

                {label: 'Witel',name: 'param_master_witel_id',width: 100, align: "left", hidden:true, editable: true,
                    edittype: 'text',
                    editrules: {edithidden: true, required:true}
                },
                {label: 'Witel',name: 'witel',width: 150, align: "left",editable: false},

                {label: 'No Kontrak',name: 'param_master_no_kontrak_id',width: 100, align: "left", hidden:true, editable: true,
                    edittype: 'text',
                    editrules: {edithidden: true, required:true}
                },
                {label: 'No Kontrak',name: 'no_kontrak',width: 250, align: "left",editable: false},


                {label: 'Nama Tematik',name: 'param_master_nm_tematik_id',width: 100, align: "left", hidden:true, editable: true,
                    edittype: 'text',
                    editrules: {edithidden: true, required:true}
                },
                {label: 'Nama Tematik',name: 'nm_tematik',width: 180, align: "left",editable: false},


                {label: 'STO',name: 'param_master_sto_id',width: 100, align: "left", hidden:true, editable: true,
                    edittype: 'text',
                    editrules: {edithidden: true, required:true}
                },
                {label: 'STO',name: 'sto',width: 100, align: "left",editable: false},

                {label: 'ODP',name: 'param_master_odp_id',width: 100, align: "left", hidden:true, editable: true,
                    edittype: 'text',
                    editrules: {edithidden: true, required:true}
                },
                {label: 'ODP',name: 'odp_name',width: 150, align: "left",editable: false},

                {label: 'WBS',name: 'param_master_wbs_id',width: 100, align: "left", hidden:true, editable: true,
                    edittype: 'text',
                    editrules: {edithidden: true, required:true}
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
