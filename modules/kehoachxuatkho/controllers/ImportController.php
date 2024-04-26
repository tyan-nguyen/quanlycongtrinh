<?php

namespace app\modules\kehoachxuatkho\controllers;

use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use app\modules\congtrinh\models\CongTrinh;
use app\modules\kehoachxuatkho\models\Import;
use app\modules\kehoachxuatkho\models\ImportDuAn1;

/**
 * Default controller for the `dungchung` module
 */
class ImportController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'ghost-access'=> [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }
     /**
     * Upload file to import
     * @param string $type
     * @return mixed
     */
    public function actionUpload($id, $type)
    {   
        $model = new Import();
        $duAn = CongTrinh::findOne($id);
        $request = Yii::$app->request;
        
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                
                return [
                    'title'=> "Upload file",
                    'content'=>$this->renderAjax('upload', compact('model')),
                    'footer'=> Html::button('Upload',['type'=>"submit"]) . '&nbsp;' .
                            Html::button('Close',['data-bs-dismiss'=>"modal"])
                    
                ];
            }else if($model->load($request->post())){
                $file = UploadedFile::getInstance($model, 'file');
                if (!empty($file)){
                    $fileName = md5(Yii::$app->user->id . date('Y-m-d H:i:s')) . '.' . $file->extension;
                    $file->saveAs(Yii::getAlias('@webroot') . Import::FOLDER_EXCEL_UP .  $fileName);
                    
                    //checkfile
                    /********/
                    if($type=='BOCTACH'){
                        $rt = ImportDuAn1::checkFile($duAn, $type, $fileName);
                    }
                    
                    $status = false;
                    if(empty($rt)){
                        $status = true;
                    }
                    if($status == true){
                        return [
                            'title'=> "Kiểm tra file dữ liệu",
                            'content'=>$this->renderAjax('checkSuccess'),
                            'footer'=> Html::a('Start Upload',
                                ['import?id='.$id.'&type='.$type.'&file=' . $fileName],
                                ['role'=>'modal-remote']
                            ) . '&nbsp;' .
                            Html::button('Close',['data-bs-dismiss'=>"modal"])
                        ];
                    } else {
                        Import::deleteFileTemp($fileName);
                        return [
                            'title'=> "Test file dữ liệu",
                            'content'=>$this->renderAjax('error', compact('rt')),
                            'tcontent'=>'File có lỗi! Vui lòng kiểm tra dữ liệu',
                            'footer'=> Html::button('Close',['data-bs-dismiss'=>"modal"])
                            
                        ];
                    }
                    
                    
                }
            }
        }
    }
    
    /**
     * import file was checked to db
     * @param string $type
     * @param string $file
     * @return string[]
     */
    public function actionImport($id, $type, $file){
        $request = Yii::$app->request;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $duAn = CongTrinh::findOne($id);
        if($duAn == null){
            return [
                'forceReload'=>'#crud-datatable-pjax',
                'title'=> "Kết quả import dữ liệu",
                'content'=>'Công trình không tồn tại!',
                'footer'=> Html::button('Close',['data-bs-dismiss'=>"modal"])
                
            ];
        }
        
        if($request->isAjax){
            
            if($request->isGet){
                if(Import::checkFileExist($file)){
                    //import file
                    /********/
                    if($type=='BOCTACH'){
                        $result = ImportDuAn1::importFile($duAn, $file);
                    }
                    
                    Import::deleteFileTemp($file);
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "Kết quả import dữ liệu",
                        'content'=>$this->renderAjax('result', [
                            'success'=>$result['success'],
                            'error'=>$result['error'],
                            'errorArr'=>$result['errorArr']
                        ]),
                        'footer'=> Html::button('Close',['data-bs-dismiss'=>"modal"])
                        
                    ];
                }
            }
        }
    }

}
