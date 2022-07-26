<!DOCTYPE html>
<html lang="en">
  <?php $menu = "index";?>
  <?php include("head.php"); ?>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <?php include("navbar.php"); ?>
      <!-- /.navbar -->
      <?php include("menu.php"); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
       
                  </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <?php
                include("../condb.php");
                $admin = $conn->query("select count(m_id) from  tbl_member where m_level = 'admin'")->fetchColumn();
                $nume = $conn->query("select count(m_id) from  tbl_member where m_level = 'member'")->fetchColumn();
                $file = $conn->query("select count(fileID) from  tbl_doc_file")->fetchColumn();
                $sumdoc = $conn->query("select sum(qty) from  tbl_doc_file")->fetchColumn();
                
                ?>
                <!-- Main content -->
                <section class="content">
                  <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <h3><?php echo $admin;?> คน</h3>
                            <p>จำนวนแอดมินทั้งหมด</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-person-add"></i>
                          </div>
                          <a href="member.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <div class="inner">
                            <h3><?php echo $nume;?> คน</h3>
                            <p>จำนวนสมาชิกทั้งหมด</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-person-add"></i>
                          </div>
                          <a href="member.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
                            <h3><?php echo $file;?> ไฟล์</sup></h3>
                            <p>จำนวนเอกสารทั้งหมด</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="doc.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3><?php echo number_format($sumdoc);?> ครั้ง</h3>
                            <p>จำนวนการดาวน์โหลดเอกสาร</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="doc.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-12">
                        <?php
                        $stmt = $conn->prepare("
                        SELECT filename, SUM(qty) as total
                        FROM tbl_doc_file
                        GROUP BY filename");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        //นำข้อมูลที่ได้จากคิวรี่มากำหนดรูปแบบข้อมุลให้ถูกโครงสร้างของกราฟที่ใช้ *อ่าน docs เพิ่มเติม
                        $report_data = array();
                        foreach ($result as $rs) {
                        //ทำข้อมูลให้ถูกโครงสร้างก่อนนำไปแสดงในกราฟ ศึกษาเพิ่มเติม https://www.highcharts.com/demo/pie-basic
                        $report_data[]= '{name:'.'"'.$rs['filename'].' '.number_format($rs['total'],).' ครั้ง '.'"'.', '.'y:'.$rs['total'].'}';
                        }
                        //ตัด , ตัวสุดท้ายออก
                        $report_data = implode(",", $report_data);
                        ?>
                        <!DOCTYPE html>
                        <html>
                          <head>
                            <meta charset="utf-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <title></title>
                            <!--bootstrap5-->
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
                            <!-- css chart -->
                            <style>
                            .highcharts-figure,
                            .highcharts-data-table table {
                            min-width: 320px;
                            max-width: 900px;
                            margin: 1em auto;
                            }
                            .highcharts-data-table table {
                            font-family: Verdana, sans-serif;
                            border-collapse: collapse;
                            border: 1px solid #ebebeb;
                            margin: 10px auto;
                            text-align: center;
                            width: 100%;
                            max-width: 500px;
                            }
                            .highcharts-data-table caption {
                            padding: 1em 0;
                            font-size: 1.2em;
                            color: #555;
                            }
                            .highcharts-data-table th {
                            font-weight: 600;
                            padding: 0.5em;
                            }
                            .highcharts-data-table td,
                            .highcharts-data-table th,
                            .highcharts-data-table caption {
                            padding: 0.5em;
                            }
                            .highcharts-data-table thead tr,
                            .highcharts-data-table tr:nth-child(even) {
                            background: #f8f8f8;
                            }
                            .highcharts-data-table tr:hover {
                            background: #f1f7ff;
                            }
                            input[type="number"] {
                            min-width: 50px;
                            }
                            /* devbanban.com */
                            </style>
                            <!-- highcharts -->
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>
                            <script src="https://code.highcharts.com/modules/export-data.js"></script>
                            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                          </head>
                          <body>
                            <figure class="highcharts-figure">
                              <div id="containerchart"></div>
                              
                            </figure>
                            <script>
                            Highcharts.chart('containerchart', {
                            chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                            },
                            title: {
                            text: 'รายงานการดาวน์โหลดเอกสารทั้งหมด/ครั้ง'
                            },
                            tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            accessibility: {
                            point: {
                            valueSuffix: '%'
                            }
                            },
                            plotOptions: {
                            pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                            }
                            }
                            },
                            series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: [<?php echo $report_data;?>]
                            }]
                            });
                            </script>
                            
                          </body>
                        </html>
                      </div>
                      <!-- /.row -->
                      
                      </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                  </div>
                  <!-- /.content-wrapper -->
                  <?php include("footer.php"); ?>
                  <!-- Control Sidebar -->
                  <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                  </aside>
                  <!-- /.control-sidebar -->
                </div>
                <!-- ./wrapper -->
                <?php include("script.php"); ?>
              </body>
            </html>