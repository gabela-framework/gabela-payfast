<?php

namespace Gabela\Payfast\Controller;

use Gabela\Core\AbstractController;

class PayfastController extends AbstractController
{
 public function notify()
 {
  printValue('This is a Notify');
 }

 public function success()
 {
  $this->getTemplate(PAYFAST_SUCCESSPAGE);
 }

 public function cancel()
 {
  $this->getTemplate(PAYFAST_CANCELPAGE);
 }

 public function paymentForm()
 {
  $this->getTemplate(PAYFAST_FORMPAGE);
 }
}
