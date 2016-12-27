<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 24/12/2016
 * Time: 3:06 PM
 */

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Oveland\Placetopay\PlaceToPay;
use Oveland\Placetopay\Transaction\PSETransactionRequest;
use Oveland\Placetopay\Transaction\PSETransactionResponse;

/**
 * Class MainController
 * @package app\Http\Controllers
 */
class MainController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payment()
    {
        $placetopay = new PlaceToPay();
        return view('payment')->with('banks', $placetopay->getBankList());
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function pay(Request $request)
    {
        $reference = 'oveland-' . rand(99, 99999999);
        $params = $request->all();

        $params['bank']['returnURL'] = 'http://localhost:8000/transaction/' . $reference;
        $params['bank']['reference'] = $reference;
        $params['bank']['description'] = 'Pago Básico Oveland';
        $params['bank']['language'] = 'ES';
        $params['bank']['currency'] = 'USD';
        $params['bank']['taxAmount'] = $params['bank']['totalAmount'] * 0.19;
        $params['bank']['devolutionBase'] = 0;
        $params['bank']['tipAmount'] = 0;

        $placetopay = new PlaceToPay();

        $transaction = $placetopay->createTransaction($params);

        if ($transaction->getReturnCode() == 'SUCCESS') {

            $this->setTransactionSession( $reference, $transaction );

            return redirect(url($transaction->getBankURL()));
        }
        $errors = $transaction->getResponseReasonText();

        return view('errors.error')->with('error', $errors);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function transactionList(Request $request)
    {
        //$value = $request->session()->pull('transactions', 'default');
        $transactions = $this->getTransactionSessionList();

        return view('transactions')->with(['transactions'=>$transactions, 'request' => $request]);
    }

    /**
     * @param $reference
     * @return $this
     */
    public function transactionInformation($reference)
    {
        $transaction = $this->getTransactionSession($reference);

        if (!$transaction->getTransactionID()) {
            return view('errors.error')->with('error', 'There is no transaction in the session for the reference number');
        }

        $placetopay = new PlaceToPay();

        $transactionStatus = $placetopay->getTransactionInformation($transaction->getTransactionID());

        return view('transaction')->with('transactionStatus',$transactionStatus);
    }

    /**
     * @param $reference
     * @param PSETransactionResponse $pseTransactionResponse
     */
    public function setTransactionSession($reference, PSETransactionResponse $pseTransactionResponse)
    {
        $transactions = session('transactions');
        $transactions[$reference] = $pseTransactionResponse->getData();

        session(['transactions' => $transactions]);
    }

    /**
     * @return array|null
     */
    public function getTransactionSessionList()
    {
        $sessionTransaction = session('transactions');

        $transactions = [];

        if( $sessionTransaction ){
            foreach ( $sessionTransaction as $reference => $transaction ){
                $transactions[$reference] = new PSETransactionResponse($transaction);
            }
            return $transactions;
        }

        return null;
    }

    /**
     * @param null $reference
     * @return array|PSETransactionResponse
     */
    public function getTransactionSession($reference = null)
    {
        $sessionTransaction = session('transactions');

        return new PSETransactionResponse(isset($sessionTransaction[$reference]) ? $sessionTransaction[$reference] : null);
    }
}