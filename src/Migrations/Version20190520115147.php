<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190520115147 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT fk_97a0ada3e75085f7');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT fk_97a0ada35ede257b');
        $this->addSql('DROP INDEX idx_97a0ada3e75085f7');
        $this->addSql('DROP INDEX idx_97a0ada35ede257b');
        $this->addSql('ALTER TABLE ticket RENAME COLUMN ticket_owner TO owner');
        $this->addSql('ALTER TABLE ticket RENAME COLUMN assigned_tickets TO assignee');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3CF60E67C FOREIGN KEY (owner) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA37C9DFC0C FOREIGN KEY (assignee) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_97A0ADA3CF60E67C ON ticket (owner)');
        $this->addSql('CREATE INDEX IDX_97A0ADA37C9DFC0C ON ticket (assignee)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA3CF60E67C');
        $this->addSql('ALTER TABLE ticket DROP CONSTRAINT FK_97A0ADA37C9DFC0C');
        $this->addSql('DROP INDEX IDX_97A0ADA3CF60E67C');
        $this->addSql('DROP INDEX IDX_97A0ADA37C9DFC0C');
        $this->addSql('ALTER TABLE ticket RENAME COLUMN owner TO ticket_owner');
        $this->addSql('ALTER TABLE ticket RENAME COLUMN assignee TO assigned_tickets');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT fk_97a0ada3e75085f7 FOREIGN KEY (ticket_owner) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT fk_97a0ada35ede257b FOREIGN KEY (assigned_tickets) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_97a0ada3e75085f7 ON ticket (ticket_owner)');
        $this->addSql('CREATE INDEX idx_97a0ada35ede257b ON ticket (assigned_tickets)');
    }
}
