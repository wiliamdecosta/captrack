<?php

/**
 * Odp Count Per STO Model
 *
 */
class Param_master_nm_tematik extends Abstract_model {

    public $table           = "Param_master_tematik";
    public $pkey            = "Param_master_tematik_id";
    public $alias           = "ocps";

    public $fields          = array(
                                'Param_master_tematik_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID'),
                                'nm_tematik'     => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'NM_TEMATIK')
                            );

    public $selectClause    = "ocps.*";
    public $fromClause      = "Param_master_tematik ocps";

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
            $this->record[$this->pkey] = $this->generate_seq_id($this->table);

        }else {

        }
        return true;
    }

}

/* End of file Param_master_nm_tematik.php */