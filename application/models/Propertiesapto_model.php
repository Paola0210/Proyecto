<?php
/**
 * Neo Billing -  Accounting,  Invoicing  and CRM Software
 * Copyright (c) Rajesh Dukiya. All Rights Reserved
 * ***********************************************************************
 *
 *  Email: support@ultimatekode.com
 *  Website: https://www.ultimatekode.com
 *
 *  ************************************************************************
 *  * This software is furnished under a license and may be used and copied
 *  * only  in  accordance  with  the  terms  of such  license and with the
 *  * inclusion of the above copyright notice.
 *  * If you Purchased from Codecanyon, Please read the full License from
 *  * here- http://codecanyon.net/licenses/standard/
 * ***********************************************************************
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Propertiesapto_model extends CI_Model
{
    var $table="propiedades_apartamentos";
    var $column_order = array("abonado","name","tipo_documento","documento","usu_estado");
    var $column_search = array("abonado","name","dosnombre","unoapellido","dosapellido","celular","email","tipo_documento","documento","usu_estado");
    
    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        
        $i=0;
        foreach ($this->column_search as $item) // loop column
        {
            $search = $this->input->post('search');
            $value = $search['value'];
            if ($value) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $value);
                } else {
                    $this->db->or_like($item, $value);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        $search = $this->input->post('order');
        if ($search) // here order processing
        {
            $this->db->order_by($this->column_order[$search['0']['column']], $search['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        $this->db->order_by("id","desc");
        if ($this->input->post('length') != -1)
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_properties(){
        return $this->db->get_where("propiedades_apartamentos")->result_array();
    }
    public function save(){
        $nombre=$this->input->post("nombre");
    $is_exist=$this->db->get_where("propiedades_apartamentos",array("nombre"=>$nombre))->row();
        if(!empty($is_exist)){
            return false;
        }else{
            $tipo=$this->input->post("tipo");
            $maximo=null;
            $lista_multiple=null;
            if($tipo=="numeric"){
                $maximo=$this->input->post("maximo");    
                if($maximo<=0){
                    $maximo=1;
                }
            }else if($tipo=="List"){
                $lista_multiple=$this->input->post("lista_multiple");    
            }

            $data=array();
            $data['nombre']=$nombre;
            $data['tipo']=$tipo;
            $data['maximo']=$maximo;
            $data['lista_de_elementos']=json_encode($lista_multiple);
            $this->db->insert("propiedades_apartamentos",$data);
            return true;
        }
    }
}