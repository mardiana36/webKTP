
 <script src="app/views/assets/plugins/common/common.min.js"></script>
 <script src="app/views/assets/js/custom.min.js"></script>
 <script src="app/views/assets/js/settings.js"></script>
 <script src="app/views/assets/js/gleek.js"></script>
 <script src="app/views/assets/js/styleSwitcher.js"></script>

 <script src="app/views/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
 <script src="app/views/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
 <script src="app/views/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

 <script src="app/views/assets/plugins/jquery-steps/build/jquery.steps.min.js"></script>
 <script src="app/views/assets/plugins/jquery-validation/jquery.validate.min.js"></script>

 <script src="app/views/assets/plugins/moment/moment.js"></script>
 <script src="app/views/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
 <!-- Date Picker Plugin JavaScript -->
 <script src="app/views/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
 <!-- <script src="app/views/assets/js/plugins-init/form-pickers-init.js"></script> -->
 <script src="app/views/assets/js/templateAlert.js"></script>

 <script>
     let element = document.querySelector(".sweet-confirm")
     if(element != null){
        element.onclick = function(event) {
         event.preventDefault();
         var linkUrl = this.getAttribute('href');
         swal({
                 title: "Are you sure to delete?",
                 text: "You will not be able to recover this imaginary file!!",
                 icon: "warning",
                 buttons: {
                     cancel: "Cancel",
                     confirm: {
                         text: "Yes, delete it!!",
                         value: true,
                         visible: true,
                         className: "confirm-button",
                         closeModal: true
                     }
                 },
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     window.location.href = linkUrl;
                 } else {
                     swal("Cancelled", "Your imaginary file is safe!", "error");
                 }
             });
     };
     }
 </script>