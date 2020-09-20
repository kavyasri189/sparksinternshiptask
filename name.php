<?php
$name=$_POST['name'];
$purpose=$_POST['purpose'];
$email=$_POST['email'];
$amount=$_POST['amount'];

include 'instamojo/Instamojo.php';


$api=new Instamojo\Instamojo('test_69ec37f9d10a5735bd1ab195a04','test_21ec4278759b8ab8d0945979c9f', 'https://test.instamojo.com/api/1.1/');
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $amount,
        "send_email" => true,
        "email" => $email,
        "buyer_name"=> $name,
        "phone"=> $phone,
        "send_sms"=> false,
        "allow_repeated_payments"=> false,
        "redirect_url" => "http://savelives1.epizy.com/codes/"
        //"webhook"=> 
        ));
   // print_r($response);
   $pay_url=$response['longurl'];
   header("location:$pay_url");
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}




?>
