<?php

defined ( '_JEXEC') or die ('Restricted access');
	// $buttonurl =  "images/M_images/printButton.png";
	$classname= 'sectiontableentry1';
?>

<form action="index.php?option=com_register&view=all&Itemid=15" method="post" name="searchForm">

		<table>
		<tr>
			<td align="left" width="100%">
				Search ID:
				<input type="text" name="search" id="search" value="<?php echo ($this->searchid) ?>" class="text_area" onchange="document.searchForm.submit();" />
				<button onclick="this.form.submit();">Go</button>
			</td>
		</tr>
		</table>
</form>
	
<div class="componentheading">Registered Users</div>
<p>
Families Learning about GIST (Gastrointestinal Stromal Tumors) has: <?php echo ($this->total) ?> registered users
</p>
<?php
echo '<br>limit = '. $this->limit ;
echo '<br>limitstart = '. $this->limitstart ;

$currentpage = floor ($this->limitstart / $this->limit)+ 1; 
// echo '<br>currentpage = '. $currentpage ;
$nopages = ceil( $this->total/ $this->limit);


// echo '<br>nopages = '. $nopages ;

if ($nopages > 1) {
?>
<div class="pagenav">
<?php 
	if ($currentpage != 1) {  
?>
	<a class="pagenav" href="index.php?option=<?php echo $this->option ?>&view=all&Itemid=15">&lt;&lt; Start</a> 
<?php
	}
	if ($currentpage > 1) {  

?>
<a class="pagenav" href="index.php?option=<?php echo $this->option ?>&view=all&Itemid=15&limitstart=<?php echo ($currentpage-2) * $this->limit ?>">&lt;&lt; Prev</a> 
<?php
	}
	for ($i = 1; $i <= $nopages; $i++) {
		if ($currentpage != $i ) echo '<a class="pagenav" href="index.php?option=com_register&view=all&Itemid=15&limitstart='. ( ($i-1) * $this->limit) . '">';
?>
[<?php echo $i ?>]

<?php
		if ($currentpage != $i ) echo '</a>';
	}
	if ($currentpage < $nopages) { 
?>
<a class="pagenav" href="index.php?option=<?php echo $this->option ?>&view=all&Itemid=15&limitstart=<?php echo ($currentpage * $this->limit) ?>" title="Next">Next &gt;</a>
<?php
	}
	if ($currentpage != $nopages) { 
?>
<!-- display End if not on last page -->
<a class="pagenav" href="index.php?option=<?php echo $this->option ?>&view=all&Itemid=15&limitstart=<?php echo ($nopages -1) * $this->limit; ?>" title="End">End &gt;&gt;</a>
<?php
	} 
}
?>
</div>

<form action="index.php" method="post">
<table cellpadding="5" cellspacing="0" border="0" width="98%" class="contentpane" id="userTable">
  <tr>
    <td class="titleCell">User ID</a></td>
    <td class="titleCell">Name</a></td>
    <td class="titleCell">DOB</td>
    <td class="titleCell">Contact</td>
    <td class="titleCell">Registration Date</td>
  </tr>
  
  <?php if (count($this->users) > 0) { ?>
  <?php foreach ($this->users as $user) : ?>

   <tr class="<?php echo $classname; ?>">
    <td class="fieldCell"><?php 
		// Set link   here
		$link = JRoute::_('index.php?option=' . $this->option . '&id=' . $user->id . '&view=user');
		// echo $link;
	
	echo '<a href="'.$link.'">'.$user->id ?></a></td>
    </td>
    <td class="fieldCell"><?php 
		// Set link   here
		$link = JRoute::_('index.php?option=' . $this->option . '&id=' . $user->id . '&view=user');
		// echo $link;
	
	echo '<a href="'.$link.'">'.$user->firstname.' '.$user->lastname ?></a></td>
    </td>
    <td class="fieldCell"><?php
	
	if ($classname== 'sectiontableentry1') 	$classname= 'sectiontableentry2';
	else 	$classname= 'sectiontableentry1';

	echo date('m/d/Y', strtotime($user->dob));
	 ?></td>
    </td>
    <td class="fieldCell"><a href="mailto:<?php echo $user->email ?>"><?php echo $user->email.'</a><br>'.$user->phonetype.'<br>'.$user->phoneno ?></td>
    </td>
    <td class="fieldCell"><?php echo $user->registerDate ?></td>
    </td>
  </tr>
<?php endforeach; ?>
<?php } ?>
 
    <td colspan="2">
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
    </td>
  </tr>
</table>
</form>
