<?php

namespace Controllers;

use BadRequestException;
use Helpers\Response;
use InternalServerErrorException;

class UploadController
{
    public static function uploadFile()
    {
        if (!isset($_FILES['file'])) {
            throw new BadRequestException("Input required File");
        }
        $file = $_FILES['file'];
        $name = $_FILES['file']['name'];
        $end = explode('.', $name);
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];
        $file_type = $file['type'];
        $file_ext = strtolower(end($end));
        $destination = null;

        $image_extensions = array("jpeg", "jpg", "png");
        $audio_extensions = array("mp3", "aac", "flac", "ogg");
        $video_extensions = array("mp4", "mov", "mkv", "avi", "wmv");

        if (in_array($file_ext, $image_extensions)) {
            $destination = '/tmp/images/';
        } else if (in_array($file_ext, $audio_extensions)){
            $destination = '/tmp/audios/';
        } else if (in_array($file_ext, $video_extensions)){
            $destination = '/tmp/videos/';
        } else{
            throw new InternalServerErrorException("extension not allowed, please choose a JPEG or PNG file.");
        }

        if ($file_size > (20 * 1024 * 1024)) {
            throw new InternalServerErrorException("File size must be less than 2 MB");
        }

        $final_file_name =  $destination . microtime(true)  . '.'. $file_name;

        $moved = move_uploaded_file($file_tmp,  $final_file_name );

        if (!$moved){
            throw new InternalServerErrorException("File has not uploaded");
        }

        return Response::message(
            'file uploaded successfully',
            $final_file_name
        );

    }
}