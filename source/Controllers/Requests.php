<?php

namespace Source\Controllers;

use Source\Models\Request;

class Requests extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function status(?array $data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $request = new Request();

        $request->status = "Solicitado";
        $request->user_id = $data["user_id"];
        $request->training_sheet_id = $data["training_sheet_id"];

        $request->save();

        $this->message->success("Renovação solicitada!")->flash();
        echo json_encode(["reload" => true]);
        return;
    }
}