<?php
require __DIR__ . '/includes/config.php';
$pass = $_GET['key'] ?? '';
if ($pass !== 'admin123') { http_response_code(403); exit('Forbidden'); }
$res = $mysqli->query("SELECT id,name,email,phone,message,created_at FROM messages ORDER BY id DESC");
?>
<!DOCTYPE html><meta charset="utf-8">
<h2>Messages (Latest First)</h2>
<table border="1" cellpadding="6" cellspacing="0">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th><th>Created</th></tr>
<?php while($row = $res->fetch_assoc()): ?>
<tr>
  <td><?=htmlspecialchars($row['id'])?></td>
  <td><?=htmlspecialchars($row['name'])?></td>
  <td><?=htmlspecialchars($row['email'])?></td>
  <td><?=htmlspecialchars($row['phone'])?></td>
  <td><?=nl2br(htmlspecialchars($row['message']))?></td>
  <td><?=htmlspecialchars($row['created_at'])?></td>
</tr>
<?php endwhile; ?>
</table>
<?php $mysqli->close(); ?>
