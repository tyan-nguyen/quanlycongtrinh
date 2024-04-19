<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhieuXuatKho */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="/js/vue.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 22px!important;
}
</style>

<div class="phieu-xuat-kho-form">

<div class="row">
    <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-globe"></i> PHIẾU XUẤT KHO
            <small class="pull-right">Date: 2/10/2014</small>
        </h2>
    </div>
</div>
<div class="row">
	<div class="col-sm-4">Thông tin dự án</div>
	<div class="col-sm-4">Thông tin duyệt</div>
	<div class="col-sm-4">Thông tin vận chuyển</div> 
</div>
<div class="row">
	<div class="col-xs-12 table-responsive">
    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title">CHI TIẾT VẬT TƯ</h3>
    		</div>
    		<div class="box-body no-padding">
    			<button type="button" onClick="AddVatTu()">Thêm vật tư</button>
    			<form id="idForm" method="post" action="/xuatkho/phieu-xuat-kho/save-vat-tu?id=<?= $model->id ?>">
                	<div id="objDanhSachVatTu">
                		<table id="vtTable" class="table table-striped">
                			<thead>
                				<tr>
                					<th style="width:5%">STT</th>
                					<th style="width:10%">Loại VT</th>
                					<th style="width:15%">Vật tư</th>
                					<th style="width:10%">ĐVT</th>        					
                					<th style="width:10%">Số lượng</th>
                					<th style="width:10%">Đơn giá(VND)</th>
                					<th style="width:10%">Thành tiền(VND)</th>
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
                    				<td>{{ result.donGia.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>
                    				<td>{{ result.thanhTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>
                    				<!-- <td>{{ result.ghiChu }}</td> -->
                    				<td>
                    					<span class="lbtn-remove btn btn-default btn-xs" v-on:click="editVT(indexResult)"><i class="fa fa-edit"></i> Sửa</span>
                    					<span class="lbtn-remove btn btn-default btn-xs" v-on:click="deleteVT(result.id)"><i class="fa fa-trash"></i> Xóa</span>
                    				</td>
                    			</tr>
                    		</tbody>
                		</table>
                	</div>
                	</form>
            </div>
        </div>
	</div>
</div>





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
        url: '/xuatkho/phieu-xuat-kho/delete-vat-tu?id=' + id,
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
    	formRow += '<td><input type="text" name="slyc" value="' + arr['slyc'] + '" /></td>';    	
    	formRow += '<td><input type="text" name="donGia" value="' + arr['donGia'] + '" /></td>';
    	formRow += '<td>'+ arr['thanhTien'] +'</td>';
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
        url: '/xuatkho/phieu-xuat-kho/get-list-vat-tu?selected=' + selected,
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
        url: '/xuatkho/phieu-xuat-kho/get-vat-tu-ajax?idvt=' + idvt,
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

$.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>

