<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;

/**
 * PostStatus Widget for display status for post/categories in grid and other views
 * input: value and text to display
 */
class TrangThaiCongTrinhWidget extends Widget
{
    public $value;
    public $text;
    public $type = 'badge';
    public $labelTypes = [
        'KHOI_TAO'   => 'default',
        'THUC_HIEN'  => 'warning',
        'HOAN_THANH' => 'success'
    ];
    public $labelIcons = [
        'KHOI_TAO'   => 'glyphicon glyphicon-file',
        'THUC_HIEN'  => 'fa fa-hourglass-1',
        'HOAN_THANH' => 'glyphicon glyphicon-ok'
    ];
    
    public function init(){
        parent::init();
    }
    
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        if(in_array($this->type, ['badge', 'h3']) == false ){
            $this->type = 'badge';
        }
        if(array_key_exists($this->value, $this->labelTypes)){
            if($this->type == 'badge'){
                return '<small class="label label-'.$this->labelTypes[$this->value].'"><i class="'.$this->labelIcons[$this->value].'"></i> '.$this->text.'</small>';
            } else if($this->type == 'h3'){
                return '<h3 class="profile-username text-center"><i class="'. $this->labelIcons[$this->value] .'"></i> '. $this->text .'</h3>';
            }
        } else {
            return null;
        }
    }
}
