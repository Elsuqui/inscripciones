<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuscriptorM;
use Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class HomeController extends Controller
{
    public function senMail($di)
    {
        $suscriptor=SuscriptorM::where('id','=',$di)->get()->first();
        //return $suscriptor;
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.techlabsec.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'sysboot@techlabsec.com';                 // SMTP username
        $mail->Password = 'Emelec94';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('sysboot@techlabsec.com', 'SysBoot');
        $mail->addAddress($suscriptor->email, $suscriptor->primer_nombre);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Echo Dot';
        $mail->Body    = 'Aquí está tu rifa';
       // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        /* 'primer_nombre', 'segundo_nombre', 'primer_apellido','segundo_apellido','email',
        'telefono','numero'*/
        $ex_suscriptor=SuscriptorM::where('numero','=',$request->numero)->get()->first();
        if(!empty($ex_suscriptor))
        {
            echo 'error, número ya fue elegido';
        }
        else
        {
            $suscriptor=new SuscriptorM();
            $suscriptor->primer_nombre=$request->primer_nombre;
            $suscriptor->segundo_nombre=$request->segundo_nombre;
            $suscriptor->primer_apellido=$request->primer_apellido;
            $suscriptor->segundo_apellido=$request->segundo_apellido;
            $suscriptor->email=$request->email;
            $suscriptor->telefono=$request->telefono;
            $suscriptor->numero=$request->numero;
            //$suscriptor->id_user=1;
            $suscriptor->id_user=Auth::user()->id;
            $suscriptor->save();
            echo 'registro guardado';   
        }
    }
    public function show($di)
    {
        $var['suscriptor']=SuscriptorM::where('id','=',$di)->get()->first();
        //return $var;
        return view('editar',$var);
    }
    public function parts()
    {
        $var['suscriptores']=SuscriptorM::where('id_user','=',Auth::user()->id)->get();
        //return $var;
        return view('suscriptores',$var);
    }
    public function update(Request $request)
    {
        $ex_suscriptor=SuscriptorM::where('numero','=',$request->numero)->get()->first();
        $suscriptor=SuscriptorM::where('id','=',$request->id)->get()->first();
        if(!empty($ex_suscriptor))
        {
            if($suscriptor->id<>$ex_suscriptor->id)
            {
                echo 'error, número ya fue elegido';
            }
            else
            {
                $suscriptor->primer_nombre=$request->primer_nombre;
                $suscriptor->segundo_nombre=$request->segundo_nombre;
                $suscriptor->primer_apellido=$request->primer_apellido;
                $suscriptor->segundo_apellido=$request->segundo_apellido;
                $suscriptor->email=$request->email;
                $suscriptor->telefono=$request->telefono;
                $suscriptor->numero=$request->numero;
                //$suscriptor->id_user=1;
                $suscriptor->save();
                return redirect('participantes');
                //echo 'registro modificado';
            }
            
        }
        else
        {
            //$suscriptor=SuscriptorM::where('id','=',$request->id)->get()->first();
            $suscriptor->primer_nombre=$request->primer_nombre;
            $suscriptor->segundo_nombre=$request->segundo_nombre;
            $suscriptor->primer_apellido=$request->primer_apellido;
            $suscriptor->segundo_apellido=$request->segundo_apellido;
            $suscriptor->email=$request->email;
            $suscriptor->telefono=$request->telefono;
            $suscriptor->numero=$request->numero;
            //$suscriptor->id_user=1;
            $suscriptor->save();
            return redirect('participantes');
            //echo 'registro modificado';
        }
        
    }
    
}
