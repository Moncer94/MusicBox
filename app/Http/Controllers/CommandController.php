<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commande;
use GuzzleHttp\Client;

class CommandController extends Controller
{
    public function getAdminIndex()
    {
        $commands=Commande::all();
        return view('commandes',['commands' => $commands]);
    }
    public function getCommandDelete($id)
    {
        $command = Commande::find($id);
       // $command->delete();
        $this->notifrefus();
        return redirect()->route('admin.commands')->with('info', 'Post deleted!');
    }
    public function getAdminEdit($id)
    {
        $command = Commande::find($id);
        $command->etat="accepter";
        $command->save();
        $this->notifaccept();


        return redirect()->route('admin.commands');
    }
    public function postAdminUpdate(Request $request)
    {

        $product = Product::find($request->input('id'));
        $product->name = $request->input('name');
        $product->type = $request->input('type');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        $product->save();
        return redirect()->route('admin.index.menu');
    }
    public  function  notifaccept()
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer 7E03B8350A5DC63CFC79ACF71530F93',
            'NETOAPI_ACTION' => 'yo'
        ];
        $yo = [
            'interests' => ["hello"],
            'fcm' => [
                'notification' => [
                    'title' => 'Command stats',
                    'body' =>'Your command is being treated',
                ],
            ],
        ];

        $client = new Client(); //GuzzleHttp\Client

        $response = $client->post('https://e33791f2-f74a-47c8-af13-5b92bdc264d3.pushnotifications.pusher.com/publish_api/v1/instances/e33791f2-f74a-47c8-af13-5b92bdc264d3/publishes',
            [
                'headers' => $headers,
                'json' => $yo
            ]);
        return $response;
    }
    public  function  notifrefus()
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer 7E03B8350A5DC63CFC79ACF71530F93',
            'NETOAPI_ACTION' => 'yo'
        ];
        $yo = [
            'interests' => ["hello"],
            'fcm' => [
                'notification' => [
                    'title' => 'Command stats',
                    'body' =>'Your command cannot be treated Would you please change it ',
                ],
            ],
        ];

        $client = new Client(); //GuzzleHttp\Client

        $response = $client->post('https://e33791f2-f74a-47c8-af13-5b92bdc264d3.pushnotifications.pusher.com/publish_api/v1/instances/e33791f2-f74a-47c8-af13-5b92bdc264d3/publishes',
            [
                'headers' => $headers,
                'json' => $yo
            ]);
        return $response;
    }

}
