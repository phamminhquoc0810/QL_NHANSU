<?php
require_once("entities/nhanvien.class.php");
?>
<?php
include_once("header.php");
?>
<div style="margin-bottom: 10px;">
    <a href="add_nhanvien.php">Thêm Nhân Viên</a>
</div>
<?php
$nhanviens = NhanVien::list_nhanvien();

if ($nhanviens) {
    echo "<table border='1'>";
    echo "<tr>
            <th>Mã Nhân Viên</th>
            <th>Tên Nhân Viên</th>
            <th>Giới Tính</th>
            <th>Nơi Sinh</th>
            <th>Tên Phòng</th>
            <th>Lương</th>
            <th>Action</th>
        </tr>";
    foreach ($nhanviens as $item) {
        echo "<tr>";
        echo "<td>".$item["Ma_NV"]."</td>";
        echo "<td>".$item["Ten_NV"]."</td>";
        echo "<td>";
        // Kiểm tra giới tính và hiển thị hình ảnh tương ứng
        if ($item["Phai"] === "NU") {
            echo "<img weight='30px' height='40px' src='images/woman.png' alt='Woman'>";
        } else {
            echo "<img weight='30px' height='40px' src='images/man.png' alt='Man'>";
        }
        echo "</td>";
        echo "<td>".$item["Noi_Sinh"]."</td>";
        echo "<td>".$item["Ma_Phong"]."</td>";
        echo "<td>".$item["Luong"]."</td>";
        echo "<td>";
        echo "<span>
                <a href='delete.php?this_id=".$item['Ma_NV']."'>Delete</a>
              </span>";
        echo "<span>
                <a href='edit.php?this_id=".$item['Ma_NV']."'>Edit</a>
              </span>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No nhanvien found.</p>";
}
include_once("footer.php");
?>
