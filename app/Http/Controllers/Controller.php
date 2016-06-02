<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Asakusuma\SugarWrapper\Rest;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    function conn() {
        $suite = new \Asakusuma\SugarWrapper\Rest;

        $suite->seturl('http://suite.local/service/v4/Rest.php');
        $suite->setUsername('admin');
        $suite->setPassword('alexw');


        $suite->connect();
        $suite->loggedInUserInfo();

        dd($suite);

        $error = $suite->get_error();

    $session_id = session_id();


        $get_entry_parameters = array(
            //Flag the record as a recently viewed item
            'track_view' => true,
        );




        $results = $suite->get_entry($session_id , 'Accounts', '3D10d284f8-62af-d2a8-83ce-575009d73815',$get_entry_parameters);

        $suiteR = $suite->print_results($results);


       /* if($error !== FALSE) {
            return view('welcome', compact("error"));

        }*/

       return view('welcome', compact("suiteR"));

    }


}
