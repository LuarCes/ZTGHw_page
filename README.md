# 🚀 Proyecto: Página Web para ZTG Hardware

### Descripción

Este proyecto es una página web desarrollada para el mayorista ZTG Hardware, utilizando las siguientes tecnologías:

- CodeIgniter (framework PHP)

- HTML5

- CSS3

- JavaScript

- PHP

El objetivo principal del proyecto es ofrecer una solución web funcional y estructurada, con una interfaz intuitiva y una gestión eficiente de los recursos. No usa el método convencional en el cuál el cliente debe crearse una cuenta en la página, sino que, una vez cargado el carrito y confirmada la compra, el vendedor recibirá un email notificandole todos los datos correspondiente al cliente y carrito, para luego comunicarse.

### Requisitos para la Ejecución Local

Si desea probar este proyecto de manera local, tenga en cuenta las siguientes consideraciones:

- Nombre de la carpeta del proyecto
  - Asegúrese de mantener el nombre de la carpeta principal como ZTGHardware, ya que muchas funciones utilizan este nombre como referencia en base_url.

- Base de datos :
  - El nombre predeterminado de la base de datos es ztghw. Si se desea modificar este nombre, será necesario actualizar la configuración correspondiente en:

	application/config/database.php

	- El archivo .sql incluido en el proyecto contiene todas las queries necesarias para crear la base de datos con sus tablas y atributos.

	- Para crear una cuenta de administrador, se debe ejecutar la siguiente consulta:

		INSERT INTO ztghw.users (username, pass)
		VALUES ("admin", "1234");

- Servidor local:

 - El proyecto está configurado para ejecutarse localmente utilizando XAMPP. Asegúrese de que los servicios de Apache y MySQL estén activos antes de iniciar.

### Tecnologías y Herramientas Utilizadas

- Frontend: HTML5, CSS3, JavaScript

- Backend: PHP con el framework CodeIgniter

- Base de datos: MySQL

- Entorno de desarrollo: XAMPP





Este proyecto ha sido una experiencia enriquecedora que me permitió profundizar mis conocimientos en desarrollo web full-stack, gestión de bases de datos y estructuración de proyectos utilizando el framework CodeIgniter. Espero que este trabajo les resulte útil y que pueda aportar tanto conocimiento como el que me brindó a mí durante su desarrollo. Espero seguir encontrando proyectos que me brinden nuevas oportunidades de aprendizaje y desarrollo profesional 💪

¡Gracias por visitar este proyecto! ✨

