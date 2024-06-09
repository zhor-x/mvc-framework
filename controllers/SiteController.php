<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;

class SiteController extends Controller
{

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();

        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks, I will contact you shortly.');
                $response->redirect('/');
            }
        }
        return $this->render('contact', ['model' => $contact]);
    }

    public function handleContact(Request $request)
    {
        $body = $request->method();
        var_dump($body);
        return 'Handling submit contact form...';
    }
}