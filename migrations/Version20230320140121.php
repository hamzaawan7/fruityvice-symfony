<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230320140121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nutrition ADD CONSTRAINT FK_B7C360F1BAC115F0 FOREIGN KEY (fruit_id) REFERENCES fruit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B7C360F1BAC115F0 ON nutrition (fruit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nutrition DROP FOREIGN KEY FK_B7C360F1BAC115F0');
        $this->addSql('DROP INDEX UNIQ_B7C360F1BAC115F0 ON nutrition');
    }
}
