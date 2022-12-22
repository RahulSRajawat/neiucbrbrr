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
    $data = file_get_contents('php://input');
    $decode_data = json_decode($data);
    Callbackdata::create([
      "callback_status" => "Testing",
      "callback_data" => $data,
      "callback_event" => "event",
    ]);
    return  json_encode(
      array(
        "status" => 200,
        "message" => "Transaction completed successfully"
      )
    );
    // return redirect()->route("home");
    // switch ($decode_data->event) {
    //     case 'RECHARGE_SUCCESS':
    //         $param = $decode_data->param;
    //         $operator = $param->operator;
    //         $canumber = $decode_data->canumber;
    //         $amount = $decode_data->amount;
    //         $ackno = $decode_data->ackno;
    //         $referenceid = $decode_data->referenceid;
    //         $status = $decode_data->status;
    //         $operatorid = $decode_data->operatorid;
    //         $message = $decode_data->message;
    //         echo json_encode(
    //             array(
    //                 "status" => $status,
    //                 "message" => $message
    //             )
    //         );
    //         $db->query('update set column status 1')->where();
    //         break;
    //     case 'RECHARGE_FAILURE':
    //         # code...
    //         break;
    //     case 'MERCHANT_ONBOARDING':
    //         echo json_encode(
    //             array(
    //                 "status" => 200,
    //                 "message" => "merchant onboarding success"
    //             )
    //         );
    //         break;
    //     case 'CMS_BALANCE_INQUIRY':
    //         echo json_encode(
    //             array(
    //                 "status" => 200,
    //                 "message" => "merchant onboarding success"
    //             )
    //         );
    //         break;
    //     default:
    //         echo json_encode(array(
    //             "status" => 404,
    //             "message" => "Not Found!"
    //         ));
    //         break;
    // }
  }
}
