<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240310140221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authors (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_authors (news_id INT NOT NULL, authors_id INT NOT NULL, INDEX IDX_D9E836B7B5A459A0 (news_id), INDEX IDX_D9E836B76DE2013A (authors_id), PRIMARY KEY(news_id, authors_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE news_authors ADD CONSTRAINT FK_D9E836B7B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_authors ADD CONSTRAINT FK_D9E836B76DE2013A FOREIGN KEY (authors_id) REFERENCES authors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_author DROP FOREIGN KEY FK_31061BBCF675F31B');
        $this->addSql('ALTER TABLE news_author DROP FOREIGN KEY FK_31061BBCB5A459A0');
        $this->addSql('DROP TABLE news_author');
        $this->addSql('DROP TABLE author');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE news_author (news_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_31061BBCB5A459A0 (news_id), INDEX IDX_31061BBCF675F31B (author_id), PRIMARY KEY(news_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE news_author ADD CONSTRAINT FK_31061BBCF675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_author ADD CONSTRAINT FK_31061BBCB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_authors DROP FOREIGN KEY FK_D9E836B7B5A459A0');
        $this->addSql('ALTER TABLE news_authors DROP FOREIGN KEY FK_D9E836B76DE2013A');
        $this->addSql('DROP TABLE authors');
        $this->addSql('DROP TABLE news_authors');
    }
}
