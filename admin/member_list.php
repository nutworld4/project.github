<?php 
//คิวรี่ข้อมูลมาแสดงในตาราง โดยเทียบข้อมูลระหว่างตารางตำแหน่งงานกับตารางพนักงานที่มีคอลัมภ์สัมพันธ์กัน ก็คือ p_id กับ ref_p_id
    include 'condb.php';
    $stmtMem = $conn->prepare("
    SELECT m.*, d.d_name #ตารางพนักงานเอามาทุกคอลัมภ์ , ตารางแผนกเอามาแค่ชื่อแผนก
    FROM tbl_member AS m  #AS e คือการแทนชื่อตารางให้ชื่อสั้นลงในตอนที่เอาไป inner join โค้ดจะดูไม่รก
    INNER JOIN tbl_department AS d ON m.d_id=d.d_id
    ORDER BY m.m_id ASC #เรียงลำดับข้อมูลจากน้อยไปมาก
    ");
      $stmtMem->execute();
      $resultMem = $stmtMem->fetchAll();                                         
?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ID</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รูป</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ไอดี</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รหัสผ่าน</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ชื่อ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">แผนก</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th> 
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th> 
      </tr>
    </thead>
    <tbody>
       <?php foreach ($resultMem as $row_member) { ?>  
      <tr>
        <td>
         <?php echo $row_member['m_id']; ?>
        </td>
        <td>
        <img src="m_img/<?= $row_member['m_img'];?>" width="100px">
        </td>
         <td>
         <?php echo $row_member['m_username']; ?>
        </td>
         <td>
         <?php echo $row_member['m_password']; ?>
        </td>
         <td>
         <?php echo $row_member['m_name']; ?>
        </td>
         <td>
         <?php echo $row_member['d_name']; ?>
        </td>
        <td>
         <?php 
         $st =  $row_member['m_level'];
         if ($st=='admin') {
          echo "ผู้ดูแลระบบ";
         }elseif ($st=='member') {
          echo "สมาชิก";
         }else{
          echo "ผู้บริหาร";
         }
          ?>
        </td>
        <td>         
          <a class="btn btn-warning btn-flat btn-sm" href="member.php?act=edit&m_id=<?php echo $row_member['m_id']; ?>">
           แก้ไข
          </a>
        </td>    
        <td>         
          <a class="btn btn-danger btn-flat btn-sm" href="member_del.php?m_id=<?= $row_member['m_id'];?>" 
            onclick="return confirm('ยืนยันการลบข้อมูล !!');">
           ลบ
          </a>
        </td>  
         <?php } ?>  
      </tr>
    </tbody>
  </table>

