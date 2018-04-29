<?

$User = User::GetByID($_SESSION['id']);

Permission::OnlyAdmin($User['is_admin']);


Template::Header("Генерация тегов");



Forms::TagForm();



Template::Bottom();










?>