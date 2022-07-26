<?php
       //ถ้ามีค่าส่งมาจากฟอร์ม
      if(isset($_POST['d_name'])) {
          //ไฟล์เชื่อมต่อฐานข้อมูล
          include 'condb.php';
      //ประกาศตัวแปรรับค่าจากฟอร์ม
      $d_id = $_POST['d_id'];
      $d_name = $_POST['d_name'];
      //sql update
      $stmt = $conn->prepare("UPDATE  tbl_department SET d_name=:d_name WHERE d_id=:d_id");
      $stmt->bindParam(':d_id', $d_id , PDO::PARAM_INT);
      $stmt->bindParam(':d_name', $d_name , PDO::PARAM_STR);
      $stmt->execute();
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() > 0){
        echo '<script>
             setTimeout(function() {
              swal({
                    title: "แก้ไขข้อมูลแผนกสำเร็จ",
                    text: "Redirecting in 1 seconds.",
                    type: "success",
                    timer: 1000,
                    showConfirmButton: false
              }, function() {
                  window.location = "department.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "department.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
$conn = null; //close connect db
} //isset
?>