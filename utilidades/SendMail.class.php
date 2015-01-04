<?php 
/**
* Class para trabalhar com envio de Email.
* @author Valdiney França
*/
   class SendEmail
   {
      protected $remetente;
      protected $destino;
      protected $assunto;
      protected $mensagem;

      public function setRemetente($remetente)
      {
         $this->remetente = $remetente;
      }
      public function setDestino($destino)
      {
         $this->destino = $destino;
      }
      public function setAssunto($assunto)
      {
         $this->assunto = $assunto;
      }
      public function setMensagem($mensagem)
      {
         $this->mensagem = $mensagem;
      }
      
      public function headers()
      {
         $headers  = "MIME-Version: 1.1\r\n";
         $headers .= "Content-type: text/html; charset=utf-8\r\n";
         $headers .= "From: {$this->remetente}\r\n"; 
         $headers .= "Return-Path: valdiney@valdiney.meximas.com\r\n"; 
      }

      public function sendThisEmail()
      {
         return mail($this->destino, $this->assunto, $this->mensagem, $this->headers());
      }
}
/* End of file SendEmail.class.php */
/* Location: utilidades */
