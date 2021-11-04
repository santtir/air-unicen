# air-unicen

La aerolínea AirUnicen quiere una API REST para consultar y actualizar el estado de sus vuelos. Para ello, nos proveen el acceso a su base de datos:

Vuelo: (id_vuelo: int; nro_vuelo: string; fecha_salida: datetime; ciudad_origen_id_fk: int; ciudad_destino_id_fk: int; estado: string)
Ciudad: (id_ciudad: int; nombre: string; cod_postal: string)

Discuta y defina solo los endpoints para los siguientes servicios Indique recurso, verbo, parámetros del recurso y parámetros get..
Obtener el detalle completo de un vuelo determinado dado su nro_vuelo.
Obtener todas las ciudades en las que la aerolínea tiene alcance.
Insertar un vuelo nuevo en el sistema.
Obtener todos los vuelos que aun no salieron (estado=”en espera”) 
Obtener todos los vuelos entre dos ciudades para un día determinado
Obtener todos los vuelos con destino a Barcelona.

Utilizando el patrón MVC implemente los servicios i, ii y iii del punto a.
¿Qué cambios realizaría en el servicio ii para poder solicitar las ciudades ordenadas por distintas propiedades (nombre, cod_postal) ascendente o descendente? Impleméntelos.

