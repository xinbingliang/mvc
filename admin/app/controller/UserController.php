<?php
class UserController extends Controller
{
    public function profile()
    {
        $info = array(
            'name' => '辛丙亮',
            'web'  => 'www.xinbingliang.cn'
        );

        header('Content-Type:application/json; charset=utf-8');
        echo json_encode($info);
    }
}