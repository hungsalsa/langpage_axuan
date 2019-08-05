<?php if (!empty($data)): ?>
<?php foreach ($data as $key => $value): ?>
  

<section id="zone-<?= $key+1 ?>">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Đoạn sau trình bày trong khung soạn thảo -->
          <h1><?= $value['name'] ?></h1>
          <p><?= $value['content'] ?></p>
          <!-- /end -->
        </div>
      </div>
    </div>
    <?php if ($value['registration'] == 1): ?>
      <section id="countdown-<?= $key+1 ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 style="text-align: center;">Chương trình sẽ kết thúc sau</h2>
              <p id="demo-<?= $key+1 ?>" style="text-align: center;font-size: 60px;margin-top: 0px;"></p>
              
              <script>
                // Set the date we're counting down to
                var countDownDate = new Date("<?= date("F j, Y G:i:s",$value['date']) ?>").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                  // Get today's date and time
                  var now = new Date().getTime();
                    
                  // Find the distance between now and the count down date
                  var distance = countDownDate - now;
                    
                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                  // Output the result in an element with id="demo"
                  document.getElementById("demo-<?= $key+1 ?>").innerHTML = days + "ngày " + hours + "giờ "
                  + minutes + "phút " + seconds + "giây ";
                    
                  // If the count down is over, write some text 
                  if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo-<?= $key+1 ?>").innerHTML = "Chương trình đã kết thúc";
                  }
                }, 1000);
              </script>
            </div>
          </div>
        </div>
      </section>
      <section id="form-<?= $key+1 ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- Button trigger modal -->
              <div class="register text-center"><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Đăng ký
              </button></div>
            </div>
          </div>
        </div>
      </section>
  <?php endif ?>
  </section>

  <?php endforeach ?>
<?php endif ?>
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Đăng ký tham dự chương trình</h4>
        </div>
        <div class="modal-body">
          <form id="formregister" method="get">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita animi laboriosam, voluptatem a quos amet voluptate, dolor eligendi rerum quasi pariatur eaque asperiores alias ab molestiae consectetur et laborum, praesentium => <b>Trong admin là khung soạn thảo</b></p>
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputName" placeholder="Họ tên *">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="exampleInputTel" placeholder="Số điện thoại *">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputAddress" placeholder="Địa chỉ">
            </div>
            <div class="form-group">
              <select name="NameProducts" id="NameProducts" class="form-control">
                <option selected="selected" value="all">Sản phẩm</option>
                <option value="1">Vé loại 1</option>
                <option value="2">Vé loại 2</option>
                <option value="3">Vé loại 3</option>
              </select>
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="exampleInputQty" value="1" placeholder="Số lượng">
            </div>
            <div class="form-group">
              <p>Đơn giá: <span>35.000<sup>đ<sup></span>  *  Thành tiền: <span>12.522.000<sup>đ<sup></span></p>
              </div>
              <div class="form-group">
                <textarea type="text" class="form-control" id="exampleInputNote" placeholder="Ghi chú"></textarea>
              </div>
              <div class="register"><button type="submit" class="btn btn-default">Đăng ký</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>