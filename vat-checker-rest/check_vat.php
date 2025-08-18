<?php
header('Content-Type: application/json'); // Set response type to JSON

// Check if VAT number was provided via POST
if (!isset($_POST['vat_number'])) {
    echo json_encode([
        'valid' => false,
        'error' => 'No VAT number provided'
    ]);
    exit; // Stop execution if no VAT number
}

// Trim any extra spaces and split the VAT number into country code and number
$vat_number = trim($_POST['vat_number']);
$countryCode = substr($vat_number, 0, 2); // First two characters = country code
$vatNumberOnly = substr($vat_number, 2); // Remaining characters = VAT number

// Prepare payload for REST request
$data = [
    'countryCode' => $countryCode,
    'vatNumber' => $vatNumberOnly
];

// REST endpoint for VAT validation
$url = "https://ec.europa.eu/taxation_customs/vies/rest-api/check-vat-number";

// Initialize cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as string
curl_setopt($ch, CURLOPT_POST, true); // Use POST request
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']); // JSON headers
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Send JSON payload

// Execute request and get HTTP status code
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Check if request was successful
if ($http_code === 200) {
    // The REST service already returns JSON, so just forward it
    echo $response;
} else {
    // Return error information if REST service failed
    echo json_encode([
        'valid' => false,
        'error' => "REST service returned HTTP code $http_code"
    ]);
}
