<?php

include '../vendor/autoload.php';
use \Firebase\JWT\JWT;

class AuthJWT {
    private $key;

    public function __construct($key) {
        $this->key = $key;
    }

    public function gerarToken($user_id, $email, $expirationTime = 3600) {
        $payload = [
            "user_id" => $user_id,
            "email" => $email,
            "exp" => time() + $expirationTime
        ];

        $token = JWT::encode($payload, $this->key, 'HS256');
        return $token;
    }

    public function verificarToken($token) {
        $tokenParts = explode('.', $token);
    
        if (count($tokenParts) === 3) {
            $payload = json_decode(base64_decode($tokenParts[1]), true);
            return $payload;
        } else {
            return null; // Token é inválido
        }
    }
    }

$key = "minha_chave";
$user_id = "meu_id";
$email = "meu@mail.com";
$expirationTime = 3600;
$auth = new AuthJWT($key);
$token = $auth->gerarToken($user_id, $email);
// echo $token;
