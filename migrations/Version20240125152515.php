<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240125152515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE lesson_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE lesson_revision_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE student_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE student_group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE task_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE task_revision_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE lesson (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE lesson_revision (id INT NOT NULL, lesson_id INT NOT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, revision_number VARCHAR(11) NOT NULL, revision_order INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_25245FD5CDF80196 ON lesson_revision (lesson_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_25245FD5CDF8019620DBBC43 ON lesson_revision (lesson_id, revision_number)');
        $this->addSql('CREATE TABLE student (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE student_student_group (student_id INT NOT NULL, student_group_id INT NOT NULL, PRIMARY KEY(student_id, student_group_id))');
        $this->addSql('CREATE INDEX IDX_B06BC5C6CB944F1A ON student_student_group (student_id)');
        $this->addSql('CREATE INDEX IDX_B06BC5C64DDF95DC ON student_student_group (student_group_id)');
        $this->addSql('CREATE TABLE student_group (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE student_group_student (student_group_id INT NOT NULL, student_id INT NOT NULL, PRIMARY KEY(student_group_id, student_id))');
        $this->addSql('CREATE INDEX IDX_64BF03A14DDF95DC ON student_group_student (student_group_id)');
        $this->addSql('CREATE INDEX IDX_64BF03A1CB944F1A ON student_group_student (student_id)');
        $this->addSql('CREATE TABLE student_group_lesson_revision (student_group_id INT NOT NULL, lesson_revision_id INT NOT NULL, PRIMARY KEY(student_group_id, lesson_revision_id))');
        $this->addSql('CREATE INDEX IDX_6C7B86F24DDF95DC ON student_group_lesson_revision (student_group_id)');
        $this->addSql('CREATE INDEX IDX_6C7B86F2EC239784 ON student_group_lesson_revision (lesson_revision_id)');
        $this->addSql('CREATE TABLE task (id INT NOT NULL, lesson_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_527EDB25CDF80196 ON task (lesson_id)');
        $this->addSql('CREATE TABLE task_revision (id INT NOT NULL, task_id INT NOT NULL, lesson_revision_id INT NOT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, revision_number VARCHAR(11) NOT NULL, revision_order INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2DA3FF808DB60186 ON task_revision (task_id)');
        $this->addSql('CREATE INDEX IDX_2DA3FF80EC239784 ON task_revision (lesson_revision_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2DA3FF808DB6018620DBBC43 ON task_revision (task_id, revision_number)');
        $this->addSql('ALTER TABLE lesson_revision ADD CONSTRAINT FK_25245FD5CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_student_group ADD CONSTRAINT FK_B06BC5C6CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_student_group ADD CONSTRAINT FK_B06BC5C64DDF95DC FOREIGN KEY (student_group_id) REFERENCES student_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_group_student ADD CONSTRAINT FK_64BF03A14DDF95DC FOREIGN KEY (student_group_id) REFERENCES student_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_group_student ADD CONSTRAINT FK_64BF03A1CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_group_lesson_revision ADD CONSTRAINT FK_6C7B86F24DDF95DC FOREIGN KEY (student_group_id) REFERENCES student_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_group_lesson_revision ADD CONSTRAINT FK_6C7B86F2EC239784 FOREIGN KEY (lesson_revision_id) REFERENCES lesson_revision (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task_revision ADD CONSTRAINT FK_2DA3FF808DB60186 FOREIGN KEY (task_id) REFERENCES task (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task_revision ADD CONSTRAINT FK_2DA3FF80EC239784 FOREIGN KEY (lesson_revision_id) REFERENCES lesson_revision (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE lesson_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE lesson_revision_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE student_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE student_group_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE task_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE task_revision_id_seq CASCADE');
        $this->addSql('ALTER TABLE lesson_revision DROP CONSTRAINT FK_25245FD5CDF80196');
        $this->addSql('ALTER TABLE student_student_group DROP CONSTRAINT FK_B06BC5C6CB944F1A');
        $this->addSql('ALTER TABLE student_student_group DROP CONSTRAINT FK_B06BC5C64DDF95DC');
        $this->addSql('ALTER TABLE student_group_student DROP CONSTRAINT FK_64BF03A14DDF95DC');
        $this->addSql('ALTER TABLE student_group_student DROP CONSTRAINT FK_64BF03A1CB944F1A');
        $this->addSql('ALTER TABLE student_group_lesson_revision DROP CONSTRAINT FK_6C7B86F24DDF95DC');
        $this->addSql('ALTER TABLE student_group_lesson_revision DROP CONSTRAINT FK_6C7B86F2EC239784');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB25CDF80196');
        $this->addSql('ALTER TABLE task_revision DROP CONSTRAINT FK_2DA3FF808DB60186');
        $this->addSql('ALTER TABLE task_revision DROP CONSTRAINT FK_2DA3FF80EC239784');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE lesson_revision');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_student_group');
        $this->addSql('DROP TABLE student_group');
        $this->addSql('DROP TABLE student_group_student');
        $this->addSql('DROP TABLE student_group_lesson_revision');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE task_revision');
    }
}
