<?php
//เชื่อมต่อฐานข้อมูล
$connection = mysqli_connect("localhost","root","","db_abcstore") or die("เชื่อมต่อฐานข้อมูลผิดพลาด " . mysqli_error($connection));

//ดึงข้อมูลจากตาราง
$sql = "select * from tbl_product";
$result = mysqli_query($connection, $sql) or die("เลือกข้อมูลไม่ได้" . mysqli_error($connection));

//เอาข้อมูลจากฐานข้อมูลมาใส่ array
$emparray = array();
while($row = mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
//ปิด connection
mysqli_close($connection);

?>