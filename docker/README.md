<p>Для того что бы развернуть проект нужно в директории с файлом .yml написать sudo docker compose up.</p>
<p>Далее написать sudo docker image ls и скопировать название php-fpm потом вставить ее в sudo docker exec -it ** bash</p>
<p>И в открывшемя контейнере написать composer install</p>