<?php
class TestController extends Controller
{
    public function getInfo ()
    {
        $info = array(
            "author" => '辛丙亮',
            'web' => 'http://www.xinbingliang.cn'
        );
        header('Content-Type:application/json; charset=utf-8');
        echo json_encode($info);
    }
}