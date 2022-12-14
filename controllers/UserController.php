<?php
/*
    controllers/user.php
*/
namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\Request;
use app\models\User;
use Dotenv\Util\Regex;
use app\models\Product;

class UserController extends Controller{
    public function __construct() {}

    public function index() 
    {
        $users = User::getAllUsers();
        $this->setLayout('admin');
        return $this->render('/admin/users/users', [
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {
        $userModel = new User;
        if($request->getMethod() === 'post') {
            $userModel->loadData($request->getBody());
            if($userModel->getRole() === 'client') {
                $userModel->saveAdmin($userModel->getRole());
            }
            else $userModel->save();
            Application::$app->response->redirect('/admin/users');
        } else if($request->getMethod() === 'get') {
            $this->setLayout('admin');
            return $this->render('/admin/users/create_user',  [
                'userModel' => $userModel
            ]);
        }
    }

    public function delete(Request $request)
    {
        if($request->getMethod() === 'post') {
            $id = Application::$app->request->getParam('id');
            $userModel = User::getUserInfo($id);
            $userModel->delete();
            return Application::$app->response->redirect('/admin/users');
        } else if($request->getMethod() === 'get') {
            $id = Application::$app->request->getParam('id');
            $userModel = User::getUserInfo($id);
            $this->setLayout('admin');
            return $this->render('/admin/users/delete_user', [
                'userModel' => $userModel
            ]);
        }        
    }
    public function deleteProduct(Request $request)
    {

            $id = Application::$app->request->getParam('id');
            $productId = Application::$app->request->getParam('product_id');
            $userModel = User::getUserInfo($id);
            $userModel->deleteProduct($productId );
            return Application::$app->response->redirect('/admin/users/edit?id=' . $id);
      
    }
    public function update(Request $request)
    {
        $id = Application::$app->request->getParam('id');
        $userModel = User::getUserInfo($id);
        $b = array();

        $a = $userModel->getMovieIds();
        if($a !== array('')){
            foreach($a as $id1){
                $c = Product::getProductDetail($id1);
                $b[]=$c;
            }
        } 
        if($request->getMethod() === 'post') {
            $userModel->loadData($request->getBody());
            $userModel->update($userModel);
            Application::$app->response->redirect('/admin/users');
        } else if ($request->getMethod() === 'get') {
            $this->setLayout('admin');
            return $this->render('/admin/users/edit_user', [
                'userModel' => $userModel,
                'productModel' => $b
            ]);
        }        
    }

    public function details(Request $request)
    {
        if($request->getMethod() === 'get')
        $id = Application::$app->request->getParam('id');
        $userModel = User::getUserInfo($id);
        $this->setLayout('admin');
        return $this->render('/admin/users/details_user', [
            'userModel' => $userModel
        ]);         
    }

    public function password(Request $request)
    {
        if($request->getMethod() === 'post') {
            $id = Application::$app->request->getParam('id');
            $userModel = User::getUserInfo($id);
            $userModel->loadData($request->getBody());
            $userModel->update($userModel);
            Application::$app->response->redirect('/admin/users');
        } else if ($request->getMethod() === 'get') {
            $id = Application::$app->request->getParam('id');
            $userModel = User::getUserInfo($id);
            $this->setLayout('admin');
            return $this->render('/admin/users/change_password', [
                'userModel' => $userModel
            ]);
        }        
    }
}