<?Permission::PermDeny(0)?>

<?$User = User::GetByID($_SESSION['id'])?>




<? Template::Header("Настройки") ?>



<? Template::MainBlock() ?>



<? User::CardSettings($User) ?>



<? Template::MainBlock_End() ?>

<? Template::Bottom() ?>