<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 24/12/2016
 * Time: 3:06 PM
 */

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;


class MainController extends Controller
{
    public function index()
    {
        $banks = [];
        return view('welcome')->with(['banks'=>$banks]);
    }

    /**
     * @param $id
     */
    public function info($id){
        dd( WsManager::getTransactionInformation($id) );
    }
}