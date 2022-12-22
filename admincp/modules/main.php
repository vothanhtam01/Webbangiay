<div>
	<?php
        if(isset($_GET['action']) && $_GET['query']){
            $action = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $action = '';
            $query = '';
        }
        if($action=='quanlydanhmucsanpham' && $query=='them'){
            include("modules/quanlydanhmucsp/them.php");
            include("modules/quanlydanhmucsp/lietke.php");
        }
        elseif ($action=='quanlydanhmucsanpham' && $query=='sua') {
            include("modules/quanlydanhmucsp/sua.php");
        }elseif ($action=='quanlysp' && $query=='them') {
            include("modules/quanlysp/them.php");
            include("modules/quanlysp/lietke.php");
        }elseif($action=='quanlysp' && $query=='sua'){
            include("modules/quanlysp/sua.php");
        }elseif($action=='quanlydonhang' && $query=='lietke'){
            include("modules/quanlydonhang/lietke.php");
        }elseif($action=='donhang' && $query=='xemdonhang'){
            include("modules/quanlydonhang/xemdonhang.php");
        }
        else{
            include("modules/dashboard.php");
        }
	?> 
	
</div>