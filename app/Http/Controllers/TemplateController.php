<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TemplateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getTemplates(Request $req){
        $resp["msg"] = "Tes Hello ".$req->msg;
        return $resp;
        // return (new Response($resp,200))->header('Content-Type','application/json');
    }

    public function createTemplate(Request $req){
        // example req
        // "data": {
        //     "attributes": {
        //       "object_domain": "contact",
        //       "object_id": "1",
        //       "due": "2019-01-25T07:50:14+00:00",
        //       "urgency": 1,
        //       "description": "Need to verify this guy house.",
        //       "items": [
        //         "Visit his house",
        //         "Capture a photo",
        //         "Meet him on the house"
        //       ],
        //       "task_id": "123"
        //     }
        //   }
        // }
        return $req->all();
    }
    //
}
