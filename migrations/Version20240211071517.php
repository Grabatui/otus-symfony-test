<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240211071517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_group_lesson_revision DROP CONSTRAINT FK_6C7B86F24DDF95DC');
        $this->addSql('ALTER TABLE student_group_lesson_revision DROP CONSTRAINT FK_6C7B86F2EC239784');
        $this->addSql('ALTER TABLE student_group_lesson_revision ADD CONSTRAINT FK_6C7B86F24DDF95DC FOREIGN KEY (student_group_id) REFERENCES student_group (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_group_lesson_revision ADD CONSTRAINT FK_6C7B86F2EC239784 FOREIGN KEY (lesson_revision_id) REFERENCES lesson_revision (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_group_lesson_revision DROP CONSTRAINT fk_6c7b86f24ddf95dc');
        $this->addSql('ALTER TABLE student_group_lesson_revision DROP CONSTRAINT fk_6c7b86f2ec239784');
        $this->addSql('ALTER TABLE student_group_lesson_revision ADD CONSTRAINT fk_6c7b86f24ddf95dc FOREIGN KEY (student_group_id) REFERENCES student_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_group_lesson_revision ADD CONSTRAINT fk_6c7b86f2ec239784 FOREIGN KEY (lesson_revision_id) REFERENCES lesson_revision (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
