<div class="container">
	<div class="row"><div class="col text-center py-2 text-light bg-green"><h3><?= $this->lang->line('pdf_dekra_report'); ?></h3></div></div>
        <div class="row justify-content-center">
            <div class="col-lg-10 px-3 py-2 bg-light">
				
            <div class="row mb-2">
                <div class="col-md-8"><!--<span class="text-secondary"><?= $this->lang->line('number_inspection'); ?>:</span> <?php echo $inspection->number_inspection; ?> <span class="text-secondary"><?= $this->lang->line('inspector'); ?>:</span> <?php echo $inspection->last_name; ?> <?php echo $inspection->first_name; ?>--></div>
                <div class="col-md-4 text-center text-md-right"><span class="text-secondary"><?= $this->lang->line('date_inspection'); ?>:</span> <?php echo date("d-m-Y", strtotime($inspection->date_inspection)); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center text-light bg-green pt-1 pb-1"><?= $this->lang->line('vehicle_details'); ?></div>
                <div class="col-5 col-sm-3 text-secondary pt-2 pb-2"><?= $this->lang->line('vin_vhcl'); ?>:</div>
                <div class="col-7 col-md-3 col-sm-9 pt-2 pb-2"><?php echo $inspection->vin_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('reg_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->reg_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('firstreg_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo date("m/Y", strtotime($inspection->firstreg_vhcl)); ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('type_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->type_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('doors_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->doors_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('make_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->make_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('colour_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->colour_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('model_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->model_vhcl; ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('fuel_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $this->lang->line($inspection->fueltyp_vhcl); ?></div>
				<div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('wheeldrive_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $this->lang->line($inspection->wheeldrive_vhcl); ?></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('pdf_displpow_vhcl'); ?></div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->pow_vhcl; ?>kW / <?php echo $inspection->displ_vhcl; ?>ccm</td></div>
                <div class="col-6 col-md-3 text-secondary pt-2 pb-2"><?= $this->lang->line('mlg_vhcl'); ?>:</div>
                <div class="col-6 col-md-3 pt-2 pb-2"><?php echo $inspection->mlg_vhcl; ?></div>
            </div>    

        </div>
        <div class="col-lg-10 p-3 bg-light">
			<div class="row"><div class="col py-1 text-center"><h5>Αποτελέσματα</h5></div></div>
            <div class="row">
                <div class="col-sm-4 text-center">
                    <canvas id="cnvgauge5" ></canvas>
                    <div style="width:100%" class="text-center small"><?= $this->lang->line('pdf_technology_check'); ?></div>
                    <div id="score4" style="width:100%" class="text-center mb-2"><?= round(100 * ($sec1score / 112), 2) ?><small>%</small></div>
                </div>
                <div class="col-sm-4 text-center">   
                    <canvas id="cnvgauge6"></canvas>
                    <div style="width:100%" class="text-center small"><?= $this->lang->line('pdf_bodywork_check'); ?></div>
                    <div id="score5" style="width:100%" class="text-center mb-2"><?= round(100 * ($sec2score / 62), 2) ?><small>%</small></div>
                </div>
                <div class="col-sm-4 text-center">    
                    <canvas id="cnvgauge7"></canvas>
                    <div style="width:100%" class="text-center small"><?= $this->lang->line('pdf_system_check'); ?></div>
                    <div id="score6" style="width:100%" class="text-center mb-2"><?= round(100 * ($sec3score / 16), 2) ?><small>%</small></div>
                </div>
            </div>
        </div>
		<?php if (isset($user_lang) && $user_lang == "greek") {
		
		if (isset($inspection->rmrk_inspection) && $inspection->rmrk_inspection != "n/a") { ?>
		<div class="col-lg-10 p-3 bg-light">
		<div class="row">
<div class = "col-12">
	<h5><?= $this->lang->line('genremark_inspection'); ?></h5></div>
	<div class = "col-12 pb-3"><?= $inspection->rmrk_inspection ?></div>
		
		</div>
		</div>

		<?php } } else {

			if (isset($inspection->en_rmrk_inspection) && $inspection->en_rmrk_inspection != "n/a") { ?>
		<div class="col-lg-10 p-3 bg-light">
		<div class="row">
<div class = "col-12 text-center">
	<h5><?= $this->lang->line('genremark_inspection'); ?></h5></div>
	<div class = "col-12 pb-3"><?= $inspection->en_rmrk_inspection ?></div>
		
		</div>
		</div>

			<?php } } ?>
		



    </div>
   <div class="row my-3">
	<div class="col" style="overflow-y: scroll; height: 400px;">
	<h3>ΟΡΟΙ ΕΛΕΓΧΩΝ ΟΧΗΜΑΤΩΝ</h3>
	<h5>ΕΙΣΑΓΩΓΙΚΑ</h5>
		<p>Η εταιρεία Ιmperial DEKRA διαθέτοντας υψηλή τεχνογνωσία και εξειδίκευση διενεργεί κατόπιν αιτήσεων ελέγχους σε παντός είδους οχήματα. Οι έλεγχοι της διέπονται από συγκεκριμένους όρους και προϋποθέσεις οι οποίες αναφέρονται αναλυτικά στο παρόν έγγραφο. </p>
		<p>Οι κάτωθι όροι ισχύουν σε κάθε περίπτωση ανάθεσης ελέγχου οχήματος από πελάτη στην εταιρεία με την επωνυμία Ιmperial DEKRA. Με την εκδήλωση ενδιαφέροντος από τον πελάτη και την αίτησή του για έλεγχο η ως άνω εταιρεία του γνωστοποιεί τους κάτωθι όρους και ο τελευταίος τους αποδέχεται με την υπογραφή του στο τέλος του εγγράφου αναγράφοντας ολογράφως και το ονοματεπώνυμό του. Η γνωστοποίηση και η αποδοχή των όρων δύναται να γίνεται και ηλεκτρονικά δηλώνοντας ο πελάτης τη διεύθυνση email στην ως άνω εταιρεία στην οποία επιθυμεί να λάβει το κείμενο των όρων. Η αποστολή των όρων στην υποδειχθείσα διεύθυνση αποτελεί αποδοχή από πλευράς του πελάτη. Οι κάτωθι όροι γνωστοποιούνται σε κάθε ενδιαφερόμενο πελάτη μέσω του διαδικτυακού τόπου της εταιρείας.</p>
		<h5>1. Υποχρέωση Ενημέρωσης</h5>
		<p>Ο ιδιοκτήτης ή κάτοχος του οχήματος, εφεξής «Πελάτης», ο οποίος αιτείται από την Imperial DEKRA,  εφεξής «Πάροχος» και της δίνει εντολή για επιθεώρησή όπως και ο αντιπρόσωπός του, οφείλει τηρώντας τους κανόνες της καλής πίστης να υποβοηθήσει τον εντεταλμένο ελεγκτή από τον πάροχο στο έργο της αξιολόγησης του οχήματος του με αντικειμενικότητα και διαφάνεια.</p>
		<p>Για την εκπλήρωση αυτού του σκοπού ο πελάτης υποχρεούται να παραθέτει στον εντεταλμένο ελεγκτή / επιθεωρητή, όλα τα διαθέσιμα έγγραφα του υπό επιθεώρηση οχήματος όπως ενδεικτικά: το Βιβλίο Συντήρησης και Βλαβών (book service) του, έγκυρη άδεια κυκλοφορίας οχήματος, ασφαλιστήριο, και να αναφέρει χωρίς πρόθεση απόκρυψης όλες τις ουσιώδεις για τον έλεγχο του οχήματος πληροφορίες που γνωρίζει, όπως τυχόν προγενέστερες ζημίες του οχήματος, τις τυχόν βλάβες που το όχημα ήδη παρουσιάζει, πιθανή αλλοίωση του χιλιομετρητή του και να θέτει σε γνώση του προφορικώς ή και εγγράφως, αποτελέσματα προηγούμενων ελέγχων του συγκεκριμένου οχήματος από τον ίδιο ή από άλλο ελεγκτικό φορέα ή επίσημη αντιπροσωπεία, αν υπάρχουν τέτοια.</p>
		<h5>2. Μηχανολογικός έλεγχος, συστήματος διεύθυνσης, test drive</h5>
		<p>Ο Πελάτης (ιδιοκτήτης ή κάτοχος) του οχήματος, ο οποίος αιτείται την επιθεώρηση όπως και ο αντιπρόσωπός του υποχρεούται να επιτρέπει στον εντεταλμένο επιθεωρητή του παρόχου, το δικαίωμα, να θέτει σε λειτουργία τον κινητήρα του οχήματος για να ελέγχει το σύστημα διεύθυνσης του οχήματος σε κίνηση, να ελέγχει το κάτω μέρος του οχήματος και στη περίπτωση που το κρίνει απαραίτητο, να διεξάγει test drive. Το test drive δεν περιλαμβάνεται σε όλες τις υπηρεσίες ελέγχου που διεξάγει ο πάροχος. </p>
		<p>Σε περίπτωση που ο έλεγχος αφορά σε έλεγχο ορθότητας μιας επισκευής, ο πελάτης οφείλει να τον ενημερώσει για τον τρόπο που διεξήχθη η επισκευή με σκοπό να αξιολογήσει τη ποιότητά της.</p>
		<p>Σε περίπτωση που για οποιονδήποτε λόγο δεν καταστεί δυνατό για τον ελεγκτή να διενεργήσει τα ως άνω, η αίτηση παροχής της υπηρεσίας ελέγχου θα απορριφθεί και ο πελάτης αναγνωρίζει ότι οφείλει στον πάροχο το ποσό των εξόδων μετάβασης κατέβαλε ο τελευταίος.</p>
		<h5>3. Κατάσταση Οχήματος κατά την επιθεώρηση</h5>
		<p>Ο πελάτης θα πρέπει να θέσει το όχημα στη διάθεση στον εντεταλμένο ελεγκτή του παρόχου καθαρό. Εάν για λόγους ανωτέρας βίας (π,χ καιρικών συνθηκών), το όχημα δεν παρουσιαστεί καθαρό, αυτό θα αναφέρεται στην έκθεση ελέγχου. </p>
		<p>Στην τελευταία περίπτωση ο πελάτης χωρίς υπαιτιότητά του μπορεί να οδηγηθεί σε ανακριβή αποτελέσματα για τη κατάσταση κάποιων μερών του οχήματος κατά τον έλεγχό του και ο πελάτης, αποδέχεται αυτό το ενδεχόμενο και δυνάμει αυτής της αποδοχής παραιτείται του δικαιώματος να αξιώσει οποιαδήποτε επιστροφή του καταβληθέντος τιμήματος ελέγχου.</p>
		<h5>4. Χρήση συσκευών / εργαλείων που έχουν κατασκευαστεί από τρίτους παρόχους ή που φέρουν λογισμικό τρίτων παρόχων</h5>
		<p>Ο πάροχος, προκειμένου να προσφέρει την υπηρεσία επιθεώρησης ή/και ελέγχου, χρησιμοποιεί συσκευές ή λογισμικό που έχουν αναπτύξει τρίτοι πάροχοι ή συσκευές που έχουν αναπτύξει τρίτοι πάροχοι και φέρουν λογισμικό της ίδιας ή των συνεργατών της ενδεικτικά, συσκευή διάγνωσης εγκεφάλου (ECU OBD), συσκευή διάγνωσης κατάστασης μπαταρίας, μετρητή πάχους βαφής, τάση ελέγχου μπαταρίας, βάθος πέλματος ελαστικών. </p>
		<p>Η Imperial Automotive ή και οι εντεταλμένοι συνεργάτες της, δεν φέρουν καμία ευθύνη για την τυχόν ανακρίβεια των αποτελεσμάτων που εξάγονται από τέτοιες συσκευές ή λογισμικά εκτός εάν η χρήση των ως άνω συσκευών και λογισμικών γίνεται κατά λανθασμένο τρόπο ή έλαβε γνώση της ανακρίβειας αυτής (βλέπε όρο 3). </p>
		<h5>5. Ευθύνη</h5>
		<p>Ο πάροχος, κατά την επιθεώρηση διενεργεί μόνον οπτικούς, ηλεκτρονικούς και λειτουργικούς ελέγχους. Αυτοί οι έλεγχοι διενεργούνται σύμφωνα με όλους τους κοινούς παραδεδεγμένους κανόνες της μηχανολογίας ενώ σε καμία περίπτωση δεν συνιστούν πλήρη έλεγχο. Ο πάροχος ούτε αποσυναρμολογεί το όχημα κατά τρόπο για να δύναται να εγγυάται για την ακρίβεια των ευρημάτων της και τον συσχετισμό τους με μη ελεγχθέντα μέρη του αυτοκινήτου. Δεδομένων των ανωτέρω ο πάροχος, δεν φέρει καμία ευθύνη για την ορθότητα, περιεχόμενο και πληρότητα των ευρημάτων του, τα οποία εξάγονται με επιφύλαξη καθώς δεν διεξάγεται πλήρης έλεγχος.</p>

		<p>Τα αποτελέσματα που εξάγονται συνιστούν απλώς πληροφορία για τη κατάσταση του οχήματος κατά τη συγκεκριμένη στιγμή (ώρα και ημέρα) που διενεργείται ο έλεγχος και όπως είναι αυτονότητο αυτά μπορεί να μεταβληθούν ανά πάσα στιγμή μετά τον έλεγχο ακόμα και ουσιωδώς είτε λόγω φυσιολογικής φθοράς είτε λόγω ακινησίας είτε λόγω αμέλειας του οδηγού, κακής μεταχείρισης ή πλημμελούς συντήρησης ή επισκευής είτε λόγω εξωτερικών παραγόντων (καιρικών ή ατυχήματος).</p>

		<p>Κατά συνέπεια με ο έλεγχος του παρόχου δεν παρέχει κάποιου είδους εγγύηση ή εξασφάλιση σε τρίτον π.χ. σε έναν υποψήφιο αγοραστή του αυτοκινήτου και δεν φέρει καμία ευθύνη για οτιδήποτε προκύψει μετά το πέρας του ελέγχου της. Τα ως άνω ισχύουν και για την υπηρεσία αξιολόγησης ορθής επισκευής που έχει γίνει σε επισκευασμένο όχημα.</p>
		<p>Ο πελάτης, σε περίπτωση που μεταπωλήσει το όχημα αναφέροντας στον αγοραστή τα ευρήματα του ελέγχου του παρόχου, οφείλει με τη σειρά του να ενημερώσει τον αγοραστή για τους όρους διενέργειας του ελέγχου και ότι αυτός δεν συνιστά πλήρη έλεγχο και απαγορεύεται να ισχυριστεί ή να αφήσει να εννοηθεί ότι ο έλεγχος του παρόχου αποτελεί οποιουδήποτε είδους εγγύηση για την αξιοπιστία και καταλληλότητα του προς πώληση οχήματος.</p>
		<h5>6. Δήλωση Ανεξαρτησίας και Αντικειμενικότητας</h5>
		<p>Ο πάροχος δηλώνει, ότι δεν σχετίζεται καθ΄ οιονδήποτε τρόπο έχει με την εμπορία και πώληση μεταχειρισμένων οχημάτων ή με την επισκευή ζημιωθέντων οχημάτων. Ως εκ τούτου, ουδέν συμφέρον έχει, (οικονομικό ή άλλο, άμεσο ή έμμεσο) από την πώληση ή επισκευή των ελεγχθέντων οχημάτων ή από την πώληση ή επισκευή άλλων οχημάτων.</p>
		<p>Ο έλεγχος του παρόχου υπακούει στους κανόνες της αντικειμενικότητας, της διαφάνειας και της αμεροληψίας. Ο πελάτης, σε περίπτωση που υποπέσει στην αντίληψή του ότι οποιοσδήποτε εκπρόσωπος του παρόχου (ελεγκτής, ή άλλος) ασχολείται έναντι ανταλλάγματος με τη πώληση ή επισκευή οχημάτων, οφείλει αμέσως, να ενημερώσει τον πάροχο.</p>
		<h5>7. Προωθητικές ενέργειες Πελάτη</h5>
		<p>Ο Πελάτης, έχει το δικαίωμα να πληροφορήσει τρίτους για τη συνεργασία του με τον πάροχο καθώς  και να διαθέτει τις εκθέσεις ελέγχου του με το ακριβές περιεχόμενό τους, ως προωθητικά μέσα πώλησης οχημάτων. Απαγορεύεται όμως, να αλλοιώνει τα σήματα της Imperial Automotive και της DEKRA, τη γραμματοσειρά τους, το χρώμα τους ή το περιεχόμενο των ευρημάτων τους ή να τα χρησιμοποιεί κατά τρόπο παραπλανητικό. </p>
		<p>Παραπλανητικός τρόπος θεωρείται ιδίως, όταν ο πελάτης δεν ενημερώνει τους τρίτους με ακρίβεια για το είδος του ελέγχου που πράγματι έγινε. Ενώ π.χ διενεργήθηκε μόνο μέτρηση πάχους βαφής στο όχημα, επιπρόσθετα επικαλείται ότι διενεργήθηκε και διαγνωστικός έλεγχος εγκεφάλου ή ότι ενώ διενεργήθηκε μόνο διαγνωστικός έλεγχος εγκεφάλου, ο πελάτης να αναφέρει παραπλανητικά ότι το αυτοκίνητο πιστοποιήθηκε πλήρως από τη DEKRA φέροντας τη σφραγίδα της ή παραπλανητικά να αναφέρει ότι διενεργήθηκε και test drive χωρίς κάτι τέτοιο να έχει συμβεί. Στη περίπτωση αυτή, ο πελάτης οφείλει αποζημίωση στο πάροχο και αποτελεί λόγο άμεσης διακοπής της συνεργασίας τους.</p>
		<p>Σε περίπτωση που ο πάροχος, αποφασίσει να σταματήσει την συνεργασία του ή παύσει για οποιοδήποτε λόγο η συνεργασία του με τον πελάτη, αυτό θα είναι αζημίως εκατέρωθεν και ο τελευταίος, υποχρεούται να σταματήσει την πληροφόρηση για τη συνεργασία τους</p>
		<h5>8. Προωθητικές ενέργειες Imperial Automotive </h5>
		<p>Ο πάροχος, έχει τη δυνατότητα να προβεί σε προωθητικές ενέργειες που ενισχύουν τη φήμη της στον έλεγχο μεταχειρισμένων ή επισκευασμένων οχημάτων και που βοηθούν τους πελάτες της (εμπόρους ή ιδιώτες) να προωθήσουν με μεγαλύτερη ευκολία και τίμημα τα προς πώληση οχήματά τους.</p>
		<p>Προς το σκοπό αυτό, η Imperial Automotive έχει το δικαίωμα στην ιστοσελίδα της ή σε κάθε είδους διαφημιστικά μέσα (έντυπα ή ηλεκτρονικά), να παραθέσει τα στοιχεία των ελεγχθέντων οχημάτων της, το τόπο πώλησής τους καθώς και τα αποτελέσματα των ελέγχων της, με σκοπό να τον ενισχύσει διαφημιστικά στη προσπάθεια πώλησης των οχημάτων του. Εφόσον όμως ο πελάτης-πωλητής ζητήσει να σταματήσει η έκθεση κάποιου συγκεκριμένου ή όλων των οχημάτων του από κάποιο προωθητικό μέσο, ο πάροχος, οφείλει να το πράξει αμέσως.   </p>
		<p>Σε καμία όμως περίπτωση, ο πάροχος, ή κάποιος εκπρόσωπός του, δεν μπορεί να ζητήσει για την προωθητική αυτή υπηρεσία οποιοδήποτε είδους οικονομικό αντάλλαγμα (προμήθεια, αμοιβή ή άλλο) από τους πελάτες του, θέτοντας υπό αμφισβήτηση την αντικειμενικότητα των ελέγχων του.</p>
		<p>Ο πελάτης δηλώνει ότι έλαβε γνώση των όρων ελέγχου οχημάτων όπως αναγράφονται ανωτέρω και δηλώνει ανεπιφύλακτα την αποδοχή τους. Οι ως άνω όροι, θα είναι αναρτημένοι στην ιστοσελίδα του παρόχου www.imperial-dekra.gr από όπου ο πελάτης θα ενημερώνεται για οποιαδήποτε μεταβολή τους.</p>
		<p>Στην περίπτωση που ο πελάτης είναι έμπορος οχημάτων και συνεργάζεται με την εταιρεία για τον έλεγχο οχημάτων δεν απαιτείται η υπογραφή του παρόντος ανά έλεγχο οχήματος καθώς οι όροι του παρόντος εφόσον έχουν γνωστοποιηθεί στον έμπορο άπαξ θα ισχύουν για κάθε έλεγχο. Οι ως άνω όροι, θα είναι αναρτημένοι στην ιστοσελίδα του παρόχου www.imperial-dekra.gr από όπου ο πελάτης θα ενημερώνεται για οποιαδήποτε μεταβολή τους.</p>
      
	</div>
   </div>
    
</div>




<script>
jQuery(document).ready(function($) {
	$('.gallery').featherlightGallery();
    $("#spinner").removeClass("d-flex").hide();
    $('.pcert').hide();
  var btns = document.querySelectorAll('button');
  var clipboard = new ClipboardJS(btns);

  clipboard.on('success', function(e) {
    $(e.trigger).tooltip({title:"Copied!", trigger:'manual'}).tooltip('show').on('shown.bs.tooltip', function () {
        $(e.trigger).delay(1200).tooltip('hide')
})
    });

var score1 = <?= $sec1score ?>;
var score2 = <?= $sec2score ?>;
var score3 = <?= $sec3score ?>;


var opts1 = {
  angle: 0, // The span of the gauge arc
  lineWidth: 0.2, // The line thickness
  radiusScale: 0.78, // Relative radius
  pointer: {
    length: 0.41, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: true,     // If false, max value increases automatically if value > maxValue
  limitMin: true,     // If true, the min value of the gauge will be fixed
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',  // to see which ones work best for you
  staticZones: [
   {strokeStyle: "#ff3300", min: 0, max: 91.99}, // Red from 100 to 130
   {strokeStyle: "#28db00", min: 92, max: 112}, // Yellow
  ],
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  
};
var opts2 = {
  angle: 0, // The span of the gauge arc
  lineWidth: 0.2, // The line thickness
  radiusScale: 0.78, // Relative radius
  pointer: {
    length: 0.41, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: true,     // If false, max value increases automatically if value > maxValue
  limitMin: true,     // If true, the min value of the gauge will be fixed
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',  // to see which ones work best for you
  staticZones: [
   {strokeStyle: "#ff3300", min: 0, max: 52.99}, // Red from 100 to 130
   {strokeStyle: "#28db00", min: 53, max: 62}, // Yellow
  ],
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  
};
var opts3 = {
  angle: 0, // The span of the gauge arc
  lineWidth: 0.2, // The line thickness
  radiusScale: 0.78, // Relative radius
  pointer: {
    length: 0.41, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: true,     // If false, max value increases automatically if value > maxValue
  limitMin: true,     // If true, the min value of the gauge will be fixed
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',  // to see which ones work best for you
  staticZones: [
   {strokeStyle: "#ff3300", min: 0, max: 11.99}, 
   {strokeStyle: "#28db00", min: 12, max: 16}, 
  ],
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  
};
var target1 = document.getElementById('cnvgauge5'); // your canvas element
var gauge1 = new Gauge(target1).setOptions(opts1); // create sexy gauge!
gauge1.maxValue = 112; // set max gauge value
gauge1.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge1.animationSpeed = 32; // set animation speed (32 is default value)
gauge1.set(Number(score1)); // set actual value
var target2 = document.getElementById('cnvgauge6'); // your canvas elem ent
var gauge2 = new Gauge(target2).setOptions(opts2); // create sexy gauge!
gauge2.maxValue = 62; // set max gauge value
gauge2.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge2.animationSpeed = 32; // set animation speed (32 is default value)
gauge2.set(Number(score2)); // set actual value
var target3 = document.getElementById('cnvgauge7'); // your canvas elem ent
var gauge3 = new Gauge(target3).setOptions(opts3); // create sexy gauge!
gauge3.maxValue = 16; // set max gauge value
gauge3.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge3.animationSpeed = 32; // set animation speed (32 is default value)
gauge3.set(Number(score3)); // set actual value



    


     if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}


$( "#createcert" ).click(function() {
    $("#spinner").addClass("d-flex").show();
    $.ajax({
		type: "POST",
		dataType: "JSON",
		data: {id:<?= $inspection->id_inspection ?>},
		url: "<?= base_url()?>inspection/cert_pdf",
		success: function(data){
			//$.each(data, function(i,item){
				if (data.created == 'ok'){
                   // alert(data.created);
                   // alert(data.en_certfile_inspection);
                   // alert(data.certfile_inspection);
                    $( "#createcert" ).hide();
                    $('.certel').attr('href','<?= base_url()?>assets/pdfs/'+ data.certfile_inspection);
                    $('.btnel').attr('data-clipboard-text', '<?= base_url()?>assets/pdfs/'+ data.certfile_inspection);
                    $('.certen').attr('href','<?= base_url()?>assets/pdfs/'+ data.en_certfile_inspection);
                    $('.btnen').attr('data-clipboard-text', '<?= base_url()?>assets/pdfs/'+ data.en_certfile_inspection);
                    $("#spinner").removeClass("d-flex").hide();
                    $('.pcert').show();
		
				} else {
		  
						}
			//});
			}
		
	  
	});
});
$( "#resetinsp" ).click(function() {
	bootbox.confirm("<?= $this->lang->line('confirm_erase'); ?>", function(result) {    
                if (result) {
    $("#spinner").addClass("d-flex").show();
    $.ajax({
		type: "POST",
		dataType: "JSON",
		data: {id:<?= $inspection->id_inspection ?>},
		url: "<?= base_url()?>inspection/resetinspection",
		success: function(data){
			//$.each(data, function(i,item){
				if (data.reseted == 'ok'){
                   // alert(data.created);
                   // alert(data.en_certfile_inspection);
                   // alert(data.certfile_inspection);
                    $( "#resetinsp" ).hide();
					$('.inspfile').remove();
                    $("#spinner").removeClass("d-flex").hide();
                    
		
				} else {
		  
						}
			//});
			
		
		}
	});
}
});
});
bootbox.setDefaults({
          /**
           * @optional String
           * @default: en
           * which locale settings to use to translate the three
           * standard button labels: OK, CONFIRM, CANCEL
           */
          locale: "<?= $ulcl ?>"
    });


});
    </script>
