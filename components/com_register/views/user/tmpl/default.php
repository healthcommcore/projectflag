<?php

defined ( '_JEXEC') or die ('Restricted access');
	$buttonurl =  "images/M_images/printButton.png";

?>
<script type="text/javascript">
function redirectPage( url)
{
window.location = url;
}
</script>	
	
<div class="componentheading">
<?php
if ( $this->user) {
?>

<form>
	<!--a href="/index.php?option=<?php echo $this->option ?>&view=new&task=edit&id=<?php echo $this->user->id ?>&Itemid=<?php echo $this->Itemid ?>"><input value="Edit this user" class="button" type="button" align="right"></a-->
	
	<input type="button" value="Edit this user" class="button" onclick="redirectPage(' <?php echo '/index.php?option='.  $this->option ?>&view=new&task=edit&id=<?php echo $this->user->id ?>&Itemid=<?php echo $this->Itemid  ?>')" />
</form>
<br /><br />
<?php echo $this->user->firstname .' '. $this->user->lastname ?> Profile Page</div>
			
			
			<table class="cbFields" style="width: 95%;" cellpadding="0" cellspacing="0">
				<tbody><tr class="sectiontableentry1" id="cbfr_61">
					<td class="titleCell">Registered:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->registerDate ?>
					<form>

					</td>
				</tr>
				</tbody>
				</table>


<h3>Contact Info</h3>

			<div class="tab-content">
			<table class="cbFields" style="width: 95%;" cellpadding="0" cellspacing="0">

				<tbody><tr class="sectiontableentry1" id="cbfr_61">
					<td class="titleCell">Birth Date:</td>
					<td colspan="1" class="fieldCell"><?php echo date('m/d/Y', strtotime($this->user->dob)) ?></td>
				</tr>
				<tr class="sectiontableentry2" id="cbfr_55">
					<td class="titleCell">Address:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->address .' '. $this->user->addresstwo ?></td>

				</tr>
				<tr class="sectiontableentry1" id="cbfr_57">
					<td class="titleCell">City:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->city ?></td>
				</tr>
				<tr class="sectiontableentry2" id="cbfr_58">
					<td class="titleCell">State:</td>

					<td colspan="1" class="fieldCell"><?php echo $this->user->state?></td>
				</tr>
				<tr class="sectiontableentry1" id="cbfr_59">
					<td class="titleCell">Zip Code:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->zip ?></td>
				</tr>
				<tr class="sectiontableentry1" id="cbfr_59">
					<td class="titleCell">Country:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->country ?></td>
				</tr>
				<tr class="sectiontableentry2" id="cbfr_67">

					<td class="titleCell">Phone type:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->phonetype ?></td>
				</tr>
				<tr class="sectiontableentry1" id="cbfr_68">
					<td class="titleCell">Number:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->phoneno ?></td>
				</tr>

			</tbody></table></div>

<h3>How did you find us?</h3>
			<div class="tab-content">
			<table class="cbFields" style="width: 95%;" cellpadding="0" cellspacing="0">
				<tbody><tr class="sectiontableentry2" id="cbfr_65">
					<td class="titleCell">Found web site:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->howlearned ?></td>
				</tr>

				<tr class="sectiontableentry1" id="cbfr_76">
					<td class="titleCell">If Other:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->foundusother ?></td>
				</tr>
				<tr class="sectiontableentry2" id="cbfr_74">
					<td class="titleCell">Patient at:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->currentpatient ?></td>

				</tr>
				<tr class="sectiontableentry1" id="cbfr_79">
					<td class="titleCell">Relative:</td>
					<td colspan="1" class="fieldCell"><?php echo $this->user->relatedyn ?></td>
				</tr>
				
				<tr class="sectiontableentry1" id="cbfr_79">
					<td class="titleCell">If Related:</td>
					<td colspan="1" class="fieldCell"><?php echo empty($this->user->yesrelated)  ?'': $this->user->yesrelated ?></td>
				</tr>
			</tbody></table></div>
</div>
<?php
} ?>


