<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927143149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE challenge (id INT AUTO_INCREMENT NOT NULL, current_challenge_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, conditions VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, subcategory VARCHAR(255) NOT NULL, points INT NOT NULL, created_by INT DEFAULT NULL, created_at INT DEFAULT NULL, status INT NOT NULL, UNIQUE INDEX UNIQ_D70989516713A41D (current_challenge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D70989516713A41D FOREIGN KEY (current_challenge_id) REFERENCES current_challenge (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D70989516713A41D');
        $this->addSql('DROP TABLE challenge');
    }
}
