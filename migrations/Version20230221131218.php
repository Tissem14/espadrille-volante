<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221131218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT fk_42c84955884c09a7');
        $this->addSql('DROP INDEX idx_42c84955884c09a7');
        $this->addSql('ALTER TABLE reservation ALTER phone TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation RENAME COLUMN logement_id_id TO logement_id');
        $this->addSql('ALTER TABLE reservation RENAME COLUMN fisrt_name TO first_name');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495558ABF955 FOREIGN KEY (logement_id) REFERENCES logement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_42C8495558ABF955 ON reservation (logement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C8495558ABF955');
        $this->addSql('DROP INDEX IDX_42C8495558ABF955');
        $this->addSql('ALTER TABLE reservation ALTER phone TYPE INT');
        $this->addSql('ALTER TABLE reservation RENAME COLUMN logement_id TO logement_id_id');
        $this->addSql('ALTER TABLE reservation RENAME COLUMN first_name TO fisrt_name');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT fk_42c84955884c09a7 FOREIGN KEY (logement_id_id) REFERENCES logement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_42c84955884c09a7 ON reservation (logement_id_id)');
    }
}
