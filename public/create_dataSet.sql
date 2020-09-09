/* create database if not exists newstyl_db; */

use newstyl_db;

/* "Table" changed by "TableClient"*/

    insert into table_client (id, num_table)
    values (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12);

/* "Rôle du User" */

    insert into role (id,num_role)
    values (1,'Internaute'),
       (2,'Client'),
       (3,'Admin');

/* "Catégorie" */

    insert into categorie (id,parent_id, nom_catg,slug)
    values (1,null,'Entree/Dessert','entr'),

           (2,null,'Plats','plt'),
               (3,2,'Plats Traditionnels','plt_tr'),
               (4,2,'Grillades','grll'),

           (5,null,'Accompagnements','compl'),

           (6,null,'Boissons','boiss'),
               (7,6,'Boissons Alcoolisées','boiss_alc'),
                   (8,7,'Champagnes & Whisky','champ_whisk'),
                   (9,7,'Bières','beer'),
                   (10,7,'Vins','vin'),

               (11,6,'Boissons Sans Alcool','boiss_sans_alc');

/* "Produits" */

    /* "EntreeDessert" */
    insert into produit(id,categorie_id, nom_produit, prix_produit,description,img_name_produit,updated_at)
    values (1,1,'Safous',5,'C\'est un légume & qui peut aussi être considéré comme un fruit','safous.jpg',current_timestamp());

    /* "Plat" */

        /* "Plats traditionnels" */
        insert into produit(id,categorie_id, nom_produit, prix_produit,description,img_name_produit,updated_at)
        values (2,3,'Ndolè',20,'Met originaire du cameroun, attention si vous le mangez vous ne pourrez plus vous en passer','ndole.jpg',current_timestamp),
               (3,3,'Taro',25,'Spécialité camerounaise, ce plat à des vertues médicamenteuses; en effet elle possède de nombreux condiments naturels','taro.jpg',current_timestamp),
               (4,3,'Eru',20,'Née au sud-ouest du Cameroun, le eru est devenu un plat national et maintenant va à la conquète du monde','eru.jpg',current_timestamp),
               (5,3,'Poulet DG',25,'Met originaire du cameroun il est fait à base de la viande de poulet et de la banane plantain, attention si vous le mangez vous ne pourrez plus vous en passer','pouletDG.jpg',current_timestamp),

        /* Grillades */
           (6,4,'Maquereau Braisé',20,'Encore appelé Oya Oya, cette race de maquereau est très bon dans la bouche','maquereau.jpg',current_timestamp),
           (7,4,'Bar braisé',25,'Poisson bar fait au four, assh le goût de ça','bar.jpg',current_timestamp),
           (8,4,'Sole braisé',50,'Poisson des chefs d\'Etat c\'est un vrai délicé accompagné avec de l\'aloco','sole.jpg',current_timestamp),
           (9,4,'Porc Braisé',10,'Cotes de porc assaisonnés et fait au four','porc.jpg',current_timestamp),
           (10,4,'Ailes braisées',10,'Ailes de poulet marinées et fait à feu doux au four','ailesPoulet.jpg',current_timestamp);

        /* "Accompagnements" */

        insert into produit (id, categorie_id, nom_produit, prix_produit, description, img_name_produit, updated_at)
        values (11,5,'Aloko',3,'','aloko.jpg',current_timestamp),
               (12,5,'Plantains tapés',3,'','pltnTape.jpg',current_timestamp),
               (13,5,'Plantains bouillis',3,'','pltnBouill.jpg',current_timestamp),
               (14,5,'riz',3,'riz cuit à la vapeur','riz.jpg',current_timestamp),
               (15,5,'bâtons',3,'Bâtons de manioc bouillis','baton.jpg',current_timestamp);

    /* "Boisson" */

         /* Sans alcool */
    insert into produit (id,categorie_id, nom_produit, prix_produit,description,img_name_produit,updated_at)
    values  (16,11,'Eau 1.5 L',4,'eau en bouteille de 1,5 litre','eau.jpg',current_date),
            (17,11,'Eau 50 cl',2,'eau en bouteille de 50 centilitres','eau1.jpg',current_date),
            (18,11,'Foléré',3,'encore appelée jus d\'oseil elle est portée à ébullition puis refroiduit lors de sa préparation','folere.jpg',current_date),
            (19,11,'Djindja',5,'jus de gingembre','djindja.jpg',current_date),
            (20,11,'Top Anana',5,'jus provenant des brasseries du Cameroun','anana.jpg',current_date),

        /* Bières */
            (21,9,'Matango',5,'vin de palme','matango.jpg',current_date),
            (22,9,'Desperados',7,'','dsp.jpg',current_date),
            (23,9,'Leffe',8,'','leffe.jpg',current_date),

        /* Liqueurs (Whisky & Champagnes) */
            (24,8,'Chivas 12 ans',60,'','12ans.jpg',current_date),
            (25,8,'Chivas 18 ans',80,'','18ans.jpg',current_date),
            (26,8,'Dom Perignon',300,'','perignon.jpg',current_date);

/* "Client" */

    insert into client (id,table_client_id,nom_client,prenom_client,email, mdp, num_tel)
    values (1,2,'lastName','firstName','user@domain.cm',1234,'77-23-24-36-36'),
           (2,4,'Jeatsa','Armel','jeatsa@dwwm.as',1234,'26-36-28-39-20'),
           (3,4,'Tchinda','Toulépi','toulepi@dwwm.as',1234,'26-36-28-30-20'),
           (4,3,'Fouajio','Victoire','fouajio@dwwm.as',1234,'27-39-20-21-77');

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

/* "Rôle Client" */

    insert into client_role (client_id,role_id)
    values (1,1),
           (2,3),
           (3,2),
           (4,2);



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
