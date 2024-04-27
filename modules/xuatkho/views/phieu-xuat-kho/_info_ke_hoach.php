<div class="row">    	
	<div class="col-md-8">
		<div class="post">
            <div class="user-block">
                <img class="img-circle img-bordered-sm" src="/images/cong-trinh-128x128.jpg" alt="user image">
                <span class="username">
                	<h4 style="margin-top:0; color:#3c8dbc; font-size:22px;"><?= $model->congTrinh->ten_cong_trinh ?></h4>
                </span>
                <span class="description">
                	<i class="fa fa-map-marker"></i> <?= $model->congTrinh->dia_diem ?>
                </span>
                <!-- <span class="description">
                <?= $model->congTrinh->tg_bat_dau != null ? ('Thời gian bắt đầu:' . $model->congTrinh->thoiGianBatDau) : '' ?>
                <?= $model->congTrinh->tg_ket_thuc != null ? ('- Thời gian kết thúc:' . $model->congTrinh->thoiGianKetThuc) : '' ?>
                </span> -->
            </div>
        </div>
	</div>
	<div class="col-md-4 text-right">
		<?php 
            if(isset($model->id_ke_hoach)){
        ?>
        <h5 style="margin-top:0px">Thuộc Kế hoạch Xuất kho:</h5> <h4 style="margin-top:0px"><?= $model->keHoach->soPhieu ?></h4>
        <?php 
            }
        ?>
	</div>
</div>