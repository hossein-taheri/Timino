<?php
namespace Helpers;

class Response{
    private static function response($statusCode,$messages,$data){
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        return json_encode([
          'statusCode' => $statusCode,
          'messages' => $messages,
          'data' => $data,
        ]);
    }

    public static function error($statusCode,$message){
        return Response::response($statusCode, [ $message ],null);
    }

    public static function message($message,$data){
        return Response::response(200, [ $message ],$data);
    }

}