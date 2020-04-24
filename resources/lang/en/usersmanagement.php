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
        'delete'        => 'Eliminar',
        'show'          => 'Mostrar',
        'edit'          => 'Editar',
        'create-new'    => 'Crear nuevo usuario',
        'back-users'    => 'Volver a los usuarios',
        'email-user'    => 'Email :user',
        'submit-search' => 'Enviar búsqueda de usuarios',
        'clear-search'  => 'Borrar resultados de búsqueda',
    ],

    'messages' => [
        'userNameTaken'          => 'Se toma el nombre de usuario',
        'userNameRequired'       => 'Se requiere nombre de usuario',
        'fNameRequired'          => 'Se requiere el primer nombre',
        'lNameRequired'          => 'Apellido es requerido',
        'emailRequired'          => 'Email es requerido',
        'emailInvalid'           => 'Email es invalido',
        'passwordRequired'       => 'Comtraseña es requerida',
        'PasswordMin'            => 'Comtraseña debe tener al menos 6 caracteres',
        'PasswordMax'            => 'Comtraseña la longitud máxima es de 20 caracteres',
        'captchaRequire'         => 'Captcha es requerido',
        'CaptchaWrong'           => 'Captcha incorrecto, por favor intente nuevamente.',
        'roleRequired'           => 'Se requiere rol de usuario.',
        'user-creation-success'  => 'Usuario creado con éxito!',
        'update-user-success'    => 'Usuario actualizado con éxito!',
        'delete-success'         => '¡Se eliminó correctamente el usuario!',
        'cannot-delete-yourself' => '¡No puedes borrarte a ti mismo!',
    ],

    'show-user' => [
        'id'                => 'ID de usuario',
        'name'              => 'Usuario',
        'email'             => '<span class="hidden-xs">Usuario </span>Email',
        'role'              => 'Rol de Usuario',
        'created'           => 'Creado <span class="hidden-xs">en</span>',
        'updated'           => 'Modificado <span class="hidden-xs">en</span>',
        'labelRole'         => 'Rol de Usuario',
        'labelAccessLevel'  => '<span class="hidden-xs">User</span> Access Level|<span class="hidden-xs">User</span> Access Levels',
    ],

    'search'  => [
        'title'             => 'Mostrando resultados de búsqueda',
        'found-footer'      => 'Registro(s) encontrado(s)',
        'no-results'        => 'No Results',
        'search-users-ph'   => 'Buscar Usuarios',
    ],

    'modals' => [
        'delete_user_message' => 'Estas seguro que quieres borrar :user ?',
    ],
];
