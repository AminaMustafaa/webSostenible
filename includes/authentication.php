<?php
function validarToken(){
    // isset() alone isn't enough in PHP 8 — also check it's a non-empty string
    $token = $_COOKIE['token'] ?? null;
    if (!$token || !is_string($token)) return false;
 
    // Split into 3 parts: header.payload.signature
    $parts = explode('.', $token);
    if (count($parts) !== 3) return false;

    list($header64, $payload64, $signarture64) = $parts;

    //recreate the signature using same secret and compare
    $secret = "pinkySecret";
    $expectedSignarture = base64_encode(hash_hmac("sha256", "$header64.$payload64", $secret, true));

    if($signarture64 !== $expectedSignarture) return false;

    //decode the payload, and cehcking if the token is expired or not
    $payload64 = json_decode(base64_decode($payload64), true);
    if(!$payload64 || time() > $payload64['exp']) {
        //delete the cookie if the token is expired
        setcookie('token', '', time() - 3600, '/');
        return false;
    }

    //returns payload(id,name,expiration)
    return $payload64;

}

function requireLogin() {
    $user = validarToken();
    if (!$user) {
        header("Location: /views/users/login.php");
        exit;
    }
    return $user;
}

function isAdmin() {
    $user = validarToken();
    return $user && $user['role'] === 'admin';
}
?>