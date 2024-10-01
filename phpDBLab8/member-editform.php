<?php include "connect.php" ?>
<?php
// 1. ก าหนดค าสง่ SQL ให้ดึงสนค้าตามรหัสส ิ นค้า ิ

$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]); // 2. น าค่า pid ที่สงมากับ ่ URL ก าหนดเป็ นเงื่อนไข
$stmt->execute(); // 3. เริ่มค้นหา
$row = $stmt->fetch(); // 4. ดึงผลลัพธ์ (เนื่องจากมีข้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
?>
<html>
<head><meta charset="utf-8"></head>
<body>
<form action="edit-member.php" method="post">
<input type="hidden" name="username" value="<?=$row["username"]?>">
รหัสผ่าน : <input type="text" name="password" value="<?=$row["password"]?>"><br>
ชื่อ : <input type="text" name="name" value="<?=$row["name"]?>"><br>
ที่อยู่ : <br>
<textarea name="address" rows="3" cols="40"><?=$row["address"]?></textarea><br>
mobile : <input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
email : <input type="text" name="email" value="<?=$row["email"]?>"><br>
<input type="submit" value="แก้ไขรายชื่อ ">
</form>
</body>
</html>