<?php include "connect.php"; ?>
<html>
<head><meta charset="utf-8"></head>
<?php

// 1. กำหนดค่าส่ง SQL ให ้ดึงสนค ้าตามรหัสส ิ นค ้า ิ

$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]); // 2. น าค่า pid ที่สงมากับ ่ URL ก าหนดเป็นเงื่อนไข
$stmt->execute(); // 3. เริ่มค ้นหา
$row = $stmt->fetch(); // 4. ดึงผลลัพธ์ (เนื่องจากมีข ้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
?>
<div style="display:flex">
<div>
<img src='mphoto/<?=$row["username"]?>.jpg' width='200'>
</div>
<div style="padding: 15px">
<h2><?=$row["name"]?></h2>
เบอร์โทร  : <?=$row["mobile"]?><br>
email <?=$row["email"]?>
</div>
</div>
</body>
</html>