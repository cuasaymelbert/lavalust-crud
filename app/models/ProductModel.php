<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: ProductModel
 * 
 * Automatically generated via CLI.
 */
class ProductModel extends Model {
    protected $table = 'products';
    protected $primary_key = 'id';
    protected $fillable = ['product_name', 'description', 'price', 'quantity'];
    protected $guarded = ['id'];

    public function __construct()
    {
        parent::__construct();
    }

    // READ: GET ALL PRODUCTS
    public function get_all() {
        return $this->db->table($this->table)->get_all();
    }

     // READ: GET PRODUCT BY ID
    public function get_by_id($id) {
        return $this->db->table($this->table)->where('id', $id)->get();
    }

    // CREATE
    public function insert($data) {
        return $this->db->table($this->table)->insert($data);
    }

     // UPDATE
    public function update($id, $data) {
        return $this->db->table($this->table)->where('id', $id)->update($data);
    }

     // DELETE
    public function delete($id) {
        return $this->db->table($this->table)->where('id', $id)->delete();
    }
}




    

   

    

   

   
