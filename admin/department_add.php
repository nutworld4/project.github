       <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">เพิ่มข้อมูลแผนก</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="department_add_db.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ชื่อแผนก</label>
                        <input type="text" name="d_name" class="form-control" placeholder="กรอกข้อมูลแผนก">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row" align="left">
                    <div class="col-sm-6">
                         <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                         <a href="department.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>              
                    </div>         
                  </div>              
                </form>
              </div>
              <!-- /.card-body -->
            </div>
             