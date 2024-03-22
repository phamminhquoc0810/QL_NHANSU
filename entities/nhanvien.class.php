<?php //IDEA
require("config/db.class.php");

class NhanVien
{
    public $MA_NV;
    public $Ten_NV;
    public $Phai;
    public $Noi_Sinh;
    public $Ma_Phong;
    public $Luong;
    

    public function __construct($manv, $tennv, $phai, $noisinh, $maphong, $luong)
    {
        $this->MA_NV = $manv;
        $this->Ten_NV = $tennv;
        $this->Phai = $phai;
        $this->Noi_Sinh = $noisinh;
        $this->Ma_Phong = $maphong;
        $this->Luong = $luong;
    }

    
    public function save()
    {
        $db = new Db();
        
        $sql = "INSERT INTO NhanVien (MA_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES
                ('$this->MA_NV', '$this->Ten_NV', '$this->Phai','$this->Noi_Sinh','$this->Ma_Phong', '$this->Luong')";
        
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function list_nhanvien(){
        $db = new Db();
        $sql = "SELECT * FROM nhanvien";
        $result = $db->select_to_array($sql);
        return $result;
    }
    
}
?>