<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class TableauController extends Controller
{
    // Step 1: Generate JWT Token
    public function generateJWT()
    {
        // Set the current time in UTC
        $now = new DateTime('now', new DateTimeZone('UTC'));
        // Set the JWT payload
        $payload = [
            'iss' => env('TABLEAU_CLIENT_ID'),  // Client ID from Tableau Connected App
            'sub' => env('TABLEAU_USER'),        // Replace with actual Tableau username or email
            'aud' => 'tableau',                 // Audience, always "tableau"
            'exp' => $now->getTimestamp() + (60 * 5),        // Token expiration time (10 minutes)
            'jti' => uniqid(),               // Unique token identifier
            'scp' => ["tableau:views:embed", "tableau:views:embed_authoring", "tableau:insights:embed"],
        ];
        $headers = [
            'kid' => env('TABLEAU_SECRET_ID'),
            "iss" => env('TABLEAU_CLIENT_ID')
        ];

        // Sign the JWT with the Client Secret (private key)
        $clientSecret = env('TABLEAU_CLIENT_SECRET');
        $jwt = JWT::encode($payload, $clientSecret, 'HS256',null,$headers);

        // Return the JWT token in JSON format
        return response()->json(['jwt' => $jwt]);
    }

    // Step 2: Show the Tableau Dashboard
    public function showDashboard()
    {
        // Get the JWT token by calling the generateJWT method
        $jwtResponse = $this->generateJWT();
        $jwtToken = json_decode($jwtResponse->content())->jwt;

        // Return the view and pass the JWT token to the Blade template
        return view('dashboard.tableau', ['jwtToken' => $jwtToken]);
    }
}
