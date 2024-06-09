<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }


    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();

        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                 $response->redirect('/');
                return true;
            }
        }
        $this->setLayout('auth');
        $params = ['title' => 'Login'];

        return $this->render('login',  [
            'model' => $loginForm,
         ]);
    }

    public function register(Request $request)
    {
        $errors = [];
        $user = new User();

        if ($request->isPost()) {
            $user->loadData($request->getBody());


            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }

            return $this->render('register', [
                'model' => $user,
                'errors' => $errors
            ]);
        }

        return $this->render('register', [
            'model' => $user,
            'errors' => $errors
        ]);
    }

    public function logout(Request $request, Response $response): void
    {
        Application::$app->logout();

        $response->redirect('/');
    }

    public function profile()
    {
         return $this->render('profile');
    }
}