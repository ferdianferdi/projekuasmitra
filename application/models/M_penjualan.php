<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penjualan extends CI_Model
{

    public function no_struk()
    {
        $sql = "SELECT MAX(MID(struk,9,4)) AS no_struk 
        FROM transaksi_penjualan WHERE MID(struk,3,6) = DATE_FORMAT(CURDATE(), '%d%m%Y')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $no = ((int) $row->no_struk) + 1;
            $nomor = sprintf("%04s", $no);
        } else {
            $nomor = "0001";
        }
        $struk = "DMA" . date("dmy") . $nomor;
        return $struk;
    }

}
?>