<!DOCTYPE html>
<html>
<head>
<title> Edit</title>
</head>
<body>
<form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>
<tr>
<td> Name</td>
<td>
<input type = 'text' name = 'name'
value = '<?php echo$users[0]->name; ?>'/> </td>
</tr>
<tr>
<td> Email</td>
<td>
<input type = 'text' name = 'email'
value = '<?php echo$users[0]->email; ?>'/> </td>
</tr>
<tr>
<td> Password</td>
<td>
<input type = 'password' name = 'password'
value = '<?php echo$users[0]->password; ?>'/> </td>
</tr>


<td colspan = '2'>
<input type = 'submit' value = "Update account" />
</td>
</tr>
</table>
</form>
</body>
</html>