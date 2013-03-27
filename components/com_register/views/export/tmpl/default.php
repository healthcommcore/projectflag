<?php

defined ( '_JEXEC') or die ('Restricted access');
?>
<script type="text/javascript">
function redirectPage( url)
{
window.location = url;
}
</script>	
<div class="componentheading">Download Users List</div>

<form>
<h4>Click the button to download the list of users</h4>
	<input type="button" value="Download" class="button" onclick="redirectPage(' <?php echo '/export.php?gid='. $this->gid .'&username='. $this->username  ?>')" />
</form>
