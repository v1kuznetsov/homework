<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220702095013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE baskets (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE basket ADD baskets_id INT NOT NULL');
        $this->addSql('ALTER TABLE basket ADD CONSTRAINT FK_2246507B620F6C06 FOREIGN KEY (baskets_id) REFERENCES baskets (id)');
        $this->addSql('CREATE INDEX IDX_2246507B620F6C06 ON basket (baskets_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE basket DROP FOREIGN KEY FK_2246507B620F6C06');
        $this->addSql('DROP TABLE baskets');
        $this->addSql('DROP INDEX IDX_2246507B620F6C06 ON basket');
        $this->addSql('ALTER TABLE basket DROP baskets_id');
    }
}
