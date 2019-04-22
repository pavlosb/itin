<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  ITIN Lang - Greek
*
* Author: Pavlos Bizimis
* 		  pavlos.bizimis@inline.gr
*        INLINE T.C. Ltd.
*
* Created:  16.04.2017
*
* Description:  Greek language file ITIN
*
*/

// GLOBAL
$lang['required_field'] = 'Απαιτούμενο πεδίο';
$lang['invalid_email'] = 'Η διεύθυνση email δεν είναι έγκυρη';
$lang['choose'] = 'Επιλέξτε';
$lang['submit'] = 'Καταχώρηση';
$lang['continue'] = 'Συνέχεια';
$lang['technology_check'] = 'Τεχνικός Έλεγχος';
$lang['bodywork_check'] = 'Έλεγχος Αμαξώματος';
$lang['system_check'] = 'Έλεγχος Συστήματος';

// HEADER - MENU
$lang['logout'] = 'Αποσύνδεση';

// INSPECTIONS
$lang['home_new_client'] = 'Νέος<br />Πελάτης';
$lang['home_new_vehicle'] = 'Νέο<br />Όχημα';
$lang['home_new_inspection'] = 'Νέα<br />Επιθεώρηση';

//  CLIENTS
$lang['clients'] = 'Πελάτες';
$lang['client_details'] = 'Στοιχεία Πελάτη';
$lang['name_client'] = 'Επωνυμία';
$lang['firstname_client'] = "Όνομα";
$lang['lastname_client'] = 'Επώνυμο';
$lang['vatno_client'] = 'Α.Φ.Μ.';
$lang['address_client'] = 'Διεύθυνση';
$lang['zip_client'] = 'T.K.';
$lang['tel_client'] = 'Τηλέφωνο';
$lang['email_client'] = 'email';
$lang['createaccount'] = 'Δημιουργία Λογαριασμού';

// VEHICLES
$lang['incorrect_vin'] = 'Ο αριθμός πλαισίου δεν είναι έγκυρος';
$lang['vehicle_details'] = 'Στοιχεία Οχήματος';
$lang['client_vhcl'] = 'Πελάτης';
$lang['reg_vhcl'] = 'Αριθμός Πινακίδας';
$lang['firstreg_vhcl'] = '1η Κυκλοφορία';
$lang['vin_vhcl'] = 'Αριθμός Πλαισίου';
$lang['mlg_vhcl'] = 'Χιλιόμετρα';
$lang['nxtdate_vhcl'] = 'Επόμενος Ελέγχος';
$lang['type_vhcl'] = 'Είδος Οχήματος';
$lang['make_vhcl'] = 'Κατασκευαστής';
$lang['model_vhcl'] = 'Μοντέλο';
$lang['doors_vhcl'] = 'Πόρτες';
$lang['colour_vhcl'] = 'Χρώμα';
$lang['displ_vhcl'] = 'Κυβικά';
$lang['pow_vhcl'] = 'Ιπποδύναμη';

//INSPECTION
$lang['new_inspection'] = 'Νέα Επιθεώρηση';
$lang['vehicle_inspection'] = "Όχημα";
$lang['date_inspection'] = 'Ημερομηνία';
$lang['number_inspection'] = 'Αριθμός';
$lang['ordermethod_inspection'] = 'Εντολή';
$lang['orderdate_inspection'] = 'Ημερομηνία Εντολής';
$lang['no_vehicles_for_inspection'] = 'Δεν υπάρχουν οχήματα προς επιθεώρηση.';
$lang['add_new_vehicle'] = 'Νέο Όχημα';
$lang['no_vehicle_chosen'] = 'Δεν έχετε επιλέξει Όχημα';


// PDF REPORT
$lang['pdf_report_num'] = 'ΑΡΙΘΜΟΣ ΕΚΘΕΣΗΣ:';
$lang['pdf_date'] = 'Ημ/νια:';
$lang['pdf_page'] = 'Σελ.';
$lang['pdf_dekra_report'] = 'DEKRA Έκθεση Σφραγίδας';
$lang['pdf_procedure'] = 'Διαδικασία';
$lang['pdf_inspection'] = 'Επιθεώρηση';
$lang['pdf_client'] = 'Αρ.Πελάτη:';
$lang['pdf_po'] = "Κατ' εντολή σας από:";
$lang['pdf_check_type'] = "Είδος ελέγχου:";
$lang['pdf_vehicle_description'] = "Περιγραφή οχήματος";
$lang['pdf_reg_vhcl'] = 'Πινακίδα';
$lang['pdf_type_vhcl'] = 'Τύπος οχήματος:';
$lang['pdf_doors_vhcl'] = 'Θύρες:';
$lang['pdf_make_vhcl'] = 'Κατασκευαστής:';
$lang['pdf_colour_vhcl'] = 'Χρώμα:';
$lang['pdf_model_vhcl'] = 'Εμπορική ονομασία:';
$lang['pdf_nxtdate_vhcl'] = 'Επόμενος Τεχ.ελεγχ.:';
$lang['pdf_vin_vhcl'] = 'Αριθμός Πλαισίου:';
$lang['pdf_mlg_vhcl'] = 'Ένδειξη χλμ*<br />(καταγεγραμμένη):';
$lang['pdf_displpow_vhcl'] = 'Ισχύς/Κυβισμός:';
$lang['pdf_firstreg_vhcl'] = 'Ημ.1ης ταξινόμησης:';
$lang['pdf_mlg_notice'] = '*Θεωρείται δεδομένο, ότι η συνολική απόσταση που διανύθηκε, αντιστοιχεί στην καταγεγραμμένη χιλιομετρική ένδειξη';
$lang['pdf_technology_check'] = 'DEKRA Τεχνικός Έλεγχος';
$lang['pdf_bodywork_check'] = 'DEKRA Έλεγχος Αμαξώματος';
$lang['pdf_system_check'] = 'DEKRA Έλεγχος Συστήματος';
$lang['pdf_inspector'] = 'Ο εμπειρογνώμονας';
$lang['pdf_sign_notice'] = 'Αυτό το έγγραφο συντάχθηκε ηλεκτρονικά και είναι έγκυρο και δίχως υπογραφή';


// PDF CERT
$lang['certificate'] = 'Πιστοποιητικό';
$lang['dekra_nr'] = 'DEKRA Αριθμός';
$lang['full_date'] = 'Ημερομηνία';
$lang['seal_granded_by'] = 'Η σφραγίδα χορηγείται από';
$lang['sign_notice'] = 'Αυτό το έγγραφο συντάχθηκε ηλεκτρονικά και δεν απαιτείται υπογραφή.';