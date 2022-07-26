<?php 
if(isset($_GET['f_id'])){
    include 'condb.php';
//ประกาศตัวแปรรับค่าจาก param method get
$f_id = $_GET['f_id'];
$stmt = $conn->prepare('DELETE FROM tbl_doc_file WHERE f_id=:f_id');
$stmt->bindParam(':f_id', $f_id , PDO::PARAM_INT);
$stmt->execute();

  if($stmt->rowCount() > 0){
        echo '<script>       
              window.location = "doc.php"; //หน้าที่ต้องการให้กระโดดไป
              </script>';
    }else{
       echo '<script>         
              window.location = "doc.php"; //หน้าที่ต้องการให้กระโดดไป
             </script>';
    }
$conn = null;
} //isset
?>