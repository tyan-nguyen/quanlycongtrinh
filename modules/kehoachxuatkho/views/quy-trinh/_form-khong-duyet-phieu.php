<?php
use yii\widgets\ActiveForm;
use app\modules\nguoidung\models\PhongBan;
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

<?= $this->render('../phieu-xuat-kho/_info_cong_trinh', ['model'=>$model->congTrinh]) ?>

<section class="phieu-xuat-kho-form" style="background-color: white; padding:10px;">
<?php $form = ActiveForm::begin([
    'action' => '/kehoachxuatkho/quy-trinh/khong-duyet-phieu?idPhieu=' . $model->id,
]); ?>

<?= $form->errorSummary($model) ?>

<div class="row">
	<div class="col-sm-5">
	 	<?= $form->field($model, 'y_kien_nguoi_duyet')->textarea(['rows'=>3]) ?>
	</div>

</div>

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
                    					<th style="width:10%">Số lượng duyệt</th>
                    					<th style="width:10%">Đơn giá(VND)</th>
                    					<th style="width:10%">Thành tiền(VND)</th>
                    					<th style="width:10%">Thành tiền duyệt(VND)</th>
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
                        				<td>{{ result.sldd==null? 0 : result.sldd.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>            
                        				<td>{{ result.donGia.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>
                        				<td>{{ result.thanhTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>
                        				<td>{{ result.thanhTienDuocDuyet.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>
                        				<!-- <td>{{ result.ghiChu }}</td> -->
                        				<td>
                        					<!-- <span class="lbtn-remove btn btn-default btn-xs" v-on:click="editVT(indexResult)"><i class="fa fa-edit"></i> Duyệt</span>-->
                        					<span class="lbtn-remove btn btn-primary btn-xs">{{ result.hanMuc + ' (' + result.hanMucPhanTram + '%)'}}</span>
                        				</td>
                        			</tr>
                        		</tbody>
                        		 <tfoot>
                                    <tr>
                                      	<!-- <th colspan="5"></th> -->
                    					<th colspan="7" style="text-align:right">Tổng cộng (theo yêu cầu)</th>
                    					<th colspan="2"><span style="font-weight:bold">{{ results.tongTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }} (VND)</span></th>
                    					<!-- <th style="width:10%">Ghi chú</th>-->
                                    </tr>
                                    <tr>
                                      	<!-- <th colspan="5"></th> -->
                    					<th colspan="7" style="text-align:right">Tổng cộng (được duyệt)</th>
                    					<th></th>
                    					<th colspan="2"><span style="font-weight:bold">{{ results.tongTienDuocDuyet.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }} (VND)</span></th>
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

</section>


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
    	formRow += '<td>'+ arr['slyc'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +'</td>';
    	formRow += '<td><input type="text" name="sldd" value="' + (arr['sldd']==null?0:arr['sldd']) + '" id="slddEdit" required /></td>';    	
    	formRow += '<td>'+ arr['donGia'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +'</td>';
    	formRow += '<td><span id="thanhTienEdit">'+ arr['thanhTien'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +' </span></td>';
    	formRow += '<td><span id="thanhTienEdit">'+ arr['thanhTienDuocDuyet'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +' </span></td>';
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