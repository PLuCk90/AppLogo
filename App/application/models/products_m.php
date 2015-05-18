<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_m extends CI_Model {


  public function getAllProductsbyCoord($code)
  {
	    $M3 = $this->load->database('m3_db',TRUE);
	    $sql = "SELECT     Coordinateur, Licence, Thème, Famille, Montage, Référence, Désignation, Dépot, [Type article], SUM([Qté reste à facturer]) AS [Qté reste à facturer],
	    SUM([Qté Back Order]) AS [Qté BO], [Période livraison]
	    FROM         dbo.[Portefeuille de commandes]
	    GROUP BY Coordinateur, Licence, Thème, Famille, Montage, Référence, Désignation, Dépot, [Type article], [Période livraison]
	    HAVING      ([Type article] = N'MONTURE') AND (Dépot = N'D01') AND Coordinateur = '".$code."'";
	    $query=$M3->query($sql); 
	    return $query->result_array();
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

}
