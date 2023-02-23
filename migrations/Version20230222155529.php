<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222155529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE img_id_seq CASCADE');
        $this->addSql('ALTER TABLE img DROP CONSTRAINT fk_bbc2c8ac58abf955');
        $this->addSql('DROP TABLE img');
        $this->addSql('ALTER TABLE info_logement ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE logement DROP CONSTRAINT fk_f0fd4457714819a0');
        $this->addSql('DROP INDEX idx_f0fd4457714819a0');
        $this->addSql('ALTER TABLE logement ADD img VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE logement DROP date');
        $this->addSql('ALTER TABLE logement RENAME COLUMN type_id_id TO info_logement_id');
        $this->addSql('ALTER TABLE logement ADD CONSTRAINT FK_F0FD44578793D3AA FOREIGN KEY (info_logement_id) REFERENCES info_logement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F0FD44578793D3AA ON logement (info_logement_id)');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT fk_42c84955884c09a7');
        $this->addSql('DROP INDEX idx_42c84955884c09a7');
        $this->addSql('ALTER TABLE reservation ALTER phone TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE reservation RENAME COLUMN logement_id_id TO logement_id');
        $this->addSql('ALTER TABLE reservation RENAME COLUMN fisrt_name TO first_name');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495558ABF955 FOREIGN KEY (logement_id) REFERENCES logement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_42C8495558ABF955 ON reservation (logement_id)');
        $this->addSql('ALTER TABLE "user" ADD phone VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE img_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE img (id INT NOT NULL, logement_id INT DEFAULT NULL, img_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_bbc2c8ac58abf955 ON img (logement_id)');
        $this->addSql('ALTER TABLE img ADD CONSTRAINT fk_bbc2c8ac58abf955 FOREIGN KEY (logement_id) REFERENCES logement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE info_logement DROP type');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C8495558ABF955');
        $this->addSql('DROP INDEX IDX_42C8495558ABF955');
        $this->addSql('ALTER TABLE reservation ALTER phone TYPE INT');
        $this->addSql('ALTER TABLE reservation RENAME COLUMN logement_id TO logement_id_id');
        $this->addSql('ALTER TABLE reservation RENAME COLUMN first_name TO fisrt_name');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT fk_42c84955884c09a7 FOREIGN KEY (logement_id_id) REFERENCES logement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_42c84955884c09a7 ON reservation (logement_id_id)');
        $this->addSql('ALTER TABLE logement DROP CONSTRAINT FK_F0FD44578793D3AA');
        $this->addSql('DROP INDEX IDX_F0FD44578793D3AA');
        $this->addSql('ALTER TABLE logement ADD date DATE NOT NULL');
        $this->addSql('ALTER TABLE logement DROP img');
        $this->addSql('ALTER TABLE logement RENAME COLUMN info_logement_id TO type_id_id');
        $this->addSql('ALTER TABLE logement ADD CONSTRAINT fk_f0fd4457714819a0 FOREIGN KEY (type_id_id) REFERENCES info_logement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_f0fd4457714819a0 ON logement (type_id_id)');
        $this->addSql('ALTER TABLE "user" DROP phone');
    }
}
