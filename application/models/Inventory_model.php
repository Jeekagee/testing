<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Inventory_model extends CI_Model 
{
    public function show_items($cat_id){

        if ($cat_id == 0) {
            $sql = "SELECT * FROM int_items ORDER BY created_at DESC";
        }
        else{
            $sql = "SELECT * FROM int_items WHERE item_catogery = $cat_id ORDER BY created_at DESC";
        }
        
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }
    
    //All item Catogiries
    public function item_catogories(){
        $sql = "SELECT * FROM int_catogery ORDER BY catogery ASC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }


    public function item_catogery($cat_id){
        $sql = "SELECT * FROM int_catogery WHERE cat_id = $cat_id";
        $query = $this->db->query($sql);
        $result = $query->first_row();

        return $result;
    }

    public function item_sub_catogery($cat_id){
        $sql = "SELECT * FROM int_sub_catogery WHERE sub_cat_id = $cat_id";
        $query = $this->db->query($sql);
        $result = $query->first_row();

        return $result;
    }

    public function item_brand($brand_id){
        $sql = "SELECT * FROM int_brand WHERE brand_id = $brand_id";
        $query = $this->db->query($sql);
        $result = $query->first_row();

        return $result;
    }

    public function filter_range($filter_range_id){
        $sql = "SELECT * FROM int_filter_range WHERE filter_range_id = $filter_range_id";
        $query = $this->db->query($sql);
        $result = $query->first_row();

        return $result;
    }

    public function delete($id){
        $this->db->where('item_id', $id);
        $this->db->delete('int_items');
    }

    public function update_stock($item_id,$stock,$price){
        //$sql = "UPDATE int_items SET stock='$stock',price='$price' WHERE item_id=$item_id";
        //$query = $this->db->query($sql);
        $data = array(
            'stock' => $stock,
            'price' => $price
        );
        
        $this->db->where('item_id', $item_id);
        $this->db->update('int_items', $data);
    }

    public function show_sub_cat($catogery){
        $sql = "SELECT * FROM int_sub_catogery WHERE catogery = $catogery";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function show_brand($catogery){
        $sql = "SELECT * FROM int_brand WHERE catogery = $catogery";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function show_frange($catogery){
        $sql = "SELECT * FROM int_filter_range WHERE catogery = $catogery";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function insert_item($id,$name,$cat,$subcat,$filter_range,$capacity,$part_number,$brand){
        $data = array(
            'item_id' => $id,
            'item_name' => $name,
            'item_catogery' => $cat,
            'item_sub_catogery' => $subcat,
            'item_brand' => $brand,
            'filter_range' => $filter_range,
            'part_number' => $part_number,
            'capacity' => $capacity
        );
    
        $this->db->insert('int_items', $data);
    }

    public function insert_catogery($catogery){
        $data = array(
            'catogery' => $catogery
        );
        $this->db->insert('int_catogery', $data);
    }

    public function insert_sub_catogery($catogery,$subcatogery){
        $data = array(
            'sub_catogery' => $subcatogery,
            'catogery' => $catogery
        );
        $this->db->insert('int_sub_catogery', $data);
    }

    public function insert_filter_range($catogery,$frange){
        $data = array(
            'filter_range' => $frange,
            'catogery' => $catogery
        );
        $this->db->insert('int_filter_range', $data);
    }

    public function insert_brand($catogery,$brand){
        $data = array(
            'brand' => $brand,
            'catogery' => $catogery
        );
        $this->db->insert('int_brand', $data);
    }
}


/* End of file Employees_model.php and path /application/models/Employees_model.php */

