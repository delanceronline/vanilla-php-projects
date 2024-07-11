<?php

class TPaging
{
	var $mItemsPerPage;
	var $mPageItemsPerPage;
	var $mPageOffset;
	var $mCurrentPageName;
	var $mTotalNumItems;
	var $mTotalNumPages;
	var $mCurrentEndPage;
	var $mCurrentStartPage;
	var $mPage;
	var $mStartItem;
	var $mCSSClass;
	var $mParameters;

	function TPaging($ItemsPerPage, $PageItemsPerPage, $PageOffset, $CurrentPageName, $TotalNumItems, $Parameters, $CSSClass)
	{
		$this->mItemsPerPage = $ItemsPerPage;
		$this->mPageItemsPerPage = $PageItemsPerPage;
		$this->mPageOffset = $PageOffset;
		$this->mCurrentPageName = $CurrentPageName;
		$this->mTotalNumItems = $TotalNumItems;
		$this->mParameters = $Parameters;
		$this->mCSSClass = $CSSClass;
	}
	
	function Paginate()
	{
		$this->mTotalNumPages = 0;
		if($this->mTotalNumItems < $this->mItemsPerPage)
			$this->mTotalNumPages = 1;
		else
		{
			$Remainder = $this->mTotalNumItems % $this->mItemsPerPage;
		
			if($Remainder ==0)
				$this->mTotalNumPages = $this->mTotalNumItems / $this->mItemsPerPage;
			else
				$this->mTotalNumPages = ($this->mTotalNumItems - $Remainder) / $this->mItemsPerPage + 1;
		}
		
		$this->mPage = 1;
		if(isset($_REQUEST['nPage']))
			$this->mPage = $_REQUEST['nPage'];
		
		if($this->mPage < 1)
			$this->mPage = 1;
		else if($this->mPage > $this->mTotalNumPages)
			$this->mPage = $this->mTotalNumPages;
			
		$this->mCurrentStartPage = $this->mPage - $this->mPageOffset;
		$o1 = $this->mTotalNumPages - $this->mCurrentStartPage;
		$o2 = $this->mPageItemsPerPage - 1;
		if($o1 < $o2)
			$this->mCurrentStartPage -= $o2 - $o1;	
		if($this->mCurrentStartPage < 1)
			$this->mCurrentStartPage = 1;
		
		$this->mCurrentEndPage = $this->mCurrentStartPage + $this->mPageItemsPerPage - 1;
		if($this->mCurrentEndPage > $this->mTotalNumPages)
			$this->mCurrentEndPage = $this->mTotalNumPages;	
		
		$this->mStartItem = ($this->mPage - 1) * $this->mItemsPerPage;
		
		if($this->mParameters != "")
			$this->mParameters = "&".$this->mParameters;
	}

	function GetStartIndex()
	{
		return $this->mStartItem;
	}
	
	function GetItemsPerPage()
	{
		return $this->mItemsPerPage;
	}
	
	function Render()
	{
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="60">&nbsp;</td>';
		
		$LeftMargin = $this->mCurrentStartPage - 1;
		$RightMargin = $this->mCurrentEndPage + 1;
			
			echo '<td width="100"><span class="brown_bold_text">'.$this->mPage.'/'.$this->mTotalNumPages.'</span> <span class="brown_bold_text">頁</span></td>';
			
			if($LeftMargin > 0)
			{			
				echo "<td width=\"30\" align=\"center\"><a href=\"".$this->mCurrentPageName."?nPage=".($this->mPage - $this->mPageItemsPerPage).$this->mParameters."#clients\" class=\"brown_bold_text\">|&lt;</a></td>";
				echo "<td width=\"30\" align=\"center\"><a href=\"".$this->mCurrentPageName."?nPage=".($this->mPage - 1).$this->mParameters."#clients\" class=\"brown_bold_text\">&lt;</a></td>";
			}
			
			for($i = $this->mCurrentStartPage; $i <= $this->mCurrentEndPage; $i++)
			{	
				echo "<td width=\"40\" align=\"center\">";
				if($i != $this->mPage)
				{
					echo "<a href=\"".$this->mCurrentPageName."?nPage=$i".$this->mParameters."#clients\" class=\"brown_bold_text\">$i</a>";
				}
				else
				{
					echo '<span class="brown_text">'.$i.'</span>';
				}
				echo "</td>";
			}
			
			if($RightMargin <= $this->mTotalNumPages)
			{
				echo "<td width=\"30\" align=\"center\"><a href=\"".$this->mCurrentPageName."?nPage=".($this->mPage + 1).$this->mParameters."#clients\" class=\"brown_bold_text\">&gt;</a></td>";
				echo "<td width=\"30\" align=\"center\"><a href=\"".$this->mCurrentPageName."?nPage=".($this->mPage + $this->mPageItemsPerPage).$this->mParameters."#clients\" class=\"brown_bold_text\">&gt;</a>|</td>";
			}
			
		echo '</tr></table>';				
	}
}

?>