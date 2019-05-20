<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190519141301 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE users ALTER send_push DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER send_sms DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER mobile DROP NOT NULL');
        $this->addSql('ALTER TABLE users ALTER device_token DROP NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users ALTER send_push SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER send_sms SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER mobile SET NOT NULL');
        $this->addSql('ALTER TABLE users ALTER device_token SET NOT NULL');
    }
}
