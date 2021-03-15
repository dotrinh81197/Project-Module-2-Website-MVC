<?php
abstract class BaseController
{
    public $folder;
    //construct folder
    public function __construct()
    {
        $this->folder = $this->getFolder();
    }

    // abstract method ko có phần thân
    //trả về tên thư mục muốn truy cập vào để lấy cái view ra
    abstract protected function getFolder();

    protected function render($file_name, $viewData = [], $file_layout_name = "application_layout")
    {
        // Kiểm tra file gọi đến có tồn tại hay không?
        $view_file = "views/$this->folder/$file_name.php";

        // Nếu tồn tại file đó thì tạo ra các biến chứa giá trị truyền vào lúc gọi hàm
        if (is_file($view_file)) {
            extract($viewData);


            // Sau đó lưu giá trị trả về khi chạy file view template với các dữ liệu đó vào 1 biến chứ chưa hiển thị luôn ra trình duyệt
            ob_start();
            include_once($view_file);
            $content = ob_get_clean();

            // Sau khi có kết quả đã được lưu vào biến $content, gọi ra template chung của hệ thống để hiển thị cho người dùng
            include_once("views/shared/$file_layout_name.php");
        }
    }
}
