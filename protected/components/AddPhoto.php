<?php
/**
 * Created by PhpStorm.
 * User: Алекс
 * Date: 10.08.14
 * Time: 13:15
 */

require_once('class/Upload.php');

class AddPhoto extends CApplicationComponent {

    /*
     * Function convert files into an array
     */
    public	function UpdateArrayFILES($r = '')
    {
        if(!$r){ return; }
        if(!is_array($_FILES) || !count($_FILES)){ return; }
        $temp = $_FILES[$r];
        foreach($temp['name'] as $key => $value){
            if(!$temp['name'][$key]){ continue; }
            $RESULT[$key]['name']     = $temp['name'][$key];
            $RESULT[$key]['size']     = $temp['size'][$key];
            $RESULT[$key]['tmp_name'] = $temp['tmp_name'][$key];
            $RESULT[$key]['type']     = $temp['type'][$key];
            $RESULT[$key]['error']    = $temp['error'][$key];
        }
        if(isset($RESULT) && !empty($RESULT)) {
            return $RESULT;
        }
        else { return $RESULT = "";  }
    }

    /*
     * Function upload photos
     * @param (string) name - name input file
     * @param (int) IDObject - ID tab. s_house
     * return bool
     */
    public function UploadPhoto($name,$IDObject) {

        $T = $this->UpdateArrayFILES($name);
        $flag = false;

        if(is_array($T))
        {
            foreach($T as $file)
            {
                $handle = new upload($file['tmp_name']);

                if($handle->uploaded)
                {
                    $handle->allowed = array("image/*");
                    $handle->image_convert = 'jpg';
                    $handle->file_new_name_body   = md5($file['name']);
                    $handle->file_overwrite       = true;
                    $handle->image_resize         = true;
                    $handle->image_ratio_fill     = true;
                    $handle->image_x              = 600;
                    $handle->image_y              = 450;

                    $destination_path = 'files/'.Yii::app()->user->id.'/'.$IDObject.'';

                    $handle->process($destination_path);

                    if ($handle->processed) {

                        $this->InsertData(md5($file['name']).'.jpg',$IDObject);
                        $flag = true;
                        $handle->clean();
                    }
                    else {
                        //'error:'.$handle->error;
                        $flag = false;
                    }
                }
                else{ $flag = false; }
            }
        }

        return $flag;
    }

    /*
     * Inset data in table s_images
     * @param source - name file in md5
     * @param IDObject
     */
    public function InsertData($source,$IDObject) {

        $connection = Yii::app()->db;
        $sql = "INSERT INTO s_images (fk_house, source) VALUES (".$IDObject.",'".$source."')";
        $connection->createCommand($sql)->execute();

    }



} 