# PHP-Excel-Factory [Excel for php]<br>
A simple and easy to use excel generating library for php<br>
<br>
#IMPLEMENTATION<br>
To start using this library, you just need to require the main file excel_generator.php only, no need of other dependencies<br>
and libraries, only php is good to go.<br>
<br>
#CODE IMPLEMENTATION<br>
//require the file<br>
require "excel_generator.php";<br>
$generator = new excel_generator();<br>
$generator->add_sheet('Sheet 1');<br>
$generator->add_sheet('Sheet 2');<br>
$generator->add_sheet('Sheet 3');<br>
<br>
//$generator->add_row('sheet_name_defined earlier', [array to store as columns]);
<br>
$generator->add_row('Sheet 1',['Wongani Kaluwa','MWK 2000 ','Lumbadzi','Peaches']);<br>
$generator->add_row('Sheet 1',['ALfred Banda','MWK 2000 ','Lumbadzi','Peaches']);<br>
$generator->add_row('Sheet 2',['George of the Jungle','MWK 2000 ','Lumbadzi','Peaches']);<br>
$generator->add_row('Sheet 2',['Wongani Kaluwa','MWK 2000 ','Lumbadzi','Peaches']);<br>
    <br>
$generator->add_row('Sheet 3',['Wongani Kaluwa','MWK 2000 ','Lilongwe','Mangoes']);<br>
    <br>
$generator->create_workbook();//create the workbook<br>
$generator->save('myexcel-file.xls');//save the file relative to the code directory<br>
<br>
