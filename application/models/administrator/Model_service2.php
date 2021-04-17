<?php

class Model_service2 extends CI_model
{


    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

	public function viewOrderingCustom($table, $order, $ordering)
    {
        return $this->db->query("Select a.id, b.name as nama , c.no_services, a.keterangan, c.name as nama_cus from service2 a
		 left join package_item b on a.id_service = b.id
		 left join customer_corporate c on a.id_customer = c.no_services");
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
