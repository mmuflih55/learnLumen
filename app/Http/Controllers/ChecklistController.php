<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Checklist;
class ChecklistController extends Controller
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
    
    public function getChecklist(Request $req){
        $clid = $req->checklistId;
        if(empty($clid)||!is_numeric($clid)){
            $resp["status"] = 500;
            $resp["error"] = "Server Error";
            return (new Response($resp))->header('Content-Type','application/json');
        }
        $cl = Checklist::find($clid);
        if($cl!==null){
            $cl->first();
            return (new Response($cl,201))->header('Content-Type','application/json');
        }else{
            $resp["status"] = "404";
            $resp["error"] = "Not Found";
            return (new Response($resp,201))->header('Content-Type','application/json');
        }
    }

    public function getChecklists(Request $req){
        $clid = $req->checklistId; 
        $cl = Checklist::all();
        if(isset($req->sort)){
            $cl = $cl->orderByDesc();
        }
        
        if(isset($req->page_offset)){
            $cl = $cl->skip($req->page_offset);
        }

        if(isset($req->page_limit)){
            $cl = $cl->take($req->page_limit);
        }
        
        return (new Response($cl,201))->header('Content-Type','application/json');
    }

    public function updateChecklist(Request $req){
        $clid = $req->checklistId;
        if(empty($clid)||!is_numeric($clid)){
            $resp["status"] = 500;
            $resp["error"] = "Server Error";
            return (new Response($resp))->header('Content-Type','application/json');
        }
        $cl = Checklist::find($clid);
        if($cl!==null){
            $cl->first();
            $data = $req->data["attributes"];
            foreach($data as $key => $dt){
                if(!empty($dt)){
                    if($key!="created_at"){
                        $cl[$key] = $dt;
                    }
                }
            }
            $cl->save();
            return (new Response($cl,201))->header('Content-Type','application/json');
        }else{
            $resp["status"] = "404";
            $resp["error"] = "Not Found";
            return (new Response($resp,201))->header('Content-Type','application/json');
        }
    }

    public function deleteChecklist(Request $req){
        $clid = $req->checklistId;
        if(empty($clid)||!is_numeric($clid)){
            $resp["status"] = 500;
            $resp["error"] = "Server Error";
            return (new Response($resp))->header('Content-Type','application/json');
        }
        $cl = Checklist::find($clid);
        if($cl!==null){
            $cl->first();
            $cl->delete();
            return (new Response(204))->header('Content-Type','application/json');
        }else{
            $resp["status"] = "404";
            $resp["error"] = "Not Found";
            return (new Response($resp,201))->header('Content-Type','application/json');
        }
    }
    
    public function createChecklist(Request $req){
        $cl = new Checklist;
        $data = $req->data["attributes"];
        if(!isset($data["object_domain"])||!isset($data["object_id"])||!isset($data["description"])){
            $resp["status"] = 500;
            $resp["error"] = "Missing Mandatory Fields";
            return (new Response($resp,201))->header('Content-Type','application/json');
        }
        $cl->object_domain = $data["object_domain"];
        $cl->object_id = $data["object_id"];
        $cl->description = $data["description"]; 
        if(isset($data["due"]))$cl->due = $data["due"];
        if(isset($data["urgency"]))$cl->urgency=$data["urgency"];
        $rid = $cl->save();
        $resp["data"] = $req->all();
        $resp["rid"] = $rid;
        return (new Response($cl,201))->header('Content-Type','application/json');
    }
}
