<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class models extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_selected($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

    public function add_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_selected_limit($table,$where,$limit,$orderby,$id)
    {
        $this->db->order_by($id, $orderby);
        return $this->db->get_where($table,$where,$limit);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function add_data1($table, $data)
    {
        $this->db->insert($table, $data);
        return  $this->db->insert_id();
    }

    public function get_selected_join($table,$table1,$where,$on)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_3selected_join($table,$table1,$table2,$on,$on2,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_3join($table,$table1,$table2,$on, $on2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $query = $this->db->get();
        return $query;
    }

    public function get_4selected_join($table,$table1,$table2,$table3,$on,$on2,$on3,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_6join($table,$table1,$table2,$table3,$table4,$table5,$on,$on2,$on3,$on4,$on5)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $query = $this->db->get();
        return $query;
    }

    public function get_7join($table,$table1,$table2,$table3,$table4,$table5,$table6,$on,$on2,$on3,$on4,$on5,$on6)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $this->db->join($table6, $on6);
        $query = $this->db->get();
        return $query;
    }

    public function get_7selected_join($table,$table1,$table2,$table3,$table4,$table5,$table6,$on,$on2,$on3,$on4,$on5,$on6,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $this->db->join($table6, $on6);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_6selected_join($table,$table1,$table2,$table3,$table4,$table5,$on,$on2,$on3,$on4,$on5,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->join($table5, $on5);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    public function get_5join($table,$table1,$table2,$table3,$table4,$on,$on2,$on3,$on4,$where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function get_5selected_join($table,$table1,$table2,$table3,$table4,$on,$on2,$on3,$on4)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $this->db->join($table4, $on4);
        $query = $this->db->get();
        return $query;
    }

    public function get_4join($table,$table1,$table2,$table3,$on,$on2,$on3)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table1, $on);
        $this->db->join($table2, $on2);
        $this->db->join($table3, $on3);
        $query = $this->db->get();
        return $query;
    }

    function getRows($params = array()){
        $this->db->select("*");
        $this->db->from('univ');
        $this->db->limit(5);

        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }

        //search by terms
        if(!empty($params['searchTerm'])){
            $this->db->like('nama_univ', $params['searchTerm']);
        }

        $this->db->order_by('nama_univ', 'asc');

        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        //return fetched data
        return $result;
    }

    function chart($select,$table,$table1,$on1,$table2,$on2,$groupby){
//        $query = $this->db->query("SELECT tgl_pengajuan_form,COUNT(tgl_pengajuan_form) as id from form_magang where YEARWEEK(tgl_pengajuan_form) = YEARWEEK(NOW())");
//        return $query->result();
//        SELECT divisi.divisi, COUNT(id_form) as jumlah FROM `form_magang` inner join kamus on form_magang.id_kamus = kamus.id_kamus inner join divisi on kamus.id_divisi = divisi.id_divisi group by divisi.divisi
        //$week = $date->date_format('W');
        //date("W", $date);
        //var_dump(date("W", $date));
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($table1,$on1);
        $this->db->join($table2,$on2);
        $this->db->group_by($groupby);
        $query = $this->db->get();
        return $query;
    }

    function get_divisi($id){
        $this->db->select('*');
        $this->db->from('kamus');
        $this->db->where('id_jurusan',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

}