<?php

/**
 * Icons Model
 *
 */
class P_master_sto extends Abstract_model {

    public $table           = "p_master_sto";
    public $pkey            = "p_master_sto_id";
    public $alias           = "ms";

    public $fields          = array(
                                'p_master_sto_id'  => array('pkey' => true, 'type' => 'int', 'nullable' => true, 'unique' => true, 'display' => 'ID Master STO'),
                                'org_path'               => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'ORG PATH'),
                                'org_path1'                => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'ORG PATH1'),
                                'org_path2'               => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'ORG PATH2'),
                                'org_path3'                => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'ORG PATH3'),
                                'org_path4'               => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'ORG PATH4'),
                                'org_path5'               => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'ORG PATH5'),
                                'org_path6'               => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'ORG PATH6'),
                                'sto3'               => array('nullable' => false, 'type' => 'str', 'unique' => true, 'display' => 'STO3'),
                                'regsto'               => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'REGSTO'),
                                'stoname'               => array('nullable' => false, 'type' => 'str', 'unique' => false, 'display' => 'STONAME'),
                                'recode'               => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'RECODE'),



                                'created_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Created Date'),
                                'created_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Created By'),
                                'updated_date'          => array('nullable' => true, 'type' => 'date', 'unique' => false, 'display' => 'Updated Date'),
                                'updated_by'            => array('nullable' => true, 'type' => 'str', 'unique' => false, 'display' => 'Updated By'),

                            );

    public $selectClause    = "ms.*";
    public $fromClause      = "p_master_sto ms";

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
            //$this->db->set('org_path',"CONCAT(org_path1, ('/'||org_path2||'/'||org_path3||'/'||org_path4||'/'||org_path5||'/'||org_path6))",false);
            //$this->db->set('regsto',"CONCAT(org_path6, ('/'||recode))",false);
            $this->db->set('created_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['created_by'] = $userdata['user_name'];
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];
            $this->record['org_path'] = $this->record['org_path1'] . '/' .
                                        $this->record['org_path2'] . '/' .
                                        $this->record['org_path3'] . '/' .
                                        $this->record['org_path4'] . '/' .
                                        $this->record['org_path5'] . '/' .
                                        $this->record['org_path6'];

            //string org_path3 di explode jd array
            //$this->record['recode'] diisi string "RE".                                        
            $arr_org_path3 = explode(" " , $this->record['org_path3']);
            //$this->db->set('recode',"'RE"."$arr_org_path3[1]"."'",false);
            $this->record['recode'] = "RE".$arr_org_path3[1];

            $this->record['regsto'] = $this->record['recode'].'/'.$this->record['org_path6'];
            $this->record[$this->pkey] = $this->generate_seq_id($this->table);

        }else {
            //do something
            //example:
            
            $this->db->set('updated_date',"to_date('".date('Y-m-d')."','yyyy-mm-dd')",false);
            $this->record['updated_by'] = $userdata['user_name'];
            
            $this->record['org_path'] = $this->record['org_path1'] . '/' .
                                        $this->record['org_path2'] . '/' .
                                        $this->record['org_path3'] . '/' .
                                        $this->record['org_path4'] . '/' .
                                        $this->record['org_path5'] . '/' .
                                        $this->record['org_path6'];
            $arr_org_path3 = explode(" " , $this->record['org_path3']);
            //$this->db->set('recode',"'RE"."$arr_org_path3[1]"."'",false);
            $this->record['recode'] = "RE" . $arr_org_path3[1];

            $this->record['regsto'] = $this->record['recode'] . '/' . $this->record['org_path6'];
        }
        return true;
    }

}

/* End of file Icons.php */