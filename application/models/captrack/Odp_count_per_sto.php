<?php

/**
 * Odp Count Per STO Model
 *
 */
class Odp_count_per_sto extends Abstract_model {

    public $table           = "odp_count_per_sto";
    public $pkey            = "id";
    public $alias           = "ocps";

    public $fields          = array(
                                'id'            => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID'),
                                'regsto'     => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'REGSTO'),
                                'stoodpcount'      => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'ODP_COUNT'),
                                'periode'          => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'PERIODE'),
                            );

    public $selectClause    = "ocps.*";
    public $fromClause      = "odp_count_per_sto ocps";

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

/* End of file Odp_count_per_sto.php */