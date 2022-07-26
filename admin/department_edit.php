      <?php
      if(isset($_GET['d_id'])){
      include 'condb.php';
      $stmt = $conn->prepare("SELECT* FROM tbl_department WHERE d_id=?");
      $stmt->execute([$_GET['d_id']]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
        if($stmt->rowCount() < 1){
            header('Location: index.php');
            exit();
         }
      }//isset
      ?>
       <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">แก้ไขข้อมูลแผนก</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="department_edit_db.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ชื่อแผนก</label>
                        <input type="text" name="d_name" value="<?= $row['d_name'];?>"  class="form-control">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row" align="left">
                    <div class="col-sm-6">
                         <input type="hidden" name="d_id" value="<?= $row['d_id'];?>">
                         <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                         <a href="department.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>              
                    </div>         
                  </div>              
                </form>
              </div>
              <!-- /.card-body -->
            </div>
             