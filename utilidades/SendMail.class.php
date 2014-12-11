<?php 

/**
* Class para trabalhar com envio de Email.
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

      private function headers()
      {
         $headers  = "MIME-Version: 1.1\r\n";
         $headers .= "Content-type: text/html; charset=utf-8\r\n";
         $headers .= "From: {$this->remetente}\r\n"; 
         $headers .= "Return-Path: {$this->destino}\r\n"; 
         return $headers;
      }

      public function sendThisEmail()
      {
         return mail($this->destino, $this->assunto, $this->mensagem, $this->headers());
      }
   }