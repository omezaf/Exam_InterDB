var Usuario = require('./modelUsuarios.js') //Asignarle a la variable USUARIO el modelo del usuario

module.exports.crearUsuarioDemo = function(callback){ //Función para crear usuarios
  var arr = [{ email: 'user1@mail.com', user: "user1", password: "1234"}, { email: 'user2@mail.com', user: "user2", password: "1234"}]; //array con la información de los usuarios a insertar
  Usuario.insertMany(arr, function(error, docs) { //Utilizar la función insertMany para insertar varios registros en una sola consulta
    if (error){ //Acciones si existe un error
      if (error.code == 11000){ //Verificar si el nombre de usuario (PrimaryKey) del existe
        callback("Utilice los siguientes datos: </br>usuario: user1 | password:1234 </br>usuario: user2 | password:1234") //Mostrar mensaje
      }else{
        callback(error.message) //Mostrar mensaje de error
      }
    }else{
      callback(null, "Los usuarios 'demo' se han creado correctamente. </br>usuario: user1 | password:1234 </br >usuario: user2 | password:1234") //Mostrar mensaje del usuario guardado con exito
    }
  });
}
