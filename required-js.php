    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>   
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.js"></script>

    <script src="js/highcharts.js"></script>    


    <script>

        var chartanggaran; 
        $(document).ready(function() {
              chartanggaran = new Highcharts.Chart({
                 chart: {
                    renderTo: 'anggaran',
                    type: 'column'
                 },   
                 title: {
                    text: 'Jumlah Anggaran Dana Desa '
                 },
                 xAxis: {
                    categories: ['Jumlah Anggaran yang diterima ']
                 },
                 yAxis: {
                    
                    title: {
                       text: 'Anggaran ( Rp )'
                    },
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat(this.value,0);
                        }
                    }
                 },
                      series:             
                    [
                        <?php 
                        $con=mysqli_connect("localhost","root","","db_desa");
                        $sql   = "SELECT uraian  FROM anggarandesa";
                        $query = mysqli_query( $con, $sql )  or die(mysqli_error());
                        while( $temp = mysqli_fetch_array( $query ) )
                        {
                            $trendbrowser=$temp['uraian']; 
                            //CONCAT('Rp. ', FORMAT(anggaran, 0))                    
                            $sql_total   = "SELECT anggaran FROM anggarandesa WHERE uraian='$trendbrowser'";        
                            $query_total = mysqli_query($con,$sql_total ) or die(mysql_error());
                            while( $data = mysqli_fetch_array( $query_total ) )
                            {



                                $total = $data['anggaran'];                 
                            }             
                        ?>
                            {
                              name: '<?php echo $trendbrowser; ?>',
//                              data:  [<?php echo $total / 1000000  ?>]
                              data:  [<?php echo $total  ?>]
                            },
                            <?php 
                        }   ?>
                        ]
              });
           });  

    var chartrealisasi; 
        $(document).ready(function() {
              chartrealisasi = new Highcharts.Chart({
                 chart: {
                    renderTo: 'realisasi',
                    type: 'column'
                 },   
                 title: {
                    text: 'Anggaran Realisasi Dana Desa '
                 },
                 xAxis: {
                    categories: ['Realisasi Angaran Desa']
                 },
                 yAxis: {
                    
                    title: {
                       text: 'Anggaran ( Rp )'
                    },
                    labels: {
                        formatter: function () {
                            return Highcharts.numberFormat(this.value,0);
                        }
                    }
                 },
                      series:             
                    [
                        <?php 
                        $con=mysqli_connect("localhost","root","","db_desa");
                        $sql   = "SELECT uraian  FROM anggarandesa";
                        $query = mysqli_query( $con, $sql )  or die(mysqli_error());
                        while( $temp = mysqli_fetch_array( $query ) )
                        {
                            $trendbrowser=$temp['uraian']; 
                            //CONCAT('Rp. ', FORMAT(anggaran, 0))                    
                            $sql_total   = "SELECT realisasi FROM anggarandesa WHERE uraian='$trendbrowser'";        
                            $query_total = mysqli_query($con,$sql_total ) or die(mysql_error());
                            while( $data = mysqli_fetch_array( $query_total ) )
                            {



                                $total = $data['realisasi'];                 
                            }             
                        ?>
                            {
                              name: '<?php echo $trendbrowser; ?>',
//                              data:  [<?php echo $total / 1000000  ?>]
                              data:  [<?php echo $total  ?>]
                            },
                            <?php 
                        }   ?>
                        ]
              });
           });  

    </script>