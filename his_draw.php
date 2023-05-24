 <div class="content-wrapper">
<br>
  <div class="col-md-12">
    <div class="card">

              <div class="card-header">
                <h2 class="card-title">ประวัติการซื้อขนม</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      
                      <th width="10%">รูปภาพ</th>
                      
                      <th width="20%">ชื่อขนม</th>
                      <th width="15%">จำนวนซื้อ</th>
                      
                      <th width="20%">ผู้เซื้อ-วันซื้อ</th>
                      <th width="20%">ผู้อนุมัติ-วันอนุมัติ</th>
                      <th width="15%">สถานะ</th>
                    </tr>
                  </thead>
                  <tbody >
<?php
$memid = $_SESSION["memid"];
$sql = "SELECT dr1.*,mt1.*, m1.mem_name AS name1, m2.mem_name AS name2 
FROM meterdraw AS dr1 
LEFT OUTER JOIN meter mt1 ON (dr1.draw_metid = mt1.met_id) 
LEFT OUTER JOIN member m1 ON (dr1.draw_userid_draw=m1.mem_id) 
LEFT OUTER JOIN member m2 ON (dr1.draw_userid_app=m2.mem_id) 
WHERE dr1.draw_userid_draw='$memid' 
ORDER BY dr1.draw_status ASC";

$res = mysqli_query($con,$sql);


while($row = mysqli_fetch_assoc($res)){
  
  $draw_id = $row["draw_id"];
  $draw_date = $row["draw_date"];
  $draw_num = $row["draw_num"];
  $draw_metid = $row["draw_metid"];
  $draw_userid_draw = $row["draw_userid_draw"];
  $draw_userid_app= $row["draw_userid_app"];
  $draw_date_app = $row["draw_date_app"];
  $draw_status = $row["draw_status"];


  $met_name = $row["met_name"];
  $met_img = $row["met_img"];
  $name1draw = $row["name1"];
  $name2app = $row["name2"];
  if($draw_status=='0'){$statusname = "<font color='red'>รอรับวัสดุ</font>";}
  else if ($draw_status=='1'){$statusname = "<font color='green'>ได้รับแล้ว</font>";}

?>


                    <tr>

                      <td><img width="70" src="<?=$met_img;?>"></td>
                      
                      <td ><?= $met_name; ?></td>
                      <td><?= $draw_num; ?></td>
                      
                      <td><?= $name1draw; ?>
                      (<?= $draw_date; ?>)
                      </td>

                      <td>
<?php 
  if($draw_status == '1'){
?>
                        <?= $name2app; ?>
                        (<?= $draw_date_app; ?>)
<?php 
}else{
  echo "รออนุมัติ";
}
?>
                      </td>


                      <td>
                        <?= $statusname; ?>

                      </td>
                      
                    </tr>
                 
<?php
}

?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-body -->
            </div>
        </div>
</div>
<script >



</script>