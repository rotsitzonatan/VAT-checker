# VAT Checker

This project allows you to check European VAT numbers in real-time. It includes **two implementations**:

1. **SOAP version** using the [EU VIES SOAP Service](http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl)  
2. **REST version** using the [EU VIES REST API](https://ec.europa.eu/taxation_customs/vies/rest-api/check-vat-number)  

Each version provides instant feedback on the validity of a VAT number and displays the associated company information if available.

---

## Folder Structure

- **vat-checker-soap/** → SOAP version of the VAT checker
- **vat-checker-rest/** → REST version of the VAT checker

Each folder contains:

- `index.html` → Simple HTML page with a VAT input field  
- `check_vat.php` → Server-side PHP script performing the VAT validation  
- `script.js` → Handles user input, sends AJAX requests, and updates the UI dynamically  
- `style.css` → Basic styling for the input field and validation messages  
- `.gitignore` → To ignore temporary and IDE files  
- `LICENSE` → MIT License  
- `README.md` → Folder-specific README (optional)

---

## Features

- Real-time VAT validation using AJAX
- Displays company name and address if the VAT number is valid
- Dynamic feedback with color-coded input field:
  - **Blue** → validating
  - **Green** → valid VAT
  - **Red** → invalid VAT or error
- Lightweight, ready-to-use templates for SOAP and REST requests
- Simple HTML/CSS/JS implementation
- No database required; all validation is done via EU VIES

---

## Usage

1. Place the project folder in a local web server folder (e.g., XAMPP, WAMP, MAMP) with PHP enabled.
2. Open `index.html` in either `vat-checker-soap/` or `vat-checker-rest/` in a browser.
3. Enter a European VAT number in the input field.
4. The page will instantly show if the VAT is valid and display company information if available.

---

## Notes

- Both implementations are ready to use and can be integrated into any website.
- Choose SOAP or REST depending on your backend preferences.
- REST version returns JSON responses suitable for modern JavaScript applications.
