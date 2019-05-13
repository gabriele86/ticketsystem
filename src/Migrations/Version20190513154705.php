<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190513154705 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT fk_97a0ada37e3c61f9');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT fk_97a0ada359ec7d60');
        $this->addSql('DROP INDEX idx_97a0ada37e3c61f9');
        $this->addSql('DROP INDEX idx_97a0ada359ec7d60');
        $this->addSql('ALTER TABLE ticket RENAME COLUMN owner_id TO ticket_owner');
        $this->addSql('ALTER TABLE ticket RENAME COLUMN assignee_id TO assigned_tickets');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3E75085F7 FOREIGN KEY (ticket_owner) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA35EDE257B FOREIGN KEY (assigned_tickets) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_97A0ADA3E75085F7 ON ticket (ticket_owner)');
        $this->addSql('CREATE INDEX IDX_97A0ADA35EDE257B ON ticket (assigned_tickets)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA3E75085F7');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA35EDE257B');
        $this->addSql('DROP INDEX IDX_97A0ADA3E75085F7');
        $this->addSql('DROP INDEX IDX_97A0ADA35EDE257B');
        $this->addSql('ALTER TABLE ticket RENAME COLUMN ticket_owner TO owner_id');
        $this->addSql('ALTER TABLE ticket RENAME COLUMN assigned_tickets TO assignee_id');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT fk_97a0ada37e3c61f9 FOREIGN KEY (owner_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT fk_97a0ada359ec7d60 FOREIGN KEY (assignee_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_97a0ada37e3c61f9 ON ticket (owner_id)');
        $this->addSql('CREATE INDEX idx_97a0ada359ec7d60 ON ticket (assignee_id)');
    }
}
