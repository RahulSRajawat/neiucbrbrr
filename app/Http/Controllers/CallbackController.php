<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Models;

class CallbackController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('AdminModel', 'AepsModel', 'CommissionSlotModel', 'UserTypeModel', 'AadharPayModel'));
        $this->load->library(array('AEPS', 'PWAEPS'));
        $this->load->helper('url');
        $this->load->library('email');
        date_default_timezone_set("Asia/Kolkata");
        $this->load->database();
    }
    public function index()
    {
        dd("Test");
        $data = file_get_contents('php://input');
        $decode_data = json_decode($data);
        switch ($decode_data->event) {
            case 'RECHARGE_SUCCESS':
                $param = $decode_data->param;
                $operator = $param->operator;
                $canumber = $decode_data->canumber;
                $amount = $decode_data->amount;
                $ackno = $decode_data->ackno;
                $referenceid = $decode_data->referenceid;
                $status = $decode_data->status;
                $operatorid = $decode_data->operatorid;
                $message = $decode_data->message;
                echo json_encode(
                    array(
                        "status" => $status,
                        "message" => $message
                    )
                );
                $db->query('update set column status 1')->where();
                break;
            case 'RECHARGE_FAILURE':
                # code...
                break;
            case 'MERCHANT_ONBOARDING':
                echo json_encode(
                    array(
                        "status" => 200,
                        "message" => "merchant onboarding success"
                    )
                );
                break;
            case 'CMS_BALANCE_INQUIRY':
                echo json_encode(
                    array(
                        "status" => 200,
                        "message" => "merchant onboarding success"
                    )
                );
                break;
            default:
                echo json_encode(array(
                    "status" => 404,
                    "message" => "Not Found!"
                ));
                break;
        }
    }
}
