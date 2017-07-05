<?php

/**
 * Icons Model
 *
 */
class P_regional_mapper extends Abstract_model {

    public $table           = "p_regional_mapper";
    public $pkey            = "p_regional_mapper_id";
    public $alias           = "rm";

    public $fields          = array(
                                'p_regional_mapper_id'  => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Regional Mapper'),
                                'regname'               => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'REGNAME'),
                                'recode'                => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'RECODE'),

                                'created_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "rm.*";
    public $fromClause      = "p_regional_mapper rm";

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

            $this->record[$this->pkey] = $this->generate_seq_id($this->table);

        }else {
            //do something
            //example:
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];
            //if false please throw new Exception
        }
        return true;
    }

}

/* End of file Icons.php */