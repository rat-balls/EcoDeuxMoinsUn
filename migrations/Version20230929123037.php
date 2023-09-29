<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230929123037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge CHANGE created_by created_by VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE current_challenge ADD CONSTRAINT FK_C2F38FD98A21AC6 FOREIGN KEY (challenge_id) REFERENCES challenge (id)');
        $this->addSql('CREATE INDEX IDX_C2F38FD98A21AC6 ON current_challenge (challenge_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge CHANGE created_by created_by INT DEFAULT NULL, CHANGE created_at created_at INT DEFAULT NULL');
        $this->addSql('ALTER TABLE current_challenge DROP FOREIGN KEY FK_C2F38FD98A21AC6');
        $this->addSql('DROP INDEX IDX_C2F38FD98A21AC6 ON current_challenge');
    }
}
