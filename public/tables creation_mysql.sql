CREATE DATABASE IF NOT EXISTS `PLATS` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `PLATS`;

CREATE TABLE `FACTURE` (
  `idfacture` VARCHAR(42),
  `num_facture` VARCHAR(42),
  `date_facture` VARCHAR(42),
  `tva` VARCHAR(42),
  `idcmd` VARCHAR(42),
  PRIMARY KEY (`idfacture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ENTREE_DESSERT` (
  `identdss` VARCHAR(42),
  `nom_entr_dess` VARCHAR(42),
  `prixentdss` VARCHAR(42),
  PRIMARY KEY (`identdss`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `BOISSON` (
  `idboisson` VARCHAR(42),
  `nom_boisson` VARCHAR(42),
  PRIMARY KEY (`idboisson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `COMMANDE` (
  `idcmd` VARCHAR(42),
  `num_cmd` VARCHAR(42),
  `adress_livr` VARCHAR(42),
  `date_cmd` VARCHAR(42),
  `idclient` VARCHAR(42),
  PRIMARY KEY (`idcmd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `LIGNECOMMANDE` (
  `idlignecmd` VARCHAR(42),
  `qte` VARCHAR(42),
  `pourcent_remise` VARCHAR(42),
  `idcmd` VARCHAR(42),
  `idplat` VARCHAR(42),
  `identdss` VARCHAR(42),
  `idboisson` VARCHAR(42),
  PRIMARY KEY (`idlignecmd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CLIENT` (
  `idclient` VARCHAR(42),
  `nomclient` VARCHAR(42),
  `prenomclient` VARCHAR(42),
  `email` VARCHAR(42),
  `mdp` VARCHAR(42),
  `numtel` VARCHAR(42),
  `idcommentaire` VARCHAR(42),
  `idtable` VARCHAR(42),
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `COMMENTAIRE` (
  `idcommentaire` VARCHAR(42),
  `datecommentaire` VARCHAR(42),
  `contenu` VARCHAR(42),
  `avis` VARCHAR(42),
  `idplat` VARCHAR(42),
  PRIMARY KEY (`idcommentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `COMPLEMENT` (
  `idcompl` VARCHAR(42),
  `nom_compl` VARCHAR(42),
  `idplat` VARCHAR(42),
  PRIMARY KEY (`idcompl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `TABLE` (
  `idtable` VARCHAR(42),
  `numtable` VARCHAR(42),
  PRIMARY KEY (`idtable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PLAT` (
  `idplat` VARCHAR(42),
  `nomplat` VARCHAR(42),
  `prixu_ht` VARCHAR(42),
  `description` VARCHAR(42),
  `img_name` VARCHAR(42),
  PRIMARY KEY (`idplat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `FACTURE` ADD FOREIGN KEY (`idcmd`) REFERENCES `COMMANDE` (`idcmd`);
ALTER TABLE `COMMANDE` ADD FOREIGN KEY (`idclient`) REFERENCES `CLIENT` (`idclient`);
ALTER TABLE `LIGNECOMMANDE` ADD FOREIGN KEY (`idboisson`) REFERENCES `BOISSON` (`idboisson`);
ALTER TABLE `LIGNECOMMANDE` ADD FOREIGN KEY (`identdss`) REFERENCES `ENTREE_DESSERT` (`identdss`);
ALTER TABLE `LIGNECOMMANDE` ADD FOREIGN KEY (`idplat`) REFERENCES `PLAT` (`idplat`);
ALTER TABLE `LIGNECOMMANDE` ADD FOREIGN KEY (`idcmd`) REFERENCES `COMMANDE` (`idcmd`);
ALTER TABLE `CLIENT` ADD FOREIGN KEY (`idtable`) REFERENCES `TABLE` (`idtable`);
ALTER TABLE `CLIENT` ADD FOREIGN KEY (`idcommentaire`) REFERENCES `COMMENTAIRE` (`idcommentaire`);
ALTER TABLE `COMMENTAIRE` ADD FOREIGN KEY (`idplat`) REFERENCES `PLAT` (`idplat`);
ALTER TABLE `COMPLEMENT` ADD FOREIGN KEY (`idplat`) REFERENCES `PLAT` (`idplat`);