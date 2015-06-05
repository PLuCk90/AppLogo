<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_m extends CI_Model {

  public function getToday()
  {
  	$today = getdate();
  	$today = array(
  		'mon' => $today['mon'],
  		'month' => $today['month'],
  		'year' => $today['year']
  		 ); 
  	return $today;
  }

  public function getLitteralMonth($num)
  {
  	switch ($num) {
  		case '1':
  			$month = lang('january');
  			break;
  		case '2':
  			$month = lang('february');
  			break;
  		case '3':
  			$month = lang('march');
  			break;
  		case '4':
  			$month = lang('april');
  			break;
  		case '5':
  			$month = lang('may');
  			break;
  		case '6':
  			$month = lang('june');
  			break;
  		case '7':
  			$month = lang('july');
  			break;
  		case '8':
  			$month = lang('august');
  			break;
  		case '9':
  			$month = lang('september');
  			break;
  		case '10':
  			$month = lang('october');
  			break;
  		case '11':
  			$month = lang('november');
  			break;
  		case '12':
  			$month = lang('december');
  			break;
  	}
  	return $month;
  }

  public function getProductsByCoord($code,$licence,$family,$theme,$mounting)
  {
	    $M3 = $this->load->database('m3_db',TRUE);
	    $sql = "SELECT     Coordinateur, Licence, Thème, Famille, Montage, Référence, Désignation, Dépot, [Type article] AS Type_article, SUM([Qté reste à facturer]) AS Qté_reste_à_facturer,
	    SUM([Qté Back Order]) AS [Qté_BO], [Période livraison] AS Période_livraison
	    FROM         dbo.[Portefeuille de commandes]
	    GROUP BY Coordinateur, Licence, Thème, Famille, Montage, Référence, Désignation, Dépot, [Type article], [Période livraison]
	    HAVING      ([Type article] = N'MONTURE') AND (Dépot = N'D01') AND Coordinateur = '".$code."'".$theme.$family.$mounting.$licence.";";
	    $query=$M3->query($sql); 
	    $data1 = $query->result_array();

	    $this->db->select('amount_forecast,product_forecast,date_forecast');
	    $this->db->from('forecast');
	    $this->db->where("m3_code_forecast", $code);
	    $this->db->order_by('date_forecast', 'ASC');
	    $query = $this->db->get();
	    $data2 = $query->result_array();
	    $data = array(
	    	'products' => $data1 ,
	    	'forecast' => $data2 
	    	);
	    echo json_encode($data);
  }

  public function getForecastbyCoord($code)
  {
  	$this->db->select('amount_forecast,product_forecast,date_forecast');
     $this->db->from('forecast');
     $this->db->where("m3_code_forecast", $code);
     $this->db->order_by('date_forecast', 'ASC');
     $query = $this->db->get();
     echo json_encode($query->result()); 
  }

  public function getLicenceDropdown($code,$theme,$family,$mounting)
  {
  		$M3 = $this->load->database('m3_db',TRUE);
	    $sql = "SELECT  Licence
	    FROM  dbo.[Portefeuille de commandes]
	    GROUP BY Licence, Coordinateur, [Type article], Dépot, Thème, Famille, Montage
	    HAVING      ([Type article] = N'MONTURE') AND (Dépot = N'D01') AND Licence != '' AND Coordinateur = '".$code."'".$theme.$family.$mounting."
	    ORDER BY Licence;";
	    $query=$M3->query($sql); 
	    echo json_encode($query->result_array());
	    
  }

  public function getThemeDropdown($code,$licence,$family,$mounting)
  {
  		$M3 = $this->load->database('m3_db',TRUE);
	    $sql = "SELECT  Thème
	    FROM  dbo.[Portefeuille de commandes]
	    GROUP BY Thème, Coordinateur, [Type article], Dépot, Licence,Famille,Montage
	    HAVING      ([Type article] = N'MONTURE') AND (Dépot = N'D01') AND Thème != '' AND Coordinateur = '".$code."'".$licence.$family.$mounting."
	    ORDER BY Thème;";
	    $query=$M3->query($sql); 
	    echo json_encode($query->result_array());

	    
  }

   public function getFamilyDropdown($code,$licence,$theme,$mounting)
  {
  		$M3 = $this->load->database('m3_db',TRUE);
	    $sql = "SELECT  Famille
	    FROM  dbo.[Portefeuille de commandes]
	    GROUP BY Famille, Coordinateur, [Type article], Dépot, Licence,Thème,Montage
	    HAVING      ([Type article] = N'MONTURE') AND (Dépot = N'D01') AND Famille != '' AND Coordinateur = '".$code."'".$theme.$licence.$mounting."
	    ORDER BY Famille;";
	    $query=$M3->query($sql); 
	    echo json_encode($query->result_array());
	    
  }

   public function getMountingDropdown($code,$licence,$family,$theme)
  {
  		$M3 = $this->load->database('m3_db',TRUE);
	    $sql = "SELECT  Montage
	    FROM  dbo.[Portefeuille de commandes]
	    GROUP BY Montage, Coordinateur, [Type article], Dépot, Licence, Thème, Famille
	    HAVING      ([Type article] = N'MONTURE') AND (Dépot = N'D01') AND Montage != '' AND Coordinateur = '".$code."'".$theme.$family.$licence."
	    ORDER BY Thème;";
	    $query=$M3->query($sql); 
	    echo json_encode($query->result_array());
	    
  }

  public function getAllLicences($code)
  {
  	$M3 = $this->load->database('m3_db',TRUE);
	    $sql = "SELECT  Licence
	    FROM  dbo.[Portefeuille de commandes]
	    GROUP BY  Licence, Coordinateur, [Type article], Dépot
	    HAVING  ([Type article] = N'MONTURE') AND (Dépot = N'D01') AND Licence != '' AND Coordinateur = '".$code."'
	    ORDER BY Licence;";
	    $query=$M3->query($sql); 
	    return $query->result_array();
  }

  public function getAllTheme($code)
  {
  		$M3 = $this->load->database('m3_db',TRUE);
	    $sql = "SELECT  Thème
	    FROM  dbo.[Portefeuille de commandes]
	    GROUP BY  Licence,Thème, Coordinateur, [Type article], Dépot
	    HAVING  ([Type article] = N'MONTURE') AND (Dépot = N'D01') AND Thème != '' AND Coordinateur = '".$code."'
	    ORDER BY Thème;";
	    $query=$M3->query($sql); 
	    return $query->result_array();
  }

  public function getAllFamily($code)
  {
  	$M3 = $this->load->database('m3_db',TRUE);
	    $sql = "SELECT  Famille
	    FROM  dbo.[Portefeuille de commandes]
	    GROUP BY  Famille, Coordinateur, [Type article], Dépot
	    HAVING  ([Type article] = N'MONTURE') AND (Dépot = N'D01') AND Famille != '' AND Coordinateur = '".$code."'
	    ORDER BY Famille;";
	    $query=$M3->query($sql); 
	    return $query->result_array();
  }

  public function getAllMounting($code)
  {
  	$M3 = $this->load->database('m3_db',TRUE);
	    $sql = "SELECT  Montage
	    FROM  dbo.[Portefeuille de commandes]
	    GROUP BY Montage, Coordinateur, [Type article], Dépot
	    HAVING  ([Type article] = N'MONTURE') AND (Dépot = N'D01') AND Montage != '' AND Coordinateur = '".$code."'
	    ORDER BY Montage;";
	    $query=$M3->query($sql); 
	    return $query->result_array();
  }

  public function saveForecast($data)
  {

  		$this->db->insert("forecast",$data);
  		echo json_encode($data);
	   	
  }

}
