<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927141144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge CHANGE created_by created_by INT DEFAULT NULL, CHANGE created_at created_at INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE point_total point_total INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE point_total point_total INT NOT NULL');
        $this->addSql('ALTER TABLE challenge CHANGE created_by created_by INT NOT NULL, CHANGE created_at created_at VARCHAR(255) NOT NULL');
    }
}
