<?php
use app\modules\nguoidung\models\NguoiDung;
?>
<style>
.small-box .icon {
    top: 0px;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <i class="fa fa-sign-in" aria-hidden="true"></i>
                <h3 class="box-title">Trang quản trị</h3>
            </div>
            
            <div class="box-body">
                <h1>Chào mừng bạn đã đăng nhập vào trang quản trị!  </h1>
            </div>
        
        </div>
    
    </div>
    
    <?php 
        $soPhieuDuyet = NguoiDung::getSoPhieuXuatKhoCanDuyet();
    ?>
    <div class="col-md-3">
    	<div class="small-box bg-green">
            <div class="inner">
                <h3><?= $soPhieuDuyet ?></h3>
                <p>PHIẾU XUẤT KHO CHỜ DUYỆT</p>
            </div>
            <div class="icon">
            	<i class="glyphicon glyphicon-file"></i>
            </div>
            <a href="/xuatkho/phieu-xuat-kho/phieu-duyet" class="small-box-footer">
            	Vào duyệt <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    
     <?php 
        /*$soKeHoachDaDuyet = NguoiDung::getSoKeHoachXuatKhoDaDuyet();
     ?>
    <div class="col-md-3">
    	<div class="small-box bg-green">
            <div class="inner">
                <h3><?= $soKeHoachDaDuyet ?></h3>
                <p>KẾ HOẠCH ĐÃ DUYỆT</p>
            </div>
            <div class="icon">
            	<i class="glyphicon glyphicon-file"></i>
            </div>
            <a href="/kehoachxuatkho/phieu-xuat-kho/phieu-duyet" class="small-box-footer">
            	Vào duyệt <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <?php */ ?>
    
    <?php 
        $soKeHoachDuyet = NguoiDung::getSoKeHoachXuatKhoDaDuyet();
        $soKeHoachCanNghiemThu = NguoiDung::getSoKeHoachXuatKhoCanNghiemThu();
    ?>
    <div class="col-md-3">
    	<div class="small-box bg-green">
            <div class="inner">
                <h3><?= $soKeHoachCanNghiemThu ?>/<?= $soKeHoachDuyet ?></h3>
                <p>KẾ HOẠCH ĐỦ ĐIỀU KIỆN NGHIỆM THU</p>
            </div>
            <div class="icon">
            	<i class="glyphicon glyphicon-file"></i>
            </div>
            <a href="/kehoachxuatkho/phieu-xuat-kho/phieu-nghiem-thu" class="small-box-footer">
            	Vào duyệt <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    

</div>