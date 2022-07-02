<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220701133652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE basket_product (basket_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_17ED14B41BE1FB52 (basket_id), INDEX IDX_17ED14B44584665A (product_id), PRIMARY KEY(basket_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE basket_product ADD CONSTRAINT FK_17ED14B41BE1FB52 FOREIGN KEY (basket_id) REFERENCES basket (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE basket_product ADD CONSTRAINT FK_17ED14B44584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD1BE1FB52');
        $this->addSql('DROP INDEX IDX_D34A04AD1BE1FB52 ON product');
        $this->addSql('ALTER TABLE product DROP basket_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE basket_product');
        $this->addSql('ALTER TABLE product ADD basket_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD1BE1FB52 FOREIGN KEY (basket_id) REFERENCES basket (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D34A04AD1BE1FB52 ON product (basket_id)');
    }
}
