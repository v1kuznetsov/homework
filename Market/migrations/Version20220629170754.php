<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220629170754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE basket_order (id INT AUTO_INCREMENT NOT NULL, products_id INT NOT NULL, city_id INT DEFAULT NULL, status_id INT NOT NULL, address VARCHAR(255) DEFAULT NULL, order_total_price NUMERIC(10, 2) NOT NULL, UNIQUE INDEX UNIQ_A351D8A26C8A81A9 (products_id), INDEX IDX_A351D8A28BAC62AF (city_id), INDEX IDX_A351D8A26BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_in_basket (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, price NUMERIC(10, 2) NOT NULL, count INT DEFAULT 1 NOT NULL, total_price NUMERIC(10, 2) NOT NULL, UNIQUE INDEX UNIQ_C7CC1A784584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_order (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, order_id INT NOT NULL, INDEX IDX_17EB68C0A76ED395 (user_id), UNIQUE INDEX UNIQ_17EB68C08D9F6D38 (order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE basket_order ADD CONSTRAINT FK_A351D8A26C8A81A9 FOREIGN KEY (products_id) REFERENCES products_in_basket (id)');
        $this->addSql('ALTER TABLE basket_order ADD CONSTRAINT FK_A351D8A28BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE basket_order ADD CONSTRAINT FK_A351D8A26BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE products_in_basket ADD CONSTRAINT FK_C7CC1A784584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE user_order ADD CONSTRAINT FK_17EB68C0A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user_order ADD CONSTRAINT FK_17EB68C08D9F6D38 FOREIGN KEY (order_id) REFERENCES basket_order (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_order DROP FOREIGN KEY FK_17EB68C08D9F6D38');
        $this->addSql('ALTER TABLE basket_order DROP FOREIGN KEY FK_A351D8A28BAC62AF');
        $this->addSql('ALTER TABLE basket_order DROP FOREIGN KEY FK_A351D8A26C8A81A9');
        $this->addSql('ALTER TABLE basket_order DROP FOREIGN KEY FK_A351D8A26BF700BD');
        $this->addSql('DROP TABLE basket_order');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE products_in_basket');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE user_order');
    }
}
