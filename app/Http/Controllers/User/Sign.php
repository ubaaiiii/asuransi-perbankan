<?php

namespace App\Http\Controllers\User;

use App\ModelProduct;
use Session;
use Carbon\Carbon;
use App\ModelUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Sign extends Controller
{

    public function index()
    {
        $product = ModelProduct::select('productCategories','parentCategories')->groupBy('productCategories','parentCategories')->get();
        return view('sign',['product' => $product]);
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'userEmail' => 'required',
            'userPassword' => 'required',
        ]);

        $userEmail = $request->userEmail;
        $userPassword = $request->userPassword;
        $userPassword = md5($userPassword);

        $checkAuthentication = ModelUser::where('userEmail', $userEmail)->where('userPassword', $userPassword)->first();
        $checkActive = ModelUser::where('userEmail', $userEmail)->where('userActive', 0)->first();
        
        if($checkAuthentication != null){
            if($checkActive != null){
                return redirect('/sign')->with('statusNotActivated',"<font style='color:red;'> <u>Account hasn't been activated</u> </font> <br> Please check your email<br> <a href='".url('/activate'.'/'.$userEmail.'/'.$checkActive->userHash)."'>click here</a> to resend the activation link");
            }else{
                Session::put('UserID',$checkAuthentication->id_user);
                Session::put('FullName',$checkAuthentication->userFullName);
                Session::put('Email',$checkAuthentication->userEmail);
                Session::put('Phone',$checkAuthentication->userPhone);
                Session::put('Join',$checkAuthentication->userEarlyJoin);
                Session::put('Login',TRUE);
                return redirect('/');
            }
        }
        else{
            return redirect('/sign')->with('passwordWrong',"<font style='color:red;'> <u>Login failed</u> </font> <br> Email or password is incorrect!");
        }
    }

    public function registerPost(Request $request)
    {
        $phone_number = $request->userPhone;
        $phone_number = str_replace(' ', '', $phone_number);
     
        $join = Carbon::now('Asia/Jakarta');
        $join = $join->toDateTimeString();

        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $hash = substr(str_shuffle(str_repeat($pool, 32)), 0, 32);
        
        Session::flash('userFullName', $request->userFullName); 
        Session::flash('userEmail', $request->userEmail); 
        Session::flash('userPhone', $request->userPhone); 
        Session::flash('userPassword', $request->userPassword); 
        Session::flash('userPassword_confirmation', $request->userPassword_confirmation); 

        Session::flash('validate', $request->userPassword_confirmation); 

        $request->validate([
            'userFullName' => 'required|min:3|max:100',
            'userEmail' => 'required|unique:tb_user,userEmail',
            'userPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:15',
            'userPassword' => 'required|min:6',
            'userPassword_confirmation' => 'same:userPassword',
        ]);

        $passwordz = md5($request->userPassword);
    
            $tb_user = new ModelUser;
            $tb_user->userFullName = $request->userFullName;
            $tb_user->userEmail = $request->userEmail;
            $tb_user->userPhone = $phone_number;
            $tb_user->userEarlyJoin = $join;
            $tb_user->userPassword = $passwordz;
            $tb_user->userHash = $hash;
            $tb_user->userActive = 0;
            
            $message = "
            <!DOCTYPE html>
			<html>
                <head>
                     <!-- utf-8 works for most cases -->
                    <meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
                    <meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
                    <title>Aktifkan akun anda</title> <!-- The title tag shows in email notifications, like Android 4.4. -->
                    <style>

                        /* What it does: Remove spaces around the email design added by some email clients. */
                        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
                        html,
                        body {
                            margin: 0 auto !important;
                            padding: 0 !important;
                            height: 100% !important;
                            width: 100% !important;
                        }

                        /* What it does: Stops email clients resizing small text. */
                        * {
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                        }

                        /* What it does: Centers email on Android 4.4 */
                        div[style*='margin: 16px 0'] {
                            margin: 0 !important;
                        }

                        /* What it does: Stops Outlook from adding extra spacing to tables. */
                        table,
                        td {
                            mso-table-lspace: 0pt !important;
                            mso-table-rspace: 0pt !important;
                        }

                        /* What it does: Fixes webkit padding issue. */
                        table {
                            border-spacing: 0 !important;
                            border-collapse: collapse !important;
                            table-layout: fixed !important;
                            margin: 0 auto !important;
                        }

                        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
                        a {
                            text-decoration: none;
                        }

                        /* What it does: Uses a better rendering method when resizing images in IE. */
                        img {
                            -ms-interpolation-mode:bicubic;
                        }

                        /* What it does: A work-around for email clients meddling in triggered links. */
                        *[x-apple-data-detectors],  /* iOS */
                        .unstyle-auto-detected-links *,
                        .aBn {
                            border-bottom: 0 !important;
                            cursor: default !important;
                            color: inherit !important;
                            text-decoration: none !important;
                            font-size: inherit !important;
                            font-family: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                        }

                        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
                        .im {
                            color: inherit !important;
                        }

                        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
                        .a6S {
                        display: none !important;
                        opacity: 0.01 !important;
                        }
                        /* If the above doesn't work, add a .g-img class to any image in question. */
                        img.g-img + div {
                        display: none !important;
                        }

                        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
                        /* Create one of these media queries for each additional viewport size you'd like to fix */

                        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
                        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                            u ~ div .email-container {
                                min-width: 320px !important;
                            }
                        }
                        /* iPhone 6, 6S, 7, 8, and X */
                        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                            u ~ div .email-container {
                                min-width: 375px !important;
                            }
                        }
                        /* iPhone 6+, 7+, and 8+ */
                        @media only screen and (min-device-width: 414px) {
                            u ~ div .email-container {
                                min-width: 414px !important;
                            }
                        }

                    </style>
                    <style>

                        /* What it does: Hover styles for buttons */
                        .button-td,
                        .button-a {
                            transition: all 100ms ease-in;
                        }
                        .button-td-primary:hover,
                        .button-a-primary:hover {
                            background: rgb(0,72,167) !important;
                            border-color: rgb(0,72,167) !important;
                        }

                        /* Media Queries */
                        @media screen and (max-width: 600px) {

                            .email-container {
                                width: 100% !important;
                                margin: auto !important;
                            }

                            /* What it does: Forces table cells into full-width rows. */
                            .stack-column,
                            .stack-column-center {
                                display: block !important;
                                width: 100% !important;
                                max-width: 100% !important;
                                direction: ltr !important;
                            }
                            /* And center justify these ones. */
                            .stack-column-center {
                                text-align: center !important;
                            }

                            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
                            .center-on-narrow {
                                text-align: center !important;
                                display: block !important;
                                margin-left: auto !important;
                                margin-right: auto !important;
                                float: none !important;
                            }
                            table.center-on-narrow {
                                display: inline-block !important;
                            }

                            /* What it does: Adjust typography on small screens to improve readability */
                            .email-container p {
                                font-size: 17px !important;
                            }
                        }

                    </style>
                    <!-- Progressive Enhancements : END -->

                </head>
                <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: white;'>
                    <center style='width: 100%; background-color: white;'>
                    
                        <div style='display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
                            (Optional) This text will appear in the inbox preview, but not the email body. It can be used to supplement the email subject line or even summarize the email's contents. Extended text preheaders (~490 characters) seems like a better UX for anyone using a screenreader or voice-command apps like Siri to dictate the contents of an email. If this text is not included, email clients will automatically populate it using the text (including image alt text) at the start of the email's body.
                        </div>
                        <!-- Visually Hidden Preheader Text : END -->

                        <!-- Create white space after the desired preview text so email clients don’t pull other distracting text into the inbox preview. Extend as necessary. -->
                        <!-- Preview Text Spacing Hack : BEGIN -->
                        <div style='display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
                            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                        </div>
                        <!-- Preview Text Spacing Hack : END -->

                        <!-- Email Body : BEGIN -->
                        <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto;' class='email-container'>
                            <!-- Email Header : BEGIN -->
                            <tr>
                                <td style='padding: 20px 0; text-align: center'>
                                    <img src='".url('/')."/assets/images/logo/merkan-03.png' width='200' height='50' alt='alt_text' border='0' style='height: auto; background: white; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;'>
                                </td>
                            </tr>
                            <!-- Email Header : END -->

                            <!-- Hero Image, Flush : END -->

                            <!-- 1 Column Text + Button : BEGIN -->
                            <tr>
                                <td style='background-color: #ffffff;'>
                                    <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
                                        <tr>
                                            <td style='padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;'>
                                                <h1 style='margin: 0 0 10px; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;'>Activate My Account</h1>
                                                <p style='margin: 0 0 10px;'> Activate My Merkan Account by Clicking Link Below</p>
                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 0 20px 20px;'>
                                                <!-- Button : BEGIN -->
                                                <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' style='margin: auto;'>
                                                    <tr>
                                                        <td class='button-td button-td-primary' style='border-radius: 4px; background: #222222;'>
                                                            <a class='button-a button-a-primary' href='".url('/activateUser')."/$request->userEmail/$hash' style='background: #009eff; border: 1px solid #009eff; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;'>Activate My Account</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- Button : END -->
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <!-- 1 Column Text + Button : END -->


                        </table>
                        <!-- Email Body : END -->

                        <!-- Email Footer : BEGIN -->
                        <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto;' class='email-container'>
                            <tr>
                                <td style='padding: 20px; font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #888888;'>
                                    <a href='https://mersikanulsi.com' style='color: #black; text-decoration: underline; font-weight: bold;'>mersikanulsi.com</a>
                                    <br><br>
                                    Mersikanulsi<br><span class='unstyle-auto-detected-links'>Jl. Lenteng Agung Timur, Jagakarsa, <br> Jakarta Selatan Indonesia, 12640.</span>
                                </td>
                            </tr>
                        </table>
                    </center>
                </body>
			</html>";

            //SEND EMAIL PHPMAILER - LARAVEL

            $mail = new PHPMailer(true); // Passing `true` enables exceptions

            try {


                 // Pengaturan Server
                 $mail->isSMTP();      // Set mailer to use SMTP
                 $mail->Host = "mail.mersikanulsi.com"; // Specify main and backup SMTP servers
                 $mail->SMTPAuth = true;  // Enable SMTP authentication
                 $mail->Username = 'admin@mersikanulsi.com'; // SMTP username
                 $mail->Password = 'Mersi9988'; // SMTP password
                 $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                 $mail->Port = 465;  // TCP port to connect to
 
                 // Siapa yang mengirim email
                 $mail->setFrom("admin@mersikanulsi.com", "Merkan Admin");
 
                 $mail->addAddress($request->userEmail, $request->userFullName);
                
                 // ke siapa akan kita balas emailnya
                 $mail->addReplyTo($request->userEmail, $request->userFullName);
                 
                 $mail->isHTML(true); // Set email format to HTML
                 $mail->Subject = "Activate Merkan Account";
                 $mail->Body    = $message;
                 $mail->AltBody = "ALTBODY";
 
                 $mail->send();
                 $tb_user->save();
 
                 return redirect('/sign')->with('statusRegisterSuccess',"<font style='color:green;'> <u>Register success!</u> </font> <br> Dont forget to activate your Merkan Account at <font style='color:red;'>".$request->userEmail."</font>");
            
                } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        
    }

    public function loginResend($userEmail, $userHash)
    {
        if(Session::get('Login')){
            return redirect('/');
        }else{
            $verify = ModelUser::where('userEmail', $userEmail)->where('userHash', $userHash)->where('userActive','0')->first();
            
            if ($verify != null){

                $message = "
                <!DOCTYPE html>
                <html>
                    <head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
                         <!-- utf-8 works for most cases -->
                        <meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
                        <meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
                        <meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
                        <title>Aktifkan akun anda</title> <!-- The title tag shows in email notifications, like Android 4.4. -->
                        <style>

                            /* What it does: Remove spaces around the email design added by some email clients. */
                            /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
                            html,
                            body {
                                margin: 0 auto !important;
                                padding: 0 !important;
                                height: 100% !important;
                                width: 100% !important;
                            }

                            /* What it does: Stops email clients resizing small text. */
                            * {
                                -ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%;
                            }

                            /* What it does: Centers email on Android 4.4 */
                            div[style*='margin: 16px 0'] {
                                margin: 0 !important;
                            }

                            /* What it does: Stops Outlook from adding extra spacing to tables. */
                            table,
                            td {
                                mso-table-lspace: 0pt !important;
                                mso-table-rspace: 0pt !important;
                            }

                            /* What it does: Fixes webkit padding issue. */
                            table {
                                border-spacing: 0 !important;
                                border-collapse: collapse !important;
                                table-layout: fixed !important;
                                margin: 0 auto !important;
                            }

                            /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
                            a {
                                text-decoration: none;
                            }

                            /* What it does: Uses a better rendering method when resizing images in IE. */
                            img {
                                -ms-interpolation-mode:bicubic;
                            }

                            /* What it does: A work-around for email clients meddling in triggered links. */
                            *[x-apple-data-detectors],  /* iOS */
                            .unstyle-auto-detected-links *,
                            .aBn {
                                border-bottom: 0 !important;
                                cursor: default !important;
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }

                            /* What it does: Prevents Gmail from changing the text color in conversation threads. */
                            .im {
                                color: inherit !important;
                            }

                            /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
                            .a6S {
                            display: none !important;
                            opacity: 0.01 !important;
                            }
                            /* If the above doesn't work, add a .g-img class to any image in question. */
                            img.g-img + div {
                            display: none !important;
                            }

                            /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
                            /* Create one of these media queries for each additional viewport size you'd like to fix */

                            /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
                            @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                                u ~ div .email-container {
                                    min-width: 320px !important;
                                }
                            }
                            /* iPhone 6, 6S, 7, 8, and X */
                            @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                                u ~ div .email-container {
                                    min-width: 375px !important;
                                }
                            }
                            /* iPhone 6+, 7+, and 8+ */
                            @media only screen and (min-device-width: 414px) {
                                u ~ div .email-container {
                                    min-width: 414px !important;
                                }
                            }

                        </style>
                        <style>

                            /* What it does: Hover styles for buttons */
                            .button-td,
                            .button-a {
                                transition: all 100ms ease-in;
                            }
                            .button-td-primary:hover,
                            .button-a-primary:hover {
                                background: rgb(0,72,167) !important;
                                border-color: rgb(0,72,167) !important;
                            }

                            /* Media Queries */
                            @media screen and (max-width: 600px) {

                                .email-container {
                                    width: 100% !important;
                                    margin: auto !important;
                                }

                                /* What it does: Forces table cells into full-width rows. */
                                .stack-column,
                                .stack-column-center {
                                    display: block !important;
                                    width: 100% !important;
                                    max-width: 100% !important;
                                    direction: ltr !important;
                                }
                                /* And center justify these ones. */
                                .stack-column-center {
                                    text-align: center !important;
                                }

                                /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
                                .center-on-narrow {
                                    text-align: center !important;
                                    display: block !important;
                                    margin-left: auto !important;
                                    margin-right: auto !important;
                                    float: none !important;
                                }
                                table.center-on-narrow {
                                    display: inline-block !important;
                                }

                                /* What it does: Adjust typography on small screens to improve readability */
                                .email-container p {
                                    font-size: 17px !important;
                                }
                            }

                        </style>
                        <!-- Progressive Enhancements : END -->

                    </head>
                    <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: white;'>
                        <center style='width: 100%; background-color: white;'>
                        
                            <div style='display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
                                (Optional) This text will appear in the inbox preview, but not the email body. It can be used to supplement the email subject line or even summarize the email's contents. Extended text preheaders (~490 characters) seems like a better UX for anyone using a screenreader or voice-command apps like Siri to dictate the contents of an email. If this text is not included, email clients will automatically populate it using the text (including image alt text) at the start of the email's body.
                            </div>
                            <!-- Visually Hidden Preheader Text : END -->

                            <!-- Create white space after the desired preview text so email clients don’t pull other distracting text into the inbox preview. Extend as necessary. -->
                            <!-- Preview Text Spacing Hack : BEGIN -->
                            <div style='display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
                                &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                            </div>
                            <!-- Preview Text Spacing Hack : END -->

                            <!-- Email Body : BEGIN -->
                            <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto;' class='email-container'>
                                <!-- Email Header : BEGIN -->
                                <tr>
                                    <td style='padding: 20px 0; text-align: center'>
                                        <img src='".url('/')."/assets/images/logo/merkan-03.png' width='200' height='50' alt='alt_text' border='0' style='height: auto; background: white; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;'>
                                    </td>
                                </tr>
                                <!-- Email Header : END -->

                                <!-- Hero Image, Flush : END -->

                                <!-- 1 Column Text + Button : BEGIN -->
                                <tr>
                                    <td style='background-color: #ffffff;'>
                                        <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
                                            <tr>
                                                <td style='padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;'>
                                                    <h1 style='margin: 0 0 10px; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;'>Activate My Account</h1>
                                                    <p style='margin: 0 0 10px;'> Activate My Merkan Account by Clicking Link Below</p>
                                                
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 0 20px 20px;'>
                                                    <!-- Button : BEGIN -->
                                                    <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' style='margin: auto;'>
                                                        <tr>
                                                            <td class='button-td button-td-primary' style='border-radius: 4px; background: #222222;'>
                                                                <a class='button-a button-a-primary' href='".url('/activateUser')."/$verify->userEmail/$verify->userHash' style='background: #009eff; border: 1px solid #009eff; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;'>Activate My Account</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- Button : END -->
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                                <!-- 1 Column Text + Button : END -->


                            </table>
                            <!-- Email Body : END -->

                            <!-- Email Footer : BEGIN -->
                            <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto;' class='email-container'>
                                <tr>
                                    <td style='padding: 20px; font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #888888;'>
                                        <a href='https://mersikanulsi.com' style='color: #black; text-decoration: underline; font-weight: bold;'>mersikanulsi.com</a>
                                        <br><br>
                                        Mersikanulsi<br><span class='unstyle-auto-detected-links'>Jl. Ampera No. 42 C, Durenjaya,<br> Bekasi Timur, Kota Bekasi, Jawa Barat, Indonesia.</span>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </body>
                </html>";

                //SEND EMAIL PHPMAILER - LARAVEL

                $mail = new PHPMailer(true); // Passing `true` enables exceptions

                try {

                    // Pengaturan Server
                    $mail->isSMTP();      // Set mailer to use SMTP
                    $mail->Host = "mail.mersikanulsi.com"; // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;  // Enable SMTP authentication
                    $mail->Username = 'admin@mersikanulsi.com'; // SMTP username
                    $mail->Password = 'Mersi9988'; // SMTP password
                    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;  // TCP port to connect to
    
                    // Siapa yang mengirim email
                    $mail->setFrom("admin@mersikanulsi.com", "Merkan Admin");

                    $mail->addAddress($verify->userEmail, $verify->userFullName);
                    
                    // ke siapa akan kita balas emailnya
                    $mail->addReplyTo($verify->userEmail, $verify->userFullName);
                    
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = "Activate Merkan Account";
                    $mail->Body    = $message;
                    $mail->AltBody = "ALTBODY";

                    $mail->send();

                    return redirect('/sign')->with('resend','<font style="color:green;"> <u>Resend activation link success!</u> </font> <br> Please check your email');
                } catch (Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error:' . $mail->ErrorInfo;
                }
            }else{
                return redirect('/sign');
            }
        }
    }

    public function activateUser($userEmail,$userHash)
    {
        $check = ModelUser::where('userEmail', $userEmail)->where('userHash', $userHash)->where('userActive', 0)->first();
        
        if ($check != null){
            ModelUser::where('userEmail', $userEmail)->update(['userActive' => 1]);
            return redirect('/sign')->with('activateSuccess','<font style="color:green;"> <u>Activate Account Success!</u> </font> <br> Now you can login');
        }else{
            return redirect('/sign');
        }
    }

    public function changePasswordPost(Request $request)
    {
        $request->validate([
            'userPassword' => 'required|min:6',
            'userPassword_confirmation' => 'same:userPassword',
        ]);

        $userPassword = $request->userPassword;
        $userPassword = md5($userPassword);
        $userEmail = $request->userEmail;
        $userHash = $request->userHash;
        
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $hash = substr(str_shuffle(str_repeat($pool, 32)), 0, 32);

        $change = ModelUser::where('userEmail', $userEmail)->where('userHash',$userHash)->update(['userPassword' => $userPassword, 'userHash' => $hash]);
        
        if ($change != null){
            return redirect('/login')->with('changePassword',"<font style='color:green;'> <u>Change password success!</u></font> <br> Now  <font style='color:green;'>".$userEmail."</font> can login with new password");
        }else{
            return redirect('/login');
        }
          
    }

    public function resetShow($userEmail,$userHash)
    {
        $check = ModelUser::where('userEmail', $userEmail)->where('userHash', $userHash)->first();
        if ($check != null){
            $product = ModelProduct::select('productCategories')->groupBy('productCategories')->get();
            return view('reset',['userEmail' => $userEmail,'product' => $product]);
        }else{
            return redirect('/');
        }
    }

    public function resetPost(Request $request)
    {
        $request->validate([
            'userEmail' => 'required'
        ]);

        $userEmail = $request->userEmail;

        $resetEmail = ModelUser::where('userEmail', $userEmail)->first();
        
        if($resetEmail != null){

            $message = "
            <!DOCTYPE html>
            <html>
                <head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
                        <!-- utf-8 works for most cases -->
                    <meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
                    <meta name='x-apple-disable-message-reformatting'>  <!-- Disable auto-scale in iOS 10 Mail entirely -->
                    <title>Aktifkan akun anda</title> <!-- The title tag shows in email notifications, like Android 4.4. -->
                    <style>

                        /* What it does: Remove spaces around the email design added by some email clients. */
                        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
                        html,
                        body {
                            margin: 0 auto !important;
                            padding: 0 !important;
                            height: 100% !important;
                            width: 100% !important;
                        }

                        /* What it does: Stops email clients resizing small text. */
                        * {
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                        }

                        /* What it does: Centers email on Android 4.4 */
                        div[style*='margin: 16px 0'] {
                            margin: 0 !important;
                        }

                        /* What it does: Stops Outlook from adding extra spacing to tables. */
                        table,
                        td {
                            mso-table-lspace: 0pt !important;
                            mso-table-rspace: 0pt !important;
                        }

                        /* What it does: Fixes webkit padding issue. */
                        table {
                            border-spacing: 0 !important;
                            border-collapse: collapse !important;
                            table-layout: fixed !important;
                            margin: 0 auto !important;
                        }

                        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
                        a {
                            text-decoration: none;
                        }

                        /* What it does: Uses a better rendering method when resizing images in IE. */
                        img {
                            -ms-interpolation-mode:bicubic;
                        }

                        /* What it does: A work-around for email clients meddling in triggered links. */
                        *[x-apple-data-detectors],  /* iOS */
                        .unstyle-auto-detected-links *,
                        .aBn {
                            border-bottom: 0 !important;
                            cursor: default !important;
                            color: inherit !important;
                            text-decoration: none !important;
                            font-size: inherit !important;
                            font-family: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                        }

                        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
                        .im {
                            color: inherit !important;
                        }

                        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
                        .a6S {
                        display: none !important;
                        opacity: 0.01 !important;
                        }
                        /* If the above doesn't work, add a .g-img class to any image in question. */
                        img.g-img + div {
                        display: none !important;
                        }

                        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
                        /* Create one of these media queries for each additional viewport size you'd like to fix */

                        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
                        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                            u ~ div .email-container {
                                min-width: 320px !important;
                            }
                        }
                        /* iPhone 6, 6S, 7, 8, and X */
                        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                            u ~ div .email-container {
                                min-width: 375px !important;
                            }
                        }
                        /* iPhone 6+, 7+, and 8+ */
                        @media only screen and (min-device-width: 414px) {
                            u ~ div .email-container {
                                min-width: 414px !important;
                            }
                        }

                    </style>
                    <style>

                        /* What it does: Hover styles for buttons */
                        .button-td,
                        .button-a {
                            transition: all 100ms ease-in;
                        }
                        .button-td-primary:hover,
                        .button-a-primary:hover {
                            background: rgb(0,72,167) !important;
                            border-color: rgb(0,72,167) !important;
                        }

                        /* Media Queries */
                        @media screen and (max-width: 600px) {

                            .email-container {
                                width: 100% !important;
                                margin: auto !important;
                            }

                            /* What it does: Forces table cells into full-width rows. */
                            .stack-column,
                            .stack-column-center {
                                display: block !important;
                                width: 100% !important;
                                max-width: 100% !important;
                                direction: ltr !important;
                            }
                            /* And center justify these ones. */
                            .stack-column-center {
                                text-align: center !important;
                            }

                            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
                            .center-on-narrow {
                                text-align: center !important;
                                display: block !important;
                                margin-left: auto !important;
                                margin-right: auto !important;
                                float: none !important;
                            }
                            table.center-on-narrow {
                                display: inline-block !important;
                            }

                            /* What it does: Adjust typography on small screens to improve readability */
                            .email-container p {
                                font-size: 17px !important;
                            }
                        }

                    </style>
                    <!-- Progressive Enhancements : END -->

                </head>
                <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: white;'>
                    <center style='width: 100%; background-color: white;'>
                    
                        <div style='display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
                            (Optional) This text will appear in the inbox preview, but not the email body. It can be used to supplement the email subject line or even summarize the email's contents. Extended text preheaders (~490 characters) seems like a better UX for anyone using a screenreader or voice-command apps like Siri to dictate the contents of an email. If this text is not included, email clients will automatically populate it using the text (including image alt text) at the start of the email's body.
                        </div>
                        <!-- Visually Hidden Preheader Text : END -->

                        <!-- Create white space after the desired preview text so email clients don’t pull other distracting text into the inbox preview. Extend as necessary. -->
                        <!-- Preview Text Spacing Hack : BEGIN -->
                        <div style='display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
                            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                        </div>
                        <!-- Preview Text Spacing Hack : END -->

                        <!-- Email Body : BEGIN -->
                        <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto;' class='email-container'>
                            <!-- Email Header : BEGIN -->
                            <tr>
                                <td style='padding: 20px 0; text-align: center'>
                                    <img src='".url('/')."/assets/images/logo/merkan-03.png' width='200' height='50' alt='alt_text' border='0' style='height: auto; background: white; font-family: sans-serif; font-size: 15px; line-height: 15px; color: #555555;'>
                                </td>
                            </tr>
                            <!-- Email Header : END -->

                            <!-- Hero Image, Flush : END -->

                            <!-- 1 Column Text + Button : BEGIN -->
                            <tr>
                                <td style='background-color: #ffffff;'>
                                    <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
                                        <tr>
                                            <td style='padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;'>
                                                <h1 style='margin: 0 0 10px; font-size: 25px; line-height: 30px; color: #333333; font-weight: normal;'>Reset My Password</h1>
                                                <p style='margin: 0 0 10px;'> Reset My Account Password by Clicking Link Below</p>
                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 0 20px 20px;'>
                                                <!-- Button : BEGIN -->
                                                <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' style='margin: auto;'>
                                                    <tr>
                                                        <td class='button-td button-td-primary' style='border-radius: 4px; background: #222222;'>
                                                            <a class='button-a button-a-primary' href='".url('/resetPassword')."/$resetEmail->userEmail/$resetEmail->userHash' style='background: #009eff; border: 1px solid #009eff; font-family: sans-serif; font-size: 15px; line-height: 15px; text-decoration: none; padding: 13px 17px; color: #ffffff; display: block; border-radius: 4px;'>Reset My Password</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- Button : END -->
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <!-- 1 Column Text + Button : END -->


                        </table>
                        <!-- Email Body : END -->

                        <!-- Email Footer : BEGIN -->
                        <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='600' style='margin: auto;' class='email-container'>
                            <tr>
                                <td style='padding: 20px; font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #888888;'>
                                    <a href='https://mersikanulsi.com' style='color: #black; text-decoration: underline; font-weight: bold;'>mersikanulsi.com</a>
                                    <br><br>
                                    Mersikanulsi<br><span class='unstyle-auto-detected-links'>Jl. Ampera No. 42 C, Durenjaya,<br> Bekasi Timur, Kota Bekasi, Jawa Barat, Indonesia.</span>
                                </td>
                            </tr>
                        </table>
                    </center>
                </body>
            </html>";

            //SEND EMAIL PHPMAILER - LARAVEL

            $mail = new PHPMailer(true); // Passing `true` enables exceptions

            try {

                // Pengaturan Server
                $mail->isSMTP();      // Set mailer to use SMTP
                $mail->Host = "mail.mersikanulsi.com"; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;  // Enable SMTP authentication
                $mail->Username = 'admin@mersikanulsi.com'; // SMTP username
                $mail->Password = 'Mersi9988'; // SMTP password
                $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;  // TCP port to connect to

                // Siapa yang mengirim email
                $mail->setFrom("admin@mersikanulsi.com", "Merkan Admin");

                $mail->addAddress($resetEmail->userEmail, $resetEmail->userFullName);
                
                // ke siapa akan kita balas emailnya
                $mail->addReplyTo($resetEmail->userEmail, $resetEmail->userFullName);
                
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = "Activate Merkan Account";
                $mail->Body    = $message;
                $mail->AltBody = "ALTBODY";

                $mail->send();

                return redirect('/sign')->with('resend','<font style="color:green;"> <u>Resend activation link success!</u> </font> <br> Please check your email');
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error:' . $mail->ErrorInfo;
            }
            
            return redirect('/sign')->with('resetSuccess',"<font style='color:green;'> <u>Forgot Success!</u> </font> <br> Please check your email<br>to reset your password");
        }
        else{
            return redirect('/sign')->with('resetFailed',"<font style='color:red;'> <u>Forgot Failed!</u> </font> <br> Email or password is not found!");
        }
    }

    public function resetAction(Request $request)
    {
        $userPassword = $request->userPassword_confirmation;
        $userEmail = $request->userEmail;
        $userPassword = md5($userPassword);

        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $hash = substr(str_shuffle(str_repeat($pool, 32)), 0, 32);

        ModelUser::where('userEmail', $userEmail)->update(['userPassword' => $userPassword, 'userHash' => $hash]);
        $checkActive = ModelUser::where('userEmail', $userEmail)->where('userActive', 0)->first();
        
        return redirect('/sign')->with('resetSuccess',"<font style='color:green;'> <u>Reset Password Success!</u> </font> <br> Now you can login with your new password");
    }
}
