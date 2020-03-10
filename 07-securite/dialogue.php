<?php
//------------------------------------------------------------
//  Cas pratique : un formulaire pour poster des commentaires 
//------------------------------------------------------------
//  Objectif : protéger la requête SQL dont les données proviennent de l'internaute.

/*
    Modélisation de la BDD : 

        Nom de la BDD   : dialogue
        Nom de la table : commentaires
        Champs          : id_commentaire        PK AI
                          pseudo                VARCHAR(20)
                          message               TEXT
                          date_enregistrement   DATETIME

*/
