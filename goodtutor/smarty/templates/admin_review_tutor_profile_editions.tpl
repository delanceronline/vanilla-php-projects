<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Review tutor profile editions</title>
</head>

<body>
<p><strong>Tutors recently updated the profile</strong><br />
  <br />
{foreach from=$tutors key=k item=v}
{$v.modified_date}. {$v.i_email}{if $v.pi_gender == 1}, Male{elseif $v.pi_gender == 2}, Female{else}, ???{/if} ------ <a href="review_tutor_profile_editions_detail.php?id={$v.id}" target="_blank">info</a> ------ <a href="review_tutor_profile_editions.php?action=1&id={$v.id}">trash</a><br />
{/foreach}</p>
<p>&nbsp;</p>
<p><a href="index.php">Back</a></p>
</body>
</html>
