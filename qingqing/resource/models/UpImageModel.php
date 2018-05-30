<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/25
 * Time: 17:02
 */
namespace resource\models;

use common\common\ErrDesc;
use yii\base\Model;

class UpImageModel extends Model {

    protected $rtMsg;
    public $imageFile;  // 上传文件对象
    protected $errorArray;

    public function __construct(array $config=[])
    {
        parent::__construct($config);

        $this->rtMsg = (object)[];
        $this->rtMsg->code = ErrDesc::OK;
        $this->rtMsg->data = [];

        $this->errorArray = [
            0 => 'ok',
            1 => 'file too large in config',// 上传文件大小超过服务器允许上传的最大值，php.ini中设置upload_max_filesize选项限制的值
            2 => 'file too large in max file',// 上传文件大小超过HTML表单中隐藏域MAX_FILE_SIZE选项指定的值
            3 => 'the part of file upload', // 文件只有部分被上传
            6 => 'cant find the temp file', // 没有找不到临时文件夹
            7 => 'write error', // 文件写入失败
            8 => 'not support', // php文件上传扩展没有打开
        ];
    }

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload($newFilePath, $urlPath, $randomFilename=true)
    {
        $this->rtMsg->emsg = '';
        if(!file_exists($newFilePath)) {
            $this->rtMsg->code = ErrDesc::ERR_FILE_NOT_EXIST;
            return $this->rtMsg;
        }
        if($this->imageFile->error != 0) {
            $this->rtMsg->code = ErrDesc::ERR_UPIMAGE;
            $this->rtMsg->emsg = key_exists($this->imageFile->error, $this->errorArray)?$this->errorArray[$this->imageFile->error]:$this->imageFile->error;
            return $this->rtMsg;
        }

        // 在内存小于512M的服务器上没有安装fileinfo扩展
        if(extension_loaded('fileinfo')) {
            return $this->saveFileWithFileInfo($newFilePath, $urlPath, $randomFilename);
        }
        return $this->saveFile($newFilePath, $urlPath, $randomFilename);
    }

    private function saveFileWithFileInfo($newFilePath, $urlPath, $randomFilename=true)
    {
        $newFileName = md5($this->imageFile->baseName)  . '.' . $this->imageFile->extension;
        if($randomFilename) {
            $newFileName = md5($this->imageFile->baseName) . '-' . microtime(true) . '.' . $this->imageFile->extension;
        }

        if($this->validate()) {
            $this->imageFile->saveAs($newFilePath  . $newFileName);
            $this->rtMsg->code = ErrDesc::OK;
            $this->rtMsg->emsg = '';
            $this->rtMsg->data = [
                ['link' => $urlPath . $newFileName],
            ];
            return $this->rtMsg;
        } else {
            $this->rtMsg->code = ErrDesc::ERR_UPIMAGE;
            $this->rtMsg->emsg = $this->errors['imageFile'][0];
            return $this->rtMsg;
        }
    }

    private function saveFile($newFilePath, $urlPath, $randomFilename=true)
    {
        list($baseName, $extension) = $this->getBasenameAndExtension($this->imageFile->name);

        $newFileName = md5($baseName)  . '.' . $extension;
        if($randomFilename) {
            $newFileName = md5($baseName) . '-' . microtime(true) . '.' . $extension;
        }

        if($this->isImage($this->imageFile->type)) {
            move_uploaded_file($this->imageFile->tempName, $newFilePath  . $newFileName);
            $this->rtMsg->code = ErrDesc::OK;
            $this->rtMsg->emsg = '';
            $this->rtMsg->data = [
                ['link' => $urlPath . $newFileName],
            ];
            return $this->rtMsg;
        } else {
            $this->rtMsg->code = ErrDesc::ERR_UPIMAGE;
            $this->rtMsg->emsg = $this->errors['imageFile'][0];
            return $this->rtMsg;
        }
    }

    /**
     * @param $fileName 仅仅只为一个不带路径的文件名
     */
    private function getBasenameAndExtension($fileName)
    {
        $info = pathinfo($fileName);
        $baseName = $info['filename'];
        $extension = $info['extension'];
        return [$baseName, $extension];
    }

    private function isImage($mimeType)
    {
        $IMG_TYPES = array('image/jpeg', 'image/png', 'image/gif');
        return in_array($mimeType, $IMG_TYPES);
    }

    public function error()
    {
        $this->rtMsg->code = ErrDesc::ERR_UPIMAGE;
        return $this->rtMsg;
    }
}
