<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;

/**
 * PostStatus Widget for display status for post/categories in grid and other views
 * input: value and text to display
 */
class TrangThaiPhieuXuatKhoWidget extends Widget
{
    public $value;
    public $text;
    public $labelTypes = [
        'BAN_NHAP'=>'default',
        'CHO_DUYET'=>'warning',
        'DA_DUYET'=>'success',       
        'KHONG_DUYET'=>'danger',
        'DA_GIAO_HANG'=>'info',
        //for ke hoach
        'DA_HOAN_THANH'=>'info',
    ];
    public $labelIcons = [
        'BAN_NHAP'=>'glyphicon glyphicon-edit',
        'CHO_DUYET'=>'glyphicon glyphicon-time',
        'DA_DUYET'=>'glyphicon glyphicon-check',
        'KHONG_DUYET'=>'glyphicon glyphicon-remove-sign',
        'DA_GIAO_HANG'=>'fa fa-truck',
        
        'DA_HOAN_THANH'=>'glyphicon glyphicon-book',
    ];
    
    public function init(){
        parent::init();
    }
    
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        if(array_key_exists($this->value, $this->labelTypes)){
           return '<small class="label label-'.$this->labelTypes[$this->value].'"><i class="'.$this->labelIcons[$this->value].'"></i> '.$this->text.'</small>';
        } else {
            return null;
        }
    }
}
