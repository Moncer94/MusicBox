<?php

namespace App\Http\Controllers;

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
        //
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
    public function store(Request $request)
    {
        $request->setUrl('https://e33791f2-f74a-47c8-af13-5b92bdc264d3.pushnotifications.pusher.com/publish_api/v1/instances/e33791f2-f74a-47c8-af13-5b92bdc264d3/publishes');
        $request->setMethod(HTTP_METH_POST);

        $request->setHeaders(array(
            'postman-token' => '5fa2f8a2-00ba-45e4-85e0-e8405a20fdd8',
            'cache-control' => 'no-cache',
            'authorization' => 'Bearer 7E03B8350A5DC63CFC79ACF71530F93',
            'content-type' => 'application/json'
        ));

        $request->setBody('{"interests":["hello"],"fcm":{"notification":{"title":"Command stats","body":"Your commandddd was approved!"}}}');
        $response = $request->send();

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
