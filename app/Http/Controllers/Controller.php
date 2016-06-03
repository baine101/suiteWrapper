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


        dd($suite->connect());

        $sessionId = $suite->sessionId();

       $modules = $suite->get_available_modules();

        $fields = array(
                'Accounts' => array(
                            'name',
                            'email1',
                            'website'
                )
        );

        $options = array(
           // 'track_view' => true
        );


        $i = '10d284f8-62af-d2a8-83ce-575009d73815';


        $oauth = $suite->oauth_access($sessionId);

        dd($oauth);

              $getEntryResult = $suite->get_entry($i,'Accounts',$fields,$options);
        dd($getEntryResult);

       return view('welcome', compact("modules", "sessionId"));

    }


}
