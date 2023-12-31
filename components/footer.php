<div class="container">
    <div class="row justify-content-around-">
        <div class="col-md-12 text-center home-text">
            <p>&copy; ARIANE <?php print date('Y'); ?></p>
        </div>
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.7.8/plyr.js" integrity="sha512-evjxmRXJDnWC62hPb1lsGZP6/TsBVR1hq2K873VPdlxItTB/WFpB4pavhqTwEjWpYfOA/b/9QYljHjrPO1fXwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5media/1.1.7/html5media.js"></script>

<script>
    $(document).ready( function () {
        $('.myTable_player').DataTable({
            "pageLength": 5,
            "paging": false,
            "scrollCollapse": true,
            "scrollY": '40vh'
        });
    });
</script>

<script src="./js/logincreator.js"></script>
<script src="./js/loginadmin.js"></script>
<script src="./js/registercreator.js"></script>
<script src="./js/loginlistener.js"></script>
<script src="./js/registerlistener.js"></script>
<script src="./js/logoutadmin.js"></script>
<script src="./js/update_listener_info.js"></script>

</html>