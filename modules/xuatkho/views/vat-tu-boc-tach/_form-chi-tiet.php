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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 22px!important;
}
</style>

<?= $this->render('../phieu-xuat-kho/_info_cong_trinh', ['model'=>$model]) ?>

<div class="vat-tu-boc-tach-form">

    <?php $form = ActiveForm::begin([
        'action' => '/xuatkho/vat-tu-boc-tach/chi-tiet?id=' . $model->id,
    ]); ?>
    <div style="display:none">
	 <?= $form->field($model, 'id')->textInput() ?>
	 </div>
    <?php ActiveForm::end(); ?>
    
</div>

<section class="phieu-xuat-kho-form" style="background-color: white; padding:10px;">

<div id="objDanhSachVatTu" style="margin-top:10px;">
    <div class="row">
    	<div class="col-xs-12 table-responsive">
        	<div class="box">
        		<div class="box-header">
        			<h3 class="box-title">CHI TIẾT VẬT TƯ BÓC TÁCH</h3>
        		</div>
        		<div class="box-body no-padding">
        			<!-- <button type="button" onClick="AddVatTu()">Thêm vật tư</button> -->
        			
        			<form id="idForm" method="post" action="/congtrinh/cong-trinh/save-vat-tu-boc-tach?id=<?= $model->id ?>">
                    	
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
                        				<td>{{ result.soLuong.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td> 
                        				<td>{{ result.donGia.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>
                        				<td>{{ result.thanhTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>
                        				 
                        				<!-- <td>{{ result.ghiChu }}</td> -->
                        				<td>
                        				
                        					<span class="lbtn-remove btn btn-default btn-xs" v-on:click="editVT(indexResult)"><i class="fa fa-edit"></i> Sửa</span>
                        					<span class="lbtn-remove btn btn-default btn-xs" v-on:click="deleteVT(result.id)"><i class="fa fa-trash"></i> Xóa</span>
                        					
                        				</td>
                        			</tr>
                        		</tbody>
                        		 <tfoot>
                                    
                                     
                    				<tr>
                                      	<th colspan="6" style="text-align: right">Tổng cộng</th>
                    					<th colspan="2"><span style="font-weight:bold">{{ results.tongTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }} (VND)</span></th>
                    					<!-- <th style="width:10%">Ghi chú</th>-->
                                    </tr>
                    				
                                  </tfoot>
                    		</table>
                    	
                    	</form>
                </div>
            </div>
    	</div>
    </div>
</div><!-- end #obj -->

<?php if($model->trang_thai!='HOAN_THANH'){ ?>
<a href="#" onClick="AddVatTu()" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Thêm vật tư</a>
<?php } ?>
<!-- <a href="#" onClick="InPhieuXuatKho()" class="btn btn-default"><i class="fa fa-print"></i> In phiếu xuất kho</a> -->
    
</section><!-- section -->
			
<div style="display:none">
<div id="print">
<?= $this->render('_print_phieu_boc_tach', compact('model')) ?>
</div>
</div>

<script type="text/javascript">

var vue10 = new Vue({
	el: '#objDanhSachVatTu',
	data: {
		results: <?= json_encode($model->dsVatTuBocTach()) ?>
	},
	methods: {
		editVT: function (indexResult) {
          //alert('edit' + indexResult);
          //alert(this.results[indexResult]['id']);
          //alert(this.results[indexResult]['slyc']);
          editVatTu(this.results.dsVatTu[indexResult]);
        },
        deleteVT: function (id) {
            var result = confirm("Xác nhận xóa vật tư đề nghị khỏi bóc tách vật tư?");
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

function deleteVatTu(id){
	$.ajax({
        type: 'post',
        url: '/congtrinh/cong-trinh/delete-vat-tu?id=' + id,
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
	formRow += '<td><input type="text" name="soLuong" id="slycNew" required/></td>';	
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
    	formRow += '<td><input type="text" name="soLuong" value="' + arr['soLuong'] + '" id="slycEdit" required /></td>';    	
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
                	$('#tr' + data.vatTuBocTach['id']).show();
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

function InPhieuXuatKho(){
	//load lai phieu in (tranh bi loi khi chinh sua du lieu chua update noi dung in)
	$.ajax({
        type: 'post',
        url: '/xuatkho/vat-tu-boc-tach/get-phieu-boc-tach-in-ajax?idPhieu=' + <?= $model->id ?>,
        //data: frm.serialize(),
        success: function (data) {
            console.log('Submission was successful.');
            console.log(data);            
            if(data.status == 'success'){
            	$('#print').html(data.content);
            	printPhieu();//call from script.js
            } else {
            	alert('Công trình không còn tồn tại trên hệ thống!');
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

