<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<<< HEAD:migrations/Version20230927130944.php
final class Version20230927130944 extends AbstractMigration
========
final class Version20230927122354 extends AbstractMigration
>>>>>>>> bba616d9fe3e359db94123c4e215f3208a9e4678:migrations/Version20230927122354.php
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
<<<<<<<< HEAD:migrations/Version20230927130944.php
        $this->addSql('ALTER TABLE challenge ADD created_by INT NOT NULL, ADD created_at INT NOT NULL');
========
        $this->addSql('ALTER TABLE current_challenge CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE current_challenge ADD CONSTRAINT FK_C2F38FDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD date_of_birth DATE DEFAULT NULL');
>>>>>>>> bba616d9fe3e359db94123c4e215f3208a9e4678:migrations/Version20230927122354.php
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
<<<<<<<< HEAD:migrations/Version20230927130944.php
        $this->addSql('ALTER TABLE challenge DROP created_by, DROP created_at');
========
        $this->addSql('ALTER TABLE current_challenge DROP FOREIGN KEY FK_C2F38FDA76ED395');
        $this->addSql('ALTER TABLE current_challenge CHANGE created_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user DROP date_of_birth');
>>>>>>>> bba616d9fe3e359db94123c4e215f3208a9e4678:migrations/Version20230927122354.php
    }
}
