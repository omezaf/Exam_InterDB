Para crear la base de datos, ejecutar mongod y abrir una sesión con mongo

teclear el siguiente comando: use agenda_db

Para crear los usuarios de prueba, usar este comando:

db.usuarios.insertMany([{ email: 'user1@mail.com', user: "user1", password: "1234"}, { email: 'user2@mail.com', user: "user2", password: "1234"}])


Usando una terminal en la carpeta server, ejecutar:
npm install
node index.js

Para ingresar a la app, abrir el navegador usando la dirección: localhost:3000/index.html
Datos de usuario

Utilice los siguientes datos: 
usuario: user1 | password:1234
usuario: user2 | password:1234


