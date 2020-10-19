# PHP-Excel-Factory [Excel for php]
A simple and easy to use excel generating library for php

#IMPLEMENTATION
To start using this library, you just need to require the main file excel_generator.php only, no need of other dependencies
and libraries, only php is good to go.

#CODE IMPLEMENTATION
//require the file
require "excel_generator.php";
$generator = new excel_generator();
$generator->add_sheet('Sheet 1');
$generator->add_sheet('Sheet 2');
$generator->add_sheet('Sheet 3');

//$generator->add_row('sheet_name_defined earlier', [array to store as columns]);

$generator->add_row('Sheet 1',['Wongani Kaluwa','MWK 2000 ','Lumbadzi','Peaches']);
$generator->add_row('Sheet 1',['ALfred Banda','MWK 2000 ','Lumbadzi','Peaches']);
$generator->add_row('Sheet 2',['George of the Jungle','MWK 2000 ','Lumbadzi','Peaches']);
$generator->add_row('Sheet 2',['Wongani Kaluwa','MWK 2000 ','Lumbadzi','Peaches']);
    
$generator->add_row('Sheet 3',['Wongani Kaluwa','MWK 2000 ','Lilongwe','Mangoes']);
    
$generator->create_workbook();//create the workbook
$generator->save('myexcel-file.xls');//save the file relative to the code directory
