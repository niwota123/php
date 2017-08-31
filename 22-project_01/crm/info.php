
<?php include 'header.php'; ?>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
      客户信息
      <a class="btn btn-info" href="action.php?act=info&step=add">添加</a>
      </div>
      <div class="panel-body">
        <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>

          <ul class="pager">
            <li><a href="#">首页</a></li>
            <li><a href="#">上一页</a></li>
            <li><a href="#">下一页</a></li>
            <li><a href="#">尾页</a></li>
          </ul>
      </div>


    </div>

    </div>
<?php include 'footer.php' ?>

