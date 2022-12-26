<?php
namespace App\Http\Controllers;
use App\Mail\CallBackMail;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Models;
use App\Models\Callbackdata;
use Illuminate\Support\Facades\Mail;
class CallbackController extends Controller
{
  public function index()
  {
    $reponse_array = array("status" => 200, "message" => "Transaction completed successfully");
    $data = file_get_contents('php://input');
    $decode_data = json_decode($data);
    // $param = $decode_data->param;
    // $operator = $param->operator;
    // $canumber = $decode_data->canumber;
    // $amount = $decode_data->amount;
    // $ackno = $decode_data->ackno;
    // $referenceid = $decode_data->referenceid;
    // $status = $decode_data->status;
    // $operatorid = $decode_data->operatorid;
    // $message = $decode_data->message;
    if (!empty($decode_data)) {
      Callbackdata::create([
        "callback_status" => $decode_data->status,
        "callback_data" => $data,
        "callback_event" => $decode_data->event,
      ]);
      switch ($decode_data->event) {
        case 'RECHARGE_SUCCESS':
          $reponse_array =  array("status" => 200, "message" => "Transaction completed successfully");
          break;
        case 'RECHARGE_FAILURE':
          $reponse_array =  array("status" => 400, "message" => "Transaction failed");
          break;
        default:
          $reponse_array =  array("status" => 200, "message" => "Transaction completed successfully");
          break;
      }
    }
    return  json_encode($reponse_array);
  }
}
