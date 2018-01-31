<?php

/**
 * ThumbsGen
 * =================
 * This extension generates thumbnails by images of jpg/jpeg, png or gif format.
 * There are many parameters like width,height, source, destination folder etc that you could manage
 * Links:
 * - ThumbsGen demo: http://www.webkit.gr/index.php/Apps/mountain-thumbnails
 * - ThumbsGen site: http://www.yiiframework.com/extension/TODO
 *
 * @version 1.0
 * @author Konstaninos Apazidis <konapaz@gmail.com>
 * @date 15 April 2013
 * */
class ThumbsGen extends CApplicationComponent {

    public $scaleResize = null; //if it is not null $thumbWidth and $thumbHeight will be ommited. for example 'scaleResize'=>0.5 generate image with half dimension
    //one of $thumbWidth or $thumbHeight is optional but not both!
    public $thumbWidth = 200;  //the width of created thumbnail on pixel. if height is null the aspect ratio will be reserved
    public $thumbHeight = null; //the height of created thumbnail on pixel. if width is null the aspect ratio will be reserved
    public $baseSourceDir; //the main direcory of source images. if set to null the destination dir is the <webroot>/images
    public $baseDestDir; //the main direcory of thumbnails. if set to null the destination dir is the <webroot>/images/thumbs
    public $postFixThumbName = '';//'_thumb'; //the postfix name of thumbnail for example if it set = '_thumb' then  image1.jpg become image1_thumb.jpg
    public $nameImages = array('*'); //the names of images into $baseSourceDir, for example ('01.jpg','03.jpg'). the asterisk means all files jpg/jpeg, png or gif
    public $recreate = false; //force to create each thumbnail either exist or not, when is set to false the tumbnails created only in the first time

    public function init() {
        if (!$this->baseSourceDir)
            $this->baseSourceDir = Yii::getPathOfAlias('webroot.img');
        if (!$this->baseDestDir)
            $this->baseDestDir = Yii::getPathOfAlias('webroot.img.thumbs');

        if ($this->thumbHeight === null)
            parent::init();
    }

    //low lever generator method
    function createthumb($source, $dest) {
        list($img_width, $img_height, $img_type) = getimagesize($source);

        switch ($img_type) {
            case IMAGETYPE_JPEG:
                $thumb_image = imagecreatefromjpeg($source);
                break;
            
            case IMAGETYPE_PNG:
                $thumb_image = imagecreatefrompng($source);
                break;
            case IMAGETYPE_GIF:
                $thumb_image = imagecreatefromgif($source);
                break;
            default:
                throw new CException('The image type "' . $type . '" not supported');
        }


        if ($this->scaleResize !== null) {
            $thumb_w = $img_width * $this->scaleResize;
            $thumb_h = $img_height * $this->scaleResize;
        } else {
            if ($this->thumbWidth === null && $this->thumbHeight === null) {
                throw new CException('cannot set zero both of width and height for thumbnails');
            } else if ($this->thumbHeight === null) {
                $thumb_w = $this->thumbWidth;
                $thumb_h = $this->thumbWidth * ($img_height / $img_width);
            } else if ($this->thumbWidth === null) {
                $thumb_h = $this->thumbHeight;
                $thumb_w = $this->thumbHeight * ($img_width / $img_height);
            } else {
                $thumb_w = $this->thumbWidth;
                $thumb_h = $this->thumbHeight;
            }
        }

        $dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);
        imagecopyresampled($dst_img, $thumb_image, 0, 0, 0, 0, $thumb_w, $thumb_h, $img_width, $img_height);

        $img_type = pathinfo($dest, PATHINFO_EXTENSION);

        if ($img_type === 'jpg' || $img_type === 'jpeg')
            imagejpeg($dst_img, $dest);
        else if ($img_type === 'png')
            imagepng($dst_img, $dest);
        else if ($img_type === 'gif')
            imagegif($dst_img, $dest);
        else
            throw new CException('The image type "' . $img_type . '" not supported');

        imagedestroy($dst_img);
        imagedestroy($thumb_image);
        return true;
    }

    public function createThumbnails() {

        if ($this->nameImages[0] === '*') {
            $this->nameImages = glob($this->baseSourceDir . DIRECTORY_SEPARATOR . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            foreach ($this->nameImages as $key => $val) {
                $this->nameImages[$key] = basename($val);
            }
        }

        if (!is_dir($this->baseDestDir)) {
            if (!mkdir($this->baseDestDir, 0755, true)) {
                throw new CException('cannot create directory ' . $this->baseDestDir);
            }
        }

        foreach ($this->nameImages as $filename) {
            $infofile = pathinfo($filename);
            $origin = $this->baseSourceDir . DIRECTORY_SEPARATOR . $filename;
            $thumb = $this->baseDestDir . DIRECTORY_SEPARATOR . $infofile['filename'] . $this->postFixThumbName . '.' . $infofile['extension'];
            if ((!is_file($thumb) || $this->recreate == true) && is_readable($origin)) {
                $this->createthumb($origin, $thumb);
            } else if (!is_readable($origin)) {
                throw new CException('file ' . $infofile['filename'] . ' is not readable!');
            }
        }
    }

    public function getThumbsUrl() {
        $res = glob($this->baseDestDir . DIRECTORY_SEPARATOR . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        $pathUrl = str_replace(Yii::getPathOfAlias('webroot'), '', $this->baseDestDir);
        $pathUrl = str_replace('\\', '/', $pathUrl);

        foreach ($res as $key => $val) {
            $res[$key] =Yii::app()->baseUrl . $pathUrl . '/' . basename($val);
        }
        return $res;
    }

}

?>