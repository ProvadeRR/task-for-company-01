<?php

class ControllerInformationPricelist extends Controller
{
    public function index()
    {
        $this->load->language('information/pricelist');

        $this->document->setTitle($this->language->get('heading_title'));

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/home')
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('information/pricelist')
        );


        $this->load->model('catalog/category');
        $this->load->model('catalog/pricelist');

        $categories = array();

        $products_in_categories = array();

        $categories[] = $this->model_catalog_category->getCategory(20);
        $categories[] = $this->model_catalog_category->getCategory(24);
        $categories[] = $this->model_catalog_category->getCategory(18);

        for($i = 0 ; $i < count($categories) ; $i++){
            $products_in_categories[$i]['category_name'] = $categories[$i]['name'];
            $products_in_categories[$i]['products'] = $this->model_catalog_pricelist->getProductInCategory($categories[$i]['category_id']);
        }

        $data['products_in_categories'] = $products_in_categories;
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');


        $this->response->setOutput($this->load->view('information/pricelist', $data));
    }
}