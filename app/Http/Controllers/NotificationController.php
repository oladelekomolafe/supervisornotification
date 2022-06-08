<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // From URL to get webpage contents
        $url = "https://o3m5qixdng.execute-api.us-east-1.amazonaws.com/api/managers";
         
        // Initialize a CURL session.
        $ch = curl_init();
         
        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         
        // Grab URL and pass it to the variable
        curl_setopt($ch, CURLOPT_URL, $url);
         
        $result = curl_exec($ch);

        $resultJsonFormat = json_decode($result);

        //here we are coverting to a collection

        $jsonToCollection = collect($resultJsonFormat);

        $sortedJurisdictionCollection = $jsonToCollection->sortBy('jurisdiction');
        $sortedLastnameCollection = $sortedJurisdictionCollection->sortBy('lastName');
        $sortedFirstnameCollection = $sortedLastnameCollection->sortBy('firstName');

        //here we want to remove all the Jurisdiction with digit
        foreach ($sortedFirstnameCollection as $key => $value) {

            if(is_numeric($sortedFirstnameCollection[$key]->jurisdiction )){
                $sortedFirstnameCollection->forget($key);
            }
        }
 
        return ($sortedFirstnameCollection->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        if(!isset($request->firstName) || trim($request->firstName) == null){
            return ['error'=> 'Unable to submit data invalid first Name'];
        }elseif(!isset($request->lastName) || trim($request->lastName) == null){
            return ['error'=> 'Unable to submit data invalid last Name'];
        }elseif(!isset($request->supervisor) || trim($request->supervisor) == null){
            return ['error'=> 'Unable to submit data invalid supervisor'];
        }


        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
