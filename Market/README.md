В консоли прописать:

	sudo docker compose up -d

*Если при начале работы контейнеров mysql и nginx возникают проблемы попробуйте:

	sudo service nginx stop
	sudo service mysql stop
	
В том же окне написать:

	sudo docker exec -it php-fpm bash
	
В открывшемся контейнере php прописать:

	composer install
	php bin/console doctrine:database:create
	php bin/console doctrine:migrations:migrate
	
Открыть новое окно консоли и прописать:

	sudo docker exec -it mysql bash

После в контейнере mysql прописать:

	mysql -uroot -p
	
В появившемся окне написать без ("):
	"root"

Находясь в базе данных написать:

	use market_test;

И после регистрации на странице магазина добавить нужному пользователю права администратора:

	update user set roles = JSON_OBJECT('admin', 'ROLE_ADMIN') where id=(номер вашего пользователя в таблице user);

После этого в хедере появится вкладка админ панели доступная только администратору с которой можно добавить категории и продукты.

