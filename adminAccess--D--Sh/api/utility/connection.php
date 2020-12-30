<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webcrm';
$conn = mysqli_connect($host, $user, $pass, $db);
if (!($conn)) {
?>
    <form action="misconfig.php" method="GET">
        <input type="hidden" name="mysqliError" value="<?php mysqli_error($conn) ?>">
        <button style="display: none;" type="submit" class="errorBtn" name="errorBtn"></button>
    </form>
    <script>
        document.querySelector('.errorBtn').click();
    </script>
<?php
}
