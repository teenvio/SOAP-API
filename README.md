Teenvio Public API SOAP
===========================

Requirements:
--------------------------

## PHP:
- PHP >= 5.3.

- Soap Client enabled.

## Python:
- python-soappy lib.


Install:
--------------------------

Copy the folder "class" in your proyect.

Copiar la carpeta "class" en el proyecto.


Examples:
--------------------------
See the examples folder.

Mirar la carpeta "examples".


Wsdl:
--------------------------
https://secure.teenvio.com/v4/public/api/soap/wsdl.xml


Mehtods:
--------------------------

- boolean checkLoggin().
- string getVersion().
- boolean loggin(string $usuario, string $plan, string $password).
- Array getUserData().
- ENVMDLEstadistica getStats(int $id_envio).
- CONTMDLContacto getContactData(int $id_contacto, string $email).
- CONTMDLGrupo getGroupData(int $id_grupo).
- ArrayCONTMDLGrupo getGroups().
- Array getGroupContacts(int $id_grupo).
- ENVMDLEnvio getEnvio(int $id_envio).
- ENVEstadisticaContacto getStatsContact(int $id_envio,int $id_conctacto)


Support:
--------------------------

http://teenvio.com
soporte@teenvio.com
