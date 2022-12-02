<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202133136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE social_post_user (social_post_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_7690EC35C4F2D6B1 (social_post_id), INDEX IDX_7690EC35A76ED395 (user_id), PRIMARY KEY(social_post_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE social_post_user ADD CONSTRAINT FK_7690EC35C4F2D6B1 FOREIGN KEY (social_post_id) REFERENCES social_post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE social_post_user ADD CONSTRAINT FK_7690EC35A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE social_post_user DROP FOREIGN KEY FK_7690EC35C4F2D6B1');
        $this->addSql('ALTER TABLE social_post_user DROP FOREIGN KEY FK_7690EC35A76ED395');
        $this->addSql('DROP TABLE social_post_user');
    }
}
