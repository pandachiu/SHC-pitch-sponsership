<?php

namespace App\Http\Controllers;

use App\Basket;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use PayPal\Api;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

/**
 * Class PaymentController
 * @package App\Http\Controllers
 */
class PaymentController extends Controller
{
    /**
     * @var ApiContext $apiContext
     */
    private $apiContext;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                'Aaa-zk75Ix75Zwe2G3jxqnZXln8XfFEJJT0pDxBRynS2W0wv0KGzAxXz80qVIda2eWskqZQo3PbIFnQc',     // ClientID
                'EMsBdpGJ3TdvlDT9oGdFd63q_n3S-PuJ1KDLoFqMwWjnrLB6juVVd928UqXWZIPlP3M_WsnBMptC73W2'      // ClientSecret
            )
        );
        $this->apiContext->setConfig(
            array(
                'mode' => 'live'
            )
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $payer = new Api\Payer();
        $payer->setPaymentMethod("paypal");

        $basket = Basket::where('user_id', Auth::user()->id)->first();

        $basketItems = [];
        $total = 0;

        foreach ($basket->basketitem as $basketItem) {
            $product_name = "Square (" . $basketItem->property->column . ", " .
                $basketItem->property->row . ")";

            $item = new Api\Item();
            $item->setName($product_name)
                ->setCurrency('GBP')
                ->setQuantity(1)
                ->setSku("SHCSponsor-" . $basketItem->property->id)
                ->setPrice($basketItem->property->price);

            $basketItems[] = $item;
            $total += $basketItem->property->price;
        }

        $itemList = new Api\ItemList();
        $itemList->setItems($basketItems);

        $details = new Api\Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($total);

        $amount = new Api\Amount();
        $amount->setCurrency("GBP")
            ->setTotal($total)
            ->setDetails($details);

        $transaction = new Api\Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Stafford Hockey Pitch Sponsorship")
            ->setInvoiceNumber(uniqid());

        $baseUrl = URL::to('/');
        $redirectUrls = new Api\RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/processPayment?success=true")
            ->setCancelUrl("$baseUrl/processPayment?success=false");

        $payment = new Api\Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $request = clone $payment;
        try {
            $payment->create($this->apiContext);
        } catch (Exception $ex) {
            echo $ex->getMessage();
//            ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
            exit(1);
        }

        $approvalUrl = $payment->getApprovalLink();

//        ResultPrinter::printResult("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);

        //dd($approvalUrl);

        return redirect($approvalUrl);
    }


    /**
     * @param Request $request
     * @return Api\Payment
     */
    public function processPayment(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payment = Api\Payment::get($paymentId, $this->apiContext);

        $execution = new Api\PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        $transaction = new Api\Transaction();
        $amount = new Api\Amount();
        $details = new Api\Details();

        $basket = Basket::where('user_id', Auth::user()->id)->first();
        $total = 0;
        $this->updateSquares($basket->basketitem);
        Basket::destroy($basket->id);

        foreach ($basket->basketitem as $basketItem) {
            $total += $basketItem->property->price;
        }

        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($total);

        $amount->setCurrency('GBP');
        $amount->setTotal($total);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);
        try {
            $payment->execute($execution, $this->apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo "<pre>";
            echo $ex->getCode(); // Prints the Error Code
            echo $ex->getData(); // Prints the detailed error message
            die($ex);
        }

        return redirect()->route('thankYou');
    }

    private function updateSquares(Collection $basketItems)
    {
        foreach ($basketItems as $basketItem) {
            $basketItem->property->is_available = 0;
            $basketItem->property->user_id = Auth::user()->id;
            $basketItem->property->save();
        }
    }
}
