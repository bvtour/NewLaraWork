<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin\Media;

class MediaController extends Controller
{

    private $baseuploadPath;
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');

        $this->baseuploadPath       = public_path().'/uploads/';
        $this->date                 = date('Y/m');
        $this->uploadPath          = $this->baseuploadPath.$this->date;

        if (!is_dir( $this->baseuploadPath)) {
           mkdir( $this->baseuploadPath, 0777, TRUE);
        }
        if (!is_dir( $this->uploadPath)) {
           mkdir( $this->uploadPath, 0777, TRUE);
        }
        if (!is_dir( $this->uploadPath.'/m')) {
           mkdir( $this->uploadPath.'/m', 0777, TRUE);
        }
        if (!is_dir( $this->uploadPath.'/s')) {
           mkdir( $this->uploadPath.'/s', 0777, TRUE);
        }
        if (!is_dir( $this->uploadPath.'/t')) {
           mkdir( $this->uploadPath.'/t', 0777, TRUE);
        }
    }

    public function upload(Request $request)
    {
        $image = $request->file('file');
        $oImageName = $image->getClientOriginalName();
        $img_type = $image->getClientOriginalExtension();
        $imageName = $this->file_newname($this->uploadPath,$oImageName);
        $image->move($this->uploadPath,$imageName);
        
            list($width, $height) = getimagesize($this->uploadPath.'/'.$imageName); // get image width and height
            $size = filesize($this->uploadPath.'/'.$imageName);

            $pos = strrpos($imageName, '.');

            /* Insert Media Item
               NOTE : Also same code in Seeting Controler
            */
            $media = new Media();
            $media->author_id     = Auth()->user()->id;
            $media->base_path     = "/uploads/".$this->date;
            $media->original_name = $oImageName;
            $media->file_name     = $imageName;
/*             $media->name          = substr($re_name, 0, $pos);
            $media->alt           = substr($re_name, 0, $pos);
            $media->description   = substr($re_name, 0, $pos); */
            $media->file_path     = "/".$this->date."/";
            $media->file_size     = $this->formatSizeUnits($size); //$width.'*'.$height;
            $media->dimensions    = $width . ' x ' .$height;
            $media->mime_type     = $img_type;
            $media->page_type    = $request->page_type;
            $media->post_id    = $request->post_id;
            $media->status        = 1;
            $media->save();

        return response()->json([url('/uploads/'.$this->date.'/'.$imageName)]);
    }


    private function formatSizeUnits($bytes) {
	    if ($bytes >= 1073741824) {
	        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
	    } elseif ($bytes >= 1048576) {
	        $bytes = number_format($bytes / 1048576, 2) . ' MB';
	    } elseif ($bytes >= 1024) {
	        $bytes = number_format($bytes / 1024, 2) . ' KB';
	    } elseif ($bytes > 1) {
	        $bytes = $bytes . ' bytes';
	    } elseif ($bytes == 1) {
	        $bytes = $bytes . ' byte';
	    } else {
	        $bytes = '0 bytes';
	    }

	    return $bytes;
	}
    /**
    * Rename image fine name if exist
    * @param filepath $path , Filename $filename
    * @return filename
    */
    protected function file_newname($path, $filename)
    {   
        if ($pos = strrpos($filename, '.')) 
        {
            $name = substr($filename, 0, $pos);
            $ext = substr($filename, $pos);
        } 
        else 
        {
            $name = $filename;
        }
        $newpath = $path.'/'.$filename;
        $newname = $filename;
        $counter = 0;
        while (file_exists($newpath)) 
        {
               $newname = strtolower(str_replace(" ","-",$name)) .'('. $counter .')'. $ext;
               $newpath = $path.'/'.$newname;
               $counter++;
        }
        return $newname;
    }
}
