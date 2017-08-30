
<?php include 'header.php'; ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
      客户信息添加
      </div>
      <div class="panel-body">
        <!-- Table -->
      <form class="form-horizontal" method="post" action="action.php?act=info&step=add">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pwd">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" value="submit" name="submit">提交</button>
            </div>
          </div>
        </form>


      </div>


    </div>

    </div>
<?php include 'footer.php' ?>

