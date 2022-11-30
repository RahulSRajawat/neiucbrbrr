<?php
namespace App\Http\Controllers;
use App\Models\JWT;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleClient;
class ApiController extends Controller
{
    // API POST FUNCTION
    public function post($service, array $body = [])
    {
        $payload = array("timestamp" => strtotime(date("Y-m-d H:i:s")), "partnerId" => env("PAY_SPRINT_PARTNERID"), "reqid" => rand(9999999999, 1000000000), "iss" => "pay-sprint.readme.io");
        $key = env("PAY_SPRINT_JWT_TOKEN");
        $ingnature = JWT::encode($payload, $key);
        $authrisedkey = env("PAY_SPRINT_AUTHORISED_KEY");
        
        $client = new \GuzzleHttp\Client();
        if (!empty($body)) {
            $response = $client->request('POST', env('PAY_SPRINT_API_URL') . $service, [
                'body'=>json_encode($body),
                'headers' => [
                    'Authorisedkey' => "$authrisedkey",
                    'Content-Type' => 'application/json',
                    'accept' => 'application/json',
                    'Token' => "$ingnature",
                ],
            ]);
            return $response->getBody();
        } else {
            $response = $client->request('POST', env('PAY_SPRINT_API_URL') . $service, [
                'headers' => [
                    'Authorisedkey' => "$authrisedkey",
                    'Content-Type' => 'application/json',
                    'accept' => 'application/json',
                    'Token' => "$ingnature",
                ],
            ]);
            return $response->getBody();
        }
    }
    // API GET FUNCTION
    public function get()
    {
    }
}
