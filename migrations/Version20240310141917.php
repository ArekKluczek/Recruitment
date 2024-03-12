<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240310141917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authors_news (authors_id INT NOT NULL, news_id INT NOT NULL, INDEX IDX_26100CCB6DE2013A (authors_id), INDEX IDX_26100CCBB5A459A0 (news_id), PRIMARY KEY(authors_id, news_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE authors_news ADD CONSTRAINT FK_26100CCB6DE2013A FOREIGN KEY (authors_id) REFERENCES authors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE authors_news ADD CONSTRAINT FK_26100CCBB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_authors DROP FOREIGN KEY FK_D9E836B7B5A459A0');
        $this->addSql('ALTER TABLE news_authors DROP FOREIGN KEY FK_D9E836B76DE2013A');
        $this->addSql('DROP TABLE news_authors');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE news_authors (news_id INT NOT NULL, authors_id INT NOT NULL, INDEX IDX_D9E836B7B5A459A0 (news_id), INDEX IDX_D9E836B76DE2013A (authors_id), PRIMARY KEY(news_id, authors_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE news_authors ADD CONSTRAINT FK_D9E836B7B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_authors ADD CONSTRAINT FK_D9E836B76DE2013A FOREIGN KEY (authors_id) REFERENCES authors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE authors_news DROP FOREIGN KEY FK_26100CCB6DE2013A');
        $this->addSql('ALTER TABLE authors_news DROP FOREIGN KEY FK_26100CCBB5A459A0');
        $this->addSql('DROP TABLE authors_news');
    }
}
