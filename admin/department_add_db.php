<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['d_name'])) {
    //ไฟล์เชื่อมต่อฐานข้อมูล
    include 'condb.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $d_name = $_POST['d_name'];
     //check data
      $stmt = $conn->prepare("SELECT d_id FROM tbl_department WHERE d_name = :d_name");
      //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
      $stmt->execute(array(':d_name' => $d_name));
      //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าเพิ่มข้อมูลแผนก
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

      if($stmt->rowCount() > 0){
          echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "ข้อมูลซ้ำ !! ",  
                            text: "ข้อมูลซ้ำ!! กรุณากรอกข้อมูลใหม่",
                            type: "warning"
                        }, function() {
                            window.location = "department.php?act=add"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                </script>';
      }else{ //ถ้าข้อมูลไม่ซ้ำ เก็บข้อมูลลงตาราง
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_department (d_name)
    VALUES (:d_name)");
    $stmt->bindParam(':d_name', $d_name, PDO::PARAM_STR);
    $result = $stmt->execute();
    
    if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
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
    } //else check
  } //isset
    ?>