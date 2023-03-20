<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230320125359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favourite ADD CONSTRAINT FK_62A2CA19BAC115F0 FOREIGN KEY (fruit_id) REFERENCES fruit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_62A2CA19BAC115F0 ON favourite (fruit_id)');
        $this->addSql('ALTER TABLE fruit CHANGE fruity_vice_id fruity_vice_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favourite DROP FOREIGN KEY FK_62A2CA19BAC115F0');
        $this->addSql('DROP INDEX UNIQ_62A2CA19BAC115F0 ON favourite');
        $this->addSql('ALTER TABLE fruit CHANGE fruity_vice_id fruity_vice_id INT NOT NULL');
    }
}
