<?php
$sum_member=0;
$sql1="SELECT COUNT(*) AS sum_member FROM member";
$rea1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_assoc($rea1);
$sum_member+=$row1['sum_member'];



$sum_meter=0;
$sql2="SELECT COUNT(*) AS sum_meter FROM meter";
$rea2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($rea2);
$sum_meter+=$row2['sum_meter'];




$sum_md1=0;
$sql3="SELECT COUNT(*) AS sum_md1 FROM meterdraw WHERE draw_status='0' ";
$rea3=mysqli_query($con,$sql3);
$row3=mysqli_fetch_assoc($rea3);
$sum_md1+=$row3['sum_md1'];





$sum_md2=0;
$sql4="SELECT COUNT(*) AS sum_md2 FROM meterdraw WHERE draw_status='1' ";
$rea4=mysqli_query($con,$sql4);
$row4=mysqli_fetch_assoc($rea4);
$sum_md2+=$row4['sum_md2'];


$sum_md3=0;
$sql5="SELECT COUNT(*) AS sum_md3 FROM meterdraw  ";
$rea5=mysqli_query($con,$sql5);
$row5=mysqli_fetch_assoc($rea5);
$sum_md3+=$row5['sum_md3'];

?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
<?php if(isOnline()){?>
          <div class="col-sm-6">
            <h1 class="m-0">เเดชบอร์ด</h1>
          </div><!-- /.col -->
<?php } ?>
          <div class="col-sm-6">
<?php if(isOnline()){?>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">หน้าเเรก</a></li>
              <li class="breadcrumb-item active">เเดชบอร์ด</li>
            </ol>            
<?php } ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
<?php if(!isOnline()){?>
<font size="5" >ยินดีต้อนรับ<br>
ร้านขนมบ้านป.ปลา<br>
<img src=" pdimg/ppp.jpg   " width="500">
</font>
<?php } ?>

<?php if(isOnline()){?>
<?php if(isAdmin($_SESSION['usr'],$_SESSION['pwd'],$con)){?>

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$sum_member;?></h3>

                <p>สมาชิกระบบ/คน</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?=$sum_meter;?></h3>

                <p>รายการขนม/รายการ</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$sum_md1;?></h3>

                <p>รายการรออนุมัติ/รายการ</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$sum_md2;?></h3>

                <p>รายการที่อนุมัติ/รายการ</p>
              </div>
              <div class="icon">
                <i class="ionion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['รายการซื้อทั้งหมด',     <?=$sum_md3;?>],
          ['รออนุมัติ',      <?=$sum_md2;?>],
          ['อนุมัติเเล้ว',  <?=$sum_md1;?>],
   
        ]);

        var options = {
          title: 'สถานะการจัดการข้อมูลการซื้อขนม',
          pieHole: 0.4,

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>



        <div class="card">
              <div class="card-header">
                <h3 class="card-title">รายงานข้อมูลขนมคงเหลือ</h3>
              </div>
              
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>รูปภาพ</th>
                      <th>ชื่อขนม</th>
                      <th>ประเภท</th>
                      <th>จำนวนที่เหลืออยู่</th>  
                    </tr>
                  </thead>
                  <tbody>
<?php
$sql="SELECT meter.*,metertype.* FROM meter
LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id)
";
$res=mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($res)) {
$met_id =$row['met_id'];
$met_name=$row['met_name'];
$met_detail=$row['met_detail'];
$met_img=$row['met_img'];
$met_total=$row['met_total'];
$met_mtype=$row['met_mtype'];

$mtype_name=$row['mtype_name'];
?>
                    <tr>
                       <th><img src="<?=$met_img;?>" width="70"></th>
                      
                      <td><?=$met_name;?></td>
                      <td><?=$mtype_name;?></td>
<?php 
if($met_total>10){
?>
                      <td><span class="badge bg-success">
                        <font size="5"><?=$met_total;?>
                         </font>
                        </span>
<?php } else { ?>
            <td><span class="badge bg-danger">
                        <font size="5"><?=$met_total;?>
                         </font>
                        </span> 
<?php } ?>
                      </td>

                    </tr>
<?php } ?>
                  </tbody>
                </table>
              </div>
            </div>


<?php } else if(isUser($_SESSION['usr'],$_SESSION['pwd'],$con)){ ?> 
<hr>
<font size="5" >ยินดีต้อนรับ<br>
ร้านขนมบ้านป.ปลา<br>
<img src="ppp.jpg" width="500">
</font>
  
<?php } ?>
<?php } ?>
        <!-- Main row -->
 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->