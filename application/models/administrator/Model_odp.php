<?php

class Model_odp extends CI_model
{


    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }
	 function viewOrderingCustom($table, $order, $ordering)
    {
        return $this->db->query("select a.*,b.nama as nama_wilayah,c.kode as kode_odc from odp a
		 left join wilayah b on a.wilayah = b.id
		 left join odc c on a.odc = c.id");
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }


	public function checkDuplicate($data, $table)
    {
        $this->db->where('kode',$data['kode']);
        return $this->db->get($table)->num_rows();
    }

    public function viewWhere($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
	}
	
    public function insert($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    function truncate($table)
    {
        $this->db->truncate($table);
    }
}
