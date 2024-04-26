<?php

namespace app\modules\kehoachxuatkho\models;

use app\modules\dungchung\models\HinhAnh;
use app\modules\kho\models\HeVach;
use app\modules\kho\models\KhoVatTu;
use app\modules\vattu\models\VatTu;
use app\modules\vattu\models\LoaiVatTu;
use app\modules\vattu\models\DonViTinh;

class ImportDuAn1
{    
    CONST START_ROW = 4;
    CONST START_COL = 'B';
    
    /**
     * kiem tra file upload
     * @param string $type
     * @param string $file : filename
     * @return array[]
     */
    public static function checkFile($model, $type, $file){
        $xls_data = Import::readExcelToArr($file);
        
        $errors = array();
        $errorByRow = array();
        
        foreach ($xls_data as $index=>$row){
            $errorByRow = array();
            if($index>=ImportDuAn1::START_ROW){
                //check B, check exist and not null
               /*  $mod = new CheckFile();
                $mod->isExist = true;
                $mod->allowNull = false;
                $mod->modelExist = BoPhan::find()->where(['ma_bo_phan'=>$row['B']]);
                $err = $mod->checkVal('B'.$index, $row['B']);
                if(!empty($err)){
                    array_push($errorByRow, $err);
                } */
            }
            if($errorByRow != null){
                //array_push($errors, $errorByRow);
                $errors[$index] = $errorByRow;
            }
        }        
        return $errors;
    }
    
    /**
     * import file đã kiểm tra vào csdl
     * @param string $file: ten file
     * @return number[]|string[][]
     */
    public static function importFile($duAnModel, $file){
        $excel = Import::readExcel($file);
        $sheet = $excel->getActiveSheet();
        $xls_data = Import::readExcelToArr($file);
        $errorByRow = array();
        $successCount = 0;
        $errorCount = 0;
        
        $arrr = array();//luu dong co chu STT
        foreach ($xls_data as $index=>$row){
            if($row['A'] == 'STT'){
                array_push($arrr, $index);
            }
        }
        if(count($arrr) != 1){//1 là số tiêu đề có chữ STT
            $errorByRow['maucua'] = 'Định dạng file không đúng!';
            return [
                'success'=>0,
                'error'=>1,
                'errorArr'=>$errorByRow,
            ];
        }
        
        /*************/
        foreach ($xls_data as $index=>$row){
            if($index>=ImportDuAn1::START_ROW){
                $model = new VatTuBocTach();
                $model->id_cong_trinh = $duAnModel->id;
                /**check vat tu*/
                if($row['C'] != null && $row['B'] != null){
                    $vatTu = VatTu::find()->alias('t')->joinWith(['loaiVatTu lvt'])->where([
                        't.ten_vat_tu' => $row['C'],
                        'lvt.ten_loai_vat_tu' => $row['B'],
                    ])->one();
                    if($vatTu == null){
                        //them loai vat tu
                        $loaiVatTu = LoaiVatTu::find()->where(['ten_loai_vat_tu'=>$row['B']])->one();
                        if($loaiVatTu == null){
                            $loaiVatTu = new LoaiVatTu();
                            $loaiVatTu->ten_loai_vat_tu = $row['B'];
                            $loaiVatTu->save();
                        }                        
                        //them vat tu
                        $vatTuModel = new VatTu();
                        $vatTuModel->ten_vat_tu = $row['C'];
                        $vatTuModel->so_luong = 0;
                        $vatTuModel->don_gia = 0;
                        //check don_vi_tinh
                        if($row['D'] != null){
                            $dvt = DonViTinh::find()->where(['ten_dvt'=>$row['D']])->one();
                            if($dvt==null){
                                $dvt = new DonViTinh();
                                $dvt->ten_dvt = $row['D'];
                                $slug = preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $dvt->ten_dvt);
                                //this will replace all non alphanumeric char with '-'
                                $slug = mb_strtolower($slug);
                                //convert string to lowercase
                                $slug = trim($slug, '-');
                                //trim whitespaces
                                $dvt->ma_dvt = $slug;
                                $dvt->save();                                
                            }
                        } else {
                            $dvt = new DonViTinh();
                            $dvt->ten_dvt = $row['D'];
                            $slug = preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $dvt->ten_dvt);
                            //this will replace all non alphanumeric char with '-'
                            $slug = mb_strtolower($slug);
                            //convert string to lowercase
                            $slug = trim($slug, '-');
                            //trim whitespaces
                            $dvt->ma_dvt = $slug;
                            $dvt->save();
                        }
                        $dvt->refresh();
                        $vatTuModel->don_vi_tinh = $dvt->id;
                        $loaiVatTu->refresh();
                        $vatTuModel->id_loai_vat_tu = $loaiVatTu->id;
                        $vatTuModel->save();                        
                    }
                }else if($row['C'] != null && $row['B'] == null){
                    $vatTu = VatTu::find()->alias('t')->joinWith(['loaiVatTu lvt'])->where([
                        't.ten_vat_tu' => $row['C'],
                    ])->one();
                    if($vatTu == null){
                        //them vat tu
                        $vatTuModel = new VatTu();
                        $vatTuModel->ten_vat_tu = $row['C'];
                        $vatTuModel->so_luong = 0;
                        $vatTuModel->don_gia = 0;
                        //check don_vi_tinh
                        if($row['D'] != null){
                            $dvt = DonViTinh::find()->where(['ten_dvt'=>$row['D']])->one();
                            if($dvt==null){
                                $dvt = new DonViTinh();
                                $dvt->ten_dvt = $row['D'];
                                $slug = preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $dvt->ten_dvt);
                                //this will replace all non alphanumeric char with '-'
                                $slug = mb_strtolower($slug);
                                //convert string to lowercase
                                $slug = trim($slug, '-');
                                //trim whitespaces
                                $dvt->ma_dvt = $slug;
                                $dvt->save();
                            }
                        } else {
                            $dvt = new DonViTinh();
                            $dvt->ten_dvt = $row['D'];
                            $slug = preg_replace('@[\s!:;_\?=\\\+\*/%&#]+@', '-', $dvt->ten_dvt);
                            //this will replace all non alphanumeric char with '-'
                            $slug = mb_strtolower($slug);
                            //convert string to lowercase
                            $slug = trim($slug, '-');
                            //trim whitespaces
                            $dvt->ma_dvt = $slug;
                            $dvt->save();
                        }
                        $dvt->refresh();
                        $vatTuModel->don_vi_tinh = $dvt->id;
                        $loaiVatTu->refresh();
                        $vatTuModel->id_loai_vat_tu = 1;//1 là chưa phân loại
                        $vatTuModel->save();
                    }
                }
                /** end check vat tu*/
                if(isset($vatTuModel) && $vatTuModel != null){
                    $vatTu = $vatTuModel;
                }
                $model->id_vat_tu = $vatTu->id;
                $soLuong = $sheet->getCell('E'.$index)->getValue();
                $model->so_luong = ($soLuong>0) ? $soLuong : 0;
                $model->don_gia = $vatTu->don_gia; //tam thời chưa sét đơn giá.
                if($model->save()){
                    $successCount++;
                } else {
                    $errorCount++;
                    $errorByRow[$index] = 'Dòng '. $index . ' bị lỗi!';
                }
            }
        }
              
        return [
            'success'=>$successCount,
            'error'=>$errorCount,
            'errorArr'=>$errorByRow,
        ];
    }
}