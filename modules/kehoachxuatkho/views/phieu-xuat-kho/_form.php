<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\vanchuyen\taixe\models\TaiXe;
use app\modules\vanchuyen\xe\models\Xe;
use app\widgets\TrangThaiPhieuXuatKhoWidget;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuXuatKho */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="/js/vue.js"></script>
<link href="/js/select2/select2.min.css" rel="stylesheet" />
<script src="/js/select2/select2.min.js"></script>
<style>
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 22px!important;
}
</style>

<?= $this->render('_info_cong_trinh', ['model'=>$model->congTrinh]) ?>

<section class="phieu-xuat-kho-form" style="background-color: white; padding:10px;">
<?php $form = ActiveForm::begin([
    'action' => '/kehoachxuatkho/phieu-xuat-kho/update?id=' . $model->id,
]); ?>

<div class="row">
    <div class="col-xs-12">
        <h5 class="page-header">
            <i class="fa fa-book"></i> Mã Kế hoạch: #<?= $model->soPhieu ?>
            <small class="pull-right">Ngày yêu cầu <?= $model->thoi_gian_yeu_cau==null?'(dự kiến)':'' ?>: <?= $model->ngayYeuCauShort ?></small>
        </h5>
    </div>
</div>
<div class="row">
	<div class="col-sm-3">
		<h4>Thông tin gửi</h4>
		Bộ phận yêu cầu: <?= $model->boPhanYc!=null?$model->boPhanYc->room_name:'' ?> <br/>
		Người gửi: <?= $model->nguoiGui!=null?$model->nguoiGui->name:'' ?> <br/>
		Ý kiến người gửi: <?= $model->y_kien_nguoi_gui ?>
	</div>
	<div class="col-sm-3">
		<h4>Thông tin duyệt</h4>
		Người duyệt: <?= $model->nguoiDuyet!=null?$model->nguoiDuyet->name:'' ?> <br/>
		Ngày duyệt:	<?= $model->ngayDuyet ?> <br/>
        Ý kiến người duyệt: <?= $model->y_kien_nguoi_duyet ?>
	</div>
	<!-- <div class="col-sm-3">
		<h4>Thông tin giao hàng</h4>
		Tài xế: <?= $model->nguoiDuyet!=null?$model->nguoiDuyet->name:'' ?> <br/>
		Xe:	<?= $model->ngayDuyet ?> <br/>
		Ngày giao hàng: <?= $model->ngayGiaoHang ?> <br/>
        Ghi chú giao hàng: <?= $model->ghi_chu_giao_hang ?>
	</div>-->
	
	<?php if($model->congTrinh->quyenDuyet){ ?>
	 <div class="col-sm-3">
		<h4>Cấu hình</h4>
		<?= $form->field($model, 'tao_khong_qui_trinh')->checkbox(['disabled'=>true, 'class'=>'minimal-red']) ?>
		<?= $form->field($model, 'xuat_khong_qui_trinh')->checkbox(['class'=>'minimal-red']) ?>		
	</div>
	<?php } ?>
	
	<div class="col-sm-3">
		Quy trình: <br/>
		<?= TrangThaiPhieuXuatKhoWidget::widget([
                'value' => $model->trang_thai,
                'text' => $model->getDmTrangThaiLabel($model->trang_thai)
            ]) ?>
		<br/>
		<?php if($model->trang_thai!='DA_GIAO_HANG' && $model->trang_thai!='KHONG_DUYET'){ ?>Tiếp theo: <br/> <?php } ?>
		<?php if($model->trang_thai == 'BAN_NHAP'){ ?>
		<a class="btn btn-primary btn-xs" href="/kehoachxuatkho/quy-trinh/gui-phieu?idPhieu=<?= $model->id ?>" title="Trình duyệt" role="modal-remote"><i class="glyphicon glyphicon-forward"></i> Gửi phiếu xuất kho</a>
		<?php } ?>
		<?php if($model->trang_thai == 'CHO_DUYET' && $model->congTrinh->quyenDuyet ){ ?>
		<a class="btn btn-primary btn-xs" href="/kehoachxuatkho/quy-trinh/duyet-phieu?idPhieu=<?= $model->id ?>" title="Trình duyệt" role="modal-remote"><i class="glyphicon glyphicon-forward"></i> Duyệt phiếu xuất kho</a>
		<a class="btn btn-warning btn-xs" href="/kehoachxuatkho/quy-trinh/khong-duyet-phieu?idPhieu=<?= $model->id ?>" title="Không duyệt phiếu" role="modal-remote"><i class="glyphicon glyphicon-remove"></i> Không duyệt phiếu xuất kho</a>
		<?php } else { ?>
		Chờ Bộ phận Duyệt yêu cầu và xử lý đặt và giao hàng.
		<?php } ?>
		<?php if($model->trang_thai == 'DA_DUYET'){ ?>
		<a class="btn btn-primary btn-xs" href="/kehoachxuatkho/quy-trinh/duyet-giao-hang?idPhieu=<?= $model->id ?>" title="Nhập giao hàng" role="modal-remote"><i class="glyphicon glyphicon-forward"></i> Nghiệm thu Kế hoạch</a>
		<?php } ?>
		
	</div> 
</div>

<?php /* ?>
<div class="row">

	<!-- Thông tin vận chuyển -->
	<div class="col-sm-3">
		<?= $form->field($model, 'id_tai_xe')->dropDownList( (new TaiXe())->getList(), ['prompt'=>'-Chọn-'] ) ?>
	</div>
	<div class="col-sm-3">
		<?= $form->field($model, 'id_xe')->dropDownList( (new Xe())->getList(), ['prompt'=>'-Chọn-'] ) ?>	
	</div>
	<div class="col-sm-4">
	 	<?= $form->field($model, 'ghi_chu_giao_hang')->textarea(['rows'=>1]) ?>
	</div>
	<div class="col-sm-2">
		<?= $form->field($model, 'ngay_giao_hang')->textInput(['type' => 'date', 'placeholder'=>'DD/MM/YYYY']) ?>
	</div>

</div>
<?php */ ?>
<?php ActiveForm::end(); ?>



<div id="objDanhSachVatTu" style="margin-top:10px;">
    <div class="row">
    	<div class="col-xs-12 table-responsive">
        	<div class="box">
        		<div class="box-header">
        			<h3 class="box-title">CHI TIẾT VẬT TƯ</h3>
        		</div>
        		<div class="box-body no-padding">
        			<!-- <button type="button" onClick="AddVatTu()">Thêm vật tư</button> -->
        			
        			<form id="idForm" method="post" action="/kehoachxuatkho/phieu-xuat-kho/save-vat-tu?id=<?= $model->id ?>">
                    	
                    		<table id="vtTable" class="table table-striped">
                    			<thead>
                    				<tr>
                    					<th style="width:5%">STT</th>
                    					<th style="width:10%">Loại VT</th>
                    					<th style="width:15%">Vật tư</th>
                    					<th style="width:10%">ĐVT</th>        					
                    					<th style="width:10%">Số lượng</th>
                    					<?php if($model->daDuyet==true){ ?><th style="width:10%">SL Duyệt</th> <?php } ?>
                    					<th style="width:10%">Đơn giá(VND)</th>
                    					<th style="width:10%">Thành tiền(VND)</th>
                    					<?php if($model->daDuyet==true){ ?><th style="width:10%">TT Duyệt (VND)</th> <?php } ?>
                    					<!-- <th style="width:10%">Ghi chú</th>-->
                    					<th style="width:15%"></th>
                    				</tr>
                    			</thead>
                        		<tbody>
                        			<tr :id="'tr' + result.id" v-for="(result, indexResult) in results.dsVatTu" :key="result.id" >
                        				<td :id="'td' + indexResult">{{ (indexResult + 1) }}</td>
                        				<td>{{ result.tenLoaiVatTu }}</td>
                        				<td>{{ result.tenVatTu }}</td>
                        				<td>{{ result.dvt }}</td>
                        				<td>{{ result.slyc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td> 
                        				<?php if($model->daDuyet==true){ ?><td>{{ result.sldd!=null?result.sldd.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : 0}}</td>  <?php } ?>           
                        				<td>{{ result.donGia.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>
                        				<td>{{ result.thanhTien!=null?result.thanhTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : 0 }}</td>
                        				<?php if($model->daDuyet==true){ ?><td>{{ result.thanhTienDuocDuyet!=null?result.thanhTienDuocDuyet.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : 0 }}</td>  <?php } ?>  
                        				<!-- <td>{{ result.ghiChu }}</td> -->
                        				<td>
											
                        				<?php if($model->trang_thai=='BAN_NHAP'){ ?>
                        					<span class="lbtn-remove btn btn-default btn-xs" v-on:click="editVT(indexResult)"><i class="fa fa-edit"></i> Sửa</span>
                        					<span class="lbtn-remove btn btn-default btn-xs" v-on:click="deleteVT(result.id)"><i class="fa fa-trash"></i> Xóa</span>
                        					<?php } ?>                        					
                        					<span class="lbtn-remove btn btn-primary btn-xs">{{ result.hanMuc + ' (' + result.hanMucPhanTram + '%)'}}</span>
                        				</td>
                        			</tr>
                        		</tbody>
                        		 <tfoot>
                                    
                                    <?php if($model->daDuyet==true){ ?>
                                    <tr>
                                      	<th colspan="7" style="text-align: right">Tổng cộng (Chưa duyệt)</th>
                    					<th colspan="3"><span style="font-weight:bold">{{ results.tongTien!=null?results.tongTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : 0}} (VND)</span></th>
                    					<!-- <th style="width:10%">Ghi chú</th>-->
                                    </tr>
                    				<tr>
                    					<th colspan="7" style="text-align: right">Tổng cộng (Đã duyệt)</th>
                    					<th></th>
                    					<th colspan="2"><span style="font-weight:bold">{{ results.tongTienDuocDuyet!=null?results.tongTienDuocDuyet.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : 0}} (VND)</span></th>
                    					<!-- <th style="width:10%">Ghi chú</th>-->
                                    </tr>
                    				<?php } else { ?>  
                    				<tr>
                                      	<th colspan="6" style="text-align: right">Tổng cộng (Chưa duyệt)</th>
                    					<th colspan="2"><span style="font-weight:bold">{{ results.tongTien!=null?results.tongTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : 0 }} (VND)</span></th>
                    					<!-- <th style="width:10%">Ghi chú</th>-->
                                    </tr>
                    				<?php }?>
                                  </tfoot>
                    		</table>
                    	
                    	</form>
                </div>
            </div>
    	</div>
    </div>
</div><!-- end #obj -->

<?php /* ?>

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-6"> <?= $form->field($model, 'id_cong_trinh')->textInput() ?></div>
		<div class="col-md-6"><?= $form->field($model, 'id_bo_phan_yc')->textInput() ?></div>
	</div>
	
	<div class="row">
		<div class="col-md-6"> <?= $form->field($model, 'ly_do')->textInput() ?></div>
		<div class="col-md-6"></div>
	</div>
	
    <?= $form->field($model, 'thoi_gian_yeu_cau')->textInput() ?>

    <?= $form->field($model, 'id_tai_xe')->textInput() ?>

    <?= $form->field($model, 'id_xe')->textInput() ?>

    <?= $form->field($model, 'nguoi_ky')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_nguoi_duyet')->textInput() ?>

    <?= $form->field($model, 'don_gia')->textInput() ?>

    <?= $form->field($model, 'trang_thai')->textInput(['maxlength' => true]) ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	        
	        <?= Html::button(Yii::t('app', 'Save'),['class'=>'btn btn-primary','type'=>"submit"]) ?>
	    </div>
	<?php  } ?>

    <?php ActiveForm::end(); ?>
    
<?php */ ?>


<?php if($model->trang_thai=='BAN_NHAP'){ ?>
<a href="#" onClick="AddVatTu()" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Thêm vật tư</a>
<?php } ?>
<a href="#" onClick="InPhieuXuatKho()" class="btn btn-default"><i class="fa fa-print"></i> In phiếu xuất kho</a>
    
</section><!-- section -->



<!-- <button type="button" onClick="printPhieu()" class="btn ripple btn-success btn-sm btn-block">In Phiếu</button>-->


        			
<div style="display:none">
<div id="print">
<?= $this->render('_print_phieu', compact('model')) ?>
</div>
</div>

<script type="text/javascript">

var vue10 = new Vue({
	el: '#objDanhSachVatTu',
	data: {
		results: <?= json_encode($model->dsVatTuYeuCau()) ?>
	},
	methods: {
		editVT: function (indexResult) {
          //alert('edit' + indexResult);
          //alert(this.results[indexResult]['id']);
          //alert(this.results[indexResult]['slyc']);
          editVatTu(this.results.dsVatTu[indexResult]);
        },
        deleteVT: function (id) {
            var result = confirm("Xác nhận xóa vật tư đề nghị khỏi phiếu yêu cầu?");
            if (result) {
                //Logic to delete the item
                //alert('delete' + id);
                deleteVatTu(id);
            }          
        }
	},
	computed: {
	}
});

function getDataa(){
    $.ajax({
      type: 'GET',
        dataType:"json",
      url: '/maucua/mau-cua/get-data',
      success: function (data, status, xhr) {
        	vue10.results = data.result;
      }
    });
}

function deleteVatTu(id){
	$.ajax({
        type: 'post',
        url: '/kehoachxuatkho/phieu-xuat-kho/delete-vat-tu?id=' + id,
        //data: frm.serialize(),
        success: function (data) {
            console.log('Submission was successful.');
            console.log(data);            
            if(data.status == 'success'){
            	vue10.results = data.results;
            } else if(data.status == 'error'){
            	alert(data.message);
            }
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });
}

function AddVatTu(){
	var formRow = '<tr id="idTr">';
	formRow += '<td>STT</td>';
	formRow += '<td><span id="loaiVatTuNew">Loại vật tư</span></td>';
	formRow += '<td><select id="idVatTuAdd" name="idVatTu" required></select></td>';
	formRow += '<td><span id="donViTinhNew">Đơn vị tính</span></td>';
	formRow += '<td><input type="text" name="slyc" id="slycNew" required/></td>';	
	formRow += '<td><input type="text" name="donGia" id="donGiaNew" required/></td>';
	formRow += '<td><span id="thanhTienNew">Thành tiền</span></td>';
	//formRow += '<td><input type="text" name="ghiChu" /></td>';
	formRow += '<td><input type="submit" name="submit" value="Lưu" class="btn btn-default btn-xs" style="width:50px" /> <span class="lbtn-remove btn btn-default btn-xs" onClick="remove()">Bỏ qua</span> </td>';
	formRow += '</tr>';
	//if ($("#vtTable tbody").length <= 0){
    //	$('#vtTable').append('<tbody></tbody>');
    //}
    
    if($('#idTr').length <= 0){
    	$('#vtTable tbody').append(formRow);
    	
    	//fill dropdown vat tu
    	fillVatTuDropDown('#idVatTuAdd', '');
    	
    	$('#idVatTuAdd').select2({
          selectOnClose: true,
          width: '100%'
        });
        $('#idVatTuAdd').on("select2:select", function(e) { 
           //alert(this.value);
           getVatTuAjax(this.value);
        });
        //focus and open select 2
       // $('#idVatTuAdd').select2('focus');
       // $('#idVatTuAdd').select2('open');
        
        
        $("#slycNew").on("input", function() {
          // alert($(this).val()); 
           $('#thanhTienNew').text(($(this).val()*$('#donGiaNew').val()).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        });
        $("#donGiaNew").on("input", function() {
           //alert($(this).val()); 
           $('#thanhTienNew').text(($(this).val()*$('#slycNew').val()).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        });
    } else {
    	alert('Vui lòng lưu dữ liệu đang nhập trước!');
    }
}

function editVatTu(arr){
	if ($("#idTrUpdate").length > 0){
		alert('Bạn đang chỉnh sửa vật tư yêu cầu, vui lòng lưu dữ liệu hoặc hủy bỏ để tránh mất dữ liệu!');
	} else {
    	//alert(arr['slyc']);
    	var formRow = '<tr id="idTrUpdate">';
    	formRow += '<td><input type="text" name="id" value="' + arr['id'] + '" style="display:none" />'+ arr['id'] +'</td>';
    	formRow += '<td>'+ arr['tenLoaiVatTu'] +'</td>';
    	formRow += '<td>'+ arr['tenVatTu'] +'</td>';
    	//formRow += '<td><select id="idVatTuEdit" name="idVatTu"></select></td>';
    	formRow += '<td>'+ arr['dvt'] +'</td>';
    	formRow += '<td><input type="text" name="slyc" value="' + arr['slyc'] + '" id="slycEdit" required /></td>';    	
    	formRow += '<td><input type="text" name="donGia" value="' + arr['donGia'] + '" id="donGiaEdit" required /></td>';
    	formRow += '<td><span id="thanhTienEdit">'+ arr['thanhTien'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +' </span></td>';
    	//formRow += '<td><input type="text" name="ghiChu" value="' + arr['ghiChu'] + '" /></td>';
    	formRow += '<td><input class="btn btn-default btn-xs" type="submit" name="submit" value="Lưu" style="width:50px" /> <span class="lbtn-remove btn btn-default btn-xs" onClick="removeEdit()">Bỏ qua</span> </td>';
    	formRow += '</tr>';
    	
    	$('#tr' + arr['id']).hide();
    	$('#tr' + arr['id']).after(formRow);
    	
    	$('#idTrUpdate input[name="slyc"]').focus();
    	$('#idTrUpdate input[name="slyc"]').select();
    	
    	//fill dropdown vat tu
    	//fillVatTuDropDown('#idVatTuEdit', arr['idVatTu']);
    	/* $('#idVatTuEdit').select2({
          placeholder: 'Select an option',
           width: '100%'
        }); */
        
        $("#slycEdit").on("input", function() {
           $('#thanhTienEdit').text(($(this).val()*$('#donGiaEdit').val()).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        });
        $("#donGiaEdit").on("input", function() {
           //alert($(this).val()); 
           $('#thanhTienEdit').text(($(this).val()*$('#slycEdit').val()).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        });
	}
}

function removeEdit(){
	if ($("#idTrUpdate").length > 0){
		$('#idTrUpdate').prev("tr").show();
		$('#idTrUpdate').remove();
	}
}

function remove(){
	if ($("#idTr").length > 0){
		$('#idTr').remove();
	}
}

var frm = $('#idForm');

frm.submit(function (e) {

    e.preventDefault();
    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function (data) {
            console.log('Submission was successful.');
            console.log(data);
            if(data.status == 'success'){
                if(data.type=='create'){
                	$('#idTr').remove();
                } else if(data.type == 'update'){
                	$('#idTrUpdate').remove();
                	$('#tr' + data.vatTuXuat['id']).show();
                }
                vue10.results = data.results
            } else if(data.status == 'error'){
            	alert(data.message);
            }
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });
});

function fillVatTuDropDown(dropdownId, selected){

    $.ajax({
        type: 'post',
        url: '/kehoachxuatkho/phieu-xuat-kho/get-list-vat-tu?selected=' + selected,
        //data: frm.serialize(),
        success: function (data) {
            console.log('Submission was successful.');
            console.log(data);            
            $(dropdownId).html(data.options);
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });
}

function getVatTuAjax(idvt){

    $.ajax({
        type: 'post',
        url: '/kehoachxuatkho/phieu-xuat-kho/get-vat-tu-ajax?idvt=' + idvt,
        //data: frm.serialize(),
        success: function (data) {
            console.log('Submission was successful.');
            console.log(data);            
            if(data.status == 'success'){
            	$('#idTr #donGiaNew').val(data.donGia);
            	$('#idTr #loaiVatTuNew').text(data.loaiVatTu);
            	$('#idTr #donViTinhNew').text(data.dvt);
            	$('#idTr #slycNew').val(1);
            	//set thanh tien
            	$('#thanhTienNew').text(($('#slycNew').val()*$('#donGiaNew').val()).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            } else {
            	alert('Vật tư không còn tồn tại trên hệ thống!');
            }
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });
}

function InPhieuXuatKho(){
	//load lai phieu in (tranh bi loi khi chinh sua du lieu chua update noi dung in)
	$.ajax({
        type: 'post',
        url: '/kehoachxuatkho/phieu-xuat-kho/get-phieu-xuat-kho-in-ajax?idPhieu=' + <?= $model->id ?>,
        //data: frm.serialize(),
        success: function (data) {
            console.log('Submission was successful.');
            console.log(data);            
            if(data.status == 'success'){
            	$('#print').html(data.content);
            	printPhieu();//call from script.js
            } else {
            	alert('Vật tư không còn tồn tại trên hệ thống!');
            }
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });	
}

$.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

<script>
//Red color scheme for iCheck
$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
  checkboxClass: 'icheckbox_minimal-red',
  radioClass   : 'iradio_minimal-red'
})

</script>

