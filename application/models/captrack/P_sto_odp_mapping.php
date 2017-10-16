<?php

/**
 * Icons Model
 *
 */
class P_sto_odp_mapping extends Abstract_model
{
    public $table           = "p_sto_odp_mapping";
    public $pkey            = "p_sto_odp_mapping_id";
    public $alias           = "som";

    public $fields          = array(
                                'p_sto_odp_mapping_id'      => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID STO ODP Mapping'),
                                'param_master_divre_id'     => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID Divre'),
                                'param_master_witel_id'     => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID Witel'),
                                'param_master_no_kontrak_id' => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID No Kontrak'),
                                'param_master_tematik_id'   => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID Tematik'),
                                'param_master_sto_id'       => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID STO'),
                                'param_master_odp_id'       => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID ODP'),
                                'param_master_wbs_id'       => array('nullable' => false, 'type' => 'int', 'unique' => false, 'display' => 'ID WBS'),

                                'created_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "som.p_sto_odp_mapping_id, som.param_master_divre_id, som.param_master_witel_id, som.param_master_no_kontrak_id, som.param_master_tematik_id, som.param_master_sto_id, som.param_master_odp_id, som.param_master_wbs_id,
                                som.keterangan, som.created_date, som.created_by, som.updated_date, som.updated_by,
                                master_divre.divre,
                                master_witel.witel,
                                master_kontrak.no_kontrak,
                                master_tematik.nm_tematik,
                                master_sto.sto,
                                master_odp.odp_name,
                                master_wbs.wbs_name";
    public $fromClause      = "p_sto_odp_mapping som
                                left join param_master_divre master_divre on som.param_master_divre_id = master_divre.param_master_divre_id
                                left join param_master_witel master_witel on som.param_master_witel_id = master_witel.param_master_witel_id
                                left join param_master_no_kontrak master_kontrak on som.param_master_no_kontrak_id = master_kontrak.param_master_no_kontrak_id
                                left join param_master_tematik master_tematik on som.param_master_tematik_id = master_tematik.param_master_tematik_id
                                left join param_master_sto master_sto on som.param_master_sto_id = master_sto.param_master_sto_id
                                left join param_master_odp master_odp on som.param_master_odp_id = master_odp.param_master_odp_id
                                left join param_master_wbs master_wbs on som.param_master_wbs_id = master_wbs.param_master_wbs_id";

    public $refs            = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function validate()
    {
        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if ($this->actionType == 'CREATE') {
            //do something
            // example :
            $this->db->set('created_date', "to_date('".date('Y-m-d')."','yyyy-mm-dd')", false);
            $this->record['created_by'] = $userdata['user_name'];
            $this->db->set('updated_date', "to_date('".date('Y-m-d')."','yyyy-mm-dd')", false);
            $this->record['updated_by'] = $userdata['user_name'];

            $this->record[$this->pkey] = $this->generate_seq_id($this->table);
        } else {
            //do something
            //example:
            $this->db->set('updated_date', "to_date('".date('Y-m-d')."','yyyy-mm-dd')", false);
            $this->record['updated_by'] = $userdata['user_name'];
            //if false please throw new Exception

        }
        return true;
    }
}

/* End of file Icons.php */
