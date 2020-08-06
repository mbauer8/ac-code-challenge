<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Challenge extends Controller
{
    //

    public function displayContacts(Request $request)
    {
        //dd("Makes it here....");

        //$url = 'https://www.activecampaign.com/api.php?api_key=' . $this->ac_reseller_key . '&api_action=account_list&api_output=json&page=' . $page;

        $api_key = 'bfb46188a9baefcc262ff174c8c6357d40a1b139ecc8609f34cac61ba4a62696be42a4ca';
        $url = 'https://productonboardingcustomerjourneys.api-us1.com/api/3/contacts?api_key=' . $api_key . '&api_output=json';

        $request = curl_init($url);
        $response = '';
        $retry = 0;

        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

        $response = (string)curl_exec($request);

//        while (!$this->isJson($response) and $retry < 5) {
//            $response = (string)curl_exec($request);
//            $retry++;
//        }

        $result = json_decode($response, true);

//        foreach($result['contacts'] as $key => $item) {
//            echo "<br>key: " . $key . "|" . $item['email'];
//        }

//        $contacts = [];
//
//        foreach($result['contacts'] as $contact) {
//            $contacts[] = $contact;
//        }

        //dd($contacts);
        //dd($result['contacts']);


        return view('contacts', [ 'contacts' => $result['contacts'] ]);

    }
}
