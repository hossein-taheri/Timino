<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

JWT::$leeway = 60 * 60 * 24 * 30 * 50;

class JWTHelper {
    public static function encodeAccessToken($id): array
    {
        $iat = time();
        $nbf = $iat + ( 5 * 60 );

        $key = $GLOBALS['config']['keys']['JWT'];

        $payload = array(
            'user_id' => $id,
            'type' => 'AccessToken',
            'iat' => $iat,
            'nbf' => $nbf
        );

        $jwt = JWT::encode($payload, $key, 'HS256');

        return [
            'Token' => $jwt,
            'ExpiresAt' => $nbf
        ];
    }

    public static function encodeRefreshToken($id): array
    {
        $iat = time();
        $nbf = $iat + ( 6 * 30 * 24 * 60 * 60 );

        $key = $GLOBALS['config']['keys']['JWT'];

        $payload = array(
            'user_id' => $id,
            'type' => 'RefreshToken',
            'iat' => $iat,
            'nbf' => $nbf
        );

        $jwt = JWT::encode($payload, $key, 'HS256');

        return [
            'Token' => $jwt,
            'ExpiresAt' => $nbf
        ];
    }

    public static function decodeAccessToken($token) {
        $key = $GLOBALS['config']['keys']['JWT'];

        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        if ( $decoded->type != 'AccessToken' ){
            throw new ForbiddenException("Token is not an access token");
        }

        if ($decoded->nbf < time()) {
            throw new ForbiddenException("Token has been expired");
        }

        return [
            'user_id' => $decoded->user_id
        ];
    }

    public static function decodeRefreshToken($token) {
        $key = $GLOBALS['config']['keys']['JWT'];

        $decoded = JWT::decode($token, new Key($key, 'HS256'));

        if ( $decoded->type != 'RefreshToken' ){
            throw new ForbiddenException("Token is not an access token");
        }

        if ($decoded->nbf < time()) {
            throw new ForbiddenException("Token has been expired");
        }

        return [
            'user_id' => $decoded->user_id
        ];
    }

}
