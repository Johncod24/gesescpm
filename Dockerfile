FROM ubuntu:latest

# Atualize o sistema e instale o MySQL
RUN apt-get update && apt-get install -y mysql-server

# Inicie o serviço MySQL
RUN service mysql start
