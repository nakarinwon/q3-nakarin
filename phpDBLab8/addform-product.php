<html>
<head><meta charset="UTF-8"></head>
<body>

<form action="insert-product.php" method="post">
    ชื่อสินค้า : <input type="text" name="pname"><br>

    รายละเอียดสินค้า : <br>
    <textarea name="pdetail" rows="3" cols="40"></textarea><br>

    ราคา: <input type="number" name="price"><br>

    รูปภาพสินค้า:<input type="file" name="image" accept="image/*" required><br>    
    <input type="submit" value="เพิ่มสินค้า">
    
</form>
</body>
</html>