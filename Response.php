<?php
class Response
{

    public static function tohtml($message='success',$data="",$code=200)
    {

    }
    public static function tojson($message='success',$data="",$code=200)
    {
        $json=[
            'status'=>$code,
            'res'=> $message,
            'total'=>is_array($data)?count((array)$data) :  1,
            'data'=>$data
        ];
        echo json_encode($json,http_response_code($code));
        header('Content-type: application/json');
    }
}