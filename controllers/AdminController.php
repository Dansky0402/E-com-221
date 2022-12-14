<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Order;
use app\models\OrderItem;
use app\models\Product;
use app\models\User;


class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $orders = Order::getAllOrders('processing');
        $products = Product::getAllProducts();
        $users = User::getAllUsers();
        $list = Order::getTotalPrice();

        $this->setLayout('admin');
        return $this->render('/admin/dashboard', [
            'orders' => $orders,
            'products' => $products,
            'users' => $users,
            'list' => $list
        ]);
    }

    public function profile(Request $request)
    {

        $adminId = Application::$app->user->id;
        $adminModel = User::getUserInfo($adminId);
        if ($request->getMethod() === 'post') {
            $adminModel->loadData($request->getBody());
            if ($adminModel->validateUpdateProfile() && true) {
                if ($adminModel->updateProfile($adminModel)) {
                    Application::$app->response->redirect('/admin/profile');
                    return 'Show success page';
                }
            }
        }

        $this->setLayout('admin');
        return $this->render('/admin/profile', [
            'user' => $adminModel
        ]);
    }
}