<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<!-- <script src="../assets/js/popper.min.js"></script> -->
<!-- <script src="../assets/js/bootstrap.js"></script> -->
<script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/select2.min.js"></script>
<script type="text/javascript" src="../assets/js/datatables.min.js"></script>
<script type="text/javascript" src="../assets/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../assets/js/jqClock.min.js"></script>

<!-- jam -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#jam").clock({
            "langSet": "id",
            "timeFormat": ", %Pukul% H:i:s "
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#table_id').DataTable({
            "lengthMenu": [
                [10, 20, -1],
                [10, 20, "All"]
            ],
        });
    });
</script>

<!-- Menu Toggle Script -->
<script type="text/javascript">
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>

</html>