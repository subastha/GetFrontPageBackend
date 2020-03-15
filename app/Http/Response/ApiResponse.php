<?php

namespace App\Http\Response;

class ApiResponse {

    private $responseType;
    private $data;
    private $statusCode;

    function __construct($data = null, string $responseType = 'json'){
        $this->data = $data;
        $this->responseType = $responseType;
    }

    public static function success($data, string $responseType = 'json'){
        return ApiResponse::create($data, $responseType)
            ->setStatusCode(200)
            ->response();
    }

    private static function create($data, string $responseType = 'json'){
        return new self($data, $responseType);
    }

    public function setStatusCode(int $statusCode){
        $this->statusCode = $statusCode;
        return $this;
    }

    public function response(){
        if($this->data === null){
            return response()->noContent();
        }
        switch($this->responseType){
            case 'json':
            default:
                return response()->json($this->data, $this->statusCode);
        }
    }
}