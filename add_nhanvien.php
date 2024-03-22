<?php
    require_once("entities/nhanvien.class.php");
    require_once("config/db.class.php");
    $db = new Db(); //Khởi tạo đối tượng từ lớp Db
    $connection = $db->connect();
    $phongban = mysqli_query($connection, "SELECT * FROM phongban");

    if(isset($_POST["btnsubmit"])){ 
        $manv =  $_POST["txtManv"];
        $tennv =  $_POST["txtTenNV"];
        $phai = $_POST["txtPhai"];
        $noisinh = $_POST["txtNoiSinh"];
        $maphong = $_POST["txtMaPhong"];
        $luong = $_POST["txtLuong"];
        
        
        $newNhanVien = new NhanVien($manv,$tennv,$phai,$noisinh,$maphong,$luong);

        $result = $newNhanVien->save();

        if(!$result){
            header("Location: add_nhanvien.php?failture");
        }
        else{
            header("Location: add_nhanvien.php?inserted");
        }
    }
?>
<?php 
include_once("header.php"); 

?>

<?php
    if(isset($_GET["inserted"])){
        echo "<h2> Thêm nhân viên thành công</h2>";
    }
?>

<form method="post">
    <div class="row">
        <div class="lbltitle">
            <label>Mã nhân viên</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtManv" value="<?php echo isset($_POST["txtManv"]) ? $_POST["txtManv"] : ""; ?>"/>
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>Tên nhân viên</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtTenNV" value="<?php echo isset($_POST["txtTenNV"]) ? $_POST["txtTenNV"] : ""; ?>"/>
        </div>
    </div>
    
    <div class="row">
        <div class="lbltitle">
            <label>Giới Tính</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtPhai" value="<?php echo isset($_POST["txtPhai"]) ? $_POST["txtPhai"] : ""; ?>"/>
        </div>
    </div>
    
    <div class="row">
        <div class="lbltitle">
            <label>Nơi Sinh</label>
        </div>
        <div class="lblinput">
            <textarea name="txtNoiSinh" cols="21" rows="10"><?php echo isset($_POST["txtNoiSinh"]) ? $_POST["txtNoiSinh"] : ""; ?></textarea>
 
        </div>
    </div>
   
   
    <div class="row">
    <div class="lbltitle">
        <label>Phòng Ban</label>
    </div>
    <div class="lblselect">
    <select id="txtMaPhong" name="txtMaPhong" >
                <option value="">______Danh mục______</option>
                <?php foreach($phongban as $key => $value){ ?>
                    <option value="<?php echo $value['Ma_Phong'] ?>"><?php echo $value['Ten_Phong'] ?></option>
                <?php } ?>
                
    </select>
    </div>
    
    <div class="row">
        <div class="lbltitle">
            <label>Lương</label>
        </div>
        <div class="lblinput">
            <input type="number" min="0" name="txtLuong" value="<?php echo isset($_POST["txtLuong"]) ? $_POST["txtLuong"] : ""; ?>"/>        
        </div>
    </div>
</div>

    
   
    <div class="row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Thêm nhân viên" />
        </div>
    </div>
</form>
<?php include_once("footer.php"); ?>
