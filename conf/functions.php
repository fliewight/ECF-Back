<?php
# ------------------------------------------------------------------------
// Pagination
function pagination($nbPages, $p, $lien, $fin='')
{
	$pages = '';
	
	if($p > 1 ) $pages .= ' <a href="'.$lien.( $p - 1 ).$fin.'">Précédente</a>&nbsp;&nbsp;&nbsp;';
	else $pages .= '<span style="text-decoration: line-through;">Précédente</span>&nbsp;&nbsp;&nbsp;';
	
	if($nbPages <= 9){
		for($i = 1; $i <= $nbPages; $i++){
			if($i == $p) $pages .= ' '.$i.' ';
			else $pages .= ' <a href="'.$lien.$i.$fin.'">'.$i.'</a> ';
			if($i != $nbPages) $pages .= '-';
		}
	}
	else
	{
		for($i = 1; $i <= 3; $i++){
			if($i == $p) $pages .= ' '.$i.' ';
			else $pages .= ' <a href="'.$lien.$i.$fin.'">'.$i.'</a> ';
			if($i != $nbPages) $pages .= ' - ';
		}
	
		if($p == 3) $pages .= ' <a href="'.$lien.'4'.$fin.'">4</a> - ';
		if(( $p >= 4 ) && ( $p <= 5 )){
			for($i = 4; $i <= $p + 1; $i++){
				if($i == $p) $pages .= ' '.$i.' ';
				else $pages .= ' <a href="'.$lien.$i.$fin.'">'.$i.'</a> ';
				if($i != $nbPages) $pages .= ' - ';
			}
		}
	
		$pages .= ' ... ';
		if(($p >= 6 ) && ( $p <= $nbPages - 5)){
			for($i = $p - 1; $i <= $p + 1; $i++){
				if($i == $p - 1) $pages .= ' - ';
				if($i == $p) $pages .= ' '.$i.' ';
				else $pages .= ' <a href="'.$lien.$i.$fin.'">'.$i.'</a> ';
				if($i != $nbPages) $pages .= ' - ';
			}
			$pages .= ' ... ';
		}
		if(($p >= $nbPages - 4) && ($p <= $nbPages - 3)){
			for($i = $p - 1; $i <= $nbPages - 3; $i++){
				$pages .= ' - ';
				if($i == $p) $pages .= ' '.$i.' ';
				else $pages .= ' <a href="'.$lien.$i.$fin.'">'.$i.'</a> ';
			}
		}
		if( $p == $nbPages - 2 ) $pages .= ' - <a href="'.$lien.($p - 1).$fin.'">'.($p - 1).'</a> ';
		for($i = $nbPages - 2; $i <= $nbPages; $i++){
			$pages .= ' - ';
			if($i == $p) $pages .= ' '.$i.' ';
			else $pages .= ' <a href="'.$lien.$i.$fin.'">'.$i.'</a> ';
		}
	}
	
	if($p < $nbPages) $pages .= '&nbsp;&nbsp;&nbsp;<a href="'.$lien.( $p + 1 ).$fin.'">Suivante</a>';
	else $pages .= '&nbsp;&nbsp;&nbsp;<span style="text-decoration: line-through;">Suivante</span>';
	
	return $pages;
}
# ------------------------------------------------------------------------
?>