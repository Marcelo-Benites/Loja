 <?php
     include('../config.php');
     $data= [];
     $assunto = 'Novo mensagem de site';
     $corpo = '<h2 style="color:red;">Sou o Marcelo</h2>';
     foreach ($_POST as $key => $value) {
       $corpo.= ucfirst($key).":".$value;
       $corpo.="<hr>";
     }
     $info = ['Assunto' => $assunto,'Corpo'=>$corpo];
           $mail = new Email('ns572.hostgator.com.br', 'contato@benites13.com', '5r80NN7euq', 'benite59');
            $mail->enviarPara('contato@benites13.com','benite59');
            $mail->formatarEmail($info);
             if($mail->enviarEmail()){
              $data['sucesso']= true;
            }else{
              $data['erro']= true;
          }
          
            $data['retorno']= 'sucesso';
          die(json_encode($data));
        ?>