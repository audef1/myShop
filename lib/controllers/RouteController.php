<?php

/**
 * Created by PhpStorm.
 * User: florianauderset
 * Date: 11.12.15
 * Time: 09:43
 */
class RouteController
{
    private $model;
    private $uriView = "";
    private $additionalParam = "";

    public function __construct(Route $model)
    {
        $this->model = $model;

        // get all the parameters from the page uri
        $uriGetParam = isset($_GET['uri']) ? "/" . $_GET['uri'] : '/';

        $uriView = explode("/",$uriGetParam);
        $this->uriView = "/" . $uriView[1];

        $this->additionalParam = explode("/", $uriGetParam);
    }

    public function renderView(){

        foreach ($this->model->getUris() as $key => $value) {

            if (preg_match("#^$value$#", $this->uriView)){
                //if (preg_match("#^$value$#", $uriGetParam)){

                if ($this->model->getView($key) === "PageView"){
                    //connect to db and get pageid
                    $db = db::getInstance();
                    $mysqli = $db->getConnection();
                    $sql_query = "SELECT `page_id` FROM `pages` WHERE `nicename` = '" . str_replace('/','',$this->uriView) . "' AND `hidden` != 1 AND `lang` = 'de_DE';";
                    $result = $mysqli->query($sql_query);
                    $page_id = $result->fetch_array();

                    //if result 0 -> do new query for translationof nicename-> id and language -> return page_id of

                    $page = new Page($page_id['page_id']);
                    $view = new PageView($page);
                }
                else if ($this->model->getView($key) === "SingleProductView"){
                    //db query for product nicename
                    $product_id = 10;
                    $view = new SingleProductView(new Product($product_id));
                }
                else {
                    $useView = $this->model->getView($key);
                    $view = new $useView();
                }
                $view->render();
            }
        }
    }
}