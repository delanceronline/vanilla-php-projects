<?php


/**
 * SearchControl builder for search panel on list
 *
 */
class PanelSearchControl extends SearchControl 
{
	// attrs only for search panel
	function getCtrlParamsArr($fName, $recId, $fieldNum=0, $value, $renderHidden = false, $isCached=true) 
	{
		$control = parent::getCtrlParamsArr($fName, $recId, $fieldNum, $value, $renderHidden, $isCached) ;
		
		$control["params"]["additionalCtrlParams"]['skipDependencies'] = true;
		$control["params"]["additionalCtrlParams"]["style"] = 'width: 115px;';
				
		$ctrlsMap = array('controls'=>array());
		$ctrlsMap['controls']["skipDependencies"] = true;
		$ctrlsMap['controls']["style"] = 'width: 115px;';
		$this->pageObj->fillControlsMap($ctrlsMap,true);
		
		return $control;
	}
	
	function simpleSearchFieldCombo($fNamesArr, $selOpt) 
	{
		$options = '<OPTION VALUE="" >'.mlang_message("ANY_FIELD").'</option>';
		
		foreach($fNamesArr as $fName)
		{
			$fLabel = GetFieldLabel(GoodFieldName($this->tName), GoodFieldName($fName));
			$options .= '<OPTION VALUE="'.$fName.'" '.($selOpt == $fName ? 'selected' : '').'>'.$fLabel.'</option>';
		}
		return $options;
	}
	
	
	function getCtrlSearchTypeOptions($fName, $selOpt, $not) 
	{	
		$options = parent::getCtrlSearchTypeOptions($fName, $selOpt, $not) ;
		
		if (strlen($fName))
		{
			$fType = GetEditFormat($fName, $this->tName);	
		}
		else 
		{
			$fType = EDIT_FORMAT_TEXT_FIELD;
		}
			
		
		if ($fType == EDIT_FORMAT_DATE || $fType == EDIT_FORMAT_TIME)
		{
			$options.="<OPTION VALUE=\"NOT Equals\" ".(($selOpt=="Equals" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_EQUALS")."</option>";
			$options.="<OPTION VALUE=\"NOT More than\" ".(($selOpt=="More than" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_MORE_THAN")."</option>";
			$options.="<OPTION VALUE=\"NOT Less than\" ".(($selOpt=="Less than" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_LESS_THAN")."</option>";
			$options.="<OPTION VALUE=\"NOT Between\" ".(($selOpt=="Between" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_BETWEEN")."</option>";
			$options.="<OPTION VALUE=\"NOT Empty\" ".(($selOpt=="Empty" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_EMPTY")."</option>";
		}
		elseif ($fType == EDIT_FORMAT_LOOKUP_WIZARD)
		{
			if (Multiselect($fName, $this->tName)){
				$options.="<OPTION VALUE=\"NOT Contains\" ".(($selOpt=="Contains" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_CONTAINS")."</option>";
			}else{
				$options.="<OPTION VALUE=\"NOT Equals\" ".(($selOpt=="Equals" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_EQUALS")."</option>";
			}
		}
		elseif ($fType == EDIT_FORMAT_TEXT_FIELD || $fType == EDIT_FORMAT_TEXT_AREA || $fType == EDIT_FORMAT_PASSWORD 
					|| $fType == EDIT_FORMAT_HIDDEN || $fType == EDIT_FORMAT_READONLY)
		{
			$options.="<OPTION VALUE=\"NOT Contains\" ".(($selOpt=="Contains" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_CONTAINS")."</option>";
			$options.="<OPTION VALUE=\"NOT Equals\" ".(($selOpt=="Equals" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_EQUALS")."</option>";
			$options.="<OPTION VALUE=\"NOT Starts with\" ".(($selOpt=="Starts with" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_STARTS_WITH")."</option>";
			$options.="<OPTION VALUE=\"NOT More than\" ".(($selOpt=="More than" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_MORE_THAN")."</option>";
			$options.="<OPTION VALUE=\"NOT Less than\" ".(($selOpt=="Less than" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_LESS_THAN")."</option>";
			$options.="<OPTION VALUE=\"NOT Between\" ".(($selOpt=="Between" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_BETWEEN")."</option>";
			$options.="<OPTION VALUE=\"NOT Empty\" ".(($selOpt=="Empty" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_EMPTY")."</option>";
		}
		else
			$options.="<OPTION VALUE=\"NOT Equals\" ".(($selOpt=="Equals" && $not)?"selected":"").">".mlang_message("SEARCH_NOT_EQUALS")."</option>";
		
		return $options;
	}
	/**
	 * For loop assign in window table
	 *
	 * @param int $recId
	 * @param string $fName
	 * @return array
	 */
	function buildSearchCtrlWinBlockArr($recId, $fName) 
	{
		$srchCtrlWinBlock = array();
		// one control with options container attr
		//$filterDivMouseEvents = $this->getFilterDivEvents($recId, $fName);
		$filterRowId = $this->getFilterDivId($recId, $fName).'_win';
		$srchCtrlWinBlock['filterRow_attrs'] = 'id="'.$filterRowId.'" ';//.$filterDivMouseEvents;
		// combo container	
		$srchCtrlWinBlock['srchTypeCont_attrs_win'] = 'id="'.$this->getCtrlComboContId($recId, $fName).'_win"';
		
		return $srchCtrlWinBlock;
	}
	
}


?>