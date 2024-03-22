<?php // IDEA:
/**
* Lớp xử lý kết nối và truy vấn cơ sở dữ liệu
*/
class Db
{
    // Biến kết nối CSDL
    public static $connection;
     // Hàm khởi tạo kết nối
    public function connect()
    {
        // Kết nối tới CSDL trong trường hợp kết nối chưa được khởi tạo
        if (!isset(self::$connection)) {
            // Lấy thông tin kết nối CSDL từ file config.ini
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);

            // Xử lý lỗi nếu không kết nối được tới CSDL
            if (self::$connection == false) {
                // Xử lý ghi file tại đây (your todo advanced)
                return false;
            }
        }

        return self::$connection;
    }

     //Hàm thực hiện execute truy vấn
     
    public function query_execute($queryString)
    {
        // Khởi tạo kết nối
        $connection = $this->connect();

        // Thực hiện execute truy vấn
        $result = $connection->query($queryString);
        $connection->close();
        return $result;
    }
    public function select_to_array($queryString) {
        $rows = array();
        $result = $this->query_execute($queryString);
        if ($result == false) return false;
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        return $rows;
    }
}
?>
   