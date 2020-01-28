<?php

return [

    // Titles
    'showing-all-users'     => 'Todos los usuarios',
    'users-menu-alt'        => 'Mostrar menú de administración de usuarios',
    'create-new-user'       => 'Crear Usuario',
    'show-deleted-users'    => 'Usuario Eliminado',
    'editing-user'          => 'Editar Usuario :name',
    'showing-user'          => 'Ver Usuario :name',
    'showing-user-title'    => ':name\'s Información',
    'showing-user-deleted' => 'Mostrando Usuarios Eliminados',

    // Flash Messages
    'createSuccess'   => 'Usuario creado con éxito! ',
    'updateSuccess'   => 'Usuario actualizado con éxito! ',
    'deleteSuccess'   => 'Usuario eliminado con éxito! ',
    'deleteSelfError' => '¡No puedes borrarte a ti mismo! ',

    // Show User Tab
    'viewProfile'            => 'Ver perfil',
    'editUser'               => 'Editar Usuario',
    'deleteUser'             => 'Eliminar Usuario',
    'usersBackBtn'           => 'Volver a usuarios',
    'usersPanelTitle'        => 'Información del usuario',
    'labelUserName'          => 'Nombre de usuario:',
    'labelEmail'             => 'Email:',
    'labelFirstName'         => 'Nombres:',
    'labelLastName'          => 'Apellidos :',
    'labelRole'              => 'Roles:',
    'labelStatus'            => 'Estados:',
    'labelAccessLevel'       => 'Acceso',
    'labelPermissions'       => 'Permisos:',
    'labelCreatedAt'         => 'Creado en:',
    'labelUpdatedAt'         => 'Actualizado en:',
    'labelIpEmail'           => 'IP de registro de correo electrónico:',
    'labelIpEmail'           => 'IP de registro de correo electrónico:',
    'labelIpConfirm'         => 'IP de confirmación:',
    'labelIpSocial'          => 'Socialite Signup IP:',
    'labelIpAdmin'           => 'IP de registro de administrador:',
    'labelIpUpdate'          => 'Última actualización de IP:',
    'labelDeletedAt'         => 'Eliminado en',
    'labelIpDeleted'         => 'IP eliminada:',
    'usersDeletedPanelTitle' => 'Información de usuario eliminada',
    'usersBackDelBtn'        => 'Volver a usuarios eliminados',

    'successRestore'    => 'Usuario restaurado con éxito.',
    'successDestroy'    => 'Registro de usuario destruido con éxito.',
    'errorUserNotFound' => 'Usuario no encontrado.',

    'labelUserLevel'  => 'Nivel',
    'labelUserLevels' => 'Niveles',

    'users-table' => [
        'caption'   => '{1} :userscount usuarios en total|[2,*] :userscount usuario en total',
        'id'        => 'ID',
        'name'      => 'Usuario',
        'fname'     => 'Nombres',
        'lname'     => 'Apellidos',
        'email'     => 'Email',
        'role'      => 'Roles',
        'created'   => 'Creado',
        'updated'   => 'Actualizado',
        'actions'   => 'Acciones',
    ],

    'buttons' => [
        'create-new'    => 'Nuevo Usuario',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Borrar</span><span class="hidden-xs hidden-sm hidden-md"> Usuario</sUsuariopan>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Ver</span><span class="hidden-xs hidden-sm hidden-md"> Usuario</span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Actualizar</span><span class="hidden-xs hidden-sm hidden-md"> Usuario</span>',
        'back-to-users' => '<span class="hidden-sm hidden-xs">Volver a los </span><span class="hidden-xs">Usuarios</span>',
        'back-to-user'  => 'Volver al <span class="hidden-xs">Usuario</span>',
        'delete-user'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Borrar</span><span class="hidden-xs"> Usuario</span>',
        'edit-user'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Actualizar</span><span class="hidden-xs"> Usuario</span>',
    ],

    'tooltips' => [
        'delete'        => 'Delete',
        'show'          => 'Show',
        'edit'          => 'Edit',
        'create-new'    => 'Create New User',
        'back-users'    => 'Back to users',
        'email-user'    => 'Email :user',
        'submit-search' => 'Submit Users Search',
        'clear-search'  => 'Clear Search Results',
    ],

    'messages' => [
        'userNameTaken'          => 'Username is taken',
        'userNameRequired'       => 'Username is required',
        'fNameRequired'          => 'First Name is required',
        'lNameRequired'          => 'Last Name is required',
        'emailRequired'          => 'Email is required',
        'emailInvalid'           => 'Email is invalid',
        'passwordRequired'       => 'Password is required',
        'PasswordMin'            => 'Password needs to have at least 6 characters',
        'PasswordMax'            => 'Password maximum length is 20 characters',
        'captchaRequire'         => 'Captcha is required',
        'CaptchaWrong'           => 'Wrong captcha, please try again.',
        'roleRequired'           => 'User role is required.',
        'user-creation-success'  => 'Successfully created user!',
        'update-user-success'    => 'Successfully updated user!',
        'delete-success'         => 'Successfully deleted the user!',
        'cannot-delete-yourself' => 'You cannot delete yourself!',
    ],

    'show-user' => [
        'id'                => 'User ID',
        'name'              => 'Username',
        'email'             => '<span class="hidden-xs">User </span>Email',
        'role'              => 'User Role',
        'created'           => 'Created <span class="hidden-xs">at</span>',
        'updated'           => 'Updated <span class="hidden-xs">at</span>',
        'labelRole'         => 'User Role',
        'labelAccessLevel'  => '<span class="hidden-xs">User</span> Access Level|<span class="hidden-xs">User</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Mostrando resultados de búsqueda',
        'found-footer'      => 'Registro(s) encontrado(s)',
        'no-results'        => 'No Results',
        'search-users-ph'   => 'Buscar Usuarios',
    ],

    'modals' => [
        'delete_user_message' => 'Estas seguro que quieres borrar :user?',
    ],
];
