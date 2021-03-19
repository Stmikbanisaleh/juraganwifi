<?php

class Model_daftar_tagihan extends CI_model
{

    public function viewOrderingCustom()
    {
        return $this->db->query("Select a.id , a.invoice,a.no_services, a.month, a.year, a.status, CONCAT('Rp. ',FORMAT(b.price,2)) Nominal,
        CONCAT('Rp. ',FORMAT(b.nominal_bayar,2)) Nominal_bayar
        ,c.name  , c.no_wa,d.name as nama_layanan from invoice a
        join invoice_detail b on a.id = b.invoice_id
        join customer c on a.no_services = c.no_services
        left join package_item d on c.jenis_layanan = d.id
        order by a.createdAt desc");
    }

    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

	public function viewWhere($table, $data)
    {
        return $this->db->query("select a.*, b.nominal_bayar as  Nominal_bayar  from invoice a join invoice_detail b on a.id = b.invoice_id
        where a.id = $data");
	}

    public function gettagihan($id)
    {
        return $this->db->query("select b.price from invoice a join invoice_detail b 
        on a.id = b.invoice_id where a.id = $id");
	}
	
	public function checkDuplicate($data, $table)
    {
        $this->db->where('nama',$data['nama']);
        return $this->db->get($table)->num_rows();
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function view_where($table, $data)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
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
