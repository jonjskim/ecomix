<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;
 
class StripePayment extends CI_Controller {
 
	public function __construct() {
 
		parent::__construct();
		$this->load->model("Book");
 
	}
 
	public function index() {
		$user_id = $this->session->userdata['currentUser']['id'];
		$carts = $this->Book->getCart($user_id);
		$total = 0;
		foreach ($carts as $cart) {
			$total = $total + $cart['price'] * 100;
			$this->Book->addBookToPaids($user_id,$cart['book_id']);
		}
		try {	
			require_once('vendor/autoload.php');
			require_once(APPPATH.'libraries/Stripe/lib/Stripe.php');//or you
			Stripe::setApiKey("sk_test_JuiwFSIiHdGDHFipZIo1crs8"); //Replace with your Secret Key
 
			$charge = Charge::create(array(
				"amount" => $total,
				"currency" => "usd",
				"card" => $_POST['stripeToken'],
				"description" => "Demo Transaction"
			));
			$carts = $this->Book->getCart($user_id);
			$this->Book->paymentComplete($user_id);
			$this->load->view('Success', array('carts' => $carts));	
		}
 
		catch(Stripe_CardError $e) {
 
		}
		catch (Stripe_InvalidRequestError $e) {
 
		} catch (Stripe_AuthenticationError $e) {
		} catch (Stripe_ApiConnectionError $e) {
		} catch (Stripe_Error $e) {
		} catch (Exception $e) {
		}
	}
 
}