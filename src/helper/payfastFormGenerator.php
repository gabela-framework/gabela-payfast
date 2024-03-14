<?php 

use PayFast\Exceptions\InvalidRequestException;

/**
 * Generate PayFast payment form HTML.
 *
 * @param array $paymentData Payment data including merchant details and order information.
 * @param string $actionUrl PayFast action URL for form submission.
 * @return string HTML code for the payment form.
 */
function generatePayFastPaymentForm(array $paymentData, string $actionUrl): string {

    if (!isset($paymentData['amount'])) {
        throw new InvalidRequestException('Required "amount" parameter missing', 400);
    }

    $paymentData['amount'] = number_format(sprintf('%.2f', $paymentData['amount']), 2, '.', '');

    $htmlForm = '<form action="' . htmlspecialchars($actionUrl) . '" method="post">';

    foreach ($paymentData as $name => $value) {
        $htmlForm .= '<input name="' . htmlspecialchars($name) . '" type="hidden" value="' . htmlspecialchars($value) . '" />';
    }

    $htmlForm .= '<input type="submit" value="Pay Now" class="btn btn-primary"/></form>';

    return $htmlForm;
}

/**
* Generate PayFast signature.
*
* @param array $paymentData Payment data including merchant details and order information.
* @param string $passPhrase PayFast passphrase for encryption.
* @return string Signature for the payment data.
*/
function generatePayFastSignature(array $paymentData, string $passPhrase): string {
   // Sort the payment data array by key
//    ksort($paymentData);

   // Concatenate key-value pairs
   $signatureString = '';
   foreach ($paymentData as $key => $value) {
       if ($key !== 'signature') {
           $signatureString .= $key . '=' . urlencode($value) . '&';
       }
   }

   // Append passphrase to the signature string
   $signatureString .= 'passphrase=' . urlencode($passPhrase);

   // Generate MD5 hash of the signature string
   return md5($signatureString);
}