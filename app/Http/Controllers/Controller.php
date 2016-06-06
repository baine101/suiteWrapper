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



        $suite = new  Rest();

        $suite->seturl('http://suite.local/service/v3_1/Rest.php');
        $suite->setUsername('admin');
        $suite->setPassword('alexw');



        $suite->connect();

        dd($suite->oauth_access());

        //debug connection response
         dd($suite->setUrl() , $suite->setUsername(),$suite->setPassword());

        $Dom = 'http://suite.local';
        $url = 'http://suite.local/service/v3_1/Rest.php';



        $provider = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId' => 'a1b2c3', //client id
            'clientSecret' => 'blink182',
            'redirectUri' => $Dom,
            'urlAuthorize' => $url.'?module=OAuthTokens&action=authorize&token=a1b2c3',
            'urlAccessToken' => $url.'?token',
            'urlResourceOwnerDetails' => $url.'?resource'
        ]);


        $authURL = $provider->getAuthorizationUrl();




        // Get the state generated for you and store it to the session.
        $state = $_SESSION['oauth2state'] = $provider->getState();

        dd($authURL, $state);


        header('Location: ' . $authURL);




      //  $sessionId = $suite->sessionId();

       $modules = $suite->get_available_modules();

        //dd($modules);


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


        $i = '1a3e9c24-63b4-7573-cd66-575585d8883a';


      // $oauth = $suite->oauth_access();

        //dd($oauth);


              $getEntryResult = $suite->get_entry($i,'Accounts',$fields,$options);
        dd($getEntryResult);

       return view('welcome', compact("modules", "sessionId"));

    }


}
