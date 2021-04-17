<?php

class Model_generate_tagihan_log extends CI_model
{

	function viewOrderingTagihan()
    {
		return $this->db->query("select a.due_date,a.createdAt,c.name,c.no_wa,a.invoice, a.month, a.year,a.status, sum(b.price) as total_tagihan from invoice a 
		join invoice_detail b on a.id = b.invoice_id
		join customer c on a.no_services = c.no_services 
        group by a.invoice");
	}

	function cek($bulan, $tahun, $no_services)
    {
		return $this->db->query("select no_services from invoice where no_services ='$no_services' and month='$bulan' and year ='$tahun' ");
	}
	
    function getDataByInvoice($invoice)
    {
		return $this->db->query("select d.name as nama_layanan, a.token, c.name, a.no_services, DATE_FORMAT(a.createdAt, '%d-%M-%Y') as periode_awal , DATE_FORMAT(a.due_date, '%d-%M-%Y') as periode_akhir,
        CONCAT('Rp. ',FORMAT(b.price,2)) Nominal,DATE_FORMAT(DATE_ADD(a.createdAt,INTERVAL 14 DAY),'%d-%M-%Y') as jatuh_tempo  from invoice a 
        join invoice_detail b on a.id = b.invoice_id 
        join customer c on a.no_services = c.no_services
        join package_item d on b.item_id = d.id where a.invoice = '$invoice' ");
	}

	function cekInvoice($month, $year)
    {
		return $this->db->query("select invoice, no_services from invoice where month = '$month' and year = '$year' and status = 0 ");
	}

	function cekInvoice2($month, $year, $pelanggan)
    {
		$pelanggan = join("','",$pelanggan); 
		return $this->db->query("select invoice, no_services from invoice where month = '$month' and year = '$year' and status = 0  and no_services in ('$pelanggan')");
	}

	function viewCustomer($invoice)
    {
		return $this->db->query("Select b.no_unik, a.status,a.invoice,a.month,a.year,b.price,d.name as nama_layanan from invoice a 
		left join invoice_detail b on a.id = b.invoice_id
		left join customer c on a.no_services = c.no_services
		left join package_item d on b.item_id = d.id
		where a.invoice ='".$invoice."'");
	}

	function viewPelanggan($invoice)
    {
		return $this->db->query("Select b.id,a.year,b.no_wa,b.no_services,b.name,b.email,b.address from invoice a
		left join customer b on a.no_services = b.no_services
		where a.invoice ='".$invoice."'");
	}

	public function viewWhereCustom($data)
    {
        return $this->db->query("select a.month,c.address, c.name,a.*, b.nominal_bayar as  Nominal_bayar  from invoice a 
		left join invoice_detail b on a.id = b.invoice_id
		left join customer c on a.no_services = c.no_services
        where a.id = $data");
	}

	function generateTagihan($services)
    {
		return $this->db->query("Select b.id as item_id , b.price as price from service a
		join package_item b on a.id_service = b.id
		join customer c on c.no_services = a.id_customer
		where a.id_customer = '".$services."' and b.status != 0");
	}
	
    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
	}

	public function viewOrderingCustom($table, $order, $ordering)
    {
        $this->db->where('status', '1');
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
	}
	
	
    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
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
