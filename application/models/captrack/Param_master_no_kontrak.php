<?php

/**
 * Odp Count Per STO Model
 *
 */
class Param_master_no_kontrak extends Abstract_model {

    public $table           = "Param_master_no_kontrak";
    public $pkey            = "Param_master_no_kontrak_id";
    public $alias           = "ocps";

    public $fields          = array(
                                'Param_master_no_kontrak_id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID'),
                                'no_kontrak'     => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'NO_KONTRAK')
                            );

    public $selectClause    = "ocps.*";
    public $fromClause      = "Param_master_no_kontrak ocps";

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

/* End of file Param_master_no_kontrak.php */