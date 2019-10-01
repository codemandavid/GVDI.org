<?php

	include("connection.php");
	
	$query=mysqli_query($conn,"SELECT count(id) FROM `volunteer_table`");
	$row = mysqli_fetch_row($query);

	$rows = $row[0];
	
	$page_rows = 15;

	$last = ceil($rows/$page_rows);

	if($last < 1){
		$last = 1;
	}

	$pagenum = 1;

	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}

	if ($pagenum < 1) { 
		$pagenum = 1; 
	} 
	else if ($pagenum > $last) { 
		$pagenum = $last; 
	}

	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	
	$nquery=mysqli_query($conn,"SELECT * FROM `volunteer_table` $limit");

	$paginationCtrls = '';

	if($last != 1){





		
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<li><a href="index2.php?pn='.$previous.'">&lt;</a></li>';
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<li><a href="index2.php?pn='.$i.'">'.$i.'</a></li>';
			}
	    }
    }
	
	$paginationCtrls .= '<li><a href="">'.$pagenum.'</a></li>';
	
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<li><a href="index2.php?pn='.$i.'">'.$i.'</a></li>';
		if($i >= $pagenum+4){
			break;
		}
	}

    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '<li><a href="index2.php?pn='.$next.'">&gt;</a></li>';
    }
	}

?>