<?php 
if(isset($_GET['m_id'])){
    include 'condb.php';
//ประกาศตัวแปรรับค่าจาก param method get
$m_id = $_GET['m_id'];
$stmt = $conn->prepare('DELETE FROM tbl_member WHERE m_id=:m_id');
$stmt->bindParam(':m_id', $m_id , PDO::PARAM_INT);
$stmt->execute();

  if($stmt->rowCount() > 0){
        echo '<script>       
              window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
              </script>';
    }else{
       echo '<script>         
              window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
             </script>';
    }
$conn = null;
} //isset
?>