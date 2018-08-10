<?php 
  $query = "select * from categories";
  $cats = $db->select($query);
?>         
          
         

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Hi,This is Shubham here , This is a simple php blog created by me. Please use it and if you have any suggestions then tell me.</p>
          </div>
          <div class="sidebar-module">
            <h4>Categories</h4>
            <?php
              while($row = $cats->fetch_array()):
            ?>
            <ol class="list-unstyled">
              <li><a href="category.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?> </a></li>
            </ol>
              <?php endwhile; ?>
          </div>
          <div class="sidebar-module">
            <h4>Social Contact</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Copyright &copy; 2018</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/script/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
