# VAT Checker SOAP

This project allows you to check European VAT numbers in real-time using the [EU VIES SOAP Service](http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl).  
It provides instant feedback on the validity of a VAT number and displays the associated company information if available.

## Features

- Real-time VAT validation using AJAX.
- Displays company name and address if the VAT number is valid.
- Dynamic feedback with color-coded input field:
  - **Blue** → validating
  - **Green** → valid VAT
  - **Red** → invalid VAT or error
- Lightweight, ready-to-use template for SOAP requests.
- Simple HTML/CSS/JS implementation.

## Files

- **index.html** → Simple HTML page with a VAT input field.
- **check_vat.php** → Server-side PHP script performing the SOAP request to the EU VIES service.
- **script.js** → Handles user input, sends AJAX requests, and updates the UI dynamically.
- **style.css** → Basic styling for the input field and validation messages.

## Usage

1. Place all files in a local web server folder (e.g., XAMPP, WAMP, or similar) with PHP and SOAP extension enabled.
2. Open `index.html` in a browser.
3. Enter a European VAT number in the input field.
4. The page will instantly show if the VAT is valid and display company information if available.

## Notes

- No database or backend setup is required; validation happens directly via the EU VIES service.
- Can be easily integrated into any website or project as a ready-to-use template.
- Ideal for designers or developers who want a simple VAT validation feature without coding the backend from scratch.
