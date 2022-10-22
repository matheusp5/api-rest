<?php

require __DIR__ . '/Response.php';

class Rest
{
    /**
     * @var array|array[]
     * Dados vindos do banco de dados...
     * Para nao se estender muito
     */
    public static array $data = [
        1 => [
            "ID" => 1,
            "Username" => "Mxtheuz",
            "Name" => "Matheus"
        ],
        2 => [
            "ID" => 2,
            "Username" => "Mary",
            "Name" => "Maria"
        ]
    ];

    public static function renderRequest(int $id) {
        if(isset(Rest::$data[$id])) {
            $data = [
              "status" => 200,
              "content" => [
                "username" => Rest::$data[$id]["Username"],
                "name" => Rest::$data[$id]["Name"]
              ]
            ];
            $resp = new Response(200, json_encode($data), "text/json");
            $resp->addHeader('REQUEST_ID', $id);
            $resp->sendResponse();
        } else {
            $data = [
                "status" => 404,
                "content" => [
                    "Error: user id could not found ($id)"
                ]
            ];
            $resp = new Response(404, json_encode($data), "text/json");
            $resp->addHeader('REQUEST_ID', $id);
            $resp->addHeader('ERROR', 'User ID could not found in data');
            $resp->sendResponse();
        }
    }
}
