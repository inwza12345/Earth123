<?php
include_once("lib/condb.php");
include_once("lib/inc.php");

if(isOnline()){

$memid=$_SESSION['memid'];

$sql="SELECT * FROM member WHERE mem_id='$memid' ";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$mem_id=$row['mem_id'];
$mem_name=$row['mem_name'];
$mem_img=$row['mem_img'];


}

?>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"ขนม"</span>
    </a>

<?php
if(isOnline()){
?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=$mem_img;?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$mem_name;?></a>
        </div>
      </div>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

<?php
}
?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            </a>
          </li>
<?php
if(!isOnline()){
?>
          <li class="nav-header">เมนูการใช้งาน</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">หน้าเเรก</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?Node=pagelogin" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>ล็อกอินเข้าระบบ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>เเนะนำการใช้งาน</p>
            </a>
            </li>
<?php
}
?>





<?php
if(isOnline()){
?>

<?php
if(isAdmin($_SESSION['usr'],$_SESSION['pwd'],$con)) {
?>
      <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>เเดชบอร์ด</p>
            </a>
          </li>
         

          <li class="nav-item">
            <a href="index.php?Node=showmem" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>จัดการข้อมูลผู้ใช้งาน</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="index.php?Node=smat" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>จัดการข้อมูลขนม</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?Node=managedraw" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>จัดการข้อมูลการซื้อขนม</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="index.php?Node=stmat" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>รายงานขนมคงเหลือ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?Node=lout" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>
<?php }else if(isUser($_SESSION['usr'],$_SESSION['pwd'],$con)) { ?>

          <li class="nav-header">User</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">หน้าเเรก</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>เเดชบอร์ด</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?Node=sdraw" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>ซื้อขนม</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?Node=hisdraw" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>ประวัติการซื้อขนม</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?Node=lout" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>

 <?php } ?>         

<?php }
?> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
