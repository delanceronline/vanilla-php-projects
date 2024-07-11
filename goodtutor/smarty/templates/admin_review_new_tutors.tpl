<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review new tutors</title>
</head>

<body>
<p><strong>Newly registered tutors</strong><br />
    <br />
</p>
<form id="form1" name="form1" method="post" action="">
  Verified: 
    <label>
  <select name="is_verified" id="is_verified">
    <option value="-1">---</option>
    <option value="1" {if $is_verified == 1}selected="selected"{/if}>Yes</option>
    <option value="0" {if $is_verified == 0}selected="selected"{/if}>No</option>
  </select>
  </label>
  <label>
  <input type="submit" name="button" id="button" value="Filter" />
  </label>
</form>
<p><br />
  <br />
{foreach from=$tutors key=k item=v}
&nbsp;&nbsp;&nbsp;&nbsp;{$v.email}{if $v.pi_gender == 1}, Male{elseif $v.pi_gender == 2}, Female{else}, ???{/if}, {$v.creation_date}{if $v.is_verified == 0}, not verified{/if}{if $v.is_generated == 1}, *{/if} ------ <a href="review_new_tutor_detail.php?id={$v.id}" target="_blank">info</a><br /><br />
{/foreach}</p>
<p>&nbsp;</p>
<p><a href="index.php">Back</a></p>
</body>
</html>
