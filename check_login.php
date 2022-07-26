 <?php
 session_start();
  // print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['m_username']) && isset($_POST['m_password']) ){
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
 
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'condb.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $m_username = $_POST['m_username'];
    $m_password = $_POST['m_password'];
    // $m_level = $_POST['m_level'];  
 
    //check m_username  & m_password
      $stmt = $conn->prepare("SELECT * FROM tbl_member WHERE m_username = :m_username AND m_password = :m_password");
      $stmt->bindParam(':m_username', $m_username , PDO::PARAM_STR);
      $stmt->bindParam(':m_password', $m_password , PDO::PARAM_STR);
      $stmt->execute();
 
      //กรอก m_username & m_password ถูกต้อง
      if($stmt->rowCount() == 1){ //เช็คสถานะว่าเป็นแอดมิน
        //fetch เพื่อเรียกคอลัมภ์ที่ต้องการไปสร้างตัวแปร session
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //สร้างตัวแปร session
        $_SESSION['m_id '] = $row['m_id'];
        $_SESSION['m_name'] = $row['m_name'];
        $_SESSION['m_img'] = $row['m_img'];
        $_SESSION['m_level'] = $row['m_level'];
        $_SESSION['d_id'] = $row['d_id'];
         $_SESSION['m_username'] = $row['m_username'];
        //เช็คว่ามีตัวแปร session อะไรบ้าง
       //  print_r($_SESSION);
 
       // exit();
        if ($_SESSION['m_level'] == 'admin') { //เช็คสถานะว่าเป็นแอดมิน
         header('Location: admin'); //login ถูกต้องและกระโดดไปหน้าตามที่ต้องการ
        }elseif ($_SESSION['m_level'] == 'member') { //เช็คสถานะว่าเป็นสมาชิก
         header('Location: member'); //login ถูกต้องและกระโดดไปหน้าตามที่ต้องการ
        }
        elseif ($_SESSION['m_level'] == 'boss') { //เช็คสถานะว่าเป็นสมาชิก
         header('Location: boss'); //login ถูกต้องและกระโดดไปหน้าตามที่ต้องการ
        }    
      }else{ //ถ้า m_username or password ไม่ถูกต้อง
         echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                             text: "Username หรือ Password ไม่ถูกต้อง ลองใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
              $conn = null; //close connect db
            } //else
    } //isset 
    ?>