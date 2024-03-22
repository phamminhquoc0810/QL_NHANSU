<?php
    require_once("entities/nhanvien.class.php");
    require_once("config/db.class.php");
    $db = new Db(); 
    $connection = $db->connect();
    $this_id = $_GET['this_id'];
    $phongban = mysqli_query($connection, "SELECT * FROM phongban");
    

    $sql = " SELECT * FROM nhanvien WHERE Ma_NV = '$this_id'";

    $querry  = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($querry);

?>
<h1>Sửa Sản Phẩm: <?php echo $row['Ma_NV']; ?></h1>

<form method="post" enctype="multipart/form-data">

    <p>Name</p>
    <input type="text" name="tennv" value="<?php echo $row['Ten_NV']; ?>">

    <p>Giới tính</p>
    <input type="text" name="phai" value="<?php echo $row['Phai']; ?>"> 
    
    <p> Nơi Sinh </p>
        <input type="text" name="noisinh" value="<?php echo $row['Noi_Sinh']; ?>">

    <p> Phòng Ban </p>
    <select id="txtMaPhong" name="txtMaPhong" >
                <option value="">______Danh mục______</option>
                <?php foreach($phongban as $key => $value){ ?>
                    <option value="<?php echo $value['Ma_Phong'] ?>"><?php echo $value['Ten_Phong'] ?></option>
                <?php } ?>
                
    </select>
    <p> Lương </p>
    <input type="text" name="luong" value="<?php echo $row['Luong']; ?>">
    <br><br>
    
    <button name="btn">Sửa</button>
</form>

