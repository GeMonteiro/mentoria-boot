FROM ubuntu:latest

# Defina as variáveis de ambiente para evitar a interação do usuário durante a instalação
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=UTC

# Atualize os pacotes e instale o Apache, PHP e extensões necessárias
RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php vim php-mysql 

#Habilite o módulo PHP no Apache
RUN a2enmod php8.1

# Copie os arquivos do site para o diretório do Apache
COPY ./site /var/www/html

# Define permissões para o diretório
RUN chown www-data:www-data /var/www/html

# Exponha a porta 80
EXPOSE 80

# Comando para iniciar o Apache em primeiro plano
CMD ["apache2ctl", "-D", "FOREGROUND"]
