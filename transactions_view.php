<?php
// This script and data application were generated by AppGini 5.62
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/transactions.php");
	include("$currDir/transactions_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('transactions');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "transactions";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`transactions`.`id`" => "id",
		"if(`transactions`.`transaction_date`,date_format(`transactions`.`transaction_date`,'%d/%m/%Y'),'')" => "transaction_date",
		"IF(    CHAR_LENGTH(`items1`.`item`), CONCAT_WS('',   `items1`.`item`), '') /* Item */" => "item",
		"IF(    CHAR_LENGTH(`batches1`.`batch_no`), CONCAT_WS('',   `batches1`.`batch_no`), '') /* Batch */" => "batch",
		"IF(    CHAR_LENGTH(`sections1`.`section`), CONCAT_WS('',   `sections1`.`section`), '') /* Storage section */" => "section",
		"`transactions`.`transaction_type`" => "transaction_type",
		"`transactions`.`quantity`" => "quantity"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`transactions`.`id`',
		2 => '`transactions`.`transaction_date`',
		3 => '`items1`.`item`',
		4 => '`batches1`.`batch_no`',
		5 => '`sections1`.`section`',
		6 => 6,
		7 => '`transactions`.`quantity`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`transactions`.`id`" => "id",
		"if(`transactions`.`transaction_date`,date_format(`transactions`.`transaction_date`,'%d/%m/%Y'),'')" => "transaction_date",
		"IF(    CHAR_LENGTH(`items1`.`item`), CONCAT_WS('',   `items1`.`item`), '') /* Item */" => "item",
		"IF(    CHAR_LENGTH(`batches1`.`batch_no`), CONCAT_WS('',   `batches1`.`batch_no`), '') /* Batch */" => "batch",
		"IF(    CHAR_LENGTH(`sections1`.`section`), CONCAT_WS('',   `sections1`.`section`), '') /* Storage section */" => "section",
		"`transactions`.`transaction_type`" => "transaction_type",
		"`transactions`.`quantity`" => "quantity"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`transactions`.`id`" => "ID",
		"`transactions`.`transaction_date`" => "Transaction date",
		"IF(    CHAR_LENGTH(`items1`.`item`), CONCAT_WS('',   `items1`.`item`), '') /* Item */" => "Item",
		"IF(    CHAR_LENGTH(`batches1`.`batch_no`), CONCAT_WS('',   `batches1`.`batch_no`), '') /* Batch */" => "Batch",
		"IF(    CHAR_LENGTH(`sections1`.`section`), CONCAT_WS('',   `sections1`.`section`), '') /* Storage section */" => "Storage section",
		"`transactions`.`transaction_type`" => "Transaction type",
		"`transactions`.`quantity`" => "Quantity"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`transactions`.`id`" => "id",
		"if(`transactions`.`transaction_date`,date_format(`transactions`.`transaction_date`,'%d/%m/%Y'),'')" => "transaction_date",
		"IF(    CHAR_LENGTH(`items1`.`item`), CONCAT_WS('',   `items1`.`item`), '') /* Item */" => "item",
		"IF(    CHAR_LENGTH(`batches1`.`batch_no`), CONCAT_WS('',   `batches1`.`batch_no`), '') /* Batch */" => "batch",
		"IF(    CHAR_LENGTH(`sections1`.`section`), CONCAT_WS('',   `sections1`.`section`), '') /* Storage section */" => "section",
		"`transactions`.`transaction_type`" => "transaction_type",
		"`transactions`.`quantity`" => "quantity"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'item' => 'Item', 'batch' => 'Batch', 'section' => 'Storage section');

	$x->QueryFrom = "`transactions` LEFT JOIN `items` as items1 ON `items1`.`id`=`transactions`.`item` LEFT JOIN `batches` as batches1 ON `batches1`.`id`=`transactions`.`batch` LEFT JOIN `sections` as sections1 ON `sections1`.`id`=`transactions`.`section` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "transactions_view.php";
	$x->RedirectAfterInsert = "transactions_view.php?SelectedID=#ID#";
	$x->TableTitle = "Transactions";
	$x->TableIcon = "resources/table_icons/book_keeping.png";
	$x->PrimaryKey = "`transactions`.`id`";
	$x->DefaultSortField = '`transactions`.`transaction_date`';
	$x->DefaultSortDirection = 'desc';

	$x->ColWidth   = array(  150, 150, 150, 150, 150, 150);
	$x->ColCaption = array("Transaction date", "Item", "Batch", "Storage section", "Transaction type", "Quantity");
	$x->ColFieldName = array('transaction_date', 'item', 'batch', 'section', 'transaction_type', 'quantity');
	$x->ColNumber  = array(2, 3, 4, 5, 6, 7);

	// template paths below are based on the app main directory
	$x->Template = 'templates/transactions_templateTV.html';
	$x->SelectedTemplate = 'templates/transactions_templateTVS.html';
	$x->TemplateDV = 'templates/transactions_templateDV.html';
	$x->TemplateDVP = 'templates/transactions_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `transactions`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='transactions' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `transactions`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='transactions' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`transactions`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: transactions_init
	$render=TRUE;
	if(function_exists('transactions_init')){
		$args=array();
		$render=transactions_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: transactions_header
	$headerCode='';
	if(function_exists('transactions_header')){
		$args=array();
		$headerCode=transactions_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: transactions_footer
	$footerCode='';
	if(function_exists('transactions_footer')){
		$args=array();
		$footerCode=transactions_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>