<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200705005308 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, destination VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, detail LONGTEXT DEFAULT NULL, etat_traitement TINYINT(1) NOT NULL, granted TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9067F23CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE affectation (id INT AUTO_INCREMENT NOT NULL, service_id INT NOT NULL, poste VARCHAR(255) NOT NULL, date_affectation DATETIME NOT NULL, date_detachement DATETIME DEFAULT NULL, remarks VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, User_id INT DEFAULT NULL, INDEX IDX_F4DD61D368D3EA09 (User_id), INDEX IDX_F4DD61D3ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attestation (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date DATE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_326EC63FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, photo_id INT DEFAULT NULL, departement_id INT DEFAULT NULL, cadre_id INT NOT NULL, cin VARCHAR(255) DEFAULT NULL, som INT NOT NULL, email VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, poste_budgetaire VARCHAR(20) NOT NULL, nom VARCHAR(255) DEFAULT NULL, nom_ar VARCHAR(255) DEFAULT NULL, prenom_1 VARCHAR(255) DEFAULT NULL, prenom_2 VARCHAR(255) DEFAULT NULL, prenom_ar1 VARCHAR(255) DEFAULT NULL, prenom_ar2 VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, date_recrutement DATE DEFAULT NULL, lieu_naissance VARCHAR(255) NOT NULL, lieu_naissance_ar VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, adresse_ar VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, nom_complet VARCHAR(255) DEFAULT NULL, nom_complet_ar VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D64978906596 (som), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D6497E9E4C8C (photo_id), INDEX IDX_8D93D649CCF9E01E (departement_id), INDEX IDX_8D93D6499308DA90 (cadre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autorisation (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, motif VARCHAR(255) DEFAULT NULL, detail LONGTEXT DEFAULT NULL, granted TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9A43134A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, filename VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_C53D045FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qualification (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, diplome_id INT NOT NULL, partie_delivrante VARCHAR(255) NOT NULL, date_obtention DATETIME NOT NULL, mension VARCHAR(255) DEFAULT NULL, remarks VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_B712F0CEA76ED395 (user_id), INDEX IDX_B712F0CE26F859E2 (diplome_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diplome (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE situations_familiale (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, situation_familiale VARCHAR(255) NOT NULL, date DATE DEFAULT NULL, nb_enfants INT DEFAULT NULL, INDEX IDX_27DD78C7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cadre (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, echelle INT NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE situation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, cadre_id INT NOT NULL, echelon INT NOT NULL, date_effet DATE NOT NULL, numero_indocatif INT NOT NULL, remarks VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_EC2D9ACAA76ED395 (user_id), INDEX IDX_EC2D9ACA9308DA90 (cadre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D368D3EA09 FOREIGN KEY (User_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE affectation ADD CONSTRAINT FK_F4DD61D3ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE attestation ADD CONSTRAINT FK_326EC63FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497E9E4C8C FOREIGN KEY (photo_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499308DA90 FOREIGN KEY (cadre_id) REFERENCES cadre (id)');
        $this->addSql('ALTER TABLE autorisation ADD CONSTRAINT FK_9A43134A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE qualification ADD CONSTRAINT FK_B712F0CEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE qualification ADD CONSTRAINT FK_B712F0CE26F859E2 FOREIGN KEY (diplome_id) REFERENCES diplome (id)');
        $this->addSql('ALTER TABLE situations_familiale ADD CONSTRAINT FK_27DD78C7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE situation ADD CONSTRAINT FK_EC2D9ACAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE situation ADD CONSTRAINT FK_EC2D9ACA9308DA90 FOREIGN KEY (cadre_id) REFERENCES cadre (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CCF9E01E');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CA76ED395');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D368D3EA09');
        $this->addSql('ALTER TABLE attestation DROP FOREIGN KEY FK_326EC63FA76ED395');
        $this->addSql('ALTER TABLE autorisation DROP FOREIGN KEY FK_9A43134A76ED395');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FA76ED395');
        $this->addSql('ALTER TABLE qualification DROP FOREIGN KEY FK_B712F0CEA76ED395');
        $this->addSql('ALTER TABLE situations_familiale DROP FOREIGN KEY FK_27DD78C7A76ED395');
        $this->addSql('ALTER TABLE situation DROP FOREIGN KEY FK_EC2D9ACAA76ED395');
        $this->addSql('ALTER TABLE affectation DROP FOREIGN KEY FK_F4DD61D3ED5CA9E6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497E9E4C8C');
        $this->addSql('ALTER TABLE qualification DROP FOREIGN KEY FK_B712F0CE26F859E2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499308DA90');
        $this->addSql('ALTER TABLE situation DROP FOREIGN KEY FK_EC2D9ACA9308DA90');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE affectation');
        $this->addSql('DROP TABLE attestation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE autorisation');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE qualification');
        $this->addSql('DROP TABLE diplome');
        $this->addSql('DROP TABLE situations_familiale');
        $this->addSql('DROP TABLE cadre');
        $this->addSql('DROP TABLE situation');
    }
}
