<?php
/**
 * 方便调试输出
 *
 * @param $var
 */
function M_dump($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}


/**
 * 获取纯字符串
 *
 * @param $name
 * @return mixed|null
 */
function getUrlString($name)
{
    $value = filter_input(INPUT_GET, $name, FILTER_SANITIZE_URL);

    if ($value) {
        return $value;
    } else {
        return $_SERVER['REDIRECT_URL'];
    }
}

/**
 * mvc路由解析器，负责从参数中提取url路由信息
 *
 * @return array
 */
//不支持伪静态
function getMvcRoute()
{
    //控制器
    $c = getUrlString("_c");
    //执行方法
    $a = getUrlString("_a");
    //默认控制器为index
    $c = empty($c)?'index':$c;
    //默认方法为index
    $a = empty($a)?'index':$a;

    //路由
    $route = array(
        '_a' => $a,
        '_c' => $c
    );

    //将_c = 'ab_cd' 为 _c = 'AbCd'
    $carr = explode('_', $c);
    for ($index = 0; $index < count($carr); $index++) {
        $carr[$index] = ucfirst($carr[$index]);
    }

    $c = implode("", $carr);
    $route['c'] = $c;
    $route['a'] = $a;
    return $route;
}

/*function getMvcRoute()
{
    //控制器
    $c = getUrlString("_c");
    ///执行方法
    $a = getUrlString("_a");

    //url rewrite读取路由,如teacher_center/pprofile解析为$c=teacher_center,$a=profile
    $s = getUrlString("_url");


    if (!empty($s)) {
        $s = trim(str_replace('/', " ", $s));
        $urls = explode(" ", $s);

        $path_arr = explode('/', APP_PATH);
        
        foreach ($urls as $key=>$value){
            if(in_array($value, $path_arr)){
                unset($urls[$key]);
            }
        }

        $urls = array_values($urls);

        if (isset($urls[0])) {
            $c = $urls[0];
        }

        if (isset($urls[1])) {
            $a = $urls[1];
        }
    }

    //设置默认方法和控制器
    $c = empty($c)?'index':$c;
    $a = empty($a)?'index':$a;

    //路由
    $route = array(
        '_c' => $c,
        '_a' => $a
    );

    //将_c = 'ab_cd' 为 _c = 'AbCd'
    $carr = explode('_', $c);
    for ($index = 0; $index < count($carr); $index++) {
        $carr[$index] = ucfirst($carr[$index]);
    }
    $c = implode('', $carr);
    $route['a'] = $a;
    $route['c'] = $c;
    return $route;
}*/





?>




