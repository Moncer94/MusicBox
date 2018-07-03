<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commande;
use Illuminate\Support\Facades\DB;
class ChartController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->count();
        $treated=0 ;
        $inProgress=0 ;
        $refused=0 ;
        $commands=Commande::all();
        foreach ($commands as $command)
            if($command->etat =='en attente'){
            $inProgress ++ ;
            }
            else if($command->etat =='accepter'){
            $treated ++ ;
        }
        else $refused++ ;


        return view('charts',['inProgress' => $inProgress,'treated' => $treated,'refused' => $refused,'users' => $users]);
    }
}
