<?php 
 //คิวรี่ข้อมูลมาแสดงในตาราง
    include 'condb.php';
    $stmt = $conn->prepare("SELECT* FROM tbl_department");
    $stmt->execute();
    $result = $stmt->fetchAll();
?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 85%;">ชื่อแผนก</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th> 
      </tr>
    </thead>
    <tbody>
       <?php foreach ($result as $row_dm) { ?>  
      <tr>
        <td>
         <?php echo $row_dm['d_id']; ?>
        </td>
        <td>
         <?php echo $row_dm['d_name']; ?>
        </td>
        <td>         
          <a class="btn btn-warning btn-flat btn-sm" href="department.php?act=edit&d_id=<?php echo $row_dm['d_id']; ?>">
           แก้ไข
          </a>
        </td>    
        <td>         
          <a class="btn btn-danger btn-flat btn-sm" href="department_del.php?d_id=<?= $row_dm['d_id'];?>" 
            onclick="return confirm('ยืนยันการลบข้อมูล !!');">
           ลบ
          </a>
        </td>  
         <?php } ?>  
      </tr>
    </tbody>
  </table>

