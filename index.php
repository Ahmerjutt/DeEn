<?php require_once('files/header.php')?>
<?php 
// Custom Php
  $path = getcwd();
  $contents = file_get_contents('files/data.json');
  $data = json_decode($contents, true);
  $count = count($data);

 ?>
<div class="main-content">
      <!-- HEADER -->
      <div class="header">
        <div class="container-fluid">

          <!-- Body -->
          <div class="header-body">
            <div class="row align-items-end">
              <div class="col">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  Git Deployment
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Auto Deployment With Git
                </h1>

              </div>
              <div class="col-auto">

                <!-- Button -->
                <a href="#!" class="btn btn-primary lift" data-toggle="modal" data-target="#exampleModal">
                  Add Repository
                </a>

              </div>
            </div> <!-- / .row -->
          </div> <!-- / .header-body -->

        </div>
      </div> <!-- / .header -->

      <!-- CARDS -->
     <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-6 col-xl">
            <table class="table table-sm table-nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Repository</th>
                  <th scope="col">Repository Path</th>
                  <th scope="col">Created</th>
                  <th scope="col">Branch</th>
                  <th scope="col">Tools</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if ($count >= 1) {
                    $total = 0;
                    foreach ($data as $key => $value) {
                      $namee = $value['Name'];
                      $nbr = $total++;
                      echo "<tr>";
                      echo "<td scope='row'>".$nbr."</td>";
                      echo "<td>".$value['Name']."</td>";
                      echo "<td>".$value['CloneUrl']."</td>";
                      echo "<td>02/03/2000</td>";
                      echo "<td>master</td>";
                      echo '
                        <td><button type="button" class="btn btn-danger btn-sm">Delete</button>
                        <edit data="'.$namee.'" type="'.$nbr.'"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-toggle="modal" data-target="#exampleModal">Edit</button></edit>
                        <extracter data="'.$namee.'" type="'.$nbr.'"><button type="button" class="btn btn-warning btn-sm" id="Extracting'.$nbr.'">Extract</button></extracter>
                        </td>
                      ';
                      echo "</tr>";
                    }
                  }else{
                    echo "<tr>";
                    echo "<td colspan='6'><h1>No Repository found</h1></td>";
                    echo "</tr";
                  }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Create New Project -->
    <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Repository (Cloning)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
         <div class="input-group input-group-merge">
        <input type="text" class="form-control form-control-prepended is-valid" id="reponame">
        <div class="input-group-prepend">
          <div class="input-group-text">
            Repository name
          </div>
        </div>
      </div><br>
          <b>Clone URL</b>
          <p><small>Enter the clone URL for the remote repository. All clone URLs must begin with the http://, https://, ssh://, or git:// protocols or begin with a username and domain.<small></p>
          <div class="input-group input-group-merge">
        <input type="text" class="form-control form-control-prepended is-valid" id="cloneurl" value="https://github.com/Ahmerjutt/KarigarOnline/archive/master.zip">
        <div class="input-group-prepend">
          <div class="input-group-text">
            Url
          </div>
        </div>
      </div>
      <br>
      <b>Repository Path</b>
          <p><small>Enter the desired path for the repository’s directory. If you enter a path that does not exist, the system will create the directory when it creates or clones the repository.<small></p>
          <div class="input-group input-group-merge">
        <input type="text" class="form-control form-control-prepended is-valid" value="<?=$path?>" id="clonepath">
        <div class="input-group-prepend">
          <div class="input-group-text">
            current path
          </div>
        </div>
      </div><br>
      <b>Personal Token</b>
          <p><small>Enter Personal Auth token from your github<small></p>
          <div class="input-group input-group-merge">
        <input type="text" class="form-control form-control-prepended is-valid" id="ptoken" value="e672b9a371a879143caa3078ad96d0b227316037">
        <div class="input-group-prepend">
          <div class="input-group-text">
            token
          </div>
        </div>
      </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveRsepo">Save changes</button>
        <button type="button" class="btn btn-primary" id="newedb">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php require_once('files/footer.php')?>