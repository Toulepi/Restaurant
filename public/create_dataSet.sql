/* create database if not exists newstyl_db; */

use newstyl_db;

/* "Table" changed by "TableClient"*/

    insert into table_client (id, num_table)
    values (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12);

/* "Catégorie" */

    insert into categorie (id,parent_id, nom_catg)
    values (1,null,'Entree/Dessert'),

           (2,null,'Plats'),
               (3,2,'Plats Traditionnels'),
               (4,2,'Grillades'),

           (5,null,'Accompagnements'),

           (6,null,'Boissons'),
               (7,6,'Boissons Alcoolisées'),
                   (8,7,'Champagnes & Whisky'),
                   (9,7,'Bières'),
                   (10,7,'Vins'),

               (11,6,'Boissons Sans Alcool');

/* "Produits" */

    /* "EntreeDessert" */
    insert into produit(id,categorie_id, nom_produit, prix_produit,description,img_name_produit,updated_at)
    values (1,1,'Safous',5,'C\'est un légume & qui peut aussi être considéré comme un fruit','safous.jpg',current_timestamp());

    /* "Plats" */

        /* "Plats traditionnels" */
        insert into produit(id,categorie_id, nom_produit, prix_produit,description,img_name_produit,updated_at)
        values (2,3,'Taro',15,'Spécialité camerounaise, ce plat à des vertues médicamenteuses; en effet elle possède de nombreux condiments naturels','taro.jpg',current_timestamp),
               (3,3,'Ndolè',20,'Met originaire du cameroun, attention si vous le mangez vous ne pourrez plus vous en passer','ndole.jpg',current_timestamp),
               (4,3,'Folon',15,'','folon.jpg',current_timestamp),
               (5,3,'Eru',20,'Née au sud-ouest du Cameroun, le eru est devenu un plat national et maintenant va à la conquète du monde','eru.jpg',current_timestamp),
               (6,3,'Sauce gombo',15,'','gombo.jpg',current_timestamp),
               (7,3,'Pile Pommes Haricots',15,'','pile.jpg',current_timestamp),
               (8,3,'Koki',15,'','koki.jpg',current_timestamp),
               (9,3,'Sauce tomate',15,'','sauce_tomate.jpg',current_timestamp),
               (10,3,'Poulet DG',25,'Met originaire du cameroun il est fait à base de la viande de poulet et de la banane plantain, attention si vous le mangez vous ne pourrez plus vous en passer','pouletDG.jpg',current_timestamp),

        /* Grillades */
               (11,4,'Cuisses de Poulet Braisées',10,'','cuisses.jpg',current_timestamp),
               (12,4,'Ailes de Poulet Frits',10,'','ailes.jpg',current_timestamp),
               (13,4,'Porc Braisé',10,'','porc.jpg',current_timestamp),
               (14,4,'Bar braisé',25,'Poisson bar fait au four, assh le goût de ça','bar.jpg',current_timestamp),
               (15,4,'Carpe braisée',25,'','carpe.jpg',current_timestamp),
               (16,4,'Sole braisée',25,'Poisson des chefs d\'Etat c\'est un vrai délice','sole.jpg',current_timestamp),
               (17,4,'Maquereau Braisé',20,'Encore appelé Oya Oya, cette race de maquereau est très bon dans la bouche','maquereau.jpg',current_timestamp),
               (18,4,'Soya',20,'Viande de beouf braisée au four.','soya.jpg',current_timestamp),
               (19,4,'Brochettes',20,'','brochette.jpg',current_timestamp);

        /* "Accompagnements / Supplément" */

        insert into produit (id, categorie_id, nom_produit, prix_produit, description, img_name_produit, updated_at)
        values  (20,5,'Plantains tapés',3,'','plantain_tape.jpg',current_timestamp),
                (21,5,'Plantains bouillis',3,'','plantain_bouilli.jpg',current_timestamp),
                (22,5,'riz',3,'riz cuit à la vapeur','riz.jpg',current_timestamp),
                (23,5,'Bobolo',3,'Bâtons de manioc bouillis','bobolo.jpg',current_timestamp),
                (24,5,'Aloko',3,'','aloko.jpg',current_timestamp);

    /* "Boissons" */

        /* Liqueurs (Whisky & Champagnes) */
        insert into produit (id,categorie_id, nom_produit, prix_produit,description,img_name_produit,updated_at)
        values  (25,8,'Ruinart Blanc',120,'','ruinart_blanc.jpg',current_date),
                (26,8,'Ruinart Brut',80,'','ruinart_brut.jpg',current_date),
                (27,8,'Ruinart Rosé',60,'','ruinart_rose.jpg',current_date),
                (28,8,'Veuve Cliquot',60,'','veuve.jpg',current_date),
                (29,8,'Moët & Chandon',50,'','moet.jpg',current_date),
                (30,8,'Dom Perignon',300,'','perignon.jpg',current_date),
                (31,8,'Chivas 18 ans',80,'','18ans.jpg',current_date),
                (32,8,'Chivas 12 ans',60,'','12ans.jpg',current_date),
                (33,8,'Black label',60,'','black_label.jpg',current_date),
                (34,8,'Cardhu 12ans',60,'','cardhu_12ans.jpg',current_date),
                (35,8,'Baileys',60,'','baileys.jpg',current_date);

        /* Bières */
        insert into produit (id,categorie_id, nom_produit, prix_produit,description,img_name_produit,updated_at)
        values   (36,9,'Guinness PM',5,'Petit Modèle de la bière','guiness_pm.jpg',current_date),
                 (37,9,'Guinness GM',10,'Grand Modèle de la bière','guiness_gm.jpg',current_date),
                 (38,9,'Heineken',5,'','heineken.jpg',current_date),
                 (39,9,'Booster',8,'','booster.jpg',current_date),
                 (40,9,'Desperados',10,'','dsp_gm.jpg',current_date),
                 (41,9,'Desperados',5,'','dsp_pm.jpg',current_date),
                 (42,9,'1664',8,'Grand modèle de la 1664','1664_gm.jpg',current_date),
                 (43,9,'Leffe',8,'Grand modèle de la Leffe','leffe_gm.jpg',current_date);

        /* Vins */
        insert into produit (id,categorie_id, nom_produit, prix_produit,description,img_name_produit,updated_at)
        values   (44,10,'Vin',15,'Grand vin au choix à partir de 15 euros','vin.jpg',current_date),
                 (45,10,'Petit Vin',8,'Petit vin au choix','petit_vin.jpg',current_date),
                 (46,10,'Côtes de Bergerac',15,'','bergerac.jpg',current_date),
                 (47,10,'Monbazillac',15,'','monbazillac.jpg',current_date);


         /* Sans alcool */
        insert into produit (id,categorie_id, nom_produit, prix_produit,description,img_name_produit,updated_at)
        values  (48,11,'Top du Camer',5,'Boisson fabriquée par les brasseries du Cameroun','top.jpg',current_date),
                (49,11,'Malta Guinness',5,'malta','malta.jpg',current_date),
                (50,11,'Perrier',3,'','perrier_pm.jpg',current_date),
                (51,11,'Eau',2,'Eau de source en bouteille de 50 cl','eau_pm.jpg',current_date),
                (52,11,'Eau',4,'Eau de source en bouteille de 1,5 litre','eau_gm.jpg',current_date);

/* "Client" */

    insert into client (id,table_client_id,nom_client,prenom_client,email, password, num_tel,roles)
    values (1,null,'Kankan','Diakité','kankan@diakite.as','kd123','77-23-24-36-36','[]'),
           (2,4,'Jeatsa','Armel','jta@dwwm.as','jta123','26-36-28-39-20','[]'),
           (3,4,'Tchinda','Toulépi','ttf@dwwm.as','$2y$10$y6r6kukb5htFvbsE15nhmeNas9X0l4hn/n2vtHC7adK.02MrLu0oy','26-36-28-30-20','["ROLE_ADMIN"]'),
           (4,3,'Fouajio','Victoire','ftv@dwwm.as','ftv123','27-39-20-21-77','[]');

/* "Commande" */

    insert into commande (id, num_cmd, adress_livr, client_id,date_cmd)
values (1,'cmd01','9B rue de la Sablière,Asnieres',3,'2020-08-18'),
       (2,'cmd02','6 rue des heritiers,Gennevilliers',1,'2017-04-10'),
       (3,'cmd03','3 rue de Diakite,Mali',4,'2016-09-18'),
       (4,'cmd04','9B rue de la Sablière,Asnieres',3,'2016-06-10'),
       (5,'cmd05','6 rue des heritiers,Gennevilliers',1,'2020-01-10'),
       (6,'cmd06','6 rue du camerounais,Boquito',2,'2020-06-10');

/* "LigneCommande" */
/* plusieurs insert afin de pouvoir associer à chaque 'produit' une 'qte' et une 'remise' */

    insert into ligne_commande (id, qte, pourcent_remise, commande_id,produit_id)
    values  (1,1,0,1,3),
            (2,2,5,2,11),
            (3,1,0,3,14),
            (4,1,0,4,15),
            (5,4,10,5,16),
            (6,2,0,6,11),
            (7,1,0,2,25),
            (8,2,0,1,17),
            (9,3,0,1,22),
            (10,1,0,1,18);

/* "Facture" */

    insert into facture( id, num_facture, date_facture, tva, commande_id )
    values (1,'fac01','2020-08-18',20,1),
           (2,'fac02','2017-04-10',20,2),
           (3,'fac03','2016-09-18',20,3),
           (4,'fac04','2016-06-10',20,4),
           (5,'fac05','2020-01-10',20,5),
           (6,'fac06','2020-06-10',20,6);

/* "Commentaire" */
/* if faudrait qu'un client ne puisse faire un commentaire que sur un produit qu'il a au préalable commandé */

    insert into commentaire (id, date_commentaire, contenu,note, client_id,produit_id)
    values (1,'2020-06-15','Tres bon plat, bien cuisiné, bien épicé et très apétissant; je reviendrais dans ce restaurant me régaler.',5,2,10),
       (2,'2018-08-30','Le maquereau est trop bon dans ce resto, vraiment je recommande',5,3,6);



                                /* Tests de cohérence de la BDD */
                                /* =========================== */

/* Quelques Requetes */

    /* 1- récupérer les noms des plats dont le prix est inférieur ou égal à 20€ */

        /*
            select nom_produit,prix_produit
            from produit
            where prix_produit <= 20
            and categorie_id = 2;
        */

    /* 2- Afficher toutes les commandes */

        /*
            select  num_cmd,adress_livr,date_cmd
            from commande;
         */

    /* 3- Afficher les commandes effectuées par un client donné */

        /*
            select num_cmd,date_cmd,nom_client
            from commande,client
            where client.id=commande.client_id and client.id = 3;
        */

    /* 4- Afficher tous les produits par type (catégorie) */

        /*
            select nom_produit,sous_catg_id,nom_catg
            from produit,categorie
            where produit.categorie_id=categorie.id
            group by nom_catg, nom_produit;
        */

    /* 5- Afficher toutes les lignes de commande */

        /*
            select commande_id,nom_produit,prix_produit,qte,pourcent_remise
            from commande,ligne_commande,produit
            where ligne_commande.commande_id=commande.id
            and ligne_commande.produit_id=produit.id;
        */

    /* 6- Afficher le détail de(s) commande(s) effectuée(s) par un client donné */


        /* Tous les plats commandés par un client */
            /*
                select nom_client,nom_produit,sum(qte) as nbre,prix_produit,(sum(qte) * prix_produit) as sousTotal
                from client,commande,ligne_commande,produit
                where client.id = commande.client_id
                  and commande.id = ligne_commande.commande_id
                  and ligne_commande.produit_id= produit.id
                  and client_id=3
                group by nom_client, nom_produit;
            */
    /* 7- Afficher tous les commentaires */

        /*
           select nom_client,contenu,note,nom_produit
            from client,commentaire,produit
            where commentaire.client_id=client.id
            and commentaire.produit_id=produit.id;
        */

    /* 8- Afficher les commentaires qui ont été faits sur un plat précis */

        /*
            select contenu,note,nom_produit
            from commentaire,produit
            where commentaire.produit_id=produit.id
            and produit_id = 6;
         */

    /* 9- Afficher les clients qui ont commandé au moins un plat */

        /*
            select prenom_client,nom_produit,date_cmd
            from client,commande,ligne_commande,produit,categorie
            WHERE client.id=commande.client_id
              and commande.id=ligne_commande.commande_id
              and ligne_commande.produit_id=produit.id
              and produit.categorie_id=categorie.id
                and categorie_id IN (3,4)
            group by prenom_client,nom_produit;
         */

    /* 10- CA réalisé sur un client donné */

        /*
            create temporary table CACM (
                select nom_client,nom_produit as nomProduit,sum(qte) as nbre,prix_produit,(sum(qte) * prix_produit) as CA
                from client,commande,ligne_commande,produit
                where client.id = commande.client_id
                  and commande.id = ligne_commande.commande_id
                  and ligne_commande.produit_id= produit.id
                  and client_id=1
                group by nom_client, nom_produit
            );
            select sum(CA) as ChiffreAffaire
            from CACM;
        */

    /* 11- Afficher le CA réalisé */

        /*
            create temporary table CACM2 (
            select nom_client,nom_produit as nomProduit,sum(qte) as nbre,prix_produit,(sum(qte) * prix_produit) as CA
            from client,commande,ligne_commande,produit
            where client.id = commande.client_id
              and commande.id = ligne_commande.commande_id
              and ligne_commande.produit_id= produit.id
            group by nom_client, nom_produit
            );
            select sum(CA) as ChiffreAffaire
            from CACM2;
         */
