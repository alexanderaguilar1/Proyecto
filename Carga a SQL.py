# -*- coding: utf-8 -*-
"""
Created on Mon Sep  16:50:23 2020

@author: Alexander
"""
# """Incorporar archivo debe de estar en la carpeta C:\Users\elmag\.spyder-py3"""
#import sqlalchemy
#import pymysql
#import mysql.connector

#import pip
#pip.main(['install','mysql-connector-python-rf'])

#from sqlalchemy 

print "Resultados de mysql.connector:"
import mysql.connector
miConexion = mysql.connector.connect( host='localhost', user= 'USUARIO', passwd='PASS', db='neoguias' )
cur = miConexion.cursor()
cur.execute( "SELECT nombre, apellido FROM usuarios" )
for nombre, apellido in cur.fetchall() :
    print nombre, apellido
miConexion.close()




import create_engine
import pandas as pd
db="sisVentas" #base de datos
table="consulta" #tabla donde se almacena
#xls=pd.ExcelFile('DataPrueba.xlsx')
path="C:\python\DataPrueba.xlsx" #ubicacion del archivo

url="http://localhost/phpmyadmin://root:admin@Localhost/"
#url="mysql+mysqlconnector://root:admin@localhost/"

engine = create_engine(url + db, echo = False)

df= pd.read_excel(path)

#Print("read ok")

df.to_sql(name=table, con=engine, if_exists = 'append', index=False)






