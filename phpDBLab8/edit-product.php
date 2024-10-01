<?php include "connect.php" ?>

<?php
$stmt = $pdo->prepare("UPDATE product SET pname=?, pdetail=?, price=?

WHERE pid=?"); // เตรียมค าสงั่ SQL ส าหรับแก้ไข
$stmt->bindParam(1, $_POST["pname"]); // ก าหนดค่าลงในต าแหน่ง ?
$stmt->bindParam(2, $_POST["pdetail"]);
$stmt->bindParam(3, $_POST["price"]);
$stmt->bindParam(4, $_POST["pid"]);
if ($stmt->execute()) // เริ่มแก้ไขข้อมูล หากแก้ไขส าเร็จเงื่อนไขจะเป็ นจริง
echo "แก้ไขสินค้า " . $_POST["pname"] . " สำเร็จ";
?>