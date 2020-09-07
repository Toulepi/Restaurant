/* create database if not exists newstyl_db; */

use newstyl_db;

/* "Produit" */

    /* Typologie/catégorie du produit */
    insert into produit(id,nom_catg)
    values (1,'Entrée/Dessert'),
           (2,'Plat'),
           (3,'Boisson');

/* "Plat" */

    insert into plat(id, nom_plat,prix_plat,description,img_plat)
    values (1,'Ndolè',20,'Met originaire du cameroun, attention si vous le mangez vous ne pourrez plus vous en passer','ndole.jpg'),
         (2,'Taro',25,'Spécialité camerounaise, ce plat à des vertues médicamenteuses; en effet elle possède de nombreux condiments naturels','taro.jpg'),
         (3,'Eru',20,'Née au sud-ouest du Cameroun, le eru est devenu un plat national et maintenant va à la conquète du monde','eru.jpg'),
         (4,'Poulet DG',25,'Met originaire du cameroun il est fait à base de la viande de poulet et de la banane plantain, attention si vous le mangez vous ne pourrez plus vous en passer','pouletDG.jpg'),

    /* Grillades */
         (5,'Maquereau Braisé',20,'Encore appelé Oya Oya, cette race de maquereau est très bon dans la bouche','maquereau.jpg'),
         (6,'Bar braisé',25,'Poisson bar fait au four, assh le goût de ça','bar.jpg'),
         (7,'Sole braisé',50,'Poisson des chefs d\'Etat c\'est un vrai délicé accompagné avec de l\'aloco','sole.jpg'),
         (8,'Porc Braisé',10,'Cotes de porc assaisonnés et fait au four','porc.jpg'),
         (9,'Ailes braisées',10,'Ailes de poulet marinées et fait à feu doux au four','ailesPoulet.jpg');

/* "Table" changed by "TableClient"*/

    insert into table_client (id, num_table)
    values (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12);

/* "Complement" */

    insert into complement (id,nom_complement)
    values (1,'Aloco'), (2,'Plantain tapés'), (3,'riz'),(4,'bâtons');

/* "Client" */

insert into client (id,nom_client,prenom_client,email, mdp, num_tel)
values (1,'lastName','firstName','user@domain.cm',1234,'77-23-24-36-36'),
       (2,'Jeatsa','Armel','jeatsa@dwwm.as',1234,'26-36-28-39-20'),
       (3,'Tchinda','Toulépi','toulepi@dwwm.as',1234,'26-36-28-30-20'),
       (4,'Fouajio','Victoire','fouajio@dwwm.as',1234,'27-39-20-21-77');

/* "Commentaire" */
        /* if faudrait qu'un client ne puisse faire un commentaire que sur un produit qu'il a au préalable commandé */
        /* le commentaire ici est fait sur une catégorie de produit (boisson,plat...) à corriger -TODO*/
    insert into commentaire (id, date_commentaire, contenu,avis, client_id,produit_id)
    values (1,'2020-06-15','Tres bon plat, bien cuisiné, bien épicé et très apétissant; je reviendrais dans ce restaurant me régaler.',5,2,2),
           (2,'2018-08-30','Le maquereau est trop bon dans ce resto, vraiment je recommande',5,3,2);

/* "Commande" */

insert into commande (id, num_Cmd, adress_livr, client_id,date_cmd)
values (1,'cmd01','9B rue de la Sablière,Asnieres',3,'2020-08-18'),
       (2,'cmd02','6 rue des heritiers,Gennevilliers',1,'2017-04-10'),
       (3,'cmd03','3 rue de Diakite,Mali',4,'2016-09-18'),
       (4,'cmd04','9B rue de la Sablière,Asnieres',3,'2016-06-10'),
       (5,'cmd05','6 rue des heritiers,Gennevilliers',1,'2020-01-10'),
       (6,'cmd06','6 rue du camerounais,Boquito',2,'2020-06-10');

/* "Boisson" */

/* Possible de Trier les boissons par catégorie */

insert into boisson (id,nom_boisson, prix_boisson,img_boisson)
    /* Sans alcool */
values  (1,'Foléré',3,'folere.jpg'),
        (2,'Djindja',5,'djindja.jpg'),
        (3,'Top Anana',5,'anana.jpg'),

    /* Bières */
        (4,'Matango',5,'matango.jpg'),
        (5,'Desperados',7,'dsp.jpg'),
        (6,'Leffe',8,'leffe.jpg'),

    /* Liqueurs (Whisky & Champagnes) */
        (7,'Chivas 12 ans',60,'12ans.jpg'),
        (8,'Chivas 18 ans',80,'18ans.jpg'),
        (9,'Dom Perignon',300,'perignon.jpg');

/* "EntreeDessert" */
insert into entree_dessert( id, nom_entr_dess, prix_ent_dss, img_entr_dess )
values (1,'Safous',5,'safous.jpg');

/* "LigneCommande" */

    insert into ligne_commande (id, qte, pourcent_remise, commande_id,type_produit_id,identifiant_produit)
    values (1,1,0,1,2,3),
            (2,2,5,2,1,1),
            (3,1,0,3,3,1),
            (4,1,0,4,2,5),
            (5,4,10,5,2,6),
            (6,2,0,6,3,1),
            (7,1,0,2,2,1);

/* "Facture" */

    insert into facture( id, num_facture, date_facture, tva, commande_id )
    values (1,'fac01','2020-08-18',20,1),
            (2,'fac02','2017-04-10',20,2),
            (3,'fac03','2016-09-18',20,3),
            (4,'fac04','2016-06-10',20,4),
            (5,'fac05','2020-01-10',20,5),
            (6,'fac06','2020-06-10',20,6);


                                /* Tests de cohérence de la BDD */
                                /* =========================== */

/* Quelques Requetes */

    /* 1- récupérer les noms des plats dont le prix est inférieur ou égal à 20€ */

        /*
            select nom_plat,prix_plat
            from plat
            where prix_plat <= 20;
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


    /* 4- Afficher toutes les lignes de commande */

        /*
        select ligne_commande.id,commande_id,qte,pourcent_remise,type_produit_id,nom_catg,identifiant_produit,plat_id,nom_plat
        from ligne_commande,commande,produit,plat
        where commande.id = ligne_commande.commande_id
        and ligne_commande.type_produit_id = produit.id
        and produit.plat_id = plat.id;
        and produit.boisson_id = boisson.id;
        and produit.entree_dessert_id = entree_dessert.id;*/

    /* 4- Afficher la somme de la commande effectuée par un client donné */

        /* Tous les plats commandés par un client
            select nom_client,nom_plat,sum(qte) as nbre,prix_plat,(sum(qte) * prix_plat) as totalPlat
            from client,commande,ligne_commande,produit,plat
            where client.id = commande.client_id
              and commande.id = ligne_commande.commande_id
              and ligne_commande.type_produit_id= produit.id
              and produit.plat_id= plat.id
              and client_id=3
            group by nom_client, nom_plat;
            */
        /* Toutes les boissons commandées par un client */
            /*
            select nom_client,nom_boisson,sum(qte) as nbre,prix_boisson,(sum(qte) * prix_boisson) as totalBoisson
            from client,commande,ligne_commande,boisson
            where client.id = commande.client_id
              and commande.id = ligne_commande.commande_id
              and ligne_commande.plat_id= boisson.id
                 and client_id=3
            group by nom_client, nom_boisson;
            */
        /* Toutes les entrée/dessert commandées par un client */
            /*
            select nom_client,nom_entr_dess,sum(qte) as nbre,prix_ent_dss,(sum(qte) * prix_ent_dss) as totalEntrDess
            from client,commande,ligne_commande,entree_dessert
            where client.id = commande.client_id
              and commande.id = ligne_commande.commande_id
              and ligne_commande.plat_id= entree_dessert.id;
                 and client_id=3
            group by nom_client, nom_entr_dess; */
            /*
            select nom_client,nom_plat,qte,prix_u_ht,(qte * prix_u_ht) as totalPlat,nom_boisson,prix_boisson,nom_entr_dess,prix_ent_dss
            from client,commande,ligne_commande,plat,boisson,entree_dessert
            where client.id = commande.client_id
              and commande.id = ligne_commande.commande_id
              and ligne_commande.plat_id= plat.id;
                */
              /*
              and ligne_commande.boisson_id= boisson.id
              and ligne_commande.entree_dessert_id= entree_dessert.id;
             group by nom_client;
              and client_id = 1;
                */
        /*
            select client_id,quantite,pourcentage_remise,prix_unitaire
            from exemplaire,ligne_commande,
                where ligne_commande.exemplaire_id= exemplaire.id and (classement in  (select quantite,pourcentage_remise
                                                                              from commande,ligne_commande
                                                                              where commande.id = ligne_commande.commande_id and client_id in (select client_id
                                                                                                                                           from client
                                                                                                                                            where client_id=1 )));
        */

        /* 5- Afficher tous les commentaires  -- TODO */




        /* 6- Afficher les commentaires qui ont été faits sur un plat précis -- TODO */



    /* 7- Afficher les clients qui ont commandé un plat donné */

        /*
        select nom_client,adresse_livraison, quantite,exemplaire_id,titre
        from client,commande,ligne_commande,exemplaire,livre
        where client.id = commande.client_id
          and commande.id = ligne_commande.commande_id
          and ligne_commande.exemplaire_id= exemplaire.id
          and exemplaire.livre_id = livre.id
          group by nom_client;
          and exemplaire_id = 4;
        */

    /* 8- CA réalisé sur un client */

        /*
        select nom_client, quantite,prix_unitaire,(quantite * prix_unitaire) as CA
        from client,commande,ligne_commande,exemplaire,livre
        where client.id = commande.client_id
          and commande.id = ligne_commande.commande_id
          and ligne_commande.exemplaire_id= exemplaire.id
          and exemplaire.livre_id = livre.id
          order by nom_client;
         */

    /* 9- Afficher le CA réalisé */

        /*
        create temporary table CACM (select nom_client, quantite,prix_unitaire,(quantite * prix_unitaire) as CA
            from client,commande,ligne_commande,exemplaire,livre
            where client.id = commande.client_id
            and commande.id = ligne_commande.commande_id
            and ligne_commande.exemplaire_id= exemplaire.id
            and exemplaire.livre_id = livre.id);
        select sum(CA) as somme
        from CACM;
         */
