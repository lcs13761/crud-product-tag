<?php

namespace Source\App\Web;

use Source\Core\Controller;

class ErrorController extends Controller
{
    public function index($errorCode){
            $error = new \stdClass();
            switch ($errorCode) {
                case 'service-unavailable':
                    $error->code = 503;
                    $error->title = "Desculpe. Estamos em manutenção!";
                    $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
                    $error->linkTitle = null;
                    $error->link = null;
                    break;

                case 'not-found':
                    $error->code = 404;
                    $error->title = "Ooops. Conteúdo indispinível :/";
                    $error->message = "Sentimos muito, Já estamos vendo isso mas caso precise, envie um e-mail  :/";
                    $error->linkTitle = "Continue navegando!";
                    $error->link = url('/');
                    break;

                default:
                    $error->code = 500;
                    $error->title = "Estamos enfrentando problemas!";
                    $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                    $error->linkTitle = "ENVIAR E-MAIL";
                    break;
            }

           return $this->view->render("web/error", [
                "error" => $error
            ]);
    }

}