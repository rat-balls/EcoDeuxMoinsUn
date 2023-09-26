<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230926124906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge ADD current_challenge_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D70989516713A41D FOREIGN KEY (current_challenge_id) REFERENCES current_challenge (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D70989516713A41D ON challenge (current_challenge_id)');
        $this->addSql('ALTER TABLE current_challenge ADD CONSTRAINT FK_C2F38FDA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_C2F38FDA76ED395 ON current_challenge (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D70989516713A41D');
        $this->addSql('DROP INDEX UNIQ_D70989516713A41D ON challenge');
        $this->addSql('ALTER TABLE challenge DROP current_challenge_id');
        $this->addSql('ALTER TABLE current_challenge DROP FOREIGN KEY FK_C2F38FDA76ED395');
        $this->addSql('DROP INDEX IDX_C2F38FDA76ED395 ON current_challenge');
    }
}
