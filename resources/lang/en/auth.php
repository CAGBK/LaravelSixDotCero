<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'   => 'Estas credenciales no coinciden con nuestros registros.',
    'throttle' => 'Demasiados intentos de inicio de sesión. Por favor intente nuevamente en :seconds segundos.',

    // Activation items
    'sentEmail'        => 'Hemos enviado un correo electrónico a :email.',
    'clickInEmail'     => 'Haga clic en el enlace para activar su cuenta.',
    'anEmailWasSent'   => 'Se envió un correo electrónico a :email en :date.',
    'clickHereResend'  => 'Haga clic aquí para reenviar el correo electrónico.',
    'successActivated' => 'Éxito, su cuenta ha sido activada.',
    'unsuccessful'     => 'Su cuenta no pudo ser activada; Inténtalo de nuevo.',
    'notCreated'       => 'Su cuenta no pudo ser creada; Inténtalo de nuevo.',
    'tooManyEmails'    => 'Se han enviado demasiados correos electrónicos de activación a :email. <br />Por favor intente nuevamente en <span class="label label-danger">:hours horas</span>.',
    'regThanks'        => 'Gracias por registrarte, ',
    'invalidToken'     => 'Token de activación inválido.',
    'activationSent'   => 'Correo electrónico de activación enviado. ',
    'alreadyActivated' => 'Ya activada. ',

    // Labels
    'whoops'          => 'Whoops! ',
    'someProblems'    => 'Hubo algunos problemas con sus datos.',
    'email'           => 'Dirección de correo electrónico',
    'password'        => 'Contraseña',
    'rememberMe'      => ' Recuérdame',
    'login'           => 'Iniciar sesión',
    'forgot'          => '¿Olvidaste tu contraseña?',
    'forgot_message'  => '¿Problemas con la contraseña?',
    'name'            => 'Nombre de usuario',
    'first_name'      => 'Primer nombre',
    'last_name'       => 'Apellido',
    'confirmPassword' => 'Confirmar contraseña',
    'register'        => 'Registrarse',

    // Placeholders
    'ph_name'          => 'Nombre de usuario',
    'ph_email'         => 'Dirección de correo electrónicos',
    'ph_firstname'     => 'Primer nombre',
    'ph_lastname'      => 'Apellido',
    'ph_password'      => 'Contraseña',
    'ph_password_conf' => 'Confirmar contraseña',

    // User flash messages
    'sendResetLink' => 'Enviar enlace de restablecimiento de contraseña',
    'resetPassword' => 'Restablecer la contraseña',
    'loggedIn'      => '¡Estás conectado!',

    // email links
    'pleaseActivate'    => 'Por favor active su cuenta.',
    'clickHereReset'    => 'Haga clic aquí para restablecer la contraseña: ',
    'clickHereActivate' => 'Haga clic aquí para activar su cuenta: ',

    // Validators
    'userNameTaken'    => 'Nombre de usuario ya existe',
    'userNameRequired' => 'Se requiere nombre de usuario',
    'fNameRequired'    => 'Se requiere el primer nombre',
    'lNameRequired'    => 'Apellido es requerido',
    'emailRequired'    => 'correo electronico es requerido',
    'emailInvalid'     => 'El correo electrónico es invalido',
    'passwordRequired' => 'Se requiere contraseña',
    'PasswordMin'      => 'La contraseña debe tener al menos 6 caracteres',
    'PasswordMax'      => 'La longitud máxima de la contraseña es de 20 caracteres.',
    'captchaRequire'   => 'Captcha es requerido',
    'CaptchaWrong'     => 'Captcha incorrecto, por favor intente nuevamente.',
    'roleRequired'     => 'Se requiere rol de usuario.',

];
