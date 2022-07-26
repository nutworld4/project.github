<?php 
if(isset($_GET['d_id'])){
    include 'condb.php';
//ประกาศตัวแปรรับค่าจาก param method get
$d_id = $_GET['d_id'];
$stmt = $conn->prepare('DELETE FROM tbl_department WHERE d_id=:d_id');
$stmt->bindParam(':d_id', $d_id , PDO::PARAM_INT);
$stmt->execute();

  if($stmt->rowCount() > 0){
        echo '<script>       
              window.location = "department.php"; //หน้าที่ต้องการให้กระโดดไป
              </script>';
    }else{
       echo '<script>         
              window.location = "department.php"; //หน้าที่ต้องการให้กระโดดไป
             </script>';
    }
$conn = null;
} //isset
?>