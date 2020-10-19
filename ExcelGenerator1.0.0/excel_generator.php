<?php
    class excel_generator{
        
        var $generated_excell_sheet="";
        var $second_sheet = "";
        var $excel_sheets= array();
        var $work_book= array();
        var $ws;
        public function __construct(){
            
        }

        public function make_worksheet($wsn){
            require_once "work_sheet.php";
            return new work_sheet($wsn);
        }
        public function prepare($work_book = array( )){
                //Default Initial work book
                $this->generated_excell_sheet ="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n
                <Workbook xmlns=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns:ss=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:html=\"http://www.w3.org/TR/REC-html40\">\n
                <Styles>
                <Style ss:ID=\"sDT\"><NumberFormat ss:Format=\"Short Date\"/></Style></Styles>\n";
                
                foreach ($work_book as $work_sheet => $work_sheet_data) {
                    #work book on
                    $this->generated_excell_sheet.="<Worksheet ss:Name=\"$work_sheet\">\n";
                    $this->generated_excell_sheet.="\t<Table>\n";
                    foreach ($work_sheet_data as $row => $row_data) {
                        #workign on the data
                        foreach ($row_data as $data => $value) {
                            $this->generated_excell_sheet.="\t\t<Row>\n";
                                #lets look for data in each data set
                                foreach ($value as $data) {
                                    $this->generated_excell_sheet.="\t\t\t<Cell><Data ss:Type=\"String\">$data</Data></Cell>\n";
                                }                            
                            $this->generated_excell_sheet.="\t\t</Row>\n";
                        }
                        #end the data in this table
                        // echo "<br>";
                    }
                    $this->generated_excell_sheet.="\t</Table>\n";
                    $this->generated_excell_sheet.="</Worksheet>\n";

                }
                $this->generated_excell_sheet.="</Workbook>";
                // print "<small>".htmlentities($this->generated_excell_sheet)."</small>";
        }

        #create a file 
        public function generate($filepath = "default.xls"){
            return file_put_contents($filepath,$this->generated_excell_sheet);
        }

        public function add_sheet($work_sheet_name){
            array_push($this->excel_sheets,$this->make_worksheet($work_sheet_name));
        }

        public function get_sheet($sheet_name){
            foreach ($this->excel_sheets as $key => $value) {
                if($value->name==$sheet_name){
                    return $value;
                }
            }
        }

        public function create_workbook(){
            foreach ($this->excel_sheets as $key => $value) {
                $this->work_book[$value->name] = $value;
                // array_push($this);
            }
            // print_r($this->work_book);
        }

        public function save($file_name){
            $generated_sheet ="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n
                <Workbook xmlns=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns:ss=\"urn:schemas-microsoft-com:office:spreadsheet\" xmlns:html=\"http://www.w3.org/TR/REC-html40\">\n
                <Styles>
                <Style ss:ID=\"sDT\"><NumberFormat ss:Format=\"Short Date\"/></Style></Styles>\n";
                
                foreach ($this->work_book as $work_sheet => $work_sheet_data) {
                    #work book on
                    $generated_sheet.="<Worksheet ss:Name=\"$work_sheet\">\n";
                    $generated_sheet.="\t<Table>\n";
                    foreach ($work_sheet_data->rows as $row => $row_data) {
                        #workign on the data
                        foreach ($row_data as $data => $value) {
                            $generated_sheet.="\t\t<Row>\n";
                                #lets look for data in each data set
                                foreach ($value as $data) {
                                    $generated_sheet.="\t\t\t<Cell><Data ss:Type=\"String\">$data</Data></Cell>\n";
                                }                            
                            $generated_sheet.="\t\t</Row>\n";
                        }
                        #end the data in this table
                        // echo "<br>";
                    }
                    $generated_sheet.="\t</Table>\n";
                    $generated_sheet.="</Worksheet>\n";

                }
                $generated_sheet.="</Workbook>";
                file_put_contents($file_name,$generated_sheet);
                // print "<p>".htmlentities($generated_sheet)."</p>";
        }

        public function add_row($sheet_name,$data){
            #get the right array from the right 
            $sheet_to_add= $this->get_sheet($sheet_name)->add_row($data);

        }

    }
    

?>