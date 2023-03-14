<?php
defined("BASEPATH") or exit("No direct script access allowed");
require_once APPPATH . "razorpay-php/Razorpay.php";

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
class Member_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $admin = $this->session->userdata("admin");
        if (empty($admin)) {
            $this->session->set_flashdata("msg", "Your Session Expired");
            redirect(base_url() . "login_controller/login");
        }
    }

    // This function for member login page
    public function index()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        $this->load->view("member/member", $data);
    }

    // This function for password after login view & membership payment
    public function pwd_change()
    {
        $this->load->view("member/change_pwd");
    }

    // This function for password after login change
    public function pwd_check()
    {
        $this->load->model("member/Pwd_model");

        $this->load->library("form_validation");

        $this->form_validation->set_rules(
            "password",
            "Mobile Number is Required",
            "trim|required"
        );
        $this->form_validation->set_rules(
            "npassword",
            "Please Enter New Password",
            "trim|required"
        );
        $this->form_validation->set_rules(
            "cpassword",
            "Please Confirm New Password",
            "trim|required"
        );

        $admin = $this->session->userdata("admin");
        $mobile = $admin["mobile_number"];
        $sss_id = $admin["sss_id"];

        $password = $this->input->post("password");
        $npassword = $this->input->post("npassword");
        $cpassword = $this->input->post("cpassword");

        if ($this->form_validation->run() == true) {
            if ($mobile == $password) {
                if ($npassword == $cpassword) {
                    $this->Pwd_model->update_pwd($sss_id, $cpassword);
                    $this->session->set_flashdata(
                        "message_name",
                        '<div class="alert alert-success mb-1 mt-1" role="alert">Password Change Successfully</div>'
                    );
                    redirect(base_url() . "login_controller/login");
                } else {
                    $this->session->set_flashdata(
                        "message_name",
                        ' <div class="alert alert-danger" role="alert">New Password and Confirm Passowrd not Matched</div>'
                    );
                    redirect(base_url() . "member_controller/pwd_check");
                }
            } else {
                $this->session->set_flashdata(
                    "message_name",
                    ' <div class="alert alert-danger" role="alert">Please Enter Valid Mobile Number</div>'
                );
                redirect(base_url() . "member_controller/pwd_check");
            }
        } else {
            $this->load->view("member/change_pwd");
        }
    }

    //my account
    public function myaccount()
    {
        $admin = $this->session->userdata("admin");
        // $memberid = $admin['sss_id'] ;
        $id = $admin["sss_id"];
        $primary_id = $admin["pri_member_id"];

        $this->load->model("member/Login_model");
        $get_sponser["sponser"] = $this->Login_model->get_sponser($primary_id);

        $policy_claim_details = $this->Login_model->getPdata($id);

        foreach ($policy_claim_details as $key => $value) {
            $getdata["PC_claim"] = $value;
        }

        $results["payment"] = $this->Login_model->get_membership_payment($id);

        $data["admin"] = $admin;

        //     if ($admin['renewal/fresh'] != "Fresher") {

        //     $dataM = array_merge($data, $results,$getdata, $get_sponser);
        // }else{
        //     if($admin['status'] != "Membership"){

        //     }else{
        //         $dataM = array_merge($data, $results );
        //     }
        //     $dataM = array_merge($data);
        // }
        if (empty($policy_claim_details)) {
            // echo('1');

            if (empty($get_sponser)) {
                $dataM = array_merge($data, $getdata);
                //   echo('2');
            } else {
                // echo('3');

                if (empty($policy_claim_details)) {
                    $dataM = array_merge($data, $get_sponser, $results);
                    //   echo('4');
                } else {
                    $dataM = array_merge(
                        $data,
                        $getdata,
                        $get_sponser,
                        $results
                    );
                    echo "5";
                }
            }
        } else {
            //   echo('6');
            if (empty($get_sponser)) {
                if (empty($policy_claim_details)) {
                    $dataM = array_merge($data, $policy_claim);
                    //   echo('7');
                } else {
                    $dataM = array_merge($data, $getdata);
                    echo "8";
                }
            } else {
                if (empty($policy_claim_details)) {
                    $dataM = array_merge($data, $get_sponser);
                    //   echo('9');
                } else {
                    echo "10";
                    $dataM = array_merge(
                        $data,
                        $getdata,
                        $get_sponser,
                        $results
                    );
                }
            }
        }

        $this->load->view("member/my-account", $dataM);
    }

    public function view_reciept($id)
    {
        $admin = $this->session->userdata("admin");

        $data2["admin"] = $admin;

        $this->load->model("member/Login_model");

        $paymentarraydetails = $this->Login_model->getpayment($id);

        foreach ($paymentarraydetails as $key => $value) {
            $paymentarray["paymentdata"] = $value;
        }
        $removebtn["v"] = 1;
        $dataM = array_merge($paymentarray, $data2, $removebtn);

        $this->load->view("member/invoice", $dataM);
    }

    // T  for print data of login user
    public function membership_payment()
    {
        $admin = $this->session->userdata("admin");

       
            $id = $admin["sss_id"];
            $this->load->model("member/Login_model");
            $results["details"] = $this->Login_model->get_membership_payment(
                $id
            );
            // print_r($results); die;

            $data["admin"] = $admin;
            $dataM = array_merge($data, $results);
            $this->load->view("member/membership_payment", $dataM);
      
    }

    // This function for print data of login user
    public function membership_billing()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;

        $this->load->view("member/membership_billing", $data);
    }

    public function pay_offiline()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;

        $this->load->view("member/pay-offline", $data);
    }

    //    product page
    public function product()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;

        $this->load->view("member/product", $data);
    }

    public function checkout()
    {
        $admin = $this->session->userdata("admin");
        if ($admin["renewal/fresh"] == "Fresher") {
            $amt = 1770;
        } else {
            $amt = 590;
        }
        $ttl_amt = $amt * 100;

        $key_id = "rzp_live_pFfxQnbCZfZnli";
        $secret = "gLUxD2pgPp0SBAovxeqGjxU5";

        //   $key_id = 'rzp_test_FuJhV2UFQoPMYn';
        // $secret = 'JBNbbtPLLh0iXmhgmMVEhQIr';

        $api = new Api($key_id, $secret);

        $order = $api->order->create([
            "receipt" => "123",
            "amount" => $ttl_amt,
            "currency" => "INR",
            "notes" => ["key1" => "value3", "key2" => "value2"],
        ]);

        $this->load->view("member/checkout", [
            "data" => $admin,
            "order" => $order,
            "key_id" => $key_id,
            "secret" => $secret,
        ]);
    }

    public function payment_status($amt)
    {
        $admin = $this->session->userdata("admin");
        $data2["admin"] = $admin;
        $key_id = "rzp_live_pFfxQnbCZfZnli";
        $secret = "gLUxD2pgPp0SBAovxeqGjxU5";
        //         $key_id = 'rzp_test_FuJhV2UFQoPMYn';
        // $secret = 'JBNbbtPLLh0iXmhgmMVEhQIr';
        $api = new Api($key_id, $secret);
        $razorpay_payment_id = $this->input->post("razorpay_payment_id");
        $razorpay_order_id = $this->input->post("razorpay_order_id");
        $razorpay_signature = $this->input->post("razorpay_signature");
        $secret = "gLUxD2pgPp0SBAovxeqGjxU5";
        //  $secret = 'JBNbbtPLLh0iXmhgmMVEhQIr';
        $data = $razorpay_order_id . "|" . $razorpay_payment_id;
        $generated_signature = hash_hmac("sha256", $data, $secret);
        $pay = $api->payment->fetch($razorpay_payment_id);
        $this->load->model("member/Login_model");

        if ($generated_signature == $razorpay_signature) {
            // if ($admin['status'] == 'Active') {
            //     $value =  "Renewal";
            //     $renewal_date =   date("Y/m/d");
            //     $this->Login_model->status($admin['sss_id'],$value,$renewal_date);
            // }else{
            //     $value =  "Fresher";
            //     $this->Login_model->status($admin['sss_id'],$value,"");
            // }

            if ($admin["status"] == "Active") {
                $value = "Renewal";
                $renewal_date = date("Y/m/d");
                $yes = "Yes";
                $status = "Active";
                $this->Login_model->status(
                    $admin["sss_id"],
                    $value,
                    $renewal_date,
                    $yes,
                    $status
                );
            } else {
                $value = "Fresher";
                $status = "Membership";
                $this->Login_model->status(
                    $admin["sss_id"],
                    $value,
                    "",
                    "",
                    $status
                );
            }

            $payment_sr = $this->Login_model->paymtnenumber();

            foreach ($payment_sr as $key => $value) {
                $incremenet = $value["srpayment"];
            }

            $valu = $incremenet + 1;
            //    $this->Login_model->updatesrpayment($valu, $admin['sss_id']);

            $code = str_pad($valu, 5, "0", STR_PAD_LEFT);

            $arr["transaction_Id"] = $razorpay_payment_id;
            $arr["rozarpay_order_number"] = $razorpay_order_id;
            $arr["order_number"] = "M" . $code;
            $arr["payment_type"] = "Membership";
            $arr["payment_status"] = 1;
            $arr["payment_mode"] = "Online";
            $arr["created_at_payment"] = date("Y/m/d");
            $arr["sss_id"] = $admin["sss_id"];
            $arr["amount"] = $amt;
            $arr["srpayment"] = $valu;
            if ($admin["renewal/fresh"] == "Renewal") {
                $arr["amount"] = 500;
            } else {
                $arr["amount"] = 1500;
            }

            if ($admin["renewal/fresh"] == "Fresher") {
                if ($admin["state"] != "Maharashtra") {
                    $arr["igst"] = 270;
                } else {
                    $arr["sgst"] = 135;
                    $arr["cgst"] = 135;
                }
            } else {
                if ($admin["state"] != "Maharashtra") {
                    $arr["igst"] = 90;
                } else {
                    $arr["sgst"] = 45;
                    $arr["cgst"] = 45;
                }
            }
            $arr["payment_method"] = $pay["method"];

            $result = $this->Login_model->insertMpayment($arr);
            $paymentarray["paymentdata"] = $arr;
            $dataM = array_merge($paymentarray, $data2);
            $msg1["messages"] =
                "Payment received Successfully of SSS ID " .
                $admin["sss_id"] .
                ", Payment Receipt No is " .
                "M" .
                $code;
            $msg2[
                "messages"
            ] = ' <div dir="ltr" class="gmail_signature" data-smartmail="gmail_signature">
         <div dir="ltr">
            <br>
            <div dir="ltr" style="margin-left:0pt" align="left">
               <table style="border:none;border-collapse:collapse">
                  <colgroup>
                     <col width="340">
                     <col width="334">
                  </colgroup>
                  <tbody>
                     <tr style="height:26pt">
                        <td rowspan="4" style="border-left:solid #ffffff 1pt;border-right:solid #ffffff 2.25pt;border-bottom:solid #000000 1pt;border-top:solid #ffffff 1pt;vertical-align:top;padding:5pt 5pt 5pt 5pt;overflow:hidden">
            
 
                           <br>
                           <p dir="ltr" style="line-height:1.2;margin-top:0pt;margin-bottom:0pt"><span style="font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap"><span style="border:none;display:inline-block;overflow:hidden;width:296px;height:108px text-aling:center;"><img src="https://www.ssamiti.org/assets2/images/logo.png" style="margin-left:0px;margin-top:0px" width="50%" height="100%"></span></span></p>
                        </td>
                        <td style="border-left:solid #ffffff 2.25pt;border-right:solid #ffffff 1pt;border-top:solid #ffffff 1pt;vertical-align:middle;padding:5pt 5pt 5pt 5pt;overflow:hidden">
                           <p dir="ltr" style="line-height:1.2;margin-top:0pt;margin-bottom:0pt"><span style="font-size:12pt;font-family:Montserrat,sans-serif;color:#000000;background-color:transparent;font-weight:600;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap">Email : <a href="mailto:info@annotation.co.in" target="_blank">support@ssamiti.org</a>&nbsp;</span></p>
                           <p dir="ltr" style="line-height:1.2;margin-top:0pt;margin-bottom:0pt"><span style="font-size:12pt;font-family:Montserrat,sans-serif;color:#000000;background-color:transparent;font-weight:600;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap">Email : <a href="mailto:info@annotation.co.in" target="_blank">helpdesk@ssamiti.org</a>&nbsp;</span></p>
                        </td>
                     </tr>
                     <tr style="height:21pt">
                        <td style="border-left:solid #ffffff 2.25pt;border-right:solid #ffffff 1pt;vertical-align:top;padding:5pt 5pt 5pt 5pt;overflow:hidden">
                           <p dir="ltr" style="line-height:1.2;margin-top:0pt;margin-bottom:0pt"><span style="font-size:12pt;font-family:Montserrat,sans-serif;color:#000000;background-color:transparent;font-weight:600;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap">Website : </span><a href="https://ssamiti.org" style="text-decoration:none" target="_blank"><span style="font-size:12pt;font-family:Montserrat,sans-serif;color:#000000;background-color:transparent;font-weight:600;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap">www.ssamiti.org</span></a></p>
                        </td>
                     </tr>
                     <tr style="height:21pt">
                        <td style="border-left:solid #ffffff 2.25pt;border-right:solid #ffffff 1pt;vertical-align:middle;padding:5pt 5pt 5pt 5pt;overflow:hidden">
                           <p dir="ltr" style="line-height:1.2;margin-top:0pt;margin-bottom:0pt"><span style="font-size:12pt;font-family:Montserrat,sans-serif;color:#000000;background-color:transparent;font-weight:600;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap">Contact : +91 9321254480</span></p>
                        </td>
                     </tr>
                     <tr style="height:46.58105468750001pt">
                      
                     </tr>
                     <tr style="height:21pt">
                        <td colspan="2" style="border-left:solid #000000 1pt;border-right:solid #aa1a1b 1pt;border-bottom:solid #000000 1pt;border-top:solid #000000 1pt;vertical-align:top;background-color:#aa1a1b;padding:5pt 5pt 5pt 5pt;overflow:hidden">
                           <p dir="ltr" style="line-height:1.2;text-align:center;margin-top:0pt;margin-bottom:0pt"><a href="#" style="text-decoration:none" target="_blank"><span style="font-size:9pt;font-family:Montserrat,sans-serif;color:#ffffff;background-color:transparent;font-weight:600;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap">To Serve Beyond Service</span></a></p>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>';
            if ($result == true) {
                $to = $admin["email_id"];
                $subject = "SSS Payment Regarding";
                $messageBody = $msg1["messages"] . $msg2["messages"];
                $this->load->helper("php_mailer_helper");

                if (
                    sendEmail(
                        $to,
                        $subject,
                        $messageBody,
                        "support@sssamiti.org",
                        "",
                        "support@sssamiti.org",
                        "SSS Website",
                        ""
                    )
                ) {
                    $response["status"] = true;
                    $response["data"] =
                        "Thankyou for your interest, We'll Get Back to you Soon.";
                } else {
                    $response["status"] = false;
                    $response["data"] =
                        "Something went wrong, please try again later.";
                }

                $this->load->view("member/invoice", $dataM);
            } else {
                echo "Page is not Loading";
            }
        } else {
            echo "payment is failed";
        }
    }

    //  view after membership payment is done
    public function index1()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        $memberID = $admin["sss_id"];
        $this->load->model("member/Login_model");
        $results["data"] = $this->Login_model->getrelationMemberID($memberID);
        $dataM = array_merge($data, $results);
        $this->load->view("member/policy/member", $dataM);
    }

    // view profile fees is paid
    public function view_profile()
    {
        $admin = $this->session->userdata("admin");
        // print_r($admin); die;
        $data["admin"] = $admin;
        $this->load->view("member/policy/view_profile", $data);
    }

    // view profile fees is paid
    public function view_profile1()
    {
        $admin = $this->session->userdata("admin");

        $data["admin"] = $admin;
        $this->load->view("member/view_profile1", $data);
    }

    //  view profile bul still not paid fees
    public function view_profile_member()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        $this->load->view("member/view_profile", $data);
    }

    // crosscheck prifle
    public function check_profile()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        $this->load->view("member/policy/view_profile", $data);
    }

    // buy Policy
    public function buy_policy()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        $this->load->model("member/Login_model");
        $results["policydata"] = $this->Login_model->policyDetails();
        $dataM = array_merge($data, $results);
        // print_r( $results); die;
        $this->load->view("member/policy/documents", $dataM);
    }

    // buy Policy
    public function pwd_changep()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        $this->load->view("member/policy/change_pwd", $data);
    }

    // select policy type
    public function medical_check()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        // $id = $admin["sss_id"];
        // $this->load->model("member/Login_model");
        // $question = $this->Login_model->getMedical($id);
        // print_r($question);
     
        $this->load->view("member/policy/medical", $data);
    }

    // if medical found
    public function medical_board()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;

        $id = $admin["sss_id"];
        $value = "Under-Medical";
        $this->load->model("member/Login_model");
        $results["policydata"] = $this->Login_model->update_policy_status(
            $id,
            $value
        );
        if ($results == true) {
            $this->session->set_flashdata(
                "message_name",
                "Your Application is Under Medical, You will get Message once approved"
            );
            redirect(base_url() . "member/Member_controller/medical_check");
        } else {
            echo "not Updated";
        }
    }

    // submit if medical found then again trying to buy policy
    public function under_medical()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        $this->session->set_flashdata(
            "message_name",
            "Your Application is Under Medical, You will get Message once approved"
        );
        redirect(base_url() . "member/member_controller/index1");
    }

    // select policy type
    public function policyChoose($var)
    {
        $data2 = [
            [
                "id" => 1,
                "sum_insured" => 300000,
            ],
            [
                "id" => 2,
                "sum_insured" => 500000,
            ],
            [
                "id" => 3,
                "sum_insured" => 750000,
            ],
            [
                "id" => 4,
                "sum_insured" => 1000000,
            ],
            [
                "id" => 5,
                "sum_insured" => 1500000,
            ],
            [
                "id" => 6,
                "sum_insured" => 2000000,
            ],
        ];

        $this->load->model("member/Login_model");
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        $type = $admin['renewal/fresh'];
        
       if ($type == 'Renewal') {
        $sss_id = $admin["sss_id"];
        $policy_claim_details = $this->Login_model->getPdata($sss_id);

        foreach ($policy_claim_details as $value) {
            $policy_claim = $value;
        }

        $polic_limit = $this->Login_model->get_policy_summary($sss_id);
        if (!empty($polic_limit)) {
            $current_sum_insured = $policy_claim["sum_insured"];
            foreach ($polic_limit as $key => $value) {
                $policy_limit = $value;
            }
            $claim_ratio = $policy_limit["ratio"];
            foreach ($data2 as $row) {
                if ($row["sum_insured"] == $current_sum_insured) {
                    $sum_insured = $row["id"];
                    $id = $sum_insured;
                }
            }
        } else {
            $current_sum_insured = $policy_claim["sum_insured"];
            foreach ($data2 as $row) {
                if ($row["sum_insured"] == $current_sum_insured) {
                    $sum_insured = $row["id"];
                    $id = $sum_insured;
                }
            }
        }

        if (!empty($polic_limit)) {
            if ($var != "1") {
                if ($claim_ratio < 0.0) {
                    $number = "0";
                    echo $number;
                    $results[
                        "policydata"
                    ] = $this->Login_model->wehere_policyDetails($number, $id);
                } elseif ($claim_ratio > 0.0 and $claim_ratio < 50.0) {
                    $number = "1";
                    echo $number;
                    $results[
                        "policydata"
                    ] = $this->Login_model->wehere_policyDetails($number, $id);
                } elseif ($claim_ratio > 50.0) {
                    if ($policy_claim["sum_insured"] >= '2000000') {
                        $number = "8";
                        echo $number;
                        $results[
                            "policydata"
                        ] = $this->Login_model->wehere_policyDetails($number, $id);
                    }else{
                        $number = "2";
                        echo $number;
                        $results[
                            "policydata"
                        ] = $this->Login_model->wehere_policyDetails($number, $id);
                    }
         
                }
            } else {
                if ($claim_ratio < 0.0) {
                    $number = "0";
                    echo $number;
                    $results[
                        "policydata"
                    ] = $this->Login_model->wehere_policyDetails($number, $id);
                } elseif ($claim_ratio > 0.0 and $claim_ratio < 50.0) {
                    if ($policy_claim["sum_insured"] >= '2000000') {
                        $number = "8";
                        echo $number;
                        $results[
                            "policydata"
                        ] = $this->Login_model->wehere_policyDetails($number, $id);
                    }else{
                        if ($policy_claim["sum_insured"] >= '1500000') {
                            $number = "7";
                            echo $number;
                            $results[
                                "policydata"
                            ] = $this->Login_model->wehere_policyDetails($number, $id);
                        }else{
                            $number = "4";
                            echo $number;
                            $results[
                                "policydata"
                            ] = $this->Login_model->wehere_policyDetails($number, $id);
                        }
                    }
                   
                    
                } elseif ($claim_ratio > 50.0) {
                    if ($policy_claim["sum_insured"] >= '2000000') {
                        $number = "8";
                        echo $number;
                        $results[
                            "policydata"
                        ] = $this->Login_model->wehere_policyDetails($number, $id);
                    }else{
                        $number = "5";
                        echo $number;
                        $results[
                            "policydata"
                        ] = $this->Login_model->wehere_policyDetails($number, $id);
                    }
                    
                }
            }
        } else {
            if ($var != "1") {
                $number = "0";
                echo $number;
                $results[
                    "policydata"
                ] = $this->Login_model->wehere_policyDetails($number, $id);
            } else {
                if ($policy_claim["sum_insured"] >= '2000000') {
                    $number = "8";
                    echo $number;
                    $results[
                        "policydata"
                    ] = $this->Login_model->wehere_policyDetails($number, $id);
                }else{
                    if ($policy_claim["sum_insured"] >= '1500000') {
                        $number = "7";
                        echo $number;
                        $results[
                            "policydata"
                        ] = $this->Login_model->wehere_policyDetails($number, $id);
                    }else{
                        $number = "0";
                        echo $number;
                        $results[
                            "policydata"
                        ] = $this->Login_model->wehere_policyDetails($number, $id);
                    }
                }
                
                
            }  
        }
        $array = array_merge($data, $results, $polic_limit);
       }else{
        // Fresher Policy Purchase
        $number = "10";
        $id = 4;
        $results[
            "policydata"
        ] = $this->Login_model->wehere_policyDetails($number, $id);
        $array = array_merge($data,$results);
       }

      
        $this->load->view("member/policy/policy-choose", $array);
    }

    public function beneficiary($pid)
    {
        // print_r($pid);
        $this->load->model("member/Login_model");
        $results["getselectedpolicy"] = $this->Login_model->getPolicydata($pid);

        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        $id = $admin["sss_id"];
        $results2["beneficiarydata"] = $this->Login_model->getBeneficiaryData(
            $id
        );

        $array = array_merge($data, $results, $results2);
        $this->load->view("member/policy/beneficiary", $array);
    }

    public function add_beneficiary()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;

        foreach ($data as $value) {
            $id = $value["sss_id"];
        }

        $this->load->model("member/Login_model");
        $this->load->library("form_validation");

        $this->form_validation->set_rules(
            "name",
            "Enter Beneficiary Fullname",
            "trim|required"
        );
        $this->form_validation->set_rules(
            "birthdate",
            "Enter Beneficiary Birthdate",
            "trim|required"
        );
        $this->form_validation->set_rules(
            "gender",
            "Select Beneficiary Date of Birth",
            "trim|required"
        );
        $this->form_validation->set_rules(
            "relation",
            "Select Beneficiary Relation",
            "trim|required"
        );
        $this->form_validation->set_rules(
            "pwd",
            "Select Beneficiary PWD",
            "trim|required"
        );

        if ($this->form_validation->run() == true) {
            $formarray = [];
            $formarray["sss_id"] = $id;
            $formarray["name"] = $this->input->post("fullname");
            $formarray["birthdate"] = $this->input->post("DOB");
            $formarray["gender"] = $this->input->post("gender");
            $formarray["relation"] = $this->input->post("relation");
            $formarray["pwd"] = $this->input->post("pwd");
            $dataa = $this->Login_model->insertBeneficiaryData($formarray);
            if ($dataa == true) {
                $results[
                    "beneficiarydata"
                ] = $this->Login_model->getBeneficiaryData($id);
                print_r($results);
                die();

                $this->load->view("member/policy/beneficiary", $results);
            } else {
                echo "something is worng";
            }
        } else {
            $this->load->view("member/policy/beneficiary");
        }
    }

    public function beneficiarydelete($sr)
    {
        $this->load->model("member/Login_model");
        $results = $this->Login_model->deletebeneficiary($sr);
        if ($results == true) {
            $this->session->set_flashdata(
                "message_name",
                "Beneficiary Deleted"
            );
            redirect(base_url() . "Member_controller/beneficiary");
        }
    }

    public function policyPay($pid)
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;

        $this->load->model("member/Login_model");
        $results["getselectedpolicy"] = $this->Login_model->getPolicydata($pid);
        $arra = array_merge($data, $results);
        $this->load->view("member/policy/policy_payment", $arra);
    }

    public function checkout2($pid)
    {
        $admin = $this->session->userdata("admin");
        $this->load->model("member/Login_model");

        $results = $this->Login_model->getPolicydata($pid);
        foreach ($results as $key => $value) {
            $value;
        }

        $key_id = "rzp_test_FuJhV2UFQoPMYn";
        $secret = "JBNbbtPLLh0iXmhgmMVEhQIr";

        $api = new Api($key_id, $secret);

        $order = $api->order->create([
            "receipt" => "123",
            "amount" => $value["premium"] + $value["gst"],
            "currency" => "INR",
            "notes" => ["key1" => "value3", "key2" => "value2"],
        ]);

        $this->load->view("member/policy/checkout", [
            "data" => $admin,
            "order" => $order,
            "key_id" => $key_id,
            "secret" => $secret,
            "pid" => $pid,
        ]);
    }

    public function payment_status2($amt, $pid)
    {
        $admin = $this->session->userdata("admin");
        $data2["admin"] = $admin;

        $razorpay_payment_id = $this->input->post("razorpay_payment_id");
        $razorpay_order_id = $this->input->post("razorpay_order_id");
        $razorpay_signature = $this->input->post("razorpay_signature");
        $secret = "JBNbbtPLLh0iXmhgmMVEhQIr";
        $data = $razorpay_order_id . "|" . $razorpay_payment_id;
        $generated_signature = hash_hmac("sha256", $data, $secret);
        $key_id = "rzp_test_FuJhV2UFQoPMYn";
        $secret = "JBNbbtPLLh0iXmhgmMVEhQIr";
        $api = new Api($key_id, $secret);
        $pay = $api->payment->fetch($razorpay_payment_id);
        $this->load->model("member/Login_model");

        if ($generated_signature == $razorpay_signature) {
            $status = "Yes";
            $this->Login_model->update_policy_status_member_table(
                $status,
                $admin["sss_id"]
            );
            $results = $this->Login_model->getgst($pid);

            $payment_sr = $this->Login_model->paymtnenumber();

            foreach ($payment_sr as $key => $value) {
                $incremenet = $value["srpayment"];
            }

            $valu = $incremenet + 1;

            $code = str_pad($valu, 5, "0", STR_PAD_LEFT);

            $arr["transaction_Id"] = $razorpay_payment_id;
            $arr["rozarpay_order_number"] = $razorpay_order_id;
            $arr["order_number"] = "P" . $code;
            $arr["payment_type"] = "Policy";
            $arr["payment_status"] = 1;
            $arr["payment_mode"] = "Online";
            $arr["created_at_payment"] = date("Y/m/d");
            $arr["sss_id"] = $admin["sss_id"];
            $arr["amount"] = $results[0]["premium"];
            $arr["srpayment"] = $valu;
            $arr["payment_method"] = $pay["method"];

            if ($admin["state"] != "Maharashtra") {
                $arr["igst"] = $results[0]["gst"];
            } else {
                $number = $results[0]["gst"];
                $divisor = 2;
                $result = $number / $divisor;
                $arr["sgst"] = $result;
                $arr["cgst"] = $result;
            }
            $this->Login_model->insertMpayment($arr);
        } else {
            echo "payment is failed";
        }

        $paymentarray["paymentdata"] = $arr;
        $dataM = array_merge($paymentarray, $data2);
        $this->load->view("member/invoice", $dataM);
    }

    //  policy holder  page
    public function index2()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        
        $memberid = $admin["sss_id"];
        $id = $admin["sss_id"];
        $primary_id = $admin["pri_member_id"];

        $this->load->model("member/Login_model");
        $get_sponser["sponser"] = $this->Login_model->get_sponser($primary_id);
         
        $this->load->model("member/Login_model");
        $results["getalldetails"] = $this->Login_model->get_all_details($id);

        $beneficiary[
            "beneficiary_data"
        ] = $this->Login_model->get_beneficiary_data($memberid);
        $policy_claim_details = $this->Login_model->getPCdata($memberid);

        $results2["data2"] = $this->Login_model->getrelationMemberIDDetails(
            $memberid
        );
        $policy_data = $this->Login_model->getPdata($id);

        foreach ($policy_data as $key => $value) {
            $policydata["policydatas"] = $value;
        }
        foreach ($policy_claim_details as $key => $value) {
            $policy_claim["PC_claim"] = $value;
        }

      if ($admin['status'] != 'Membership') {
        if (empty($policy_claim_details)) {
            // echo('The array is empty.');

            if (empty($get_sponser)) {
                $dataM = array_merge($data, $beneficiary, $policydata);
            } else {
                //   echo('The array is not empty.');
                if (empty($policy_claim_details)) {
                    if (empty($policydata)) {
                        $dataM = array_merge(
                            $data,
                            $beneficiary,
                            $get_sponser,
                            
                        );
                    }else{
                        $dataM = array_merge(
                            $data,
                            $beneficiary,
                            $get_sponser,
                            $policydata
                        );
                    }
                } else {
                    $dataM = array_merge(
                        $data,
                        $beneficiary,
                        $policydata,
                        $get_sponser
                    );
                }
            }
        } else {
            if (empty($get_sponser)) {
                if (empty($policy_claim_details)) {
                    $dataM = array_merge($data, $beneficiary, $policy_claim);
                } else {
                    $dataM = array_merge(
                        $data,
                        $beneficiary,
                        $policydata,
                        $policy_claim
                    );
                }
            } else {
                if (empty($policy_claim_details)) {
                    $dataM = array_merge(
                        $data,
                        $beneficiary,
                        $policy_claim,
                        $get_sponser
                    );
                } else {
                    $dataM = array_merge(
                        $data,
                        $beneficiary,
                        $policydata,
                        $policy_claim,
                        $get_sponser
                    );
                }
            }
        }
      }else{
        $dataM = array_merge(
            $data,
            
        );
      }

        $this->load->view("member/policy/policy", $dataM);
    }

    // / request other members to primary member
    public function request_member_form()
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;

        $memberid = $admin["sss_id"];

        $this->load->model("member/Login_model");
        $results["data2"] = $this->Login_model->getrelationData($memberid);

        $dataM = array_merge($data, $results);
        $this->load->view("member/policy/request_member", $dataM);
    }

    // Request Data VIew
    public function requestview($id)
    {
        $admin = $this->session->userdata("admin");
        $data["admin"] = $admin;
        // $memberid = $admin['sss_id'] ;

        $this->load->model("member/Login_model");
        $results["data2"] = $this->Login_model->getsponserdata($id);

        $dataM = array_merge($data, $results);
        $this->load->view("member/policy/request_data", $dataM);
    }

    // This function for logot after login
    public function member_logout()
    {
        $this->session->unset_userdata("admin");
        $this->session->set_flashdata(
            "message_name",
            '<div class="alert alert-success mb-1 mt-1" role="alert">You Logout Successfully</div>'
        );
        redirect(base_url() . "login_controller/login");
    }
}
?>
