<?php
namespace App\Http\Controllers;
use App\Models\Loan;
use Illuminate\Http\Request;
class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("loan.index");
    }
    public function personal()
    {
        return view("loan.personal");
    }
    public function business()
    {
        return view("loan.business");
    }
    public function gold()
    {
        return view("loan.gold");
    }
    public function home_salary_employed()
    {
        return view("loan.home_salary_employed");
    }
    public function home_self_employed()
    {
        return view("loan.home_self_employed");
    }
    public function property_salary_employed()
    {
        return view("loan.property_salary_employed");
    }
    public function property_self_employed()
    {
        return view("loan.property_self_employed");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->loan_type == "") {
            return json_encode(array("res" => "danger", "msg" => "Loan Type Is Requried !"));
            exit();
        }
        switch ($request->loan_type) {
            case 'personal':
                $loan_id = get_rand_alphanumeric(10);
                $amount = $request->amount;
                $occupation = $request->occupation;
                $salary = $request->salary;
                $loan_type = $request->loan_type;
                $customer_fname = $request->fname;
                $customer_contact = $request->contact;
                $customer_email = $request->email;
                $customer_address = $request->address;
                $customer_pincode = $request->pincode;
                $customer_state = $request->state;
                $customer_district = $request->district;
                $customer_marital = $request->marital;
                $customer_dob = $request->dob;
                $customer_gender = $request->gender;
                $customer_children = $request->children;
                $customer_owner_home = $request->owner_home;
                $customer_duration = $request->duration;
                $customer_referal_id = $request->referal_id;
                $office_fname = $request->office_fname;
                $office_address = $request->office_address;
                $office_pincode = $request->office_pincode;
                $office_state = $request->office_state;
                $office_district = $request->office_district;
                $office_email = $request->office_email;
                $office_current_experience = $request->office_current_experience;
                $office_total_experience = $request->office_total_experience;
                $image_aadhaar = $_FILES["image_aadhaar"]["name"];
                $image_pan = $_FILES["image_pan"]["name"];
                $image_size = $_FILES["image_size"]["name"];
                $image_slip = $_FILES["image_slip"]["name"];
                $image_slip_2 = $_FILES["image_slip_2"]["name"];
                $image_slip_3 = $_FILES["image_slip_3"]["name"];
                $image_bank_statement = $_FILES["image_bank_statement"]["name"];
                $path = public_path('uploads/documents');
                Loan::create([
                    "loan_id" => $loan_id,
                    "loan_type" => $loan_type,
                    "applied_loan_amount" => $amount,
                    "agent_id" => $customer_referal_id,
                    "monthly_salary" => $salary,
                    "customer_occupation" => $occupation,
                    "customer_full_name" => $customer_fname,
                    "customer_contact_number" => $customer_contact,
                    "customer_email" => $customer_email,
                    "customer_address" => $customer_address,
                    "customer_pincode" => $customer_pincode,
                    "customer_state" => $customer_state,
                    "customer_district" => $customer_district,
                    "customer_marital_status" => $customer_marital,
                    "customer_dob" => $customer_dob,
                    "customer_gender" => $customer_gender,
                    "customer_children" => $customer_children,
                    "customer_ownership" => $customer_owner_home,
                    "customer_duration" => $customer_duration,
                    "work_name" => $office_fname,
                    "work_address" => $office_address,
                    "work_pincode" => $office_pincode,
                    "work_state"  => $office_state,
                    "work_district" => $office_district,
                    "work_email" => $office_email,
                    "work_current_experience" => $office_current_experience,
                    "work_total_experience" => $office_total_experience,
                    "document_aadhaar_card" => $image_aadhaar,
                    "document_pan_card" => $image_pan,
                    "document_passport_photo" => $image_size,
                    "document_salary_slip_first" => $image_slip,
                    "document_salary_slip_second" => $image_slip_2,
                    "document_salary_slip_thired" => $image_slip_3,
                    "document_bank_statement" => $image_bank_statement,
                    "status" => 0
                ]);
                $request->image_aadhaar->move($path, $image_aadhaar);
                $request->image_pan->move($path, $image_pan);
                $request->image_size->move($path, $image_size);
                $request->image_slip->move($path, $image_slip);
                $request->image_slip_2->move($path, $image_slip_2);
                $request->image_slip_3->move($path, $image_slip_3);
                $request->image_bank_statement->move($path, $image_bank_statement);
                break;
            case 'personal':
                $loan_id = get_rand_alphanumeric(10);
                $amount = $request->amount;
                $occupation = $request->occupation;
                $salary = $request->salary;
                $loan_type = $request->loan_type;
                $customer_fname = $request->fname;
                $customer_contact = $request->contact;
                $customer_email = $request->email;
                $customer_address = $request->address;
                $customer_pincode = $request->pincode;
                $customer_state = $request->state;
                $customer_district = $request->district;
                $customer_marital = $request->marital;
                $customer_dob = $request->dob;
                $customer_gender = $request->gender;
                $customer_children = $request->children;
                $customer_owner_home = $request->owner_home;
                $customer_duration = $request->duration;
                $customer_referal_id = $request->referal_id;
                $office_fname = $request->office_fname;
                $office_address = $request->office_address;
                $office_pincode = $request->office_pincode;
                $office_state = $request->office_state;
                $office_district = $request->office_district;
                $office_email = $request->office_email;
                $office_current_experience = $request->office_current_experience;
                $office_total_experience = $request->office_total_experience;
                $image_aadhaar = $_FILES["image_aadhaar"]["name"];
                $image_pan = $_FILES["image_pan"]["name"];
                $image_size = $_FILES["image_size"]["name"];
                $image_slip = $_FILES["image_slip"]["name"];
                $image_slip_2 = $_FILES["image_slip_2"]["name"];
                $image_slip_3 = $_FILES["image_slip_3"]["name"];
                $image_bank_statement = $_FILES["image_bank_statement"]["name"];
                $path = public_path('uploads/documents');
                Loan::create([
                    "loan_id" => $loan_id,
                    "loan_type" => $loan_type,
                    "applied_loan_amount" => $amount,
                    "agent_id" => $customer_referal_id,
                    "monthly_salary" => $salary,
                    "customer_occupation" => $occupation,
                    "customer_full_name" => $customer_fname,
                    "customer_contact_number" => $customer_contact,
                    "customer_email" => $customer_email,
                    "customer_address" => $customer_address,
                    "customer_pincode" => $customer_pincode,
                    "customer_state" => $customer_state,
                    "customer_district" => $customer_district,
                    "customer_marital_status" => $customer_marital,
                    "customer_dob" => $customer_dob,
                    "customer_gender" => $customer_gender,
                    "customer_children" => $customer_children,
                    "customer_ownership" => $customer_owner_home,
                    "customer_duration" => $customer_duration,
                    "work_name" => $office_fname,
                    "work_address" => $office_address,
                    "work_pincode" => $office_pincode,
                    "work_state"  => $office_state,
                    "work_district" => $office_district,
                    "work_email" => $office_email,
                    "work_current_experience" => $office_current_experience,
                    "work_total_experience" => $office_total_experience,
                    "document_aadhaar_card" => $image_aadhaar,
                    "document_pan_card" => $image_pan,
                    "document_passport_photo" => $image_size,
                    "document_salary_slip_first" => $image_slip,
                    "document_salary_slip_second" => $image_slip_2,
                    "document_salary_slip_thired" => $image_slip_3,
                    "document_bank_statement" => $image_bank_statement,
                    "status" => 0
                ]);
                $request->image_aadhaar->move($path, $image_aadhaar);
                $request->image_pan->move($path, $image_pan);
                $request->image_size->move($path, $image_size);
                $request->image_slip->move($path, $image_slip);
                $request->image_slip_2->move($path, $image_slip_2);
                $request->image_slip_3->move($path, $image_slip_3);
                $request->image_bank_statement->move($path, $image_bank_statement);
                break;
            default:
                # code...
                break;
        }
        return json_encode(array("res" => "success", "loan_type" => $request));
    }
}
function get_rand_alphanumeric($length)
{
    if ($length > 0) {
        $rand_id = "";
        for ($i = 1; $i <= $length; $i++) {
            mt_srand((float)microtime() * 1000000);
            $num = mt_rand(1, 36);
            $rand_id .= assign_rand_value($num);
        }
    }
    return strtoupper($rand_id);
}
function assign_rand_value($num)
{
    // accepts 1 - 36
    switch ($num) {
        case "1":
            $rand_value = "a";
            break;
        case "2":
            $rand_value = "b";
            break;
        case "3":
            $rand_value = "c";
            break;
        case "4":
            $rand_value = "d";
            break;
        case "5":
            $rand_value = "e";
            break;
        case "6":
            $rand_value = "f";
            break;
        case "7":
            $rand_value = "g";
            break;
        case "8":
            $rand_value = "h";
            break;
        case "9":
            $rand_value = "i";
            break;
        case "10":
            $rand_value = "j";
            break;
        case "11":
            $rand_value = "k";
            break;
        case "12":
            $rand_value = "l";
            break;
        case "13":
            $rand_value = "m";
            break;
        case "14":
            $rand_value = "n";
            break;
        case "15":
            $rand_value = "o";
            break;
        case "16":
            $rand_value = "p";
            break;
        case "17":
            $rand_value = "q";
            break;
        case "18":
            $rand_value = "r";
            break;
        case "19":
            $rand_value = "s";
            break;
        case "20":
            $rand_value = "t";
            break;
        case "21":
            $rand_value = "u";
            break;
        case "22":
            $rand_value = "v";
            break;
        case "23":
            $rand_value = "w";
            break;
        case "24":
            $rand_value = "x";
            break;
        case "25":
            $rand_value = "y";
            break;
        case "26":
            $rand_value = "z";
            break;
        case "27":
            $rand_value = "0";
            break;
        case "28":
            $rand_value = "1";
            break;
        case "29":
            $rand_value = "2";
            break;
        case "30":
            $rand_value = "3";
            break;
        case "31":
            $rand_value = "4";
            break;
        case "32":
            $rand_value = "5";
            break;
        case "33":
            $rand_value = "6";
            break;
        case "34":
            $rand_value = "7";
            break;
        case "35":
            $rand_value = "8";
            break;
        case "36":
            $rand_value = "9";
            break;
    }
    return $rand_value;
}
