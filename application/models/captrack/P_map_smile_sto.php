<?php

/**
 * Icons Model
 *
 */
class P_map_smile_sto extends Abstract_model {

    public $table           = "p_map_smile_sto";
    public $pkey            = "p_map_smile_sto_id";
    public $alias           = "mss";

    public $fields          = array(
                                'p_map_smile_sto_id'  => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Regional Mapper'),
                                'nm_divisi'               => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'NM_DIVISI'),
                                'nm_witel'                => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'NM_WITEL'),
                                'key1'                => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'KEY1'),
                                'nm_loksto'                => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'NM_LOKSTO'),
                                'sto3'                => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'STO3'),

                                'created_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "mss.*, sto3 as sto3_display";
    public $fromClause      = "p_map_smile_sto mss";

    public $refs            = array();

    function __construct() {
        parent::__construct();
    }

    function validate() {

        $ci =& get_instance();
        $userdata = $ci->session->userdata;

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            $this->db->set('created_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['created_by'] = $userdata['user_name'];
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];

            $this->record['key1'] = $this->record['nm_divisi']."/".$this->record['nm_witel']."/".$this->record['nm_loksto'];

            $this->record[$this->pkey] = $this->generate_seq_id($this->table);

        }else {
            //do something
            //example:
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];
            //if false please throw new Exception
            $this->record['key1'] = $this->record['nm_divisi']."/".$this->record['nm_witel']."/".$this->record['nm_loksto'];
        }
        return true;
    }

}

/* End of file Icons.php */