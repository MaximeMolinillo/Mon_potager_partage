<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240127151735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, num_article INT NOT NULL, titre VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, texte LONGTEXT DEFAULT NULL, statut TINYINT(1) NOT NULL, frise_chronologique INT DEFAULT NULL, INDEX IDX_23A0E6660BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_tuto (id INT AUTO_INCREMENT NOT NULL, tuto_id INT DEFAULT NULL, id_article_tuto INT NOT NULL, instruction LONGTEXT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, ordre_chrono INT DEFAULT NULL, INDEX IDX_B13F055628B30A4C (tuto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis_article (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, id_note_article INT NOT NULL, avis_article INT NOT NULL, INDEX IDX_29399E607294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis_encyclopedie (id INT AUTO_INCREMENT NOT NULL, fiche_encyclopedie_id INT DEFAULT NULL, id_note_encyclopedie INT NOT NULL, avis_encyclopedie INT NOT NULL, INDEX IDX_31A300FDA0631CAF (fiche_encyclopedie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE calendrier (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, id_encart_calendaire INT NOT NULL, debut DATE NOT NULL, fin DATE NOT NULL, type VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_B2753CB960BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE encyclopedie (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, id_encyclopedie INT NOT NULL, titre VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, mois_semis INT DEFAULT NULL, mois_repiquage INT DEFAULT NULL, mois_recolte INT DEFAULT NULL, climat VARCHAR(100) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, nourriture VARCHAR(255) DEFAULT NULL, taille VARCHAR(255) DEFAULT NULL, espacement VARCHAR(255) DEFAULT NULL, rendement VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, secteur_geo VARCHAR(255) DEFAULT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_779557C960BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, id_log INT NOT NULL, description_log VARCHAR(255) NOT NULL, INDEX IDX_8F3F68C560BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tuto (id INT AUTO_INCREMENT NOT NULL, num_tuto INT NOT NULL, frise_chrono DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, id_utilisateur INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom_utilisateur VARCHAR(255) NOT NULL, annee_experience INT DEFAULT NULL, localisation_potager VARCHAR(255) DEFAULT NULL, statut TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), UNIQUE INDEX UNIQ_1D1C63B3D37CC8AC (nom_utilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6660BB6FE6 FOREIGN KEY (auteur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE article_tuto ADD CONSTRAINT FK_B13F055628B30A4C FOREIGN KEY (tuto_id) REFERENCES tuto (id)');
        $this->addSql('ALTER TABLE avis_article ADD CONSTRAINT FK_29399E607294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE avis_encyclopedie ADD CONSTRAINT FK_31A300FDA0631CAF FOREIGN KEY (fiche_encyclopedie_id) REFERENCES encyclopedie (id)');
        $this->addSql('ALTER TABLE calendrier ADD CONSTRAINT FK_B2753CB960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE encyclopedie ADD CONSTRAINT FK_779557C960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE log ADD CONSTRAINT FK_8F3F68C560BB6FE6 FOREIGN KEY (auteur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6660BB6FE6');
        $this->addSql('ALTER TABLE article_tuto DROP FOREIGN KEY FK_B13F055628B30A4C');
        $this->addSql('ALTER TABLE avis_article DROP FOREIGN KEY FK_29399E607294869C');
        $this->addSql('ALTER TABLE avis_encyclopedie DROP FOREIGN KEY FK_31A300FDA0631CAF');
        $this->addSql('ALTER TABLE calendrier DROP FOREIGN KEY FK_B2753CB960BB6FE6');
        $this->addSql('ALTER TABLE encyclopedie DROP FOREIGN KEY FK_779557C960BB6FE6');
        $this->addSql('ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C560BB6FE6');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_tuto');
        $this->addSql('DROP TABLE avis_article');
        $this->addSql('DROP TABLE avis_encyclopedie');
        $this->addSql('DROP TABLE calendrier');
        $this->addSql('DROP TABLE encyclopedie');
        $this->addSql('DROP TABLE log');
        $this->addSql('DROP TABLE tuto');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
