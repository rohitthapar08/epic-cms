            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; EPIC Television Networks Pvt. Ltd </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- custom jQuery -->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/my.custom.js"></script>
    <!-- jQuery -->
    <script src="/theme/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/theme/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="/theme/js/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="/theme/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/theme/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/theme/js/custom.min.js"></script>
    <!-- Footable -->
    <script src="/theme/js/footable.all.min.js"></script>
    <script src="/theme/js/bootstrap-select.min.js" type="text/javascript"></script>
    <!--FooTable init-->
    <script src="/theme/js/footable-init.js"></script>
    <script src="/theme/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });
        // Used events
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
    <!--Style Switcher -->
    <script src="/theme/js/jQuery.style.switcher.js"></script>
    <!-- <select> form js -->
    <script src="/theme/js/jQuery.style.switcher.js"></script>

    <!-- Collection drag n drop js -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      jQuery( function($) {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
      } );
    </script>
</body>

</html>