<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230320081156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fruit DROP fruitvice_id, CHANGE fuit_order fruit_order VARCHAR(255) NOT NULL, CHANGE fruit_id fruity_vice_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fruit ADD fruitvice_id INT DEFAULT NULL, CHANGE fruity_vice_id fruit_id INT NOT NULL, CHANGE fruit_order fuit_order VARCHAR(255) NOT NULL');
    }
}
