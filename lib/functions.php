<?php
    function makeBlurb($string, $wordcount, $allowhtml="",$moreString="...") {
        $string = strip_tags($string,"$allowhtml");
        $words = explode(' ', $string);
        $return = implode(' ', array_slice($words, 0, $wordcount));
        if (sizeof($words) >  $wordcount) { $return .= $moreString; }
        
        return $return;
    }
    
    function makeRest($string, $wordcount, $allowhtml="",$moreString="...") {
        $string = strip_tags($string,"$allowhtml");
        $words = explode(' ', $string);
        $return = implode(' ', array_slice($words, $wordcount));
        //if (sizeof($words) >  $wordcount) { $return .= $moreString; }
        
        return $return;
    }
        
    function twitterConvert($string) {
        $string = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $string);
        $string = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $string);
        $string = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $string);
        $string = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $string);
        
        return $string;
    }

        function detectMobile($userAgent) {
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$userAgent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($userAgent,0,4))) {
            return true;
        } else {
            return false;
        }
    }

    function makeImage($file_in, $file_out, $size, $orientation="", $jpegQuality=100) {
        // make sure it's valid
        list($w, $h) = @getimagesize($file_in); 
        if($w < 1) return false;

        // choose which side to change the size of: width or height, based on parameter... if neither w or h, then use whichever is longer
        if ($orientation == "w" || $w > $h && $orientation !== 'h') {
            $new_w = $size;
            $new_h = $h * ($size/$w);
        } else if ($orientation == "h" || $h > $w && $orientation !== 'w') {
            $new_h = $size;
            $new_w = $w * ($size/$h);
        } else {
            return false;
        }
        
        // create temp image
        $tmp_img = imagecreatetruecolor($new_w, $new_h);
        $white = imagecolorallocate($tmp_img, 255, 255, 255);
        imagefill($tmp_img, 0, 0, $white);
        
        // make the new temp image all transparent
        imagecolortransparent($tmp_img, $white); 
        imagealphablending($tmp_img, false);
        imagesavealpha($tmp_img, true);
        
        switch(exif_imagetype($file_in)) {
            case IMAGETYPE_JPEG :
                $src_img = @imagecreatefromjpeg($file_in);
                imagecopyresampled($tmp_img, $src_img, 0,0,0,0,$new_w,$new_h,$w,$h);
                imagejpeg($tmp_img, $file_out, $jpegQuality);
                break;
            case IMAGETYPE_GIF :
                $src_img = @imagecreatefromgif($file_in);
                imagecopyresampled($tmp_img, $src_img, 0,0,0,0,$new_w,$new_h,$w,$h);
                imagegif($tmp_img, $file_out);
                break;
            case IMAGETYPE_PNG :
                $src_img = @imagecreatefrompng($file_in);
                imagecopyresampled($tmp_img, $src_img, 0,0,0,0,$new_w,$new_h,$w,$h);
                imagealphablending($tmp_img, false);
                imagesavealpha($tmp_img, true);
                imagepng($tmp_img, $file_out);
                break;
            default :
                return false;
        }
        
        imagedestroy($tmp_img);

        return true;
    }

    function svg($file, $class = null) {
        $class = ($class !== null ? "icon-$class" : null);
        print "<i class='icon $class'>".file_get_contents($file)."</i>";
    }

?>