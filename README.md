<div align="center"> 
  
# $\color{Cyan}{LOGIN\ CON \ CRUD\ Alvaro\ Gomez}$
</div>

En este repositorio encontraremos un login mejorado de prueba basado en el modelo, vista y controlador.

En el login tendremos en cuenta que los campos a rellenar tienen que tener cierta medida y formato antes de si quiera enviar la solicitud al modelo. Una vez pasa esta parte pasa a solicitar al index la acción de autentificación.

En la autentificación nos manda a la función en AuthController.php hara la conexión con la base de datos, si no lo consigue saltara un error, y creara un objeto Usuario pasandole el promt con el nombre introducido y la contraseña. Si no encuentra nada saltara un mensaje de error.

Una vez hallamos encontrado el usuario almacenaremos el nombre de usuario en la variable de sesión y mandaremos al usuario a la lista habiendo completado el login.

![alt text](https://github.com/OravlaGG/login-con-crud/blob/main/img-readme/Login.png)

En la lista el usuario tendra varias opciones, primero se le mostrara los elementos guardados en la base de datos para que asi decida hacer con ellos. Tiene la opción de editar o eliminarlos, tambien podra añadir nuevos tripulantes a la base de datos. Por ultimo podras desloguearse y volver al login destruyendo asi la sesión y las Cookies.

![alt text](https://github.com/OravlaGG/login-con-crud/blob/main/img-readme/Lista.png)

La EDICIÓN y la CREACIÓN tienen la misma estructura con la unica diferencia de que el edición ves los datos que tiene el elemento seleccionado en la zona de listado.

![alt text](https://github.com/OravlaGG/login-con-crud/blob/main/img-readme/Crear.png)
![alt text](https://github.com/OravlaGG/login-con-crud/blob/main/img-readme/Editar.png)

La ELIMINACIÓN tiene la caracteristica de que te pregunta con un Alert si quieres realizar la operación, esto es para prevenir que se haya seleccionado por error.
