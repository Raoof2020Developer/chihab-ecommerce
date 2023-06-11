<?php 

namespace App\Traitments;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageUploadTrait {
    protected $imgPath = "app/public/img";

    public function uploadImg($img) {
        $imgName = $this->imgName($img);

        Image::make($img)->save(storage_path($this->imgPath. '/'. $imgName));
        return 'img/' . $imgName;
    }

    public function imgName($img) {
        return time() . '-' . $img->getClientOriginalName();
    }
}