<?php
class work_sheet{
       var $rows;
       var $name="";
       function __construct($work_sheet_name){
		    require_once "row.php";
            $this->name = $work_sheet_name;
            $this->rows = array();
        }

        public function add_row($array_to_add){
            # add rows to to work sheet
            array_push($this->rows,array( $array_to_add));
        }


}
?>