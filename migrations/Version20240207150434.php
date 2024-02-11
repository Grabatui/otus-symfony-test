<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207150434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_group_student DROP CONSTRAINT fk_64bf03a14ddf95dc');
        $this->addSql('ALTER TABLE student_group_student DROP CONSTRAINT fk_64bf03a1cb944f1a');
        $this->addSql('DROP TABLE student_group_student');
        $this->addSql('ALTER TABLE student_student_group DROP CONSTRAINT FK_B06BC5C6CB944F1A');
        $this->addSql('ALTER TABLE student_student_group DROP CONSTRAINT FK_B06BC5C64DDF95DC');
        $this->addSql('ALTER TABLE student_student_group DROP CONSTRAINT student_student_group_pkey');
        $this->addSql('ALTER TABLE student_student_group ADD CONSTRAINT FK_B06BC5C6CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_student_group ADD CONSTRAINT FK_B06BC5C64DDF95DC FOREIGN KEY (student_group_id) REFERENCES student_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_student_group ADD PRIMARY KEY (student_group_id, student_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE student_group_student (student_group_id INT NOT NULL, student_id INT NOT NULL, PRIMARY KEY(student_group_id, student_id))');
        $this->addSql('CREATE INDEX idx_64bf03a1cb944f1a ON student_group_student (student_id)');
        $this->addSql('CREATE INDEX idx_64bf03a14ddf95dc ON student_group_student (student_group_id)');
        $this->addSql('ALTER TABLE student_group_student ADD CONSTRAINT fk_64bf03a14ddf95dc FOREIGN KEY (student_group_id) REFERENCES student_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_group_student ADD CONSTRAINT fk_64bf03a1cb944f1a FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_student_group DROP CONSTRAINT fk_b06bc5c64ddf95dc');
        $this->addSql('ALTER TABLE student_student_group DROP CONSTRAINT fk_b06bc5c6cb944f1a');
        $this->addSql('DROP INDEX student_student_group_pkey');
        $this->addSql('ALTER TABLE student_student_group ADD CONSTRAINT fk_b06bc5c64ddf95dc FOREIGN KEY (student_group_id) REFERENCES student_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_student_group ADD CONSTRAINT fk_b06bc5c6cb944f1a FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_student_group ADD PRIMARY KEY (student_id, student_group_id)');
    }
}
