#!/usr/bin/env python

#
# @copyright Ipdea Land, S.L.
#
# LGPL v3 - GNU LESSER GENERAL PUBLIC LICENSE
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU LESSER General Public License as published by
# the Free Software Foundation, either version 3 of the License.
# 
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.

# You should have received a copy of the GNU LESSER General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#

import sys
from SOAPpy import WSDL

url= 'https://secure.teenvio.com/v4/public/api/soap/wsdl.xml'

server = WSDL.Proxy(url)

# change to 1 for debug
server.soapproxy.config.dumpSOAPOut = 0
server.soapproxy.config.dumpSOAPIn = 0

print
print "Check login:"
print "--------------"

# change this!!
server.loggin(usuario='user',plan='plan',password='pass') # change this!!
login_ok=server.checkLoggin()
if login_ok == False:
  print "Login failed, check data!"
  sys.exit(0)
  
print login_ok

print
print "Contacts for group 885:"
print "--------------"

server.loggin(usuario='user',plan='plan',password='pass') # change this!!
contactos=server.getGroupContacts(id_grupo=885)
for contacto in contactos :
  print contacto

print
print "User data:"
print "--------------"

server.loggin(usuario='user',plan='plan',password='pass') # change this!!
user=server.getUserData()
user_dict = user[0]

for fila in user_dict:
  value=fila['value']
  if type(value) is int:
    value=str(value)    
  print fila['key']+": "+value

print
print "group 885 data:"
print "--------------"

server.loggin(usuario='user',plan='plan',password='pass') # change this!!
group_data=server.getGroupData(id_grupo=885)

print "Name: "+group_data['Nombre']
print "Desc: "+group_data['Descripcion']
