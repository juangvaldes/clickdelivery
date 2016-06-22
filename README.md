# Prueba clickdelivery

Se desarrollo un sistema de administración de usuarios con 3 perfiles diferentes que son Admin, Agent y Customer. Cada uno de estos perfiles tienen un rol diferente al momento de acceder al sistema.

El rol Admin es el administrador de todo el sistema y permite realizar la creación, edición y eliminación de todos los usuarios, también permitiendo realizar el cambio de rol y lectura a los demas usuarios.

El rol Agent solo puede ingresar a revisar la información de todos los usuarios mas no podra realizar ninguna otra acción como por ejemplo crear, editar o eliminar usuarios.

El rol Customer solo podra ingresar y editar su imformación personal.

Todos los roles de usuario tienen derecho a editar su información personal.

El sistema tiene un usuario administrado con usuario juan_memo133@hotmail.com y contraseña 1234 que viene por defecto para realizar la creación de nuevos usuarios a travez del panel de administración.

Para usuarios que desean ingresar tendran la opción de registrarse dandos sus datos básicos o accediendo por medio del registro de Facebook. Se debe tener en cuenta que todo usuario debe ser aceptado o autorizado por el administrador para su ingreso.

El sistema permite iniciar sesión con sus datos de registro o por medio del log in de facebook(Para esto debe haberse registrado anteriormente por medio del boton de register with facebook).

Para los accesos se utilizo el plug-in de facebook que me permite realizar la conexión y obtener los datos del usuario. Para esto se debio crear una cuenta como desarrollador para así poder obtener el appId para que funcionara el acceso.

Por ultimo, el sistema verifica que no existan dos E-mail repetidos para evitar posibles fallas en el acceso a la información.


