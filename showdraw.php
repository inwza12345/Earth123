<div class="content-wrapper">
    <br>
    <div class="col-md-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">รายการขนมสำหรับซื้อ</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th width="15%">รูปภาพ</th>
                      <th width="20%">ชื่อขนม</th>
                      <th width="25%">รายละเอียด</th>
                      <th width="15%">ประเภท</th>
                      <th width="15%">จำนวนของขนม</th>
                      <th width="5%">ซื้อ</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$sql="SELECT meter.*,metertype.* FROM meter
LEFT OUTER JOIN metertype ON (meter.met_mtype=metertype.mtype_id) WHERE meter.met_total>='1' ";
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
                      <td><?=$met_detail;?></td>
                      <td><?=$mtype_name;?></td>
                      <td><?=$met_total;?></td>
                    
                  <td>
                        <span class="badge bg-success">
                        <a href="index.php?Node=drawmat&MATID=<?=$met_id;?>" onclick="if(confirm('คุณต้องการเบิกรายการนี้ใช่ไหม?')) return true; else return false;">ซื้อ</a>
                      </span>
                  </td>




                    </tr>
<?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
    </div>
</div>