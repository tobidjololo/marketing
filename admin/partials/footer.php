<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>SMS FLASH</span></strong>. Tous droits réservés
  </div>
  <div class="credits">
    Réaliser par Falcon Services
  </div>
</footer><!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/jQuery/jquery-3.6.js"></script>

<!-- Template Main JS File

api public  :   43eec3f9f43c79da033cb722bcd1bcc5a797c19f
api privée  :   pk_1e8646d9ea34988fc8a59034ca441fae7fc31c10baf1d0cb0e43eb10699c42
secret      :   sk_dbacb30e8ae3a04152295fafb687312d59a226862e512851343c326bc1ff0d2b
   

-->
<script src="assets/js/main.js"></script>
<script>
    $('select').selectpicker();
</script>
<script src="https://cdn.kkiapay.me/k.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var count = 0;
        $('#creer_eva').on('submit', function(event){
            event.preventDefault();
            console.log($(this).serialize());

            var form_data = $(this).serialize();
            var expediteur = $('#expediteur').val();
            var recepteur = $('#recepteur').val();
            var contenu = $('#contenu').val();

            var ietab = [];
            for (var i=0; i < recepteur.length; i++) {
                console.log(i);                        
                $.ajax({
                    url:"multiplesend.php",
                    method:"POST",
                    data:{
                        "expediteur" : expediteur,
                        "recepteur" : recepteur[i],
                        "contenu" : contenu
                    },
                    success:function(data)
                    {
                        // ietab.push(data.idEva);
                        // $('#model_id').val(ietab);
                        // //alert($('#model_id').val());
                        // $('#creer_eva').hide();
                        // $('#lieva').show();
                        // $('#add').show();
                        // var lModel = data.lModel
                        // // for (let index = 0; index < lModel.length; index++) {
                        // //     let idCritère = lModel[index].idCritère;
                        // //     let noteMax = lModel[index].noteMax;
                        // //     let question = lModel[index].question;
                        // //     count = count + 1;
                        // //     output = '<tr id="row_'+count+'">';
                        // //     output += '<td>'+idCritère+' <input type="hidden" name="hidden_idCritère[]" id="idCritère'+count+'" class="idCritère" value="'+idCritère+'" /></td>';
                        // //     output += '<td>'+noteMax+' <input type="hidden" name="hidden_noteMax[]" id="noteMax'+count+'" value="'+noteMax+'" /></td>';
                        // //     output += '<td>'+question+' <input type="hidden" name="hidden_question[]" id="question'+count+'" value="'+question+'" /></td>';
                        // //     output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">Voir</button></td>';
                        // //     output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Supprimer</button></td>';
                        // //     output += '</tr>';
                        // //     $('#user_data').append(output);
                        // // }
                    }
                })
            }
        });
    });
</script>
</body>

</html>