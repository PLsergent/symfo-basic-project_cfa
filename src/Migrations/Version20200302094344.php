<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200302094344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE medicament (id INT AUTO_INCREMENT NOT NULL, dénomination VARCHAR(255) NOT NULL, conditionnement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, num_ss_id INT DEFAULT NULL, matricule_id INT DEFAULT NULL, date_heure DATETIME NOT NULL, INDEX IDX_964685A6DF59CF24 (num_ss_id), INDEX IDX_964685A69AAADC05 (matricule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, matricule INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordonnance (id INT AUTO_INCREMENT NOT NULL, num_ss_id INT DEFAULT NULL, matricule_id INT DEFAULT NULL, numero_ordre VARCHAR(255) NOT NULL, date_heure DATETIME NOT NULL, INDEX IDX_924B326CDF59CF24 (num_ss_id), INDEX IDX_924B326C9AAADC05 (matricule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_prescription (id INT AUTO_INCREMENT NOT NULL, numero_ordre_id INT DEFAULT NULL, dénomination_id INT DEFAULT NULL, posologie VARCHAR(255) NOT NULL, INDEX IDX_A761F81633868EEC (numero_ordre_id), INDEX IDX_A761F8168A4DFEB5 (dénomination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, num_ss INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6DF59CF24 FOREIGN KEY (num_ss_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A69AAADC05 FOREIGN KEY (matricule_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326CDF59CF24 FOREIGN KEY (num_ss_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326C9AAADC05 FOREIGN KEY (matricule_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE ligne_prescription ADD CONSTRAINT FK_A761F81633868EEC FOREIGN KEY (numero_ordre_id) REFERENCES ordonnance (id)');
        $this->addSql('ALTER TABLE ligne_prescription ADD CONSTRAINT FK_A761F8168A4DFEB5 FOREIGN KEY (dénomination_id) REFERENCES medicament (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ligne_prescription DROP FOREIGN KEY FK_A761F8168A4DFEB5');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A69AAADC05');
        $this->addSql('ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326C9AAADC05');
        $this->addSql('ALTER TABLE ligne_prescription DROP FOREIGN KEY FK_A761F81633868EEC');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6DF59CF24');
        $this->addSql('ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326CDF59CF24');
        $this->addSql('DROP TABLE medicament');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE ordonnance');
        $this->addSql('DROP TABLE ligne_prescription');
        $this->addSql('DROP TABLE patient');
    }
}
