$(document).ready(function() {
    // Listen for input changes on the VAT number field
    $('#vat_number').on('input', function() {
        var vatNumber = $(this).val().trim(); // Get the value and remove extra spaces
        $('#vat_result').text('').css('color', ''); // Clear previous results
        
        // If the input is empty, reset the border and exit
        if (vatNumber.length === 0) {
            $(this).css('border', '');
            return; 
        }

        // Show a validating message while waiting for the server response
        $('#vat_result').text('Validating...').css('color', 'blue');

        // Perform AJAX request to the PHP VAT checker
        $.ajax({
            url: 'check_vat.php', // The PHP file that handles the VAT validation
            type: 'POST',
            data: { vat_number: vatNumber },
            success: function(response) {
                // If the VAT is valid
                if (response.valid) {
                    $('#vat_number').css('border', '2px solid green'); // Green border for valid
                    // Show company name and address returned from the server
                    $('#vat_result').text(
                        'VAT valid: COMPANY NAME: ' + response.name + 
                        ' COMPANY ADDRESS: ' + response.address
                    ).css('color', 'green');
                } else {
                    // If invalid, show red border and message
                    $('#vat_number').css('border', '2px solid red');
                    var msg = response.error ? 'Error: ' + response.error : 'VAT invalid';
                    $('#vat_result').text(msg).css('color', 'red');
                }
            },
            error: function() {
                // Handle AJAX request errors
                $('#vat_number').css('border', '2px solid red');
                $('#vat_result').text('AJAX error').css('color', 'red');
            }
        });
    });
});
