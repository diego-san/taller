
<?php
$esperado   =  password_hash('1234', PASSWORD_BCRYPT, array("cost" => 10));




echo password_verify('1234', '$2y$10$HqhKabMiBPG2yY0HyrvZMOEy0v861/noX/hZQHHuKq4cztH95Bine');
