<html>
<head><meta charset="utf-8"></head>
<body>
<table border='1'>
<th>รหัสสินค้า</th><th>ชื่อสินค้า </th><th>รายละเอียดสินค้า</th><th>ราคา</th>
<?php

$pdo = new PDO("mysql:host=localhost;dbname=sec2_2;charset=utf8", "Tstd2", "aM18jcTz");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();

while ($row = $stmt->fetch()) {
echo "<tr>"."<td>";
echo  $row ["pid"] . "<td>";
echo  $row ["pname"] . "<td>";
echo  $row ["pdetail"] . "<td>";
echo  $row ["price"] . " บาท ";
echo "</tr>\n";

}
?>
</table>
</body>
</html>