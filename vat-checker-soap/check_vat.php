<?php
header('Content-Type: application/json'); // Set the response type to JSON

// Check if the VAT number was sent via POST
if (!isset($_POST['vat_number'])) {
    echo json_encode([
        'valid' => false, 
        'error' => 'No VAT number provided'
    ]);
    exit; // Stop execution if no VAT number
}

$vat_number = trim($_POST['vat_number']); // Remove any extra spaces

// Function to validate the VAT number using the EU VIES SOAP service
function validate_vat($vat_number) {
    $client = new SoapClient("http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl");

    try {
        // Call the VIES checkVat service
        $response = $client->checkVat([
            'countryCode' => substr($vat_number, 0, 2), // First two letters = country code
            'vatNumber' => substr($vat_number, 2)       // Remaining part = VAT number
        ]);

        // If VAT is valid, return details
        if ($response->valid) {
            return [
                'valid' => true,
                'companyName' => $response->name,
                'address' => $response->address,
            ];
        } else {
            // VAT is invalid
            return ['valid' => false];
        }
    } catch (SoapFault $e) {
        // Handle errors from the SOAP service
        return [
            'valid' => false, 
            'error' => $e->getMessage()
        ];
    }
}

// Call the validation function and return the result as JSON
$result = validate_vat($vat_number);
echo json_encode($result);
