<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Challenge extends Controller
{
    //

    public function displayContacts(Request $request)
    {
        $api_key = 'bfb46188a9baefcc262ff174c8c6357d40a1b139ecc8609f34cac61ba4a62696be42a4ca';
        $url = 'https://productonboardingcustomerjourneys.api-us1.com/api/3/contacts?api_key=' . $api_key . '&api_output=json';

        $request = curl_init($url);
        $response = '';

        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

        $response = (string)curl_exec($request);

        $result = json_decode($response, true);

        return view('contacts', [ 'contacts' => $result['contacts'] ]);
    }
}
