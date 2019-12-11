<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testChecklist()
    {

        echo "test create a checklist\n";
        
        $data = ['data' => ['attributes'=>["object_domain" => "contact2", "object_id" => 2, "due" => "2019-01-25T07:50:14+00:00", "urgency" => 1, "description" => "Need to verify this girl house.", "task_id"=> "124"]]];
        $response = $this->call('POST', '/checklists', $data);
        $response = $response->original;
        $resultid = $response->id;
        $this->assertEquals(
            $resultid, !null
        );

        echo "test get created checklist\n";
        $response = $this->call('GET', "/checklists/".$resultid);
        $this->assertEquals(
            $response->original["id"], !null
        );

        echo "test update checklist\n";
        // // update the checklist
        $data = ['data' => ['attributes'=>["object_domain" => "updateDomain", "object_id" => 9, "due" => "2020-01-25T07:50:14+00:00", "urgency" => 9, "description" => "Update Desc"]]];
        $this->call('PATCH', "/checklists/".$resultid,$data);

        // // make sure the data equals updated value
        $response = $this->call('GET', "/checklists/".$resultid);
        $check = $response->original;
        $this->assertEquals(
            ($check["id"]==$resultid&&$check["object_domain"]=="updateDomain"&&$check["object_id"]==9&&$check["due"]=="2020-01-25T07:50:14+00:00"&&$check["urgency"]==9&&$check["description"]=="Update Desc"), true
        );

        echo "test delete checklist\n";
        // delete checklist
        $this->call('DELETE', "/checklists/".$resultid);
        // make sure the data is deleted
        $response = $this->call('GET', "/checklists/".$resultid);
        $this->assertEquals(
            $response->original["status"], 404
        );
    }
}
