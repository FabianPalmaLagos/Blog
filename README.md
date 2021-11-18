# Blog

El proyecto está escrito con PHP y Bootstrap 5, base de datos: MySql . Modelado con MVC sin ningun framework de php. No está terminado ya que posee varios errores

Contexto: El proyecto es sobre un Blog el cual contiene temas o topicos y estos contienen post de diferentes usuarios.

Los errores no corregidos son los siguientes:

- Al no iniciar sesión, aparece encima del header el mensaje de que no se encuentra el array user (la sesion que viene con los datos de la misma) 
Ya que para mostrar las opciones de "mis post" y "cerrar sesión" se hizo con la condicion if(empty()) a una sesion llamada "user", no logré pensar 
en otra forma de mostrar esas opciones de sesión. El boton de cerrar sesión hace llamado a la funcion session_destroy() por ende al hacerlo vuelve a aparecer el error. 
Se soluciona al iniciar sesión con algún usuario.

- La columna que se llama "Post" en el index debería mostrar la cantidad de posts que tiene cada tema, pero aun está esa funcionalidad.

- Para ingresar a ver los post de cada tema debe precionar el nombre del tema, al precionarlo y mostrar los posts, hay una columna que se llama "respuestas" 
que al igual que el punto anterior, aun no tiene esta funcionalidad.

- Al ingresar al post y tratar de agregar un comentario, este se ingresa correctamente a la base de datos, pero no se muestra, aun no es solucionado.

___________________________________________________________________________________________________________


- Al iniciar sesion, en el navbar le aparecera la opcion "Mis post" aquí puede ver los post creados por el id que inició sesión, en esta sección puede ver, 
editar y eliminar su post.
