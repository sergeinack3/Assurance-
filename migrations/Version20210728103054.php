<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210728103054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE CatUsers (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Users (id INT AUTO_INCREMENT NOT NULL, id_cat_user_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, motif VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX UNIQ_D5428AEDE7927C74 (email), INDEX IDX_D5428AED9FCD9C34 (id_cat_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cotisation (id INT AUTO_INCREMENT NOT NULL, membre_id INT DEFAULT NULL, new_value DOUBLE PRECISION NOT NULL, old_value DOUBLE PRECISION DEFAULT NULL, motif VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_AE64D2ED6A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employeur (id INT AUTO_INCREMENT NOT NULL, nom_employeur VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, motif VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emprunt (id INT AUTO_INCREMENT NOT NULL, id_membre_id INT DEFAULT NULL, id_mod_pay_id INT DEFAULT NULL, numero_emprunt INT NOT NULL, valeur_emprunt DOUBLE PRECISION NOT NULL, echeance DATE NOT NULL, taux_interet DOUBLE PRECISION NOT NULL, interet_general DOUBLE PRECISION NOT NULL, interet_mensuel DOUBLE PRECISION NOT NULL, motif VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_364071D7EAAC4B6D (id_membre_id), INDEX IDX_364071D740B8BE03 (id_mod_pay_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, sex VARCHAR(255) NOT NULL, grade VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, cotisation DOUBLE PRECISION NOT NULL, adresse VARCHAR(255) NOT NULL, work_place VARCHAR(255) NOT NULL, date_birth DATE NOT NULL, phone_number INT NOT NULL, id_cart INT NOT NULL, hiring_date DATE NOT NULL, sate_member VARCHAR(255) NOT NULL, motif VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_F6B4FB2979F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_payment (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posseder (id INT AUTO_INCREMENT NOT NULL, id_role_id INT DEFAULT NULL, id_cat_user_id INT DEFAULT NULL, INDEX IDX_62EF7CBA89E8BDC (id_role_id), INDEX IDX_62EF7CBA9FCD9C34 (id_cat_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remboursement (id INT AUTO_INCREMENT NOT NULL, pret_id INT DEFAULT NULL, motant DOUBLE PRECISION NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX IDX_C0C0D9EF1B61704B (pret_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_emprunt (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Users ADD CONSTRAINT FK_D5428AED9FCD9C34 FOREIGN KEY (id_cat_user_id) REFERENCES CatUsers (id)');
        $this->addSql('ALTER TABLE cotisation ADD CONSTRAINT FK_AE64D2ED6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7EAAC4B6D FOREIGN KEY (id_membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D740B8BE03 FOREIGN KEY (id_mod_pay_id) REFERENCES mode_payment (id)');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB2979F37AE5 FOREIGN KEY (id_user_id) REFERENCES Users (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA89E8BDC FOREIGN KEY (id_role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA9FCD9C34 FOREIGN KEY (id_cat_user_id) REFERENCES CatUsers (id)');
        $this->addSql('ALTER TABLE remboursement ADD CONSTRAINT FK_C0C0D9EF1B61704B FOREIGN KEY (pret_id) REFERENCES emprunt (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Users DROP FOREIGN KEY FK_D5428AED9FCD9C34');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA9FCD9C34');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB2979F37AE5');
        $this->addSql('ALTER TABLE remboursement DROP FOREIGN KEY FK_C0C0D9EF1B61704B');
        $this->addSql('ALTER TABLE cotisation DROP FOREIGN KEY FK_AE64D2ED6A99F74A');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7EAAC4B6D');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D740B8BE03');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA89E8BDC');
        $this->addSql('DROP TABLE CatUsers');
        $this->addSql('DROP TABLE Users');
        $this->addSql('DROP TABLE cotisation');
        $this->addSql('DROP TABLE employeur');
        $this->addSql('DROP TABLE emprunt');
        $this->addSql('DROP TABLE group_user');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE mode_payment');
        $this->addSql('DROP TABLE posseder');
        $this->addSql('DROP TABLE remboursement');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE type_emprunt');
    }
}
