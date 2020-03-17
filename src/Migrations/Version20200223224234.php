<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200223224234 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist_lieu (artist_id INT NOT NULL, lieu_id INT NOT NULL, INDEX IDX_93E9FBC6B7970CF8 (artist_id), INDEX IDX_93E9FBC66AB213CC (lieu_id), PRIMARY KEY(artist_id, lieu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist_categorie (artist_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_55A9BDBCB7970CF8 (artist_id), INDEX IDX_55A9BDBCBCF5E72D (categorie_id), PRIMARY KEY(artist_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, artist_id INT DEFAULT NULL, lieux_id INT NOT NULL, categorie_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, INDEX IDX_3BAE0AA7B7970CF8 (artist_id), INDEX IDX_3BAE0AA7A2C806AC (lieux_id), INDEX IDX_3BAE0AA7BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_lieu ADD CONSTRAINT FK_93E9FBC6B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_lieu ADD CONSTRAINT FK_93E9FBC66AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_categorie ADD CONSTRAINT FK_55A9BDBCB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_categorie ADD CONSTRAINT FK_55A9BDBCBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7A2C806AC FOREIGN KEY (lieux_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE artist_lieu DROP FOREIGN KEY FK_93E9FBC6B7970CF8');
        $this->addSql('ALTER TABLE artist_categorie DROP FOREIGN KEY FK_55A9BDBCB7970CF8');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7B7970CF8');
        $this->addSql('ALTER TABLE artist_categorie DROP FOREIGN KEY FK_55A9BDBCBCF5E72D');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7BCF5E72D');
        $this->addSql('ALTER TABLE artist_lieu DROP FOREIGN KEY FK_93E9FBC66AB213CC');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7A2C806AC');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE artist_lieu');
        $this->addSql('DROP TABLE artist_categorie');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE lieu');
    }
}
