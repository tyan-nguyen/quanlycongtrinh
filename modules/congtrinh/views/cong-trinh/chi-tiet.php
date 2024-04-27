<?php 
use app\widgets\TrangThaiCongTrinhWidget;
use app\modules\congtrinh\models\CongTrinhQuyen;
use yii\bootstrap\Modal;

$this->title = 'Thông tin công trình';
?>
<style>
#ajaxCrudModal .modal-lg{
    width:90%;
}
@media only screen and (max-width: 800px) {
	#ajaxCrudModal .modal-lg{
        width:100%;
        margin:0px;
    }
}
</style>

<section class="content" style="padding:0px; padding-top:-20px">
	
    <div class="row">
    	
    	<div class="col-md-12">
    		<div class="post">
                <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="/images/cong-trinh-128x128.jpg" alt="user image">
                    <span class="username">
                    	<h4 style="margin-top:0; color:#3c8dbc; font-size:22px;"><?= $model->ten_cong_trinh ?></h4>
                    </span>
                    <span class="description">
                    	<i class="fa fa-map-marker"></i> <?= $model->dia_diem ?>
                    </span>
                    <!-- <span class="description">
                    	<?= $model->tg_bat_dau != null ? ('Thời gian bắt đầu:' . $model->thoiGianBatDau) : '' ?>
                    	<?= $model->tg_ket_thuc != null ? ('- Thời gian kết thúc:' . $model->thoiGianKetThuc) : '' ?>
                    </span> -->
                </div>

            </div>
    	</div>
    	
        <div class="col-md-3">        
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="/images/cong-trinh-128x128.jpg" alt="Công trình">
                    <?= TrangThaiCongTrinhWidget::widget([
                        'value' => $model->trang_thai,
                        'text' => $model->getDmTrangThaiLabel($model->trang_thai),
                        'type' => 'h3',
                    ]) ?>
                    <p class="text-muted text-center">
                    	Thời gian bắt đầu: <?= $model->thoiGianBatDau ?>
                    	<br/> Thời gian kết thúc: <?= $model->thoiGianKetThuc ?>
                    </p>
                    <ul class="list-group list-group-unbordered">
                       <!--  <li class="list-group-item">
                        	<b>Tổng kinh phí theo dự toán</b> <a class="pull-right">1,322</a>
                        </li> -->
                        <li class="list-group-item">
                        	<b>Tổng bóc tách</b> <a class="pull-right"><?= number_format($model->tongTienBocTach) ?></a>
                        </li>
                        <li class="list-group-item">
                        	<b>Tổng thực tế</b> <a class="pull-right"><?= number_format($model->tongTienThucTe) ?></a>
                        </li>
                    </ul>
                    <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                </div>            
            </div>
            
            
            <div class="box box-primary">
                <div class="box-header with-border">
                	<h3 class="box-title">Thông tin công trình</h3>
                	<!-- <span class="pull-right"><i class="fa fa-pencil"></i></span> -->
                </div>
                
                <div class="box-body">
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Ghi chú</strong>
                    <p><?= $model->ghi_chu ?></p>
                    <hr>
                    <strong><i class="glyphicon glyphicon-time"></i> Ngày tạo dữ liệu</strong>
                    <p><?= $model->thoiGianTaoDuLieu ?></p>
                    <hr>
                    <strong><i class="glyphicon glyphicon-user"></i> Người tạo dữ liệu</strong>
                    <p><?= $model->nguoiTaoDuLieu ?></p>
                </div>
            
            </div>
            
            <div class="box box-primary">
                <div class="box-header with-border">
                	<h3 class="box-title">Phân quyền</h3>
                	<!-- <a href="#" class="btn-in-title">
                		<span class="pull-right"><i class="fa fa-pencil"></i></span>
                	</a> -->
                </div>
                
                <div class="box-body">
                
                	<?php 
                	$dmQuyens = CongTrinhQuyen::getDmQuyen();
                	$stt = 0;
                	foreach ($dmQuyens as $indexDmQuyen=>$dmQuyen){
                	   if($stt > 0)
                	        echo '<hr>';
                	  echo '<strong><i class="fa fa-book margin-r-5"></i>' . $dmQuyen . '</strong>';
                	   echo '<p>';
                	   $phanQuyen = CongTrinhQuyen::find()->where([
                	       'id_cong_trinh' => $model->id,
                	       'quyen' => $indexDmQuyen
                	   ])->all();
                	   foreach ($phanQuyen as $indexQuyen=>$quyen){
                	       echo '<span class="label label-info">'. $quyen->nguoiDung->name .'</span> ';
                	   }
                	   echo '</p>';
                	   $stt++;
                	}
                	
                	?>
                </div>
            
            </div>
        
        </div><!-- col-md-3 -->
        
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#kehoach" data-toggle="tab">Kế hoạch xuất kho</a></li>
                    <li><a href="#home" data-toggle="tab">Tổng hợp Phiếu xuất kho</a></li>
                    <li><a href="#boctach" data-toggle="tab">Bóc tách và thi công thực tế</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="home">
                    
                        <div class="post">
                        	
                        	<?= $this->render('_phieu_xuat_kho', compact('model', 'dataProvider1')) ?>
                        	
        				</div>
        				
                    
                    </div>
                    
                    <div class="tab-pane" id="kehoach">
                    	<div class="post">                        	
                        	<?= $this->render('_ke_hoach', compact('model', 'dataProvider3')) ?>
                        </div>	
                    </div>
                    
                    <div class="tab-pane" id="boctach">
                    	<div class="post">                        	
                        	<?= $this->render('_phieu_boc_tach', compact('model', 'dataProvider2')) ?>
                        </div>	
                    </div>
                
                </div>
            
            </div>
        
        </div>
    
    </div>

</section>


<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
    'size'=>Modal::SIZE_LARGE,
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false] 
])?>
<?php Modal::end(); ?>
