<?php
use yii\helpers\Html;
?>
<link href="/css/print-display.css" rel="stylesheet">
<div class="row text-center" style="width: 100%">
    <div class="col-md-12" style="width: 100%"> 
    	<table id="table-top" style="width: 100%">
    		<tr>
    			<td width="110px">
    				<img src="/images/logo.png" width="100px" />
    			</td>
    			<td>
    				<span style="font-weight: bold; font-size:14pt">DNTN SX-TM NGUYỄN TRÌNH</span>
    				<br/>
    				<span style="font-size:10pt">ĐC: Nguyễn Đáng, Khóm 10, P.9, TP.TV</span>
    				<br/>
    				<span style="font-size:10pt">ĐT: 0903.794.530 - 0903.794.531 - 0903.794.532</span>
    				<br/>
    				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:10pt">0903.794.533 - 0903.794.534 - 0903.794.535</span> 				
    			</td>
    			<td>
    				<span class="span-status"><?= $model->getDmTrangThaiLabel($model->trang_thai) ?></span> 
    			</td>
    		</tr>
    	</table>
    	
    	<table style="width: 100%">
    		<tr>
    			<td style="text-align: center"><span class="phieu-h1">ĐỀ NGHỊ XUẤT KHO</span></td>
    		</tr>
    		<tr>
    			<td style="text-align: center"><span class="phieu-h2">(<?= $model->soPhieu ?>)</span></td>
    		</tr>
    	</table>
    	
    	<table id="table-info" style="width: 100%; margin-top:10px;">
    		<tr>
    			<td colspan="2">
    				- Tên công trình: <?= $model->congTrinh->ten_cong_trinh ?>			
    			</td>
    			<!-- <td>
    				Địa chỉ:
    			</td> -->
    		</tr>
    		<tr>
    			<td colspan="2">
    				- Bộ phận lập Kế hoạch: <?= $model->boPhanYc != null ? $model->boPhanYc->room_name : '' ?>	
    			</td>
    		</tr>
    		<tr>
    			<td colspan="2">
    				- Người nhập Kế hoạch: <?= $model->nguoiTao != null ? $model->nguoiTao->name : '' ?>	
    			</td>
    		</tr>
    		<tr>
    			<td colspan="2">
    				- Lý do lập Kế hoạch: <?= $model->ly_do ?>
    			</td>
    		</tr>
    		<tr>
    			<td colspan="2">
    				- Người duyệt: <?= ($model->nguoiDuyet != null ? $model->nguoiDuyet->name : '') ?>
    			</td>
    		</tr>
    	</table>
    	
    	<table id="table-content" style="width: 100%; margin-top:10px;">
    		<thead>
    			<tr>
        			<td style="width:5%" rowspan="2">Số TT</td>
        			<td style="width:30%" rowspan="2">Tên, nhãn hiệu, quy cách, phẩm chất vật tư, dụng cụ, sản phẩm, hàng hóa</td>
        			<td style="width:10%" rowspan="2">Mã số</td>
        			<td style="width:10%" rowspan="2">Đơn vị tính</td>
        			<td style="width:20%" colspan="2">Số lượng</td>
        			<td style="width:12%" rowspan="2">Đơn giá<br/>(VND)</td>
        			<td style="width:13%" rowspan="2">Thành tiền<br/>(VND)</td>
    			</tr>
    			<tr>        			
        			<td>Yêu cầu</td>
        			<td>Được duyệt</td>
    			</tr>
    			<!-- <tr>
        			<td style="width:5%">Số TT</td>
        			<td style="width:30%">Tên, nhãn hiệu, quy cách, phẩm chất vật tư, dụng cụ, sản phẩm, hàng hóa</td>
        			<td style="width:10%">Mã số</td>
        			<td style="width:10%">Đơn vị tính</td>
        			<td style="width:10%">Yêu cầu</td>
        			<td style="width:10%">Thực xuất</td>
        			<td style="width:12%">Đơn giá</td>
        			<td style="width:13%">Thành tiền</td>
    			</tr> -->
    			<tr>
        			<td>A</td>
        			<td>B</td>
        			<td>C</td>
        			<td>D</td>
        			<td>1</td>
        			<td>2</td>
        			<td>3</td>
        			<td>4</td>
    			</tr>
    		</thead>
    		<tbody>
    			<?php 
    			$stt = 0;
    			foreach ($model->vatTuXuat as $iVT=>$vt){
    			    $stt++;
    			?>
    			<tr>
        			<td style="text-align:center"><?= $stt ?></td>
        			<td><?= $vt->vatTu->ten_vat_tu ?></td>
        			<td style="text-align:center"><?= $vt->vatTu->ma_vat_tu ?></td>
        			<td style="text-align:center"><?= $vt->vatTu->donViTinh->ten_dvt ?></td>
        			<td style="text-align:right"><?= $vt->so_luong_yeu_cau ?></td>
        			<td style="text-align:right"><?= $vt->so_luong_duoc_duyet ?></td>
        			<td style="text-align:right"><?= number_format($vt->don_gia) ?></td>
        			<td style="text-align:right;font-weight: bold"><?= $model->daDuyet==false?number_format($vt->thanhTien):number_format($vt->thanhTienDuocDuyet) ?></td>
    			</tr>
    			<?php 
    			}
    			?>
    			
    			<tr>
        			<td style="text-align:center"></td>
        			<td style="text-align:center;font-weight: bold;">Cộng</td>
        			<td style="text-align:center">x</td>
        			<td style="text-align:center">x</td>
        			<td style="text-align:right">x</td>
        			<td style="text-align:right">x</td>
        			<td style="text-align:right">x</td>
        			<td style="text-align:right;font-weight: bold"><?= $model->daDuyet==false?number_format($model->tongTien):number_format($model->tongTienDuocDuyet) ?></td>
    			</tr>
    			
    			
    		</tbody>
    	</table>
    	
    	<table id="table-ky-ten" style="width: 100%; margin-top:10px;">
    		<tr>
    			<td style="text-align:right;font-weight:normal;font-style:italic">Trà Vinh, ngày <?= date('d') ?> tháng <?= date('m') ?> năm <?= date('Y') ?></td>
    		</tr>
    	</table>
    	
    	
    	
    	
    	
    	   
    </div>
</div> <!-- row -->