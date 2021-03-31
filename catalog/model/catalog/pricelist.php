<?php


class ModelCatalogPricelist extends Model {
    public function getProductInCategory($category_id){
        $query = $this->db->query("SELECT oc_product_description.name, oc_product.price FROM oc_product_to_category join oc_product_description on oc_product_to_category.product_id = oc_product_description.product_id join oc_product on oc_product_to_category.product_id = oc_product.product_id WHERE oc_product_to_category.category_id = " . $category_id);
        return $query->rows;
    }
}