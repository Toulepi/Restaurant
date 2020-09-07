<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200907201326 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE table_client (id INT AUTO_INCREMENT NOT NULL, num_table INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plat (id INT AUTO_INCREMENT NOT NULL, nom_plat VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, prix_plat NUMERIC(5, 2) NOT NULL, img_plat VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entree_dessert (id INT AUTO_INCREMENT NOT NULL, nom_entr_dess VARCHAR(100) NOT NULL, prix_ent_dss NUMERIC(5, 2) NOT NULL, img_entr_dess VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE complement (id INT AUTO_INCREMENT NOT NULL, plat_id INT DEFAULT NULL, nom_complement VARCHAR(150) NOT NULL, img_compl VARCHAR(150) DEFAULT NULL, INDEX IDX_F8A41E34D73DB560 (plat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, table_client_id INT DEFAULT NULL, nom_client VARCHAR(150) NOT NULL, prenom_client VARCHAR(150) NOT NULL, email VARCHAR(100) NOT NULL, mdp VARCHAR(100) NOT NULL, num_tel VARCHAR(255) DEFAULT NULL, INDEX IDX_C74404559FA806DB (table_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, num_cmd VARCHAR(50) NOT NULL, adress_livr VARCHAR(100) DEFAULT NULL, date_cmd DATE NOT NULL, INDEX IDX_6EEAA67D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, num_facture VARCHAR(100) NOT NULL, date_facture DATE NOT NULL, tva NUMERIC(5, 2) DEFAULT NULL, INDEX IDX_FE86641082EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boisson (id INT AUTO_INCREMENT NOT NULL, nom_boisson VARCHAR(50) NOT NULL, prix_boisson NUMERIC(5, 2) NOT NULL, img_boisson VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, boisson_id INT DEFAULT NULL, plat_id INT DEFAULT NULL, entree_dessert_id INT DEFAULT NULL, nom_catg VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_29A5EC27734B8089 (boisson_id), UNIQUE INDEX UNIQ_29A5EC27D73DB560 (plat_id), UNIQUE INDEX UNIQ_29A5EC27FFC9808 (entree_dessert_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, contenu LONGTEXT DEFAULT NULL, date_commentaire DATE NOT NULL, avis INT DEFAULT NULL, INDEX IDX_67F068BC19EB6921 (client_id), INDEX IDX_67F068BCF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, plat_id INT DEFAULT NULL, boisson_id INT DEFAULT NULL, entree_dessert_id INT DEFAULT NULL, qte INT NOT NULL, pourcent_remise NUMERIC(5, 2) DEFAULT NULL, INDEX IDX_3170B74B82EA2E54 (commande_id), INDEX IDX_3170B74BD73DB560 (plat_id), INDEX IDX_3170B74B734B8089 (boisson_id), INDEX IDX_3170B74BFFC9808 (entree_dessert_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE complement ADD CONSTRAINT FK_F8A41E34D73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404559FA806DB FOREIGN KEY (table_client_id) REFERENCES table_client (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641082EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27734B8089 FOREIGN KEY (boisson_id) REFERENCES boisson (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27D73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27FFC9808 FOREIGN KEY (entree_dessert_id) REFERENCES entree_dessert (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BD73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B734B8089 FOREIGN KEY (boisson_id) REFERENCES boisson (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BFFC9808 FOREIGN KEY (entree_dessert_id) REFERENCES entree_dessert (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B734B8089');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27734B8089');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC19EB6921');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE86641082EA2E54');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B82EA2E54');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74BFFC9808');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27FFC9808');
        $this->addSql('ALTER TABLE complement DROP FOREIGN KEY FK_F8A41E34D73DB560');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74BD73DB560');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27D73DB560');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCF347EFB');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404559FA806DB');
        $this->addSql('DROP TABLE boisson');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE complement');
        $this->addSql('DROP TABLE entree_dessert');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE plat');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE table_client');
    }
}
