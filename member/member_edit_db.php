<?php 
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
if (isset($_POST['m_name'])) {
     include '../condb.php';
     //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $m_id = $_POST['m_id'];
    $m_username = $_POST['m_username'];
    $m_password = $_POST['m_password'];
    $m_name = $_POST['m_name'];
    $d_id = $_POST['d_id'];
    $m_img2 = $_POST['m_img2'];
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
    $upload=$_FILES['m_img']['name'];
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['m_img']['name'],".");
    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //โฟลเดอร์ที่เก็บไฟล์
    $path="../admin/m_img/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['m_img']['tmp_name'],$path_copy);      
    }else {
      $newname=$m_img2;
    }
    //sql insert
    $stmt = $conn->prepare("UPDATE tbl_member SET 
    m_username=:m_username,
    m_password=:m_password,
    m_name=:m_name,
    d_id=:d_id,
    m_img='$newname'
    WHERE m_id =:m_id");
    $stmt->bindParam(':m_id', $m_id, PDO::PARAM_INT);
    $stmt->bindParam(':m_username', $m_username, PDO::PARAM_STR);
    $stmt->bindParam(':m_password', $m_password, PDO::PARAM_STR);
    $stmt->bindParam(':m_name', $m_name, PDO::PARAM_STR);
    $stmt->bindParam(':d_id', $d_id, PDO::PARAM_INT);
    $result = $stmt->execute();
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if($result){
                echo '<script>
                     setTimeout(function() {
                      swal({
                        title: "แก้ไขข้อมูลสมาชิกสำเร็จ",
                        text: "Redirecting in 1 seconds.",
                        type: "success",
                        timer: 1000,
                        showConfirmButton: false
                      }, function() {
                          window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            } //else ของ if result  
    $conn = null; //close connect db
    } //isset
?>