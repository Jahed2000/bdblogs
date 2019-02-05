
<h2>this is home</h2>

<?php print_r($user); 
//echo $user[2]->name;
echo $user['name'];
foreach ($user as $row): ?>
	<table border="1"">
		<tr>
			<td><?=$row['id']; ?></td>
			<td><?=$row['name']; ?></td>
			<td><?=$row{'age'}; ?></td>
		</tr>
	</table>
<?php endforeach; ?>


