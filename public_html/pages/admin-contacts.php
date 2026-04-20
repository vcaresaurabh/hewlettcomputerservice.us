<?php
declare(strict_types=1);
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: /admin');
    exit;
}
header('Location: /admin/leads?tab=contacts');
exit;
