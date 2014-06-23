Teenvio Public API SOAP
===========================

requirements:
--------------------------

PHP >= 5.3.
Soap Client enabled.


install:
--------------------------

Copy the folder "class" in your proyect.
Copiar la carpeta "class" en el proyecto.


examples:
--------------------------
See the examples folder.
Mirar la carpeta "examples".

wsdl:
https://secure.teenvio.com/v4/public/api/soap/wsdl.xml

mehtods:
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