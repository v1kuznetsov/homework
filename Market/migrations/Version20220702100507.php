<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220702100507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE basket DROP FOREIGN KEY FK_2246507B620F6C06');
        $this->addSql('CREATE TABLE product_in_basket (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, count INT NOT NULL, price NUMERIC(10, 2) NOT NULL, total_price NUMERIC(10, 2) NOT NULL, INDEX IDX_FB114FD34584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_in_basket ADD CONSTRAINT FK_FB114FD34584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('DROP TABLE basket');
        $this->addSql('DROP TABLE baskets');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE basket (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, baskets_id INT NOT NULL, count INT NOT NULL, price NUMERIC(10, 2) NOT NULL, total_price NUMERIC(10, 2) NOT NULL, INDEX IDX_2246507B4584665A (product_id), INDEX IDX_2246507B620F6C06 (baskets_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE baskets (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE basket ADD CONSTRAINT FK_2246507B4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE basket ADD CONSTRAINT FK_2246507B620F6C06 FOREIGN KEY (baskets_id) REFERENCES baskets (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE product_in_basket');
    }
}
