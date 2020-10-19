<html>
<head>
    <title>This is an Example</title>
</head>
<?php
    require "excel_generator.php";
    $generator = new excel_generator();
    $generator->add_sheet('FDH Account');
    $generator->add_sheet('Cash on Counter');
    $generator->add_sheet('Mobile Wallet');



    $generator->add_row('FDH Account',['Wongani Kaluwa','MWK 2000 ','Lumbadzi','Peaches']);
    $generator->add_row('FDH Account',['ALfred Banda','MWK 2000 ','Lumbadzi','Peaches']);
    $generator->add_row('FDH Account',['George of the Jungle','MWK 2000 ','Lumbadzi','Peaches']);
    $generator->add_row('Cash on Counter',['Wongani Kaluwa','MWK 2000 ','Lumbadzi','Peaches']);
    
    $generator->add_row('Mobile Wallet',['Wongani Kaluwa','MWK 2000 ','Lilongwe','Mangoes']);
    // $generator->add_sheet('Cash Deposit');
    // $generator->add_sheet('Book3');
    // print_r($generator->excel_sheets[0]);
    // echo $generator->excel_sheets;
    $generator->create_workbook();
    $generator->save('second_test.xls');
    // print_r($generator->work_book['FDH Account']);
    // print(count($generator->work_book['FDH Account']->rows[0])." Rows ".$generator->work_book['FDH Account']->rows[0][0]);
    // $generator->save('files.xls');
    
    foreach ($generator->work_book as $key => $value) {
        // print_r($value->rows);
    }
?>
</html>