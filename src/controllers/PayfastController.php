<?php

namespace Gabela\Payfast\Controller;

use Gabela\Core\AbstractController;
use Gabela\Core\Controller;

class PayfastController extends AbstractController
{
    public function notify()
    {
        printValue('This is a Notify');
    }

    public function success()
    {
        $this->getTemplate('gabela/payfast/views/success.view.php');
    }

    public function cancel()
    {
        $this->getTemplate('gabela/payfast/views/cancel.view.php');
    }

    public function paymentForm()
    {
       $this->getTemplate('gabela/payfast/views/form.view.php');
    }
}
