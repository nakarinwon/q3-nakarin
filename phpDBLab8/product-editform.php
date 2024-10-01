<?php include "connect.php" ?>
<?php
// 1. ก าหนดค าสง่ SQL ให้ดึงสนค้าตามรหัสส ิ นค้า ิ

$stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
$stmt->bindParam(1, $_GET["pid"]); // 2. น าค่า pid ที่สงมากับ ่ URL ก าหนดเป็ นเงื่อนไข
$stmt->execute(); // 3. เริ่มค้นหา
$row = $stmt->fetch(); // 4. ดึงผลลัพธ์ (เนื่องจากมีข้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
?>
<html>
<head><meta charset="utf-8"></head>
<body>
<form action="edit-product.php" method="post">
<input type="hidden" name="pid" value="<?=$row["pid"]?>">
ชื่อสินค้า : <input type="text" name="pname" value="<?=$row["pname"]?>"><br>
รายละเอียดสินค้า : <br>
<textarea name="pdetail" rows="3" cols="40"><?=$row["pdetail"]?></textarea><br>
ราคา: <input type="number" name="price" value="<?=$row["price"]?>"><br>
<input type="submit" value="แก้ไขสินค้า ">
</form>
</body>
</html>