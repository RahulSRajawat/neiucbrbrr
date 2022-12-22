<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller{     function __construct(){
        parent::__construct();
         header("Access-Control-Allow-Headers: *");
         header('Access-Control-Allow-Origin: *');
        $this->load->library("validapi");
        // $this->load->library("fingpayrnfiapi");
         $this->response =   array();
        $this->date_added       =   date("Y-m-d H:i:s");
    }


    public function res(){
        echo json_encode(['status'=>200,'msg'=>'Transaction completed successfully']);
    }


    public function finokey(){

        $this->load->library("appfinoaeps");

        $result =   $this->appfinoaeps->getencryptionkey();
        print_r($result);

    }



    public function getdecodebody(){
        echo  $this->user->decrypt($this->input->post('body'));
    }

      public function getencodebody(){
    	echo  $this->user->encrypt($this->input->post());
    }




    public function getip(){
      echo   $this->input->ip_address();
    }



    public function res1(){
        $data = (array) json_decode(file_get_contents('php://input'), TRUE);
        if(!empty($data)){
            if(isset($data['event']) && !empty($data['event']) && isset($data['param']) && !empty($data['param'])){



                    $tsdata=    $data['param'];

                    $this->response['status']=200;
                     $this->response['merchant_id']=$tsdata['merchant_id'];
                     $this->response['partner_id']=$tsdata['partner_id'];
                    $this->response['message']="Transaction completed successfully";


            }else{
                    $this->response['status']=400;
                    $this->response['message']="Invalid Transaction Request Parameter.";

            }
        }else{
            $this->response['status']= 400;
            $this->response['message']="REQUEST Data Not Found";

        }

    echo     json_encode($this->response);

    }






    function sendnotification($device_id='',$message='Hello'){

        $url = 'https://fcm.googleapis.com/fcm/send';
        $api_key = 'AAAAKZLje1I:APbGQDw8FD...TjmtuINVB-g';



    /*api_key available in:
    Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/

    $fields = array (
        'registration_ids' => array (
                $device_id
        ),
        'data' => array (
                "message" => $message
        )
    );

    //header includes Content type and api key
    $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$api_key
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;
}








    function checkdatata(){
        $this->load->library("fingpayrnfiapi");
        $d='{"body":"XjYcVCPZG4g2UC2kRpkXAGhu5b3IKCaHTr2IpMj+mzcajzC9s8eixeEk1G+9RI2p3XZjx5qapH59+41E4w7Pr+L0YWl0iPElYMgywMOSFUvFRl20ch2sBBAkljbaFVwd+NaWZLAgHaq\/sSrCrYT8oFEsSyq0r7gef3uX5sTZjfpW18QifC2eicJBZMIarZo6ryHzW8wyksW8fhRtVHmTSQ1qladbyvMgovRD1h4KLegwLwa41q3VaNUt1fC2MdFPpYvAbBbnJgg0Qx75gUQiDu9yTtRjUZopWuqwuzNAooJA08\/y3cmn0z4Y3Hpzgkq7M4jw00j\/4eRx9cGpOFDVUjiFAbUZgMiSZOMmhBhHAAg1efswTNYIFvjr8i2XDD5LO1exKYkoVamt73wdA6XOkelSh2S3U63xXTc+N3C\/6vtefdmErd3q0dJ5FIi0G9zhPIZ8Uu225VYnKS6phuIvtBvRBa0HgLYDougaDFTQ+iYHQ3v4LM9pY8VAWbRR8A9HiASR2UE0xV875euEr+I9p0tUltID+KakoKqEEjWZytkQ9ikmwGzfWBvSTiDr47cxROtwEfrhnPHd4iPZ9ZuVzWKhwCXBK4pnUCFMuRpSiTO485YtNjVc+vuYzNFnScI3lgccXLZI5MpIW4Dm5ks8CBttVTUH1FciCBJFWT3JIXwWF0voXp86DKho98kYpwJrmdcDqlq75+OfSZVvKazomwhBzjLDLaAqm6TRh96u2QT11DuAmG283+RyGQgBwP6g\/7u2IYSTD3EkFmNwpGQLD78m8KJdtjvxYi9ND7xcEPKlngPS8BoOJwEAGIOAsHlmTzECFrUh4ai9hZOjIrfDZDasMHAGlCm8C40mNb9pBTWg+mQK8C8lUU8L\/TfIBwktGavmF0AIY+0dQ7E03tWVKpWNaQaN9gUiA\/k1L3PxiEI3tFl9dwGsLijteVIX3iqtEcxvl7kyBuuxAyhkEuhZWQkAcxGMbs\/DUwehX2BFCW4HSVSKAtiGbHNJMq+P0AHhbikjt6pkoxRt+atFwlp4BHEQf4W\/0or23yBboGhQOWGolgg4YgYJV1Cj0FACasanSFmtL76OxUc6F9OOOAzFxN8ZjbJJK9B9oSOI7\/oSgUAumeoFrmKtbwYPf9OxftxN+alx55219ofCuJxmRVnvabyQ9lX2smihshqw528SFuOyPayE0bzwD9VhpxqgZPnccgmbwS7EJ7qOojaRtHFhDOArFdTKFL6JuBIQEGZDfspADcgEKS7qg+mjCFrVuNDCQIM80XzaMSXr1lNG+BWEQic0VsbP+iDBvLClo3KPI3IogoQT7jKhihYmx+tXDnsh\/re6s1ildTQTsSpyhOyZ0TmFfORT3KWjIQZ1fxZfnJac925t4ZPzT5BxM3ZdLdOjDMXmYqbkYUnj3MtvFeEinz4U9Talm7U9F08BFDYEx8dtve1OqVrXdZ5o2qtXS8Pp1Fh7xm2\/eKpecwKOfN+Vh3OIIsYolF\/qTUO35LqBUN\/Tv2IVttPUuwZztTMfnHZvoLGzEPN6Q1xCDFu069kn\/Wu47PymyE9Qo2dFik1nNEQm4c0TeFV27SNj1TiW1nS05TSXLj14CI7q1sxlgTcY5PbwGW4EwwJyG+qvJyLkvgxyi2DC\/01JpHwJ0rBvnxRVLnDcxJ9JLZQDqqw4MzzEJ0XZcmvPQajUdw18EKTNYGqpZqe8wwglhRKoUHZipXZ5zRnIf4Ccd3tMUEL6aW8T8Vx\/FW0daD8SYp8LLFMR2+nkudeKZKLgbyTROI8Pr2jwxXFnV3oJRsA6PkXbFn2\/L5pG5uNbfApdVGVf9eu5oyG6YWDvUjpW4hVGPXH3ggHKGtYkHfrCr5go20u+164qeA+iHLSrjzerWREKC9k9UoirNUqnAtarNPUCzxij\/9UtawHxxNeVXpyI\/Ji\/kNPYmRSo\/2oeObiTgmiZrVN+qD9oBBVV9Jj8tBgZseTmu3H0dWddPDMchkhI8wl65jGmtdRQTwzO2dmRGWZ+n4Ab6hlTLu2DNQJHqy+arU1BWylMsSFwAqgV75nh3w5gfRqS5cY9MrhjlSuhmArbvkOf3PwiATHDfManHIXNTV1j4nzXaolu1G9RkKs1Fv+9RS61EoFOTkytV7p2eCz8LGnoLlYK0e7jyOASSzQm\/o5KwJQOf7ryNA\/LxXixYiDP7qDetP7sU8zxoHpOPa+MVhmEH\/JRZywQ8qRJomypyM4NSxAHPb0ZhnuXviHdMHcaE3FpeNPbOXBcStfnQ4uYqLqhT3\/HIJOJQlch64kuGkG41J2LQBM86AI7iWZc2rrQN0\/xDZscdPlkUgJiY4Ofm0Z0ShaONBYAHZPjfPC\/Bu3xfcCV\/uQtY4gQtQ9rFL2Gv+N6zaxlmb39IYUpauVn2fA\/cOgrHiC2gvSS4\/qbFIFvg9PppJ9EZh\/z6pKQjh1G5nBnsj8TBjyRiRdHKKhwXJ\/zA3BjNZu2WuMXllQnNYVTgTGXFBb89L37xjgzpxG8Vn17jYPNEVFhM6pseU8y\/wDH2JV5iFOqM\/TNq4h858og\/TlG71AcsYdGKqfuggdTaUhyzyiKNwyK90NERYp7OU2w9FMNT2ZBQcmpBTBtVkCSj6YKBkAIcUOCDodK89OcfKKI14S7sEEpkePqj4ugfOj1MMsRN+PXRVSD4ztLjbylGmFPeumaLZQ3incArVqOEt3\/qaiRWZBcm4WyaSXrVONsHy6jjiJTWlw3zNLmCDUaL7dghAw+UROPGetEEh42sBKzaAm5yrtGkemfw4nFUQLj\/lNPnbzkF4XSBwV0KpOA9N7ZtfXUG7vCBCq\/JuA7C4Y95oOdFlV7EqOzb5NzIxW\/A57KpokUR2cvMB+SI9fZeMWDq1At277ufwdq4ah\/aLuHg6JN8loS6+YCbC7Ty1T6uO7dh1UuFAnlGkZUq6iiSGTGFIlfFqOn0a7HaMf5ZxcLHM4EvNcl6PykA31QIes5n2INeOFl4ykKhtnGO37otAF1D7LNRts8r5nrEqvJ1rJuDRZieaNVJYUVWFheJ7dd8JVmtlD1feUSOGQavfzO\/m5tVp1Fsy+rX2fOAVuYmUv9J5evPv6G1+edvnIxNGvPw6ViDW54IVicdF5fKvjTTxu39lRWBPX3zTKIJioUXK6XUpY2Gm0SiPPzJ4nComEd7rXJggM6QEzWfDYOi6ZmIiGkSFu8kJOqsVS5iOW74pzH5I6CjFjiG42meUKvVEA+lRTXfg2HRCD0L80c+bgqsG3+zOsa0s0LvMyLxOLy0gVyx+j2q7sehieE9oaZL\/jvTYkCUgc7mWriJPwY+LwtkbLQkUgGt0hO9UjsERxUFUQmv1oJIuVa2alT1JrJ3IxndyNcj5au8x1s3dxfk0ihuEoH855mxy7YlY4w95qZ1AmToykbtNMQm7AmvyxFxo\/Z+EsBVY1GRZUCogjV4X5alFK763IHTqUInV23RIpA0gQld1+0BO\/5sVPcEz6pHdkySNmTsuh6ZVZ7K+vlb3TKbUBbAEN9HVpfwFfYcmNvT61I8mNbHER+s20zBIXF0fMsEe81XtaPr6hQ3KUVJtHs3MnEOUhRillSi2T\/mWIe8pZ8VMDnjv1jCK5dLKjXsrk7y6r6zcqkAPwIsHXdw7Gwn\/\/iR2CCouxKGmdA5Gm52+XbzvDRKBC3VsjjjAEGpiroau5Of6Bf7zHM981mNzzQCX4mGGlF9gRvZoiUs6\/hRiVvs+vuz76pvlVKoR7nd8RTuMOSudDA2m5yrj5BHIp1khwuXK5Lg\/8M3yECoXgfvXwG+1JyLOXOAMTnh8FEReVnucIrhEv1FHXBgrvO8zZA6PLYQdl4CXmZyu0HDOFOUpQOuQ\/iwso58UEUlNbalJsv\/z2ZyRBHs8NGfQFuiBZFxNhP5mwb3OutxbnRiF2XFRQdjtgT3ahuakEZImx9vCWvh8JCKVMmwPkAOxcgRsK8eCFjxhy5Ir0emZ12VJMH2p5Fzn0KJm32kr2OdhzBK6Vhz1Myv\/KvCRgNlfOIo3yCN3VghCqCem0R157wA4IRcbnIOrcfWosETrD\/oj+FLYcBkiNtLn1nBD8ANGYAs+1EO+Pf8HGEtBf78NQKf0sIvWun2J9FDJnRHXxlvmVJ5ZBUZ5wK68DkKGE7TtBItKBqkSR+zfaN8QyNkzWfAXuNVorbWDQvAhVV0wsl4jlPoXlaX645qE+8CVrntOIBj4dQHp5G7K5zDL0mM3EYiT+KJ6IqABGuIA7kS7e6T61Xu6xZW+3IgUBfO0oW+BGo+tTJDvsCAz8tTIT8fzVmh0cslSEb1z9TIfeKSsF\/F2PBMnwW8tTUiJVy3VnY3El8sH7UpFac7abv9SuYelV1CGtWXP\/bfayrVxk1YF6Hr1yySwpQ2m4iQ\/i41epRUpZwdSe9O1TqAhx0KAoziyQL5Ey0LR0q9Ibc3eTemZYZ6pNx3Dxh8suwZiTg6oADHCbkq0mhthLTYihpKbmpIdUpH8waOZ\/b7bRhJMFdEckkQQ2gircnRM0keF1ZIUKH9Me7HWg2+XnbUtegjgb0cmlXCwCZjIh7CFNYluGjds6WxJJOvAXl4Rcf\/0NBeOFFA7brsAsjlag9Hjo80KZh2ce9StkzFuyUpIdc0xb33sTXncPFOQDNxUpkkjodqZNns9YihiYGOuR86qfSUg0oO8IE\/ovhpKGnAn+AvQLg8k9yca4OyfnKNtFigUo4XO2Q0pA05EhbAm6htG+CqMaxRTYqt8uj4T7OVEfG5D46P4Bn8JYJz2wLZSCVEUU62HVCiqwOEWH0jQPb+9mrPfdBKdj0mk+3cvyayt7vIGudBZ2IkUnWCSr6F9P8j5a8QzLIwY6PwPdT4z7Erhq4dSUWIiI3WOwYBdzMCF0q0IxhTvzalcEUnXa9AB3TlEimuP3+qNlEgTE3hk0jJmNSFXaooHZXbnlpPk0RkqshzgkGXj63SAzYs+e8dYbRJi5kaDXooSY1PpTfdXkm86piEnTe9Dl14pvOmXkoYs66NzULfkIqYnZVwGM0c0gfsgC188HSYwbWwVe4l8fom2+1wm9FTIuQpmpDHVTz12qEP4l4vrJ3que4\/ZweE7uA34QiRn8W8WE7WY\/2ZqOTFKTFLpAviRo5UDIpMiEtTl0MUzKwvxOQhCse6uuhIqrMZtdQZP0GPSo6+WG+kAkGXjyIjvUdc2mgAEh2HCNECXT8iO3lIGH4eNL7E9RvDzPy1IPwjUbeuR\/SfoaZ3QMWbQMU4vZ1gbTZ8Idex9qkp49jXgBjL8SGBAgotHTKqjpvE6GVJTGaz60gWKlHKShRdKF0oOLl+vsmAKqPPRNN\/l7usJ0tN1G4T9oSKeCP6AnGK86bZQbsuK1laBBHG6aD"}';
    $k=     json_decode($d,true);


    $key= '8d84363959c2139c';
    $iv= 'ff8e70d9162b4b50';
         $post        =  $this->fingpayrnfiapi->decryptbody($k['body'],$key,$iv);

        print_r($post);
        die;
 $d1=       '{
	"token":"808B31E22610AF6077468B9E975521D6",
	"latitude":"28.364",
	"longitude":"28.536",
	"mobilenumber":"7788799799",
	"adhaarnumber":"697970880778",
	"accessmodetype":"APP",
	"nationalbankidentification":"607064",
	"requestremarks":"Uzfsjgd",
	"referenceno":"163396515892947",
	"data":"<PidData>\n   <Data type=\"X\">MjAyMS0xMC0xMVQyMDo1MzoyNCZqYf7+pbkK99fc1sHtSBWc2v1G0MmeasMb9Gzg4S4Cez+9iO0RzztdvmFcpEUpLVkOo\/OyGWNZU8+i5U\/3vGLf98upKdxvI\/xi7jsmYCAwwQDMdMjvAyWMZaiiu2hnQ6om1ODfHhfXXWYpua2Xmj86cJMkKy1TrOSW1E27vaxZtnGKr\/Yl34\/avRrd8q3QMcoE+3beKq9zhMocOc5EJqT6P+eCnI\/hjl+DsDaF9MBhU\/rwO5XjMWM0uRNqwaVpaHJGtVQxy2b933qn5mRojkfMnULxLhavz8uPpooSx0KMOo9q3qmGx+576vxjJ1okK3BJTtclKXU1bYOkQtZmGXu69CzxlVdik1R9tH+lZasQ0Bs+AZnf+OpidCV6n\/WXWr+tZAnjpolbLYK+\/KxegaGjzIQkDAmrY3Q5UJjJlWD2Xpbn3ufVSKlD\/oRYNh73vZavo8wDyjLX0QABXrVyZqpxBlnsCs9m5YHQdGXKUS6GCE+8\/SmYsBk\/hvNMltDFC8XWT8rqvYWiKWhRyWEx+p0\/xgqUFlNdzFpEDEVIcg84jtbJTQRe6fhsnwz2q9Tt\/zDM0c6w5vJPUzKywzT07An+uDKt\/GLLJmhmVhIDA4U7h3xHMoEsizCidXSc5CjiHC+yyhc0bsj4rascpm+ibQyNk0Tu3LxcE9ADSF8HBpB2e4FePlxoDhhHsZeoTKMhcjztYeYwd9O2ydZPg3WOZ\/FAao\/Dlt627u5ChSujOdNk7xcaFoapXHV5FwfniS1bcJfQ6rTtyJJ1GUhJqBkNTaL9PnEXuCpCzfYu6OzFMS6zNYMIhl9VHaF7IxSGozoYS4d0W02ahrq4Rb61J9gZQ5iWb1CBBEA6X1vUd6aHzrnxxnPkHV7aaNxjy8V7W1ybhIbVHkARIgsL4rmZMNZAvjsZ9usZdB7Zf2\/7LtoF7dHwSVqSKPLYMOUeh6T3BJEVrgrLeCGWS\/lEZ8D1JqYYnYoRTvWLWDYV0myvwcZwZL\/VZ1fUYLhbOAbWNxvaVy6k+NiY6hRt5oXCO0mRG\/dmgzmEArKc6TpHaoWlkH0xWCuumwsdgkoFkft2+RLylmTfbhucn9NMDTZa4LVYqBHfEnyLrDDnstyxCKrhqE2dgmUkVEviSo+eTKnrzBTSsahAMJM=<\/Data>\n   <DeviceInfo dc=\"bf8035b0-71ac-4712-85e7-80a2709b4dcc\" dpId=\"MANTRA.MSIPL\" mc=\"MIIEGjCCAwKgAwIBAgIGAXxvrQAiMA0GCSqGSIb3DQEBCwUAMIHqMSowKAYDVQQDEyFEUyBNYW50cmEgU29mdGVjaCBJbmRpYSBQdnQgTHRkIDcxQzBBBgNVBDMTOkIgMjAzIFNoYXBhdGggSGV4YSBvcHBvc2l0ZSBHdWphcmF0IEhpZ2ggQ291cnQgUyBHIEhpZ2h3YXkxEjAQBgNVBAkTCUFobWVkYWJhZDEQMA4GA1UECBMHR3VqYXJhdDEdMBsGA1UECxMUVGVjaG5pY2FsIERlcGFydG1lbnQxJTAjBgNVBAoTHE1hbnRyYSBTb2Z0ZWNoIEluZGlhIFB2dCBMdGQxCzAJBgNVBAYTAklOMB4XDTIxMTAxMTEzNTEyMloXDTIxMTExMDE0MDYyMVowgbAxJDAiBgkqhkiG9w0BCQEWFXN1cHBvcnRAbWFudHJhdGVjLmNvbTELMAkGA1UEBhMCSU4xEDAOBgNVBAgTB0dVSkFSQVQxEjAQBgNVBAcTCUFITUVEQUJBRDEOMAwGA1UEChMFTVNJUEwxHjAcBgNVBAsTFUJpb21ldHJpYyBNYW51ZmFjdHVyZTElMCMGA1UEAxMcTWFudHJhIFNvZnRlY2ggSW5kaWEgUHZ0IEx0ZDCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBANG7EcXvNUjIteJHGFBvFUWbRuCPPojytOZrdzeoKdMbaRCmkLM9Yf+4n6x836v56md+eL8Yuf7uIAhnH3IjUi85wSz4AoAdJ3nC41l6zpk2S+gcl5o\/hX0xJvPjU7KsEAw0Z4FCvm0jUjqKe+GRgcmMY0Yucff9bv2lZbKECE6GC7thBShGZMPt5BKauuOIey5bXmBW6X3maqZ3Q9JPFhPKbV5DBRYPf3aKJWuguryKpD\/vbZzdiVkjqRXCjddo3GvukhI6ZEewQP4OzOZ4NY3RxuzcHfhPpAJbNIYL9IQ\/QtJOq136w2t8dQCH9\/8SLVxysMDAwFRBb0jqcE\/iivMCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAGm\/H1KHZDrEXbkaTYc2Gq0biQIzpQzYbGgGTPgaSrdTavGn9INA2CqwN5R9YfIODHeztEdWbI+SgFssq79NoVpJS4BfLjtxchEzj1UMy6N6dY5faULRTrYtm0A5YTzqpQUzyYZ2lZ4i0CgFiVScDQeQEQ7mIhFCyRgMOiJJlYsHfsA+OvySI2GGOG6HYRZn0Gpx9wfjeRA1SpdS88QUpkoLxgUEmOUGDL6LU1s3wVnuxTC5GYlc\/EEVlOmCsR9WEqPUsHY+4P0jgrPnk\/GASQbCN7F3jzMLRh89\/ZOsbnLpnPkUvBbDu9Eeq+luWdHfm7AxHTH5B641bmbNRLtvW9w==\" mi=\"MFS100\" rdsId=\"MANTRA.AND.001\" rdsVer=\"1.0.5\">\n      <additional_info>\n         <Param name=\"srno\" value=\"3268933\"\/>\n         <Param name=\"sysid\" value=\"0b04db34ea664671\"\/>\n         <Param name=\"ts\" value=\"2021-10-11T20:53:27+05:30\"\/>\n      <\/additional_info>\n   <\/DeviceInfo>\n   <Hmac>wBIFaLngaGkYPnGqKyKDQOhbaYwmBu8sKUJT6as23aAzDnigJrML68CCIxzYAWuE<\/Hmac>\n   <Resp errCode=\"0\" errInfo=\"Capture Success\" fCount=\"1\" fType=\"0\" iCount=\"0\" iType=\"0\" nmPoints=\"31\" pCount=\"0\" pType=\"0\" qScore=\"72\"\/>\n   <Skey ci=\"20221021\">GkKv2EKdzT4pEDE+BdOgUsOAzA+9aG980nSLPNPu\/d7iwt0z2KhUAdyuJsCm\/ZmKlZNXtPvZ+sHbpvzl\/QI85pOYJtr3SnBDh5O8TBoV3OjazmH5DDcKiVJwRfs\/LKAgz8ObOvwdIunHyIElLGl5N9MYxZBuIpdmBJXMvs9\/TDIbgjLqhXrrC3i+Z4bR5rFxO1bU5b+LyHYF4OZ8VHhZeNn0TlmFl\/OLM9r65nzx9mlFthYkd1mNMDovKK4JaNQh8JUDgIqJCA0vvhEhCoaAvDbkgyNWw2cEST\/BZXl227g10+XgoUYeaJ+6BuN2h3eyNlROJIKyeilQx4RF9RBOVQ==<\/Skey>\n<\/PidData>",
	"pipe":"bank1"
}';

  $decode        =    json_decode($d1,true);
        print_r($decode);
        die;

 // $d=  '{"latitude":"28.594131","longitude":"77.307737","mobilenumber":"7389609708","submerchantid":"PS20176746-VIVRS","adhaarnumber":"246477973896","nationalbankidentification":"607152","timestamp":"2021-10-06 13:17:07","requestremarks":"Balance Enquiry from this:7389609708","transcationtype":"BE","data":"\u003CPidData\u003E\n   \u003CData type=\"X\"\u003EMjAyMS0xMC0wNlQxMzoxNzowMGzkk7uJnvgRFgrolauH0rBqOlHocavVfaYBaAoQnrkNQD3Fz+6cnSANjkdk1b3SS7j+GPnV1v+EdIISsIriiek0wJcaIG1nAcHbXfddN+NG2I2ipoQ5hyNkLW\/hkkoNa4hSxppOOa\/hJYyxt4dn4p0kWZ4PRULhl\/kKcex0iqFbtJfjevSAnWK9Q7I22AWOgiGGjx4Zo04a\/t38KWObWXUSkufCDGcVL2o6do2CHCFpRr\/36pXuNDM9+vRlVZ4LbQho\/T1jG62DvedEB7WjF0KtsTTV796gcvl97amY6whTE6He6XcxwkAsJaF++BI\/Xj2Fg8zCfztxajaNVXghfDLNdEfowz\/xgI0Mvffvs\/ZQPrXRAckXw869ogPoBNQtMXpx2Hxd4kXjECKu3mNaPFNG5rFAqbT5twgEF2ssHRga1xhUjBQ+4zXD3b5fJS+BQDLSi+6JL3TjzXmexiNrrTbl8A1+UKLJYeuf\/ex0dQWi4RSIkL8xffRjVEJNsq+47aOM58zfsRWUHY4IsBBZSUXHqY0yNugLzH6rFOcpeIIQI\/iLn84CgHGZH6\/13fPHfMVVQsHVBnAJFEq34K2hSkKLsRRY8ObZtHlj37AVLG2X4wSteU6a4gjb\/hRCLzVbXz6eyP0tE5v7AEVFgYsnS76nEVltzeguiXxNZ8rDoRn67cQ2hFcWIXfNbPyjZbxJNeIJ1VtucN03Nros8KAZ9BcNMU82qEoVmT4DBzFKk3YJ5j2FISzCf003PjT489wG5ekB9PvJbN1OpBBBBGQUh2xNAIg\/ctnO9AD+CC4dvw9Uy+TaOwteKgS7Vaauvbw9V3MHDWAXiBRQdOTmk+H1NP9v+cCeWvs4GPRaLgmAUrsDQvn4nljgakcL\/0hQmdaLZQ1uwFDfPAFO9iNR+maQtJfZpXQDdS6RuB6UmGC0Ji6zYAYpUHQB+ci84g9ugpoPxNnRHQXfWUOcAtP42aQFDPptF9ywHlcbpc42dcDHZ\/WgdyViswJDrG7xzrPIjp8n1L25bNnl\u003C\/Data\u003E\n   \u003CDeviceInfo dc=\"798bfc6f-5ebb-47cd-b804-cb8537b870d3\" dpId=\"MANTRA.MSIPL\" mc=\"MIIEGjCCAwKgAwIBAgIGAXvu8gbXMA0GCSqGSIb3DQEBCwUAMIHqMSowKAYDVQQDEyFEUyBNYW50cmEgU29mdGVjaCBJbmRpYSBQdnQgTHRkIDcxQzBBBgNVBDMTOkIgMjAzIFNoYXBhdGggSGV4YSBvcHBvc2l0ZSBHdWphcmF0IEhpZ2ggQ291cnQgUyBHIEhpZ2h3YXkxEjAQBgNVBAkTCUFobWVkYWJhZDEQMA4GA1UECBMHR3VqYXJhdDEdMBsGA1UECxMUVGVjaG5pY2FsIERlcGFydG1lbnQxJTAjBgNVBAoTHE1hbnRyYSBTb2Z0ZWNoIEluZGlhIFB2dCBMdGQxCzAJBgNVBAYTAklOMB4XDTIxMTAwNDExMTYwNFoXDTIxMTAxNjE0MTA0M1owgbAxJTAjBgNVBAMTHE1hbnRyYSBTb2Z0ZWNoIEluZGlhIFB2dCBMdGQxHjAcBgNVBAsTFUJpb21ldHJpYyBNYW51ZmFjdHVyZTEOMAwGA1UEChMFTVNJUEwxEjAQBgNVBAcTCUFITUVEQUJBRDEQMA4GA1UECBMHR1VKQVJBVDELMAkGA1UEBhMCSU4xJDAiBgkqhkiG9w0BCQEWFXN1cHBvcnRAbWFudHJhdGVjLmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAJ8EFb+cA3MxLsqArbOI68XCNXozVf1b+mSR0Am7gwjeeZqTzCfr6hQI\/ikLnknwkllg164gcFzbfOVlOI\/qpSmBKXRxB7tfd37s5Y+P1woCOHrsPag48COpWuFghctWLcTxuWLdzwaRRdTuFuLU4aP1DXahx2XTA6Lp3Vf4GWxeLsD9bCs0E7TTkyLG4FC014Zwvwcm2cf+8JxVCd6o7dVqh4XP8qV2AL6EhReNo932iEDEGnidHYNHzRDD9bZOZRAImO4xf7GjZXRS0sdGha4xmMMTC6FfxNUUE1oMsJW7t9AYvRglQcbhSRycqulqkFo2PJF1mTkbqn+SVYoaoVUCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEADTB5SPCM3i+qlCRmoEifUvHn\/Jku4KbqzhJneBugJrji3HbRFZeRUoMcYV0Y5YNlGC203hwQG8dtypV3TFOAgRsNOEyhygf\/XCbrGrULrT3cXJHKlmshWOdnE8NPLOGCOTaC\/K8vTrSuq6CGlMdnIs91uIY0CncmL813thtWOUliyGqE1bchDFihyiHNtiGfO65aeFlOtF0zXVMYFzEiUZCbeju+Xwphsh+gSmIoey+3dRRb0kKH323q9RXqv68Jgk2L20W0byZOmhAE4VZqfvra9tWgRBrWaIaCP1feOLNccDFDJCN7XkpxaHd9vw8SPCcTlDFGK25fEklCFPgkDQ==\" mi=\"MFS100\" rdsId=\"MANTRA.AND.001\" rdsVer=\"1.0.5\"\u003E\n      \u003Cadditional_info\u003E\n         \u003CParam name=\"srno\" value=\"2540939\"\/\u003E\n         \u003CParam name=\"sysid\" value=\"8216b9193a493c4c\"\/\u003E\n         \u003CParam name=\"ts\" value=\"2021-10-06T13:17:05+05:30\"\/\u003E\n      \u003C\/additional_info\u003E\n   \u003C\/DeviceInfo\u003E\n   \u003CHmac\u003E8YT\/pPqUC0XlnliuisXI3jxLT\/dZOgvbJYYEX1V7ZMAVPSquuZfBIMMshTW70rhn\u003C\/Hmac\u003E\n   \u003CResp errCode=\"0\" errInfo=\"Capture Success\" fCount=\"1\" fType=\"0\" iCount=\"0\" iType=\"0\" nmPoints=\"26\" pCount=\"0\" pType=\"0\" qScore=\"66\"\/\u003E\n   \u003CSkey ci=\"20221021\"\u003EKhgUYvvSOCRU+TBRN0fZjDzCxtX5WXqkbd+DZBMy69q3rFb8Yto3UMReeUnKtOHLa\/lfDDOvJBUCE\/mJa\/xdxZpw6zgCbuUA6s0QQDDsW4gEdSHB6leIFsqNCgN6r5QLetb\/1NgceH53QdUmaEebLadsPaYzlKnLA0tkdNWrqqkdoaGGs7yYIZT5BOHkTvsgdxrQ1L\/1\/rbOwaxj\/4QqpYpD68bPWoQWrzPMfpWLXXxZTu6rdMN+WCMVtbWXevvC\/yR+YOnq7k\/x+y\/ubAjtcbEUxZAJsdouY7wWoe21vL108mlEHgrurxW5wWcvABnAAXScv20fk4WGHpj1TIEXdA==\u003C\/Skey\u003E\n\u003C\/PidData\u003E","accessmodetype":"APP","merchantTranId":"PBE1365","devicetype":"false"}';
 // $d='{"data":"\u003CPidData\u003E\n   \u003CData type=\"X\"\u003EMjAyMS0xMC0xMVQxODoxMToyMJwO0ueZgQIzTqy5+abq8hFwjzQCAiEqg75mhQaPQTj61gZL\/Ju0CC7T0p1Zzg\/gPemYS46M1wOnwiUGCSC+gw4QNy0yRu2M1vilScGtIBXs07P0KdOTjFtHVDD6NNNpA+fO6kl1xOX68\/tmOCWvZynsRILbarTnHzOOn8JTxJPg0Hm94blIj6w\/KhRosbBJ2on1qQV3yy+2y6Wkr4a\/QUjej370JX96hQG02i8etzfrPuln1\/dihAqkrS1dFRLrmmpwR2EGukFGYMUx7xCz3iPlgNuGi8prYiSRXxujqq+ogtExYBbCz55Dj4ffFKsaS0sBe8zsXayO03+AB5vZqDrP2TQ3+iVukh6o2HGgrEDkjkrNov2RNHjjMyDlhkdKly2EkMbh78EjoObWf1kL\/Ta6d255N+EIvKWIU5DEniWXu5Y8sBweI3TeMd7502qmWZ0McgXhRVJsu2DF0TsZ\/NF0lleVePQsVOKwN9j4kJCLq2+WietZ6Um8FZpEpOshBP70+G3qZbZDy5ayNpfNIgrPZqO5QQFMpB5b7dVaik9WfoKmqp3Xv7yWuYMOnvHL1CoWIEIQk3Tn0+GeLVAe2yqRmSqurmFX5+moIwFAOuH18rwIQBwnbwbLtBmIZs+RIuYbTMlXgNtCP7sZHdQspu5hEEFv8KG53BQFeymzt2F369OQlE9VAZw33pEz4Y+B1bQsTJWrUZUzyo38hWX6gQx269jUc1vSUbUgSIRCCEAIHsST2OhkbEl7vD+uyK8frZ7yvc9JvLUKGULtRMRcpb0Qk4Ffxhzih233yAYQbM+WuUj+QdZzhhBNimrXJR\/4L9Nrz9LTGSRifRP5fCgzt1gcUDK+JJ8cEdzywZaK1NQQuVVnnTBmEROHwkUgAyzd9ejg730f3GUVhkJzL9paORPF5tkMB6D9g5G35LR2LYbtZu3d5PC6i7EojHPHudVwhzWQBRqHFs8Ivla0yjA89AZ1u4D\/JdBel2kTuzb82BcugAOAxk+jloPcFaHR5OWPGM9uY7t0UJQ4UnCj6pKCRjLCU6IfBq4MIog26CXkbPitGcRVVq7nfpXJd8sTJg==\u003C\/Data\u003E\n   \u003CDeviceInfo dc=\"c6131219-9bcd-416e-827a-7fdbd715ddb1\" dpId=\"MANTRA.MSIPL\" mc=\"MIIEGjCCAwKgAwIBAgIGAXxvU5R3MA0GCSqGSIb3DQEBCwUAMIHqMSowKAYDVQQDEyFEUyBNYW50cmEgU29mdGVjaCBJbmRpYSBQdnQgTHRkIDcxQzBBBgNVBDMTOkIgMjAzIFNoYXBhdGggSGV4YSBvcHBvc2l0ZSBHdWphcmF0IEhpZ2ggQ291cnQgUyBHIEhpZ2h3YXkxEjAQBgNVBAkTCUFobWVkYWJhZDEQMA4GA1UECBMHR3VqYXJhdDEdMBsGA1UECxMUVGVjaG5pY2FsIERlcGFydG1lbnQxJTAjBgNVBAoTHE1hbnRyYSBTb2Z0ZWNoIEluZGlhIFB2dCBMdGQxCzAJBgNVBAYTAklOMB4XDTIxMTAxMTEyMTM0MVoXDTIxMTExMDEyMjg0MFowgbAxJDAiBgkqhkiG9w0BCQEWFXN1cHBvcnRAbWFudHJhdGVjLmNvbTELMAkGA1UEBhMCSU4xEDAOBgNVBAgTB0dVSkFSQVQxEjAQBgNVBAcTCUFITUVEQUJBRDEOMAwGA1UEChMFTVNJUEwxHjAcBgNVBAsTFUJpb21ldHJpYyBNYW51ZmFjdHVyZTElMCMGA1UEAxMcTWFudHJhIFNvZnRlY2ggSW5kaWEgUHZ0IEx0ZDCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAKW3F80dqKGeHVlBPIaqxjrHlRjTty7\/+bylq28USL04Scet9WzJWc1jdDn9TUQbO1wQ5Md8Uyj\/L+LoxwVDlWYIQIRVt4+fX3pL4oi4LatVQJW\/PwgfMNy4SdPav4I\/Vv8o5E6lgaLzXBOHbqAxACIhUtMnqiOdn1FWinxOw9ZBHxV1LHn\/zdLvdSnFtFogAhp+ouO2Vf43f7WKoS6EW+zeAczNF\/bqVYu4DkL\/UTzq0KiyN+vs1yVI4sQl+bJ9NY+OxMjUZIPrshcaGCvf\/SkbuGx0cokqQvvUlV5A7srVFl24vDn7HLTgbufbybIZifqNK4WwUP8fUJQM7Wh4WusCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAnBBWGXeKuPZprVyl2Az94V0XVW1JKnT1tP8HKsmmb3scLEJpQyMu7WJYAf\/AJB9yksF\/hDey3QtDMFR04Htzn1fz+D9tNks44AuMylXnLZalXoQZs4BYhBGUD0n95MYTPR7yoDVv4kMxxymDRoUXSFHjQzJtgHVvf9Z8co24+GZTP\/6DZR0ACOInPAUPhj\/cEzgRUg\/y6N+KY80XbNTpjcYMCaKWeuDRsrxee+zY8w+13gvBNJmEfZSowPSH6bwQn7\/XJc4SAgMNz9GpOWJVv+kRlYvt5ellE8w9gpMtmntxA4+7gWBRsiCykys0vCf9IigRY65o6DNAxiyCbVStUA==\" mi=\"MFS100\" rdsId=\"MANTRA.AND.001\" rdsVer=\"1.0.5\"\u003E\n      \u003Cadditional_info\u003E\n         \u003CParam name=\"srno\" value=\"4134827\"\/\u003E\n         \u003CParam name=\"sysid\" value=\"a4cd4c097e7c67eb\"\/\u003E\n         \u003CParam name=\"ts\" value=\"2021-10-11T18:11:23+05:30\"\/\u003E\n      \u003C\/additional_info\u003E\n   \u003C\/DeviceInfo\u003E\n   \u003CHmac\u003EgAaw7LjQXNKae6rz5lK92nUM8vIZYP1HEqE+QSlU\/madw47w4UvXR\/PiodTgQ0ht\u003C\/Hmac\u003E\n   \u003CResp errCode=\"0\" errInfo=\"Capture Success\" fCount=\"1\" fType=\"0\" iCount=\"0\" iType=\"0\" nmPoints=\"31\" pCount=\"0\" pType=\"0\" qScore=\"70\"\/\u003E\n   \u003CSkey ci=\"20221021\"\u003EbYcgwkYoYL7AyVtQcp0TPX4F+27LAN8JDGP8pRDUhZIbFctXP\/hianxYikFUTB23L1JS7WG+L9agQJzxWwp6MWRnTK4oA4BfWn3sWLKJISgI7O7\/8IrXqlPKzAGiF409v2ofqKDvJm+iJ\/gUbtOZzJ+7yWFUBmpaelurpKwjweQabkMHQKSjT8+ZEFF\/VImylDXdT8N6bQGedbP5WZR4HtbYsK6Q1pn8BOXaFKTcdLm089k6Rzutvy2ucJN0a4xetcD+cp1K4bGvwvEpP2S067fQBys264uuzvUJKjMVshpTWmiKTtnxdxBs2SpRTllzT7bGFWgXN7DSjQ\/zAiLMtw==\u003C\/Skey\u003E\n\u003C\/PidData\u003E"}';
 // $d='{"data":"\u003CPidData\u003E\n   \u003CData type=\"X\"\u003EMjAyMS0xMC0xMVQxNjozNjo0MQK\/6m7X99fxdaO+xn0YMiTrNZCOvMXgquuYGH0AOTYof3aJFhGfp3XuU+xvpm+WB6H50FWXpq\/R8vaqJvG8YgEWWkzO+65Sjq4fVI+gQdy2m5k6OV5\/P8kOBdn7w0lIjb2FHMajKTF6Edq1pKCvyptrF+h09tkkWi3YqbpQT6KnRRjpzhKy0lzscVfaNuiSzOHiMhIP+O0Df3c01Mpb\/RyAoO+9EjoUjTowqBN548GEVglH6R3+F42rbZbxtPxQVIzloXM\/bIh8CFlxv1lbNwhbpE1X0oWl3DTvmkwUxHPfVtkdyaVpftTbq3JBPjxts1rEKGbby88KmP3LJ\/L483kOVxo6\/yv82kux2xLPcU1spzDr5TYCjvfUMPkkdIlysIMc5H9PWnOf8BCj+AnzBVfD3Ypiv4Bz\/7phWImFddfDrkjaBLX+Dqa3HxM+iJ2ztd+oQYJkduprtAfB7bguCanJq3LlflWNI71apkh2zmMuKHvptaXoJ554PLD13LRbaFA1q038\/iUtQLvhuugr2jCCq0Rqvt28jgP4oAOZfo0KNmXDqOfXEFR9JGfNB9Zjj08zYy+G06aur0xpIM2C8gxbUbZUyaVvx2Ea3Ei8xeYXTfwGNeeJg\/G1KtTxj2rDRywOOSsZuwglNGJjUZHIb8gYYRijY4kKiEQWqzHD8gqp2xLlnAgq6CVLDEFZR+kmoVq\/Ta9v8siRY3rgTh15zuLglAdtwlglnUye3fuuv2X84x1vxPQqAYiP9Zu\/XWSy1Z05s0ueRetrHVUBhUmP7lswHBVEj8nPk99sHxd0dgPn6sBk1XxT\/Y7tnYxZndDEWRAEAoqeXI\/BmXtc1g5+0xkeyxrYoNqMkN809TsNZvqs6xHu7Uulsyz9VpZ8EGHNj96TDiEi9rwsvF75nnbmfMuYPRFBBPQmqgFJ55lGqtWC56hR66tt0CZX2ioiNtUuUQJNBU2us9T4C8gC8nEsB8XP6JIkX0Ov8Pwxg5n8p0c8TBoWo5+HjD8nwwR+4jDtfF1Grfi9IHUqXKcr9AnikEbI7WoABWwGUyU\/TS+dlmJzznzu1+JBwIjD3JerTxjAZiKnOM09modYUSCGA5bkEI\/WuyITz0bmoXalarvZHhZ\/JrCEIsmbAVZCooF5JjweEUrVVGR2jpI4+7mUlN+rdS6mE8ACOrd\/V2tKyIJtL+5gQw==\u003C\/Data\u003E\n   \u003CDeviceInfo dc=\"bf8035b0-71ac-4712-85e7-80a2709b4dcc\" dpId=\"MANTRA.MSIPL\" mc=\"MIIEGjCCAwKgAwIBAgIGAXxu4e7mMA0GCSqGSIb3DQEBCwUAMIHqMSowKAYDVQQDEyFEUyBNYW50cmEgU29mdGVjaCBJbmRpYSBQdnQgTHRkIDcxQzBBBgNVBDMTOkIgMjAzIFNoYXBhdGggSGV4YSBvcHBvc2l0ZSBHdWphcmF0IEhpZ2ggQ291cnQgUyBHIEhpZ2h3YXkxEjAQBgNVBAkTCUFobWVkYWJhZDEQMA4GA1UECBMHR3VqYXJhdDEdMBsGA1UECxMUVGVjaG5pY2FsIERlcGFydG1lbnQxJTAjBgNVBAoTHE1hbnRyYSBTb2Z0ZWNoIEluZGlhIFB2dCBMdGQxCzAJBgNVBAYTAklOMB4XDTIxMTAxMTEwMDkzNFoXDTIxMTExMDEwMjQzMlowgbAxJDAiBgkqhkiG9w0BCQEWFXN1cHBvcnRAbWFudHJhdGVjLmNvbTELMAkGA1UEBhMCSU4xEDAOBgNVBAgTB0dVSkFSQVQxEjAQBgNVBAcTCUFITUVEQUJBRDEOMAwGA1UEChMFTVNJUEwxHjAcBgNVBAsTFUJpb21ldHJpYyBNYW51ZmFjdHVyZTElMCMGA1UEAxMcTWFudHJhIFNvZnRlY2ggSW5kaWEgUHZ0IEx0ZDCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAJlmPvC90IgWzzwG\/9H+0T6sU\/a5aGte5VnSk0iVnPRg0+nx5KvJZGgSnMKobQvnINF3PaG4xaG7iA3H6QzSMlCCgodm1c8sGHS+A29QHg7skYXTJqDm+pohuZtby6ZIMjE8uZSn5RBYXrrXIqRXL572rAwuwPtQPeJsqw2nJvFix1BiVmgJvuqIeex3RGLFh1Ya0EpONvmruDnCRM0s7XqLBr0ztm0tiF46MXJWeW51ZAZaafb05cjoeKUQ4o6\/bcRor+5X5uO0BGaJnKc\/I3fCzR+mMp7cNwZJPSDsJ4pGAyS+BR1o3Y9XADFk\/JUwBjZNBv1Z6zfdgUDNV4auuKUCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEARekHwBMJ4rX0sy9Ar8AvgPX9vk\/blh7v0wF5aS8\/M+sQf25OgJNIM30qEUNly+0mPqakJCPR53NWPxw\/14p+1ItHEt31vP0BoS7glrr2UF6fXAZK9g1XIu2mlPyMkXhnsGQwsiwMvy2h\/qtI1KwoAkGF4Lese+Erk7l1wlrMT89o6nPHC5i1aa\/94pJCf39qd53HFid638vVnaQf6rHhy7BR7lS1v\/UTchVVZv+rnxDlC1in\/0KHxup+Vlwa\/w\/sVwawL8V7OJLON57BkilGU4a3ROu4qnaexDrXlHP3E\/HVSmZKFGkgwrzuHwk41G\/E0FiBIwu8liEUcYXrv0qUqw==\" mi=\"MFS100\" rdsId=\"MANTRA.AND.001\" rdsVer=\"1.0.5\"\u003E\n      \u003Cadditional\u003E\n         \u003CParam name=\"srno\" value=\"3268933\"\u003E\n         \u003CParam name=\"sysid\" value=\"fa22c4e5656af584\"\u003E\n         \u003CParam name=\"ts\" value=\"2021-10-11T16:36:44+05:30\"\u003E\n      \u003C\/additional\u003E\n   \u003C\/DeviceInfo\u003E\n   \u003CHmac\u003E2n5wc5u\/t5XOvANjeWK67uuJlVFM6w3UrnXgWqB+0qpSeB\/dq8dshwwApFhdU6Yb\u003C\/Hmac\u003E\n   \u003CResp errCode=\"0\" errInfo=\"Capture Success\" fCount=\"1\" fType=\"0\" iCount=\"0\" iType=\"0\" nmPoints=\"35\" pCount=\"0\" pType=\"0\" qScore=\"95\"\u003E\n   \u003CSkey ci=\"20221021\"\u003Eagdzg6JixBnbvJJbiscVyxstpRTZg+ds1+iTPRUgkn7KwE1KUpsN22uijeRNVL5\/pyvBzLML2i7NreiB\/UvxTL6S2nPKSZpbNoL0Ndyd+3m75UqCRwmgo\/gDidQID0TmaZo45spqeCZTriDTNhDvb+HAZADqK\/H4EhcyzonVgCGbgen9305RoXlvMghXy0TMQNZ6ja\/2RJ3StyPxWeJvwXquXLF9klfKDb\/9kOy4e1bzOmwq2LX\/bjtgMTL+qMEgD6wlNVC7MuNPxS01LfxECe05lcmUJc1eb1nVW26Sp\/ad1gXrq8TIMS1Hy2ZUloYXZpZkamD7rCwHmQKWM1dxnA==\u003C\/Skey\u003E\n\u003C\/PidData\u003E"}';

    //$d='{"token":"808B31E22610AF6077468B9E975521D6","latitude":"28.635","longitude":"26.25","mobilenumber":"8686868686","adhaarnumber":"868686858586","accessmodetype":"APP","nationalbankidentification":"607094","requestremarks":"Jdjgdkg","referenceno":"163396342882111","data":"\u003CPidData\u003E\n   \u003CData type=\"X\"\u003EMjAyMS0xMC0xMVQyMDoxNDowObzpTIkmyuBLnAoiQDNT9bq\/W6kUAFZqGuhwLomaa+yuAjtHlpe3LnU6dNPLrIoyVP1QGiSQgag5XBFBFH90EAgiG6JDAsKfcVNGM+YjUpawYMbFUsh9mGNQYIGy6tyyXCA6L1EJ9TUFm9EMIUBl\/ejlI35As6OP9ZybQ3GBnvkiZhBTGqPJqZZ87+M5FgClclgq1ZpsErDdX9\/Hzl1zN6O8dRTuZz4Teo8wQJ4VQAYXPK0\/x13LKSTZsbA03qjUz\/s2higymf8pQuwxwSRucdf\/FTR1nn8k1XU5eOzmLyJa3MrHpDCwwT6auixI\/w\/JYR7\/nsKILs9j0TjOMoNH0h2Llckv9MunAhLLnXa6\/SgxpwN28hrBeE5ZizV\/qy0r5NuqKq4IFA5Bo4uNa+YPy4IG8LxSk1CKEGrwOyIMZvYAce1glzizC2VIsVgPlGtSl7299QVTZNmvEJQShSUSySiLfjvTs+CiaHQQ7ronTk4hbZG006Fp5cGU2jcoLg3Lw2Qt1azuay1dAMchWDlPoht8heGxOjtIZnwlYHKQyOlEBSY0fKeqXFwy9rpNieeuJ2saT0PtYzLQ8lMKb8rSMs90AEAF50TmPn5pJndQv5UpZo34KjzCMvCSF34ymZpte+Oby0opNl5jmCcWJlTn7TtYZjxdb4hLnvQNGNilfzU6ViMoVMLFGqbyEwdCbfutazhGBF+YTPE6fT5f+\/eg7Gn4mub7A\/aBAIUIBPtJAonXYtOv0ya7BcXWbM8AAo9tLP6+PszL+2qew1dW1DR8Y3oBWCU4s9cmAGM8up+Dq0XW0nzeFIkkN9K5ciIIQJ4BXpomCM8TnAc8claO84tg9gAw81b\/ZZNsLBREAotOzk2QoQCbRC4TeE4YLdDU2Wc6uHr2S5u0Liak59v3cD+dkkjvqP1VknOB17sH0fFlcORaHNy36lMhLQz386chA0O\/AlSw9nCnHloC3tJcGo7GcX84rDQs7Wyzdn28GiKLn\/vmj+dnhKITvM4qjYadLb0sDHmmnBhB+f5oCJbBUCjGLd0mmCqsb9gqti0ZeelUibnS5xCWOE9KeSFSDsAww0aMvZg\/kY7d+HLJxH0xt+ElpxkE9nurddLMIJH4nq17Peuau7a+nYf\/aTDdIYcIslQgAmUtGxwk9O7I\/e1qhV6rIb+r7tLcynQlwn0\/hPc5kXu+EQ==\u003C\/Data\u003E\n   \u003CDeviceInfo dc=\"bf8035b0-71ac-4712-85e7-80a2709b4dcc\" dpId=\"MANTRA.MSIPL\" mc=\"MIIEGjCCAwKgAwIBAgIGAXxvrQAiMA0GCSqGSIb3DQEBCwUAMIHqMSowKAYDVQQDEyFEUyBNYW50cmEgU29mdGVjaCBJbmRpYSBQdnQgTHRkIDcxQzBBBgNVBDMTOkIgMjAzIFNoYXBhdGggSGV4YSBvcHBvc2l0ZSBHdWphcmF0IEhpZ2ggQ291cnQgUyBHIEhpZ2h3YXkxEjAQBgNVBAkTCUFobWVkYWJhZDEQMA4GA1UECBMHR3VqYXJhdDEdMBsGA1UECxMUVGVjaG5pY2FsIERlcGFydG1lbnQxJTAjBgNVBAoTHE1hbnRyYSBTb2Z0ZWNoIEluZGlhIFB2dCBMdGQxCzAJBgNVBAYTAklOMB4XDTIxMTAxMTEzNTEyMloXDTIxMTExMDE0MDYyMVowgbAxJDAiBgkqhkiG9w0BCQEWFXN1cHBvcnRAbWFudHJhdGVjLmNvbTELMAkGA1UEBhMCSU4xEDAOBgNVBAgTB0dVSkFSQVQxEjAQBgNVBAcTCUFITUVEQUJBRDEOMAwGA1UEChMFTVNJUEwxHjAcBgNVBAsTFUJpb21ldHJpYyBNYW51ZmFjdHVyZTElMCMGA1UEAxMcTWFudHJhIFNvZnRlY2ggSW5kaWEgUHZ0IEx0ZDCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBANG7EcXvNUjIteJHGFBvFUWbRuCPPojytOZrdzeoKdMbaRCmkLM9Yf+4n6x836v56md+eL8Yuf7uIAhnH3IjUi85wSz4AoAdJ3nC41l6zpk2S+gcl5o\/hX0xJvPjU7KsEAw0Z4FCvm0jUjqKe+GRgcmMY0Yucff9bv2lZbKECE6GC7thBShGZMPt5BKauuOIey5bXmBW6X3maqZ3Q9JPFhPKbV5DBRYPf3aKJWuguryKpD\/vbZzdiVkjqRXCjddo3GvukhI6ZEewQP4OzOZ4NY3RxuzcHfhPpAJbNIYL9IQ\/QtJOq136w2t8dQCH9\/8SLVxysMDAwFRBb0jqcE\/iivMCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAGm\/H1KHZDrEXbkaTYc2Gq0biQIzpQzYbGgGTPgaSrdTavGn9INA2CqwN5R9YfIODHeztEdWbI+SgFssq79NoVpJS4BfLjtxchEzj1UMy6N6dY5faULRTrYtm0A5YTzqpQUzyYZ2lZ4i0CgFiVScDQeQEQ7mIhFCyRgMOiJJlYsHfsA+OvySI2GGOG6HYRZn0Gpx9wfjeRA1SpdS88QUpkoLxgUEmOUGDL6LU1s3wVnuxTC5GYlc\/EEVlOmCsR9WEqPUsHY+4P0jgrPnk\/GASQbCN7F3jzMLRh89\/ZOsbnLpnPkUvBbDu9Eeq+luWdHfm7AxHTH5B641bmbNRLtvW9w==\" mi=\"MFS100\" rdsId=\"MANTRA.AND.001\" rdsVer=\"1.0.5\"\u003E\n      \u003Cadditional\u003E\n         \u003CParam name=\"srno\" value=\"3268933\"\u003E\n         \u003CParam name=\"sysid\" value=\"0b04db34ea664671\"\u003E\n         \u003CParam name=\"ts\" value=\"2021-10-11T20:14:12+05:30\"\u003E\n      \u003C\/additional\u003E\n   \u003C\/DeviceInfo\u003E\n   \u003CHmac\u003ELML+sXx5+ND55s+AhquXxgpqj66wbsgbY3KtFhKv6PcxwWabcAjbUEZYJwDsgcT4\u003C\/Hmac\u003E\n   \u003CResp errCode=\"0\" errInfo=\"Capture Success\" fCount=\"1\" fType=\"0\" iCount=\"0\" iType=\"0\" nmPoints=\"35\" pCount=\"0\" pType=\"0\" qScore=\"75\"\u003E\n   \u003CSkey ci=\"20221021\"\u003EWFWqQXJNRO44cK5vZrcJOmiZ4k9MyOSLfyfrohsfMswcOKZGzL2boDrOYRU74HNVcj48oCkHnAIEsZHf28X5O86Ev+n0ZBjB092Z\/AJ7RgQtqsTyk5o+hH8CopdNx8hapMW7TU93rMxtZwa5s4ABge5y1rkM6PC4WNs4eXEd17qxkUpu2SgqV1BVCJaxzAiZdNg0V0sl29K8l8kVBDUrnZLtLrnw7IRtkSArxgEnQW1jwMmvmTjQZxoj95xmVLdiTGTmeO2w22wAGPSVvOGgBrq9GoH+oCvlJkxtjQevng2OUENkc05wlBY+GRFMAqYsAPnK0C9GaVpjTwH2C3xBuw==\u003C\/Skey\u003E\n\u003C\/PidData\u003E","pipe":"bank1","submerchantid":"ASBR00150","timestamp":"2021-10-11 08:14:25","ipaddress":"103.212.145.228","transcationtype":"BE"}';

    $d='{"token":"808B31E22610AF6077468B9E975521D6","latitude":"28.364","longitude":"28.536","mobilenumber":"7788799799","adhaarnumber":"697970880778","accessmodetype":"APP","nationalbankidentification":"607064","requestremarks":"Uzfsjgd","referenceno":"163396515892947","data":"\u003CPidData\u003E\n   \u003CData type=\"X\"\u003EMjAyMS0xMC0xMVQyMDo0MzowMf1LQdMPz3zV5Yf648AcT0c2bfKP2S4vownytxyeRSV0+k47k0ufxWzFPqZOE\/eQO23LYWn7FuHACioZwOr8vrMkY6ugGEshClTpNldheArcyO4RQ5psexn3yyztJBUKb73b1hsotSRiEEorxNWvqyNUTE2OGaX\/\/IY7rc0YVh1tRDehaXviSkYuFXau68VcVYfUuGd4Lkmv+Ipn8xArztIzsQZTHcgm4OZRplqBoM2nEzMYT1MAMcdNqqN3JUQAonn2HN7LJ\/DL1v2V+SIStm5d0fhQcxcXc0UMEhtsGf8rJA89Ajl93o56VBSRVSrRRZi9\/GC8aiyjvU4ral\/UJ9MGAg1lhgGtMUt3d1Q\/WuydGkVBNaCQQ0KNov18C3KG587aioRuEiKrqSIVciv6OBLN\/yzT1+EymlwFjLNL0U+6nGpPW1BFRkPy17iultsNGw6pUWDBCbr4p7B5Bb6fapsOjD\/PElGVgsKK7vQLwukxBc6PeYt1paK7QOyKB1SgediVe6R\/joqRm57pcCftV0hg8J9idmo6NkK6v2kLVgc7LG0FcfagJIjOvBVJ9zwLWdtV\/NXf8w8E5H+4wNEbao3uh4V94asgpwI0yqCqoZYQe\/owl7ghgV+KxaGFzB2Aotl+yFJz874uWfbUgrnOn1MPRPjZbumhTMSalaih8YQnC7aXdf1SDVqw81Vq4RoaZtH8QaIyv3cfvyqww0ARQUy1rZtoxPJ6oAnGN+STRptWWgViKAnMZaCaaCdeET4NUcvwi\/8joyzf2so0vNMkj1ooWUoV+Wayc8m7LR1HjdeEbRpXtFT\/imaK+4y7enHqlpUJqKP3SlOh1o+PpMtMpucGVZV5YqD+ldjuPeYWLsCp6oTyH5pQmSQiiMD0u3Y4xVDOve2HqxvxmOg7BEClARgc7rHBxb8kuiYQ1ag1JM8Pr\/+hdKAj6POxjZo8cQDcUYMzhDm4KnbNjAJAdYyDWSbSv0cAToZz1IEacBKXg0sxrDANBcyqw93Dae3NARiRFvplP8xbqWm+yGZE3jvqjZAxdy7KauOxOMPoDoAxc+OSxJxelVL3jiH4q34EIeYK67WlXSC92mWLJ6xbT4q3lZV\/leeIY8D14cV11K5ajUpR8zhrhCwlv7yD2RU76SiLNiVjcPqgI8wPd6L8Z9OiVK31EtjD3AyexE9qwc+bBEmVPjt97TuXR+Et\u003C\/Data\u003E\n   \u003CDeviceInfo dc=\"bf8035b0-71ac-4712-85e7-80a2709b4dcc\" dpId=\"MANTRA.MSIPL\" mc=\"MIIEGjCCAwKgAwIBAgIGAXxvrQAiMA0GCSqGSIb3DQEBCwUAMIHqMSowKAYDVQQDEyFEUyBNYW50cmEgU29mdGVjaCBJbmRpYSBQdnQgTHRkIDcxQzBBBgNVBDMTOkIgMjAzIFNoYXBhdGggSGV4YSBvcHBvc2l0ZSBHdWphcmF0IEhpZ2ggQ291cnQgUyBHIEhpZ2h3YXkxEjAQBgNVBAkTCUFobWVkYWJhZDEQMA4GA1UECBMHR3VqYXJhdDEdMBsGA1UECxMUVGVjaG5pY2FsIERlcGFydG1lbnQxJTAjBgNVBAoTHE1hbnRyYSBTb2Z0ZWNoIEluZGlhIFB2dCBMdGQxCzAJBgNVBAYTAklOMB4XDTIxMTAxMTEzNTEyMloXDTIxMTExMDE0MDYyMVowgbAxJDAiBgkqhkiG9w0BCQEWFXN1cHBvcnRAbWFudHJhdGVjLmNvbTELMAkGA1UEBhMCSU4xEDAOBgNVBAgTB0dVSkFSQVQxEjAQBgNVBAcTCUFITUVEQUJBRDEOMAwGA1UEChMFTVNJUEwxHjAcBgNVBAsTFUJpb21ldHJpYyBNYW51ZmFjdHVyZTElMCMGA1UEAxMcTWFudHJhIFNvZnRlY2ggSW5kaWEgUHZ0IEx0ZDCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBANG7EcXvNUjIteJHGFBvFUWbRuCPPojytOZrdzeoKdMbaRCmkLM9Yf+4n6x836v56md+eL8Yuf7uIAhnH3IjUi85wSz4AoAdJ3nC41l6zpk2S+gcl5o\/hX0xJvPjU7KsEAw0Z4FCvm0jUjqKe+GRgcmMY0Yucff9bv2lZbKECE6GC7thBShGZMPt5BKauuOIey5bXmBW6X3maqZ3Q9JPFhPKbV5DBRYPf3aKJWuguryKpD\/vbZzdiVkjqRXCjddo3GvukhI6ZEewQP4OzOZ4NY3RxuzcHfhPpAJbNIYL9IQ\/QtJOq136w2t8dQCH9\/8SLVxysMDAwFRBb0jqcE\/iivMCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAGm\/H1KHZDrEXbkaTYc2Gq0biQIzpQzYbGgGTPgaSrdTavGn9INA2CqwN5R9YfIODHeztEdWbI+SgFssq79NoVpJS4BfLjtxchEzj1UMy6N6dY5faULRTrYtm0A5YTzqpQUzyYZ2lZ4i0CgFiVScDQeQEQ7mIhFCyRgMOiJJlYsHfsA+OvySI2GGOG6HYRZn0Gpx9wfjeRA1SpdS88QUpkoLxgUEmOUGDL6LU1s3wVnuxTC5GYlc\/EEVlOmCsR9WEqPUsHY+4P0jgrPnk\/GASQbCN7F3jzMLRh89\/ZOsbnLpnPkUvBbDu9Eeq+luWdHfm7AxHTH5B641bmbNRLtvW9w==\" mi=\"MFS100\" rdsId=\"MANTRA.AND.001\" rdsVer=\"1.0.5\"\u003E\n      \u003Cadditional\u003E\n         \u003CParam name=\"srno\" value=\"3268933\"\u003E\n         \u003CParam name=\"sysid\" value=\"0b04db34ea664671\"\u003E\n         \u003CParam name=\"ts\" value=\"2021-10-11T20:43:04+05:30\"\u003E\n      \u003C\/additional\u003E\n   \u003C\/DeviceInfo\u003E\n   \u003CHmac\u003EeAotNp3wmGi\/ydTIMDGZzSRMhsAXXNY+OpnZNj6Y87l8NmDIAwaPbs7iH0vMgzSW\u003C\/Hmac\u003E\n   \u003CResp errCode=\"0\" errInfo=\"Capture Success\" fCount=\"1\" fType=\"0\" iCount=\"0\" iType=\"0\" nmPoints=\"36\" pCount=\"0\" pType=\"0\" qScore=\"94\"\u003E\n   \u003CSkey ci=\"20221021\"\u003EY4AKGb9dPVdv+OQWR8ifiD54Y3XBNEAF4y6Qcwi73I3OOS7NEoToJ+vfu328UPwzMgwYtwBoxa8S\/fc1iszmUwge2h0xqc89ZwzaSt8o1FWOQP1MZQmnQOJO33T8SZcua6pgx2+7gZgvcya6hE4dcfWEghYneckwcmkxPOHrNIamzMl1QS3FxwHyF8CQmZKZzSzhG7UI+pqVopXYHEJdcfK6eEJCGiS3zEYBxVv8nOHrxNHR5FAyCcJijg4mvAe7bP0dQDyEpU4vVTGRsBJs0U0UNFfVm4U67jLJqD6wdFsz3n1kCTSJv3Va6cjKhmDk5qhp2r\/MQTl4I8I9OISPBg==\u003C\/Skey\u003E\n\u003C\/PidData\u003E","pipe":"bank1","submerchantid":"ASBR00150","timestamp":"2021-10-11 08:43:07","ipaddress":"103.212.145.228","transcationtype":"BE"}';

    $request=   json_decode( utf8_encode($d),true);

   print_r($request);
       $requestdat =   json_encode(array("data" => $request['data']));
            $decode        =    json_decode($requestdat, true);
            $d             = new SimpleXMLElement($decode['data']);
            $skeyci        = $d->Skey['ci'];
            $headerarray   = json_decode(json_encode((array)$d), TRUE);
            $sno = '';

            print_r($headerarray);

    }







    public function gettoken(){

        $key = 'UFMwMDEyNGQ2NTliODUzYmViM2I1OWRjMDc2YWNhMTE2M2I1NQ==';
        $iss        =       "PAYSPRINT";
        $partnerId  =      	$this->input->post('partnerId');
        $product    =       'ONBOARD';
        $reqid      =       time();
	    $timestamp  =       time();

		$tokendata	=	array(
                            "iss"       => $iss,
                            "timestamp" => $timestamp,
                            "partnerId"	=> $partnerId,
                            "product"   => $product,
                            "reqid"     => $reqid,
							);

    	$jwttoken	=	$this->validapi->generatetoken($tokendata,$key);
         echo     $jwttoken;
    }
    public function gettoken1(){

		$key = 'UFMwMDEyNGQ2NTliODUzYmViM2I1OWRjMDc2YWNhMTE2M2I1NQ==';
		//$this->db->query("delete from tbl_merchantonboard where id='620'");
		//$this->db->query("delete from tbl_merchantonboard where id='594'");
		//$this->db->query("delete from tbl_merchantonboard where id='621'");
		///$key='UFMwMDEyNGQ2NTliODUzYmViM2I1OWRjMDc2YWNhMTE2M2I1NQ==';
        $iss        =       "PAYSPRINT";
        $partnerId  =      	$this->input->post('partnerId');
        $product    =       'ONBOARD';
        $reqid      =       time();
	    $timestamp  =       time();

		$tokendata	=	array(
                            "iss"       => $iss,
                            "timestamp" => $timestamp,
                            "partnerId"	=> $partnerId,
                            "product"   => $product,
                            "reqid"     => $reqid,
							);
    	$jwttoken	=	$this->validapi->generatetoken($tokendata,$key);
         echo     $jwttoken;
    }

	 public function getmatmtoken(){
		///$key = 'UFMwMDE3NmI1ODJiOTAwMDNiMDQ4MjcxM2VkNmRiMDJmMTlmNDg=';

		$key='UFMwMDEyNGQ2NTliODUzYmViM2I1OWRjMDc2YWNhMTE2M2I1NQ==';
        $iss        =       "PAYSPRINT";
        $partnerId  =      	$this->input->post('partnerId');
        $product    =       'ONBOARD';
        $reqid      =       time();
	    $timestamp  =       time();

		$tokendata	=	array(
                            "iss"       => $iss,
                            "timestamp" => $timestamp,
                            "partnerId"	=> $partnerId,
                            "product"   => $product,
                            "reqid"     => $reqid,
							);
    	$jwttoken	=	$this->validapi->generatetoken($tokendata,$key);
         echo     $jwttoken;
    }

    public function gettokendetail(){

        $key = 'UFMwMDEyNGQ2NTliODUzYmViM2I1OWRjMDc2YWNhMTE2M2I1NQ==';
        $iss        =       "PAYSPRINT";
        $partnerId  =       $this->input->post('partnerId');
        $product    =       'ONBOARD';
        $reqid      =       time();
	    $timestamp  =       time();

		$tokendata	=	array(
                            "iss"       => $iss,
                            "timestamp" => $timestamp,
                            "partnerId"	=> $partnerId,
                            "product"   => $product,
                            "reqid"     => $reqid,
							);

    	$jwttoken	=	$this->validapi->generatetoken($tokendata,$key);
         echo     $jwttoken;
    }

     public function decodedtoken(){
           $this->load->library("Jwt");
         $key ='UFMwMDMwZWM5ZjMzZTRmYjYwZmJlMjhhYmM4YzY3NTk0MmIyZmU=';
    $token='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0aW1lc3RhbXAiOjE2MTQ2Njc3ODgsInBhcnRuZXJJZCI6IlBTMDAzMCIsInJlcWlkIjoiODUyMDg1In0.uoabnh0oL5UJyl0Kw-6rlUs8HiEenF8dmGrgQoKzz-Q';

             $decode	=	$this->jwt->decode($token,$key, array('HS256'));
                $decodedata	=	(array)$decode;
            print_r($decodedata);
     }

      public function encodetoken(){
           $this->load->library("Jwt");
            $key ='UFMwMDMwZWM5ZjMzZTRmYjYwZmJlMjhhYmM4YzY3NTk0MmIyZmU=';

            $timestamp = time();
            $partnerId = 'PS0030';
            $reqid = '852085';

            $tokendata =array("timestamp" => $timestamp,
                              "partnerId" => $partnerId,
                              "reqid"     => $reqid,
                            );
            echo	$jwttoken	=	$this->validapi->generatetoken($tokendata,$key);

     }


    public function getusertoken(){

        $key = $this->input->post('key');

        $partnerId  =       $this->input->post('partnerId');
        $timestamp  =       time();

		$tokendata	=	array(
                            "timestamp" => $timestamp,
                            "partnerId"   => $partnerId,
                            "reqid"     => $timestamp,
							);

    	$jwttoken	=	$this->validapi->generatetoken($tokendata,$key);
         echo     $jwttoken;
    }
      private function _alpha_dash_space($str_in = '')
{
    if (! preg_match("/^([-a-z0-9_ ])+$/i", $str_in))
    {
        //$this->form_validation->set_message('_alpha_dash_space', 'The %s field may only contain alpha-numeric characters, spaces, underscores, and dashes.');
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}

    public function getencodebodyold(){
        $datapost = $this->input->post();


            $this->form_validation->set_rules('accessmodetype', 'accessmode', 'trim|required|xss_clean|alpha');
            $this->form_validation->set_rules('ipaddress','IP ADDESS', 'required|valid_ip[ipv4]');
            $this->form_validation->set_rules('adhaarnumber','AADHAR NUMBER', 'trim|required|xss_clean|alpha_numeric|exact_length[12]');
            $this->form_validation->set_rules('mobilenumber','Mobile', 'trim|required|xss_clean|exact_length[10]|regex_match[/^\(?([6-9]{1})\)?[-. ]?([0-9]{5})[-. ]?([0-9]{4})$/]');
            $this->form_validation->set_rules('latitude','latitude', 'trim|required|xss_clean');
            $this->form_validation->set_rules('longitude','longitude', 'trim|required|xss_clean');
            $this->form_validation->set_rules('referenceno', 'referenceno', 'trim|required|xss_clean|alpha_numeric');
            $this->form_validation->set_rules('nationalbankidentification', 'BANK IIN', 'trim|required|xss_clean|is_numeric');
            $this->form_validation->set_rules('pipe', 'pipe', 'trim|required|xss_clean|alpha_numeric');
            $this->form_validation->set_rules('transcationtype', 'Type', 'trim|required|xss_clean|alpha');
            $this->form_validation->set_rules('requestremarks','Remarks', 'trim|required|xss_clean|regex_match[/^([a-zA-Z0-9 ])+$/i]');
            $this->form_validation->set_rules('amount','Amount', 'trim|xss_clean|required|is_numeric');
            $this->form_validation->set_rules('submerchantid','Submerchantid', 'trim|required|xss_clean|alpha_numeric');

            if($this->form_validation->run() == TRUE) {

                http_response_code('200');
                $key = '060e37d1f82cde00';
                $iv =   '788a4b959058271e';
                $ciphertext_raw = openssl_encrypt(json_encode($datapost,true), 'AES-128-CBC', $key, $options=OPENSSL_RAW_DATA, $iv);
        	    $request1 = base64_encode($ciphertext_raw);
        	    $request =  array('body'=>$request1);
        		echo  json_encode($request,true);

          }else{
                $this->form_validation->set_error_delimiters('','');
                 http_response_code('400');
                $request =  array('body'=>validation_errors());
                echo  json_encode($request,true);
            }


    }




    public function getdecodebodyold(){
        $body = $this->input->post('body');
        $key = '060e37d1f82cde00';
        $iv =   '788a4b959058271e';
        $decrypted = openssl_decrypt(base64_decode($body), 'AES-128-CBC', $key, $options=OPENSSL_RAW_DATA, $iv);
        $datapost  = json_decode($decrypted,TRUE);
        echo    json_encode($datapost);
    }





     public function getencodebodyforpartner(){

        $datapost = $this->input->post();
        $key = 'cd12955608d96118';
        $iv =   '51e29f71360a177e';
        $ciphertext_raw = openssl_encrypt(json_encode($datapost,true), 'AES-128-CBC', $key, $options=OPENSSL_RAW_DATA, $iv);
	    $request1 = base64_encode($ciphertext_raw);
	    $request =  array('body'=>$request1);
		echo  json_encode($request,true);
    }

     public function getdecodebodyforpartner(){

        $body = $this->input->post('body');
        $key = '4850604a0b7304d9';
        $iv =   'dbf8609357e9c85b';
        $decrypted = openssl_decrypt(base64_decode($body), 'AES-128-CBC', $key, $options=OPENSSL_RAW_DATA, $iv);
        $datapost  = json_decode($decrypted,TRUE);
        echo    json_encode($datapost);
    }



       function addbank(){
          $this->load->model("api/webapp/aeps/transactmodel","",true);
        $this->load->library("fingpayrnfiapi");
        $allbank    =   $this->fingpayrnfiapi->aadhar_bank_detail();
        foreach($allbank['data']    as  $bank){

            if(is_numeric($bank['iinno'])){
                $where      =   array("activeFlag"=>1,"iinno"=>$bank['iinno']);
                $banks    =   $this->transactmodel->getdata("aadhar_bank",$where,"row_array");
                if(empty($banks)){
                    echo $bank['bankName']. '<br />';
                    $this->db->insert("aadhar_bank", array("bankName"=>$bank['bankName'],"iinno"=>$bank['iinno'],"activeFlag"=>1));
                }
            }
        }

    }


}
?>
