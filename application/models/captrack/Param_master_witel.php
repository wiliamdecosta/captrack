<?php

/**
 * Odp Count Per STO Model
 *
 */
class Param_master_witel extends Abstract_model {

    public $table           = "Param_master_witel";
    public $pkey            = "Param_master_witel_id";
    public $alias           = "ocps";

    public $fields          = array(
                                'Param_master_witel_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID'),
                                'witel'     => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'WITEL'),
                                'recode'     => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'RECODE')
                            );

    public $selectClause    = "ocps.*";
    public $fromClause      = "Param_master_witel ocps";

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

/* End of file Param_master_witel.php */