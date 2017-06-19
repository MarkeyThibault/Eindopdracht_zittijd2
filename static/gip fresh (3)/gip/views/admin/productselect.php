<!-- Het dropdownmenu om een product te selecteren -->
<div id=select>
<form method='post' action='admin.php?page=product-editor'>
<select name=productselect>
<!-- De namen van de entries worden toegevoegd aan de optie tags van het selectie menu -->
<?php while ($row = mysqli_fetch_array($selecteer)):;?>
	 <option <?php 'value=$row[1]'?>  selected> <?php echo $row[1];?></option>
	 <?php endwhile; ?>
	 </select>
<input type='submit' name='selectproduct' value='selecteer' />
	</form>
	</div>
