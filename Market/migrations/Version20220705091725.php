<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220705091725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_order (id INT AUTO_INCREMENT NOT NULL, total_price NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_order_product_in_basket (product_order_id INT NOT NULL, product_in_basket_id INT NOT NULL, INDEX IDX_A65984F2462F07AF (product_order_id), INDEX IDX_A65984F2F4DF3D9A (product_in_basket_id), PRIMARY KEY(product_order_id, product_in_basket_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_order_product_in_basket ADD CONSTRAINT FK_A65984F2462F07AF FOREIGN KEY (product_order_id) REFERENCES product_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_order_product_in_basket ADD CONSTRAINT FK_A65984F2F4DF3D9A FOREIGN KEY (product_in_basket_id) REFERENCES product_in_basket (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_order_product_in_basket DROP FOREIGN KEY FK_A65984F2462F07AF');
        $this->addSql('DROP TABLE product_order');
        $this->addSql('DROP TABLE product_order_product_in_basket');
    }
}
