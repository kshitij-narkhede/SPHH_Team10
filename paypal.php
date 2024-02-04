<?php
// Import the necessary classes
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Urls;
use PayPal\Api\Transaction;
require_once('C:\xampp\htdocs\Shark\vendor\autoload.php');

function getBaseUrl()
{
    if (PHP_SAPI == 'cli') {
        $trace=debug_backtrace();
        $relativePath = substr(dirname($trace[0]['file']), strlen(dirname(dirname(__FILE__))));
        echo "Warning: This sample may require a server to handle return URL. Cannot execute in command line. Defaulting URL to http://localhost$relativePath \n";
        return "http://localhost" . $relativePath;
    }
    $protocol = 'http';
    if ($_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on')) {
        $protocol .= 's';
    }
    $host = $_SERVER['HTTP_HOST'];
    $request = $_SERVER['PHP_SELF'];
    return dirname($protocol . '://' . $host . $request);
}

// Set up the API context with your PayPal API credentials
$apiContext = new ApiContext(
    new OAuthTokenCredential(
        'AVVD6SI8BjvhU73lx-TRDNgf712vdTZF9Jy_jc3jnunx2zqLxczBMSEWvZb_S3z71kPkRBHiwDWronaZ',     // Client ID
        'EOtxGf8Z4nO_j7JrMNgotJ8weIRo3v0OvclCdlJg_6iifoQtGMINxQuI2riugVlTDyt0S2JSnyuqW96e'      // Secret
    )
);

// Set the configuration parameters for the API context
$apiContext->setConfig(
    array(
        'mode' => 'sandbox', // or 'live' if you are using the production environment
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => 'PayPal.log',
        'log.LogLevel' => 'FINE'
    )
);

$payer = new Payer();
$payer->setPaymentMethod("paypal");

$item1 = new Item();
$item1->setName('Item 1') // Item name
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setPrice(10); // Item price

$itemList = new ItemList();
$itemList->setItems([$item1]);

$details = new Details();
$details->setShipping(0)
    ->setTax(0)
    ->setSubtotal(10); // Total price of all items

$amount = new Amount();
$amount->setCurrency("USD")
    ->setTotal(10)
    ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment description")
    ->setInvoiceNumber(uniqid());

$baseUrl = getBaseUrl($apiContext); // Your website base URL
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl/execute-payment.php?success=true")
    ->setCancelUrl("$baseUrl/execute-payment.php?success=false");

$payment = new Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions([$transaction]);

$request = clone $payment;

try {
    $payment->create($apiContext); // Create the payment and get the approval URL
    $approvalUrl = $payment->getApprovalLink();
    header("Location: $approvalUrl");
    exit;
} catch (Exception $ex) {
    // Handle the exception
}

?>