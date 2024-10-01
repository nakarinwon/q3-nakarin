<?php include "connect.php" ?>
<?php
// เตรียมค่าสง่ SQL สาหรับลบข้อมูล

$stmt = $pdo->prepare("DELETE FROM product WHERE pid=?");
$stmt->bindParam(1, $_GET["pid"]); // ก าหนดค่าลงในต าแหน่ง ?
if ($stmt->execute()) // เริ่มลบข้อมูล
    header("location:list-product.php"); // กลับไปแสดงผลหน้าข้อมูล

?>